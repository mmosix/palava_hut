<?php
namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['project_id', 'assigned_to', 'description', 'status', 'due_date', 'completed_date'];

    public function createTask($data)
    {
        return $this->insert($data);
    }

    public function getTask($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateTask($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteTask($id)
    {
        return $this->delete($id);
    }
}