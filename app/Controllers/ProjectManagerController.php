<?php
namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\ContractorModel;
use App\Models\UpdateModel;

class ProjectManagerController extends BaseController
{
    protected $taskModel;
    protected $contractorModel;
    protected $updateModel;

    public function __construct()
    {
        $this->taskModel = new TaskModel();
        $this->contractorModel = new ContractorModel();
        $this->updateModel = new UpdateModel();
    }

    public function dashboard()
    {
        $data['projectCount'] = $this->projectModel->countAll();
        $data['taskCount'] = $this->taskModel->countAll();
        return view('project_manager/dashboard', $data);
    }


    public function manageTasks()
    {
        $data['tasks'] = $this->taskModel->findAll();
        $data['pendingTasks'] = $this->taskModel->getPendingTasks(); // Fetch pending tasks
        return view('project_manager/task_management', $data);
    }



    public function projectUpdates()
    {
        $data['updates'] = $this->updateModel->findAll();
        $data['latestUpdate'] = $this->updateModel->getLatestUpdate(); // Fetch latest project update
        return view('project_manager/updates', $data);
    }



    public function budgetTracking()
    {
        $data['budget'] = $this->projectModel->getBudgetOverview(); // Fetch budget overview
        return view('project_manager/budget_tracking', $data);
    }


    public function clientCommunication()
    {
        return view('project_manager/client_communication');
    }

    public function contractorManagement()
    {
        $data['contractors'] = $this->contractorModel->findAll();
        return view('project_manager/contractor_management', $data);
    }

    public function inspections()
    {
        // Logic for inspections
        return view('project_manager/inspections');
    }

    public function documentation()
    {
        return view('project_manager/documentation');
    }

    public function incidents()
    {
        return view('project_manager/incidents');
    }

    public function reporting()
    {
        return view('project_manager/reporting');
    }
}
