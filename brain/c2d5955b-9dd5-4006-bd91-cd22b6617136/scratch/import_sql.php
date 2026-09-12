<?php
require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $sqlPath = base_path('database/anis-store-live-26-08-2026.sql');
    if (!file_exists($sqlPath)) {
        die("SQL file not found at $sqlPath\n");
    }

    echo "Reading SQL file...\n";
    $sql = file_get_contents($sqlPath);

    echo "Executing SQL statements...\n";
    DB::unprepared($sql);

    echo "SUCCESS: Database imported successfully from anis-store-live-26-08-2026.sql\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
