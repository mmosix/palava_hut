<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->getUser ();
        return view('user/index', ['users' => $users]);
    }

    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
            'status' => $this->request->getPost('status'),
        ];

        $model->createUser ($data);
        return redirect()->to('/user');
    }

    public function show($id)
    {
        $model = new UserModel();
        $user = $model->getUser ($id);
        return view('user/show', ['user' => $user]);
    }

    public function edit($id)
    {
        $model = new UserModel();
        $user = $model->getUser ($id);
        return view('user/edit', ['user' => $user]);
    }

    public function update($id)
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'status' => $this->request->getPost('status'),
        ];

        $model->updateUser ($id, $data);
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->deleteUser ($id);
        return redirect()->to('/user');
    }
}