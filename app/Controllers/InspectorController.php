<?php
namespace App\Controllers;

use App\Models\InspectionModel;

class InspectorController extends BaseController
{
    protected $inspectionModel;

    public function __construct()
    {
        $this->inspectionModel = new InspectionModel();
    }

    public function dashboard()
    {
        return view('inspector/dashboard');
    }

    public function scheduleInspection()
    {
        $data['inspections'] = $this->inspectionModel->findAll();
        return view('inspector/schedule', $data);
    }

    public function qualityChecks()
    {
        // Logic for quality checks
        return view('inspector/quality_checks');
    }

    public function reports()
    {
        // Logic for reports
        return view('inspector/reports');
    }

    public function blockchainVerification()
    {
        return view('inspector/blockchain_verification');
    }

    public function issueResolution()
    {
        return view('inspector/issues');
    }
}