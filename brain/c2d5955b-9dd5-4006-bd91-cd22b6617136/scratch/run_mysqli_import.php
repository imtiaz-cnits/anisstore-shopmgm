<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db   = 'anis-store';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error . "\n");
}

$sqlFile = 'C:/xampp/htdocs/anis-store/database/anis-store-live-26-08-2026.sql';
if (!file_exists($sqlFile)) {
    die("SQL File not found: $sqlFile\n");
}

$sql = file_get_contents($sqlFile);

echo "Executing multi query...\n";
if ($mysqli->multi_query($sql)) {
    do {
        if ($result = $mysqli->store_result()) {
            $result->free();
        }
    } while ($mysqli->more_results() && $mysqli->next_result());
}

if ($mysqli->error) {
    echo "MySQLi Error: " . $mysqli->error . "\n";
} else {
    echo "Import completed successfully!\n";
}

$mysqli->close();

$mysqliCheck = new mysqli($host, $user, $pass, $db);
$res = $mysqliCheck->query("SHOW TABLES");
echo "\n--- Tables Count Summary ---\n";
while ($row = $res->fetch_array()) {
    $t = $row[0];
    $cRes = $mysqliCheck->query("SELECT COUNT(*) FROM `$t`");
    $c = $cRes->fetch_array()[0];
    echo "$t: $c rows\n";
}
$mysqliCheck->close();
