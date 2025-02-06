<?php
namespace App\Controllers;

use App\Models\CustomerProjectModel;

class CustomerProjectController extends BaseController
{
    protected $customerProjectModel;

    public function __construct()
    {
        $this->customerProjectModel = new CustomerProjectModel();
    }

    public function overview()
    {
        $data['projects'] = $this->customerProjectModel->findAll(); // Fetch all customer projects
        $data['totalProjects'] = $this->customerProjectModel->countAll(); // Count total projects
        return view('customer/project_overview', $data);
    }



    public function financialSummary()
    {
        $data['financials'] = $this->customerProjectModel->getFinancialSummary(); // Fetch financial summary
        $data['paymentHistory'] = $this->customerProjectModel->getPaymentHistory(); // Fetch payment history
        return view('customer/financial_summary', $data);
    }



    public function projectTimeline()
    {
        $data['timeline'] = $this->customerProjectModel->getProjectTimeline(); // Fetch project timeline
        $data['phaseDetails'] = $this->customerProjectModel->getPhaseDetails(); // Fetch phase details
        return view('customer/project_timeline', $data);
    }



    public function realTimeUpdates()
    {
        $data['updates'] = $this->customerProjectModel->getRealTimeUpdates(); // Fetch real-time updates
        $data['liveFeed'] = $this->customerProjectModel->getLiveFeed(); // Fetch live video feed
        return view('customer/real_time_updates', $data);
    }



    public function teamProfiles()
    {
        $data['profiles'] = $this->customerProjectModel->getTeamProfiles(); // Fetch team profiles
        return view('customer/team_profiles', $data);
    }


    public function documents()
    {
        $data['documents'] = $this->customerProjectModel->getDocuments(); // Fetch documents
        return view('customer/documents', $data);
    }


    public function financeInfo()
    {
        $data['finance'] = $this->customerProjectModel->getFinanceInfo(); // Fetch finance information
        return view('customer/finance_info', $data);
    }


    public function interactionTools()
    {
        $data['tools'] = $this->customerProjectModel->getInteractionTools(); // Fetch interaction tools
        return view('customer/interaction_tools', $data);
    }

}
