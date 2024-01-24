<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\admin\UsersModel;
use CodeIgniter\API\ResponseTrait;

class LoginController extends BaseController
{
    public function index()
    {
        // Check if the user is logged in
        if (session()->has('user_id')) {
            return redirect()->to('/admin/home');
        }
        $data = [
            'title' => 'Login | PhotoWithGarbGreh',
            'description' => '',
        ];
        return view('pages/admin/login', $data);
    }
    public function loginfunc() 
    {
        $userModel = new UsersModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $result = $userModel->where('username', $username)->first();

        if ($result && password_verify($password, $result['encryptedpass'])) {
            session()->set('user_id', $result['user_id']);
            session()->set('firstname', $result['firstname']);
            session()->set('lastname', $result['lastname']);
            session()->set('emailaddress', $result['emailaddress']);
            return redirect()->to('/admin/home');
        } else {
            return redirect()->back()->with('error', 'Invalid login credentials');
        }
    }
}
