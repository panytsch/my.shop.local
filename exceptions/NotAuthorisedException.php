<?php

namespace exceptions;

/**
 * Class NotAuthorisedException
 * @package exceptions
 */
class NotAuthorisedException extends \Exception
{
    public $message = 'User is not authorised yet';
}
