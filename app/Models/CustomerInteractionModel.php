<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerInteractionModel extends Model
{
    protected $table = 'customer_interactions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['customer_id', 'interaction_type', 'message', 'created_at'];

    public function createInteraction($data)
    {
        return $this->insert($data);
    }

    public function getInteraction($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateInteraction($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteInteraction($id)
    {
        return $this->delete($id);
    }
}