<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProjectModel;

class ProjectController extends Controller
{
    public function index()
    {
        $model = new ProjectModel();
        $projects = $model->getProject();
        return view('project/index', ['projects' => $projects]);
    }

    public function create()
    {
        return view('project/create');
    }

    public function store()
    {
        $model = new ProjectModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'client_id' => $this->request->getPost('client_id'),
            'contractor_id' => $this->request->getPost('contractor_id'),
            'status' => $this->request->getPost('status'),
            'start_date' => $this->request->getPost('start_date'),
            'estimated_completion_date' => $this->request->getPost('estimated_completion_date'),
            'actual_completion_date' => $this->request->getPost('actual_completion_date'),
            'budget' => $this->request->getPost('budget'),
            'completion_percentage' => $this->request->getPost('completion_percentage'),
        ];

        $model->createProject($data);
        return redirect()->to('/project');
    }

    public function show($id)
    {
        $model = new ProjectModel();
        $project = $model->getProject($id);
        return view('project/show', ['project' => $project]);
    }

    public function edit($id)
    {
        $model = new ProjectModel();
        $project = $model->getProject($id);
        return view('project/edit', ['project' => $project]);
    }

    public function update($id)
    {
        $model = new ProjectModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'client_id' => $this->request->getPost('client_id'),
            'contractor_id' => $this->request->getPost('contractor_id'),
            'status' => $this->request->getPost('status'),
            'start_date' => $this->request->getPost('start_date'),
            'estimated_completion_date' => $this->request->getPost('estimated_completion_date'),
            'actual_completion_date' => $this->request->getPost('actual_completion_date'),
            'budget' => $this->request->getPost('budget'),
            'completion_percentage' => $this->request->getPost('completion_percentage'),
        ];

        $model->updateProject($id, $data);
        return redirect()->to('/project');
    }

    public function delete($id)
    {
        $model = new ProjectModel();
        $model->deleteProject($id);
        return redirect()->to('/project');
    }
}