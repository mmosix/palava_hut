<?php
namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProjectModel;
use App\Models\FinancialModel;
use App\Models\ComplianceModel;
use App\Models\SupportModel;

class AdminController extends BaseController
{
    protected $userModel;
    protected $projectModel;
    protected $financialModel;
    protected $complianceModel;
    protected $supportModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->projectModel = new ProjectModel();
        $this->financialModel = new FinancialModel();
        $this->complianceModel = new ComplianceModel();
        $this->supportModel = new SupportModel();
    }

    public function dashboard()
    {
        // Logic for admin dashboard
        $data['userCount'] = $this->userModel->countAll();
        $data['projectCount'] = $this->projectModel->countAll();
        $data['financialOverview'] = $this->financialModel->getOverview();
        return view('admin/dashboard', $data);
    }


    public function manageUsers()
    {
        $data['users'] = $this->userModel->findAll();
        $data['roles'] = $this->userModel->getRoles(); // Fetch roles for user management
        $data['activityLogs'] = $this->userModel->getActivityLogs(); // Fetch user activity logs
        return view('admin/manage_users', $data);
    }



    public function projectOverview()
    {
        $data['projects'] = $this->projectModel->findAll();
        $data['activeProjects'] = $this->projectModel->getActiveProjects(); // Fetch active projects
        return view('admin/project_overview', $data);
    }


    public function financialOverview()
    {
        $data['invoices'] = $this->financialModel->findAll();
        $data['totalRevenue'] = $this->financialModel->getTotalRevenue(); // Add total revenue to overview
        $data['pendingPayments'] = $this->financialModel->getPendingPayments(); // Fetch pending payments
        return view('admin/financial_overview', $data);
    }



    public function blockchainManagement()
    {
        return view('admin/blockchain_management');
    }

    public function securityCompliance()
    {
        return view('admin/security_compliance');
    }

    public function supportTickets()
    {
        $data['tickets'] = $this->supportModel->findAll();
        return view('admin/support_tickets', $data);
    }

    public function reporting()
    {
        return view('admin/reporting');
    }
}
