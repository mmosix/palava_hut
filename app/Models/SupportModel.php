<?php
namespace App\Models;

use CodeIgniter\Model;

class SupportModel extends Model
{
    protected $table = 'support_tickets';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'issue', 'status', 'created_at', 'updated_at'];

    public function createTicket($data)
    {
        return $this->insert($data);
    }

    public function getTicket($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateTicket($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteTicket($id)
    {
        return $this->delete($id);
    }
}