<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['email', 'password_hash', 'name', 'phone', 'role', 'status'];

    public function createUser ($data)
    {
        $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->insert($data);
    }

    public function getUser ($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function updateUser ($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteUser ($id)
    {
        return $this->delete($id);
    }
}