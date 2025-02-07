<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');

$routes->group('auth', function($routes) {
    $routes->get('login', 'AuthController::login');
    $routes->post('login', 'AuthController::login');
    $routes->get('register', 'AuthController::register');
    $routes->post('register', 'AuthController::register');
    $routes->get('logout', 'AuthController::logout');
});

$routes->get('dashboard', 'DashboardController::index');
$routes->group('admin', function($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('users', 'UserController::index');
    $routes->get('projects', 'ProjectController::index');
    $routes->get('financials', 'FinancialController::index');
    $routes->get('compliance', 'ComplianceController::index');
    $routes->get('support', 'SupportController::index');
    $routes->get('reporting', 'AdminController::reporting');
});

$routes->group('project-manager', function($routes) {
    $routes->get('dashboard', 'ProjectManagerController::dashboard');
    $routes->get('tasks', 'ProjectManagerController::manageTasks');
    $routes->get('updates', 'ProjectManagerController::projectUpdates');
    $routes->get('budget', 'ProjectManagerController::budgetTracking');
    $routes->get('client-communication', 'ProjectManagerController::clientCommunication');
    $routes->get('contractors', 'ProjectManagerController::contractorManagement');
    $routes->get('inspections', 'ProjectManagerController::inspections');
    $routes->get('documentation', 'ProjectManagerController::documentation');
    $routes->get('incidents', 'ProjectManagerController::incidents');
    $routes->get('reporting', 'ProjectManagerController::reporting');
});

$routes->group('inspector', function($routes) {
    $routes->get('dashboard', 'InspectorController::dashboard');
    $routes->get('schedule', 'InspectorController::scheduleInspection');
    $routes->get('quality-checks', 'InspectorController::qualityChecks');
    $routes->get('reports', 'InspectorController::reports');
    $routes->get('blockchain-verification', 'InspectorController::blockchainVerification');
    $routes->get('issues', 'InspectorController::issueResolution');
});

$routes->group('customer', function($routes) {
    $routes->get('project-overview', 'CustomerProjectController::overview');
    $routes->get('financial-summary', 'CustomerProjectController::financialSummary');
    $routes->get('timeline', 'CustomerProjectController::projectTimeline');
    $routes->get('updates', 'CustomerProjectController::realTimeUpdates');
    $routes->get('team-profiles', 'CustomerProjectController::teamProfiles');
    $routes->get('documents', 'CustomerProjectController::documents');
    $routes->get('finance', 'CustomerProjectController::financeInfo');
    $routes->get('interaction', 'CustomerProjectController::interactionTools');
});
