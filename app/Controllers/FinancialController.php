<?php
namespace App\Controllers;

use App\Models\FinancialModel;

class FinancialController extends BaseController
{
    protected $financialModel;

    public function __construct()
    {
        $this->financialModel = new FinancialModel();
    }

    public function index()
    {
        // Logic to list financial transactions
    }

    public function create()
    {
        // Logic to create a new financial record
    }

    public function edit($id)
    {
        // Logic to edit financial record
    }

    public function delete($id)
    {
        // Logic to delete a financial record
    }
}