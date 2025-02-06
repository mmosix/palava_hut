<?php
namespace App\Models;

use CodeIgniter\Model;

class ContractorModel extends Model
{
    protected $table = 'contractors';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'contact_info', 'status'];

    public function createContractor($data)
    {
        return $this->insert($data);
    }

    public function getContractor($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateContractor($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteContractor($id)
    {
        return $this->delete($id);
    }
}