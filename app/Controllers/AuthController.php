<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ComplianceModel; // Newly added

class AuthController extends Controller
{
    public function login()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $user = $model->where('email', $this->request->getPost('email'))->first();

                if ($user) {
                    $passwordHash = $user['password_hash'];
                    $password = $this->request->getPost('password');

                    if (password_verify($password, $passwordHash)) {
                        session()->set('isLoggedIn', true);
                        session()->set('userId', $user['id']);
                        session()->set('userRole', $user['role']);

                        // Log compliance action
                        log_message('debug', 'User logged in: ' . $user['email']);

                        $complianceModel = new ComplianceModel(); // Newly added
                        $complianceModel->logCompliance([ // Newly added
                            'user_id' => $user['id'], // Newly added
                            'action' => 'Login', // Newly added
                            'timestamp' => date('Y-m-d H:i:s'), // Newly added
                        ]); // Newly added

                        // Redirect based on user role
                        switch ($user['role']) {
                            case 'admin':
                                return redirect()->to('/admin/dashboard');
                            case 'project-manager':
                                return redirect()->to('/project-manager/dashboard');
                            case 'inspector':
                                return redirect()->to('/inspector/dashboard');
                            case 'customer':
                                return redirect()->to('/customer/project-overview');
                            default:
                                return redirect()->to('/dashboard');
                        }

                    }
                }

                log_message('error', 'Invalid login attempt for email: ' . $this->request->getPost('email'));
                $data['error'] = 'Invalid email or password';

            }
        }

        echo view('auth/login', $data);
    }

    public function register()
    {
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required',
                'confirm_password' => 'required|matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $data = [
                    'email' => $this->request->getPost('email'),
                    'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'name' => $this->request->getPost('name'),
                    'phone' => $this->request->getPost('phone'),
                    'role' => 'client',
                    'status' => 'active',
                ];

                $model->insert($data);

                return redirect()->to('/login');
            }
        }

        echo view('auth/register', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
