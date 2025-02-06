<?php
namespace App\Controllers;

use App\Models\ProjectModel;

class ProjectController extends BaseController
{
    protected $projectModel;

    public function __construct()
    {
        $this->projectModel = new ProjectModel();
    }

    public function index()
    {
        // Logic to list projects
    }

    public function create()
    {
        // Logic to create a new project
    }

    public function edit($id)
    {
        // Logic to edit project details
    }

    public function delete($id)
    {
        // Logic to delete a project
    }
}