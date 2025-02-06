<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Logic to list users
    }

    public function create()
    {
        // Logic to create a new user
    }

    public function edit($id)
    {
        // Logic to edit user details
    }

    public function delete($id)
    {
        // Logic to delete a user
    }
}