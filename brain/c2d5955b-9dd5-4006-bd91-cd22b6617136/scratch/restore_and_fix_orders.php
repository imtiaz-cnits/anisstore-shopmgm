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
$sql = file_get_contents($sqlFile);

echo "1. Re-importing original database dump...\n";
if ($mysqli->multi_query($sql)) {
    do {
        if ($result = $mysqli->store_result()) {
            $result->free();
        }
    } while ($mysqli->more_results() && $mysqli->next_result());
}
$mysqli->close();

require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use App\Models\OrderPaymentDetails;
use Illuminate\Support\Facades\DB;

echo "2. Recalculating paid_amount for each order based on due_amount...\n";

DB::beginTransaction();
try {
    $orders = Order::all();
    foreach ($orders as $o) {
        $subTotal = (float) $o->sub_total;
        $discount = (float) $o->discount_amount;
        $returnAdj = (float) ($o->return_adjustment_amount ?? 0);
        $due = (float) $o->due_amount;

        $netBill = max(0, $subTotal - $discount - $returnAdj);
        $paid = max(0, $netBill - $due);

        $status = 'বাকী';
        if ($paid >= $netBill && $netBill > 0) {
            $status = 'নগদ';
        } elseif ($paid > 0) {
            $status = 'আংশিক';
        }

        $o->paid_amount = $paid;
        $o->due_amount = $due;
        $o->save();

        $pd = OrderPaymentDetails::where('order_id', $o->id)->first();
        if ($pd) {
            $pd->paid_amount = $paid;
            $pd->payment_status = $status;
            if ($paid > 0 && $pd->payment_method === 'due') {
                $pd->payment_method = 'cash';
            }
            $pd->save();
        } else {
            OrderPaymentDetails::create([
                'order_id' => $o->id,
                'paid_amount' => $paid,
                'payment_method' => $paid > 0 ? 'cash' : 'due',
                'payment_status' => $status,
                'user_id' => $o->user_id ?? 1
            ]);
        }
        echo "Order #{$o->id} ({$o->order_no}): Subtotal={$subTotal}, Discount={$discount}, Net={$netBill} => Paid={$paid}, Due={$due}, Status={$status}\n";
    }

    DB::commit();
    echo "\nSUCCESSFULLY UPDATED ALL INVOICES!\n";
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}
