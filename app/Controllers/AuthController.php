<?php


namespace App\Controllers;


class AuthController extends BaseController
{
    public function getAddUserAction()
    {
        return $this->renderHTML('login.twig');
    }
}