<?php

namespace components\web;


class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = Application::getDb()->getConnection();
    }
}