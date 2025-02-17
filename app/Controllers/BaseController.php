<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Services;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 */
class BaseController extends Controller
{
    protected $request;
    protected $helpers = [];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Initialize language service with proper locale
        $request->setLocale('default');
        $this->language = Services::language('default');
        
        parent::initController($request, $response, $logger);

        // Load language files with locale specified
        $this->language->load('default_lang', 'default');
        $this->language->load('app_lang', 'default');

        // Load all required helpers
        helper(['menu', 'router', 'general', 'app_files']);
    }
}