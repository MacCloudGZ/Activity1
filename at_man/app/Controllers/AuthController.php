<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    // Helpers are loaded in BaseController now.
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function save()
    {
        helper(['form']);
        $rules = [
            'username' => 'required|min_length[4]|max_length[100]|is_unique[users.username]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/');
        } else {
            $data['validation'] = $this->validator;
            return view('register', $data);
        }
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        
        $user = $model->where('username', $username)->first();
        
        if($user) {
            $pass = $user['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword) {
                $ses_data = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Invalid credentials.');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Invalid credentials.');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}