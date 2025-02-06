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
        $data['inspectionCount'] = $this->inspectionModel->countAll(); // Count total inspections
        return view('inspector/dashboard', $data);
    }


    public function scheduleInspection()
    {
        $data['inspections'] = $this->inspectionModel->findAll();
        $data['pendingInspections'] = $this->inspectionModel->getPendingInspections(); // Fetch pending inspections
        return view('inspector/schedule', $data);
    }


    public function qualityChecks()
    {
        $data['qualityReports'] = $this->inspectionModel->getQualityReports(); // Fetch quality reports
        $data['complianceStatus'] = $this->inspectionModel->getComplianceStatus(); // Fetch compliance status
        return view('inspector/quality_checks', $data);
    }



    public function reports()
    {
        $data['reports'] = $this->inspectionModel->getReports(); // Fetch inspection reports
        return view('inspector/reports', $data);
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
