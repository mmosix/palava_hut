<?php
namespace App\Models;

use CodeIgniter\Model;

class ComplianceModel extends Model
{
    protected $table = 'compliance_records';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'action', 'timestamp'];

    public function logCompliance($data)
    {
        return $this->insert($data);
    }

    public function getComplianceRecords($userId = null)
    {
        if ($userId === null) {
            return $this->findAll();
        }
        return $this->where('user_id', $userId)->findAll();
    }
}