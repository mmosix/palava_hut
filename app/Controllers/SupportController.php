<?php
namespace App\Controllers;

use App\Models\SupportModel;

class SupportController extends BaseController
{
    protected $supportModel;

    public function __construct()
    {
        $this->supportModel = new SupportModel();
    }

    public function index()
    {
        // Logic to list support tickets
    }

    public function create()
    {
        // Logic to create a new support ticket
    }

    public function edit($id)
    {
        // Logic to edit support ticket
    }

    public function delete($id)
    {
        // Logic to delete a support ticket
    }
}