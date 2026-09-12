<?php
require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;

$controller = new CustomerController();
$req = new Request();
$res = $controller->CustomerProfileData($req, 3);

echo json_encode($res->getData(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) . "\n";
