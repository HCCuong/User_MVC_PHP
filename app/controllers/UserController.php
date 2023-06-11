<?php

class User extends Controller
{
    public $model_user;
    public $data = [];

    public function __construct()
    {
        $this->model_user = $this->model('userModel');
    }

    public function index()
    {
        $dataUser = $this->model_user->getList();

        $title = 'Danh sách người dùng';

        $this->data['sub_content']['user_list'] = $dataUser;
        $this->data['sub_content']['page_title'] = $title;
        $this->data['page_title'] = $title;
        $this->data['content'] = 'user/home';
        $this->render('layouts/main_layout', $this->data);
        //print_r($data);
    }

    public function loginPage()
    {
        $title = 'Đăng nhập người dùng';
        $this->data['sub_content']['page_title'] = $title;
        $this->data['page_title'] = $title;
        $this->data['content'] = 'user/login';
        $this->render('layouts/main_layout', $this->data);
    }
    public function registerPage()
    {
        $title = 'Đăng ký người dùng';
        $this->data['sub_content']['page_title'] = $title;
        $this->data['page_title'] = $title;
        $this->data['content'] = 'user/register';
        $this->render('layouts/main_layout', $this->data);
    }

    public function search($keyword)
    {
        echo 'Từ khóa cần tìm: ' . $keyword;
    }

    public function getUser($id)
    {
        echo $id;
    }
}
