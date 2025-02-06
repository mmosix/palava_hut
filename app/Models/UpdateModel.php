<?php
namespace App\Models;

use CodeIgniter\Model;

class UpdateModel extends Model
{
    protected $table = 'project_updates';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['project_id', 'update_text', 'update_date'];

    public function createUpdate($data)
    {
        return $this->insert($data);
    }

    public function getUpdate($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateUpdate($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUpdate($id)
    {
        return $this->delete($id);
    }
}