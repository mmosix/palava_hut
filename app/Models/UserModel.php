<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['email', 'password_hash', 'name', 'phone', 'role', 'status', 'address', 'profile_picture', 'bio'];

    public function createUser($data)
    {
        return $this->insert($data);
    }

    public function getUser($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateUser($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }

    public function getActivityLogs()
    {
        return $this->db->table('audit_logs')->where('user_id', $this->id)->findAll(); // Fetch user activity logs
    }

    public function getRoles()
    {
        return $this->db->table('roles')->findAll(); // Fetch all roles
    }

}
