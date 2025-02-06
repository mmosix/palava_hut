<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerProjectModel extends Model
{
    protected $table = 'customer_projects';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['customer_id', 'project_id', 'status', 'completion_percentage'];

    public function createCustomerProject($data)
    {
        return $this->insert($data);
    }

    public function getFinancialSummary()
    {
        // Logic to fetch financial summary
        return $this->select('SUM(amount) as totalRevenue')->where('status', 'completed')->first();
    }

    public function getProjectTimeline()
    {
        // Logic to fetch project timeline
        return $this->select('project_id, start_date, end_date')->findAll();
    }

    public function getRealTimeUpdates()
    {
        // Logic to fetch real-time updates
        return $this->select('update_id, project_id, update_text, created_at')->findAll();
    }

    public function getTeamProfiles()
    {
        // Logic to fetch team profiles
        return $this->select('user_id, name, role')->findAll();
    }

    public function getPaymentHistory()
    {
        // Logic to fetch payment history
        return $this->db->table('payment_history')->where('project_id', $this->id)->findAll();
    }

    public function getPhaseDetails()
    {
        // Logic to fetch phase details
        return $this->db->table('project_phases')->where('project_id', $this->id)->findAll();
    }

    public function getLiveFeed()
    {
        // Logic to fetch live video feed
        return $this->db->table('live_feeds')->where('project_id', $this->id)->findAll();
    }


    public function getDocuments()
    {
        // Logic to fetch documents
        return $this->select('document_id, project_id, file_path')->findAll();
    }

    public function getFinanceInfo()
    {
        // Logic to fetch finance information
        return $this->select('finance_id, project_id, loan_amount, repayment_schedule')->findAll();
    }

    public function getInteractionTools()
    {
        // Logic to fetch interaction tools
        return $this->select('tool_id, tool_name, description')->findAll();
    }


    public function getCustomerProject($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateCustomerProject($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCustomerProject($id)
    {
        return $this->delete($id);
    }
}
