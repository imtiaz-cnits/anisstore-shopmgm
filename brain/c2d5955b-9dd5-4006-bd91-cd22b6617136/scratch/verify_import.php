<?php
require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$tables = DB::select('SHOW TABLES');
echo "Imported Tables Summary:\n";
foreach ($tables as $table) {
    $tableName = current((array)$table);
    $count = DB::table($tableName)->count();
    echo "- $tableName: $count rows\n";
}
