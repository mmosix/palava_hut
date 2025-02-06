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