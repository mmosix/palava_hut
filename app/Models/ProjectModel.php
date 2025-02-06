<?php
namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['name', 'description', 'client_id', 'contractor_id', 'status', 'start_date', 'estimated_completion_date', 'actual_completion_date', 'budget', 'completion_percentage'];

    public function createProject($data)
    {
        return $this->insert($data);
    }

    public function getProject($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateProject($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteProject($id)
    {
        return $this->delete($id);
    }
}