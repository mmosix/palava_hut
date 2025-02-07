<?php
namespace App\Models;

use CodeIgniter\Model;

class SupportModel extends Model
{
    protected $table = 'support_tickets';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['user_id', 'subject', 'message', 'status', 'created_at'];

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

    public function getOpenTickets()
    {
        return $this->where('status', 'open')->findAll(); // Fetch open support tickets
    }

    public function getClosedTickets()
    {
        return $this->where('status', 'closed')->findAll(); // Fetch closed support tickets
    }

    public function getAllTickets()
    {
        return $this->findAll(); // Fetch all support tickets
    }

}
