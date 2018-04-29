<?php


namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\Color;
use app\models\Comment;
use app\models\Reklama;
use components\Paginator;
use app\models\User;
use components\web\Controller;
use components\web\Model;
use helpers\FilesHelper;
use helpers\ResponseHelper;
use helpers\SessionHelper;

class AdminController extends Controller
{
    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->getTemplate()->setLayout('admin/panelLayout');
    }

    /**
     *
     */
    public function check()
    {
        if (SessionHelper::getFlash('admin', false) == false){
            ResponseHelper::redirect('/admin');
        }
    }

    /**
     * @return string
     */
    public function actionColor()
    {
        $this->check();
        return $this->getTemplate()->render('/admin/color');
    }

    /**
     * @return string
     */
    public function actionReklamapanel()
    {
        $this->check();
        return $this->getTemplate()->render('/admin/reklamapanel');
    }

    public function actionChangeComment()
    {
        if (empty($_POST)){
            ResponseHelper::redirect('/admin');
        } else{
            $comment = $_POST['comment'];
            $id = $_POST['id'];
            $verified = empty($_POST['verified']) ? 0 : 1;
            $model = new Comment();
            $model->changeCommentById($id,$comment,$verified);
            ResponseHelper::redirect('/admin/comments');
        }
    }

    /**
     * @param $id
     * @return string
     */
    public function actionEditComment($id)
    {
        $model = new Comment();
        $data = $model->getCommentById($id);
        return $this->getTemplate()->render('admin/commentEditor', ['data' => $data]);
    }

    /**
     * @param $id
     */
    public function actionDeleteComment($id)
    {
        $this->check();
        $model = new Comment();
        $model->deleteById($id);
        ResponseHelper::redirect('/admin/comments');
    }

    /**
     * @return string
     */
    public function actionComments()
    {
        $this->check();
        $model = new Comment();
        $data = $model->getAllCommentsSortVer();
        return $this->getTemplate()->render('/admin/comments', ['data' => $data]);
    }

    public function actionDeleteBlock($id)
    {
        if (SessionHelper::getFlash('admin', false) === true){
            $model = new Reklama();
            $model->delete($id);
            ResponseHelper::redirect('/admin/reklamalist');
        } else {
            ResponseHelper::redirect('/');
        }
    }
    /**
     * @return string
     */
    public function actionReklamaList()
    {
        $this->check();
        $model = new Reklama();
        $data = $model->getAll('*');
        return $this->getTemplate()->render('/admin/reklamalist', ['data' => $data]);
    }
    /**
     *
     */
    public function actionAddreklama()
    {
        if (empty($_POST['text']) || empty($_POST['price']) || empty($_POST['url'])){
            ResponseHelper::redirect('/admin/reklamapanel');
        }else {
            $text = $_POST['text'];
            $price = floatval($_POST['price']);
            $url = $_POST['url'];
            $model = new Reklama();
            $model->addNew($text, $price, $url);
            ResponseHelper::redirect('/admin/reklamapanel');
        }
    }

    /**
     *
     */
    public function actionSetcolor()
    {
        if (SessionHelper::getFlash('admin', false) == false){
            ResponseHelper::redirect('/admin');
        }
        if (empty($_POST) && empty($_POST['color'])){
            ResponseHelper::redirect('/admin/color');
        } else {
            $model = new Color();
            $model->setColor($_POST['color']);
            ResponseHelper::redirect('/admin');
        }
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        if (SessionHelper::getFlash('admin', false) === true){
            return $this->actionPanel();
        } else {
            return $this->getTemplate()->render('/admin/login');
        }
    }

    /**
     * @return string
     */
    public function actionLogin()
    {
        if (SessionHelper::getFlash('admin', false) === true){
            ResponseHelper::redirect('/admin/panel');
        }

        $array = $_POST;
        if (empty($array['email']) || empty($array['password']) || empty($array['repassword']) || ($array['repassword'] !== $array['password']) ){
            SessionHelper::addFlash('error','Your data is wrong');
            ResponseHelper::redirect('/admin', 301);
        } else {
            $model = new User();
            $data = $model->getUserData($array['email'], $array['password']);
            if (null === $data){
                SessionHelper::addFlash('error','User is not defined');
                ResponseHelper::redirect('/admin', 301);
            } else {
                SessionHelper::addFlash('admin', true);
                return $this->actionPanel();
            }
        }
    }

    /**
     * @return string
     */
    public function actionPanel()
    {
        if (SessionHelper::getFlash('admin', false) == false){
            ResponseHelper::redirect('/admin');
        }
        return $this->getTemplate()->render('/admin/panelIndex');
    }

    /**
     * @return string
     *
     */
    public function actionArticlelist($page = 1)
    {
        if (SessionHelper::getFlash('admin', false) == false){
            ResponseHelper::redirect('/admin');
        }
        $itemPerPage = 5;
        $model = new Article();
        $data = $model->getSliceArticle(($page-1)*$itemPerPage,$itemPerPage);
        $paginator = new Paginator($model->getCount('id'),$itemPerPage, $page);
        $data['buttons'] = $paginator->buttons;
        return $this->getTemplate()->render('/admin/articleList', ['data' => $data]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionChangearticle($id)
    {
        if (SessionHelper::getFlash('admin', false) == false){
            ResponseHelper::redirect('/admin');
        }
        $model = new Article();
        $id  = (int)$id;
        $data = $model->getArticlebyID($id);
        $data['category'] = (new Category())->getList('name');
        return $this->getTemplate()->render('/admin/changearticle', ['data' => $data]);
    }

    /*
     * 
     */
    public function actionUpdatearticle()
    {
        if (SessionHelper::getFlash('admin', false) == false){
            ResponseHelper::redirect('/admin');
        }
        $fileName = !empty($_FILES) ? $_FILES['img']['name'] : false;
        if (!empty($fileName)){
            FilesHelper::moveById(($_POST['id']), $_FILES['img']['tmp_name'], $fileName);
        }
        $model = new Article();
        $id = (new Category())->getIdByName($_POST['category'], 'name');
        $model->setUpdatedNew($_POST['id'], $_POST['title'], $_POST['small_description'], $_POST['description'], $id, $_POST['tag1'], $fileName);
        ResponseHelper::redirect('/admin/articlelist');
    }

    /**
     * @return string
     */
    public function actionCreatearticle()
    {
        if (SessionHelper::getFlash('admin', false) == false){
            ResponseHelper::redirect('/admin');
        }
        $data['category'] = (new Category())->getList('name');
        return $this->getTemplate()->render('/admin/createarticle',['data' => $data]);
    }

    /**
     *
     */

    public function actionCreateNewArticle()
    {
        if (SessionHelper::getFlash('admin', false) == false){
            ResponseHelper::redirect('/admin');
        }
        $fileName = !empty($_FILES) ? $_FILES['img']['name'] : false;
        if (!empty($fileName)){
            FilesHelper::moveById(($_POST['id']), $_FILES['img']['tmp_name'], $fileName);
        }
        $model = new Article();
        $id = (new Category())->getIdByName($_POST['category'], 'name');
        $model->setNewArticle($_POST['id'], $_POST['title'], $_POST['small_description'], $_POST['description'], $id, $_POST['tag1'], $fileName);
        ResponseHelper::redirect('/admin/articlelist');
    }

    /**
     *
     */
    public function actionLogout(){
        SessionHelper::getFlash('admin');
        ResponseHelper::redirect('/');
    }

    /**
     * @param int $min
     * @param int $max
     * @return string
     */

    public function actionCategorylist($min=1,$max=10)
    {
        if (SessionHelper::getFlash('admin', false) == false){
            ResponseHelper::redirect('/admin');
        }
        $model = new Category();
        $data = $model->getSliceList($min,$max);
        return $this->getTemplate()->render('/admin/categoryList', ['data' => $data]);
    }

    /**
     *
     */
    public function actionCreatenewcategory()
    {
        if (SessionHelper::getFlash('admin', false) == false){
            ResponseHelper::redirect('/admin');
        }
        if (!empty($_POST['category'])){
            $model = new Category();
            $model->setField('name', $_POST['category']);
        }
        ResponseHelper::redirect('/admin/categorylist');
    }

}