<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ReportModel;

class ReportController extends Controller
{
    public function index()
    {
        $model = new ReportModel();
        $reports = $model->getReports();
        return view('report/index', ['reports' => $reports]);
    }

    public function generateProjectReport()
    {
        // Logic to generate project report
        $model = new ReportModel();
        $data = [
            'report_type' => 'Project',
            'data' => json_encode($this->getProjectData()), // Assume this method fetches project data
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $model->createReport($data);
        return redirect()->to('/report');
    }

    public function generateTaskReport()
    {
        // Logic to generate task report
        $model = new ReportModel();
        $data = [
            'report_type' => 'Task',
            'data' => json_encode($this->getTaskData()), // Assume this method fetches task data
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $model->createReport($data);
        return redirect()->to('/report');
    }

    public function generateUser ActivityReport()
    {
        // Logic to generate user activity report
        $model = new ReportModel();
        $data = [
            'report_type' => 'User  Activity',
            'data' => json_encode($this->getUser ActivityData()), // Assume this method fetches user activity data
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $model->createReport($data);
        return redirect()->to('/report');
    }

    public function generateFinancialReport()
    {
        // Logic to generate financial report
        $model = new ReportModel();
        $data = [
            'report_type' => 'Financial',
            'data' => json_encode($this->getFinancialData()), // Assume this method fetches financial data
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $model->createReport($data);
        return redirect()->to('/report');
    }
}