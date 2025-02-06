<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TaskModel;

class TaskController extends Controller
{
    public function index()
    {
        $model = new TaskModel();
        $tasks = $model->getTask();
        return view('task/index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('task/create');
    }

    public function store()
    {
        $model = new TaskModel();
        $data = [
            'project_id' => $this->request->getPost('project_id'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
            'due_date' => $this->request->getPost('due_date'),
            'completed_date' => $this->request->getPost('completed_date'),
        ];

        $model->createTask($data);
        return redirect()->to('/task');
    }

    public function show($id)
    {
        $model = new TaskModel();
        $task = $model->getTask($id);
        return view('task/show', ['task' => $task]);
    }

    public function edit($id)
    {
        $model = new TaskModel();
        $task = $model->getTask($id);
        return view('task/edit', ['task' => $task]);
    }

    public function update($id)
    {
        $model = new TaskModel();
        $data = [
            'project_id' => $this->request->getPost('project_id'),
            'assigned_to' => $this->request->getPost('assigned_to'),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
            'due_date' => $this->request->getPost('due_date'),
            'completed_date' => $this->request->getPost('completed_date'),
        ];

        $model->updateTask($id, $data);
        return redirect()->to('/task');
    }

    public function delete($id)
    {
        $model = new TaskModel();
        $model->deleteTask($id);
        return redirect()->to('/task');
    }
}