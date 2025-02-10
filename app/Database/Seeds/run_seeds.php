<?php
require_once __DIR__ . '/../../../vendor/autoload.php';

require_once 'MenuSettingsSeeder.php';
require_once 'RolePermissionsSeeder.php';

use App\Database\Seeds\MenuSettingsSeeder;
use App\Database\Seeds\RolePermissionsSeeder;

// Run seeders
$menuSeeder = new MenuSettingsSeeder();
$menuSeeder->run();

$permissionsSeeder = new RolePermissionsSeeder();
$permissionsSeeder->run();

echo "Seeds executed successfully!\n";