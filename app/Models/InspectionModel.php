<?php
namespace App\Models;

use CodeIgniter\Model;

class InspectionModel extends Model
{
    protected $table = 'inspections';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['project_id', 'inspector_id', 'inspection_date', 'status', 'comments'];

    public function createInspection($data)
    {
        return $this->insert($data);
    }

    public function getInspection($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateInspection($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteInspection($id)
    {
        return $this->delete($id);
    }
}
