<?php
require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use App\Models\OrderPaymentDetails;

echo "--- ORDERS --- \n";
$orders = Order::all();
foreach ($orders as $o) {
    $pd = OrderPaymentDetails::where('order_id', $o->id)->first();
    $status = $pd ? $pd->payment_status : 'N/A';
    echo "ID: {$o->id} | OrderNo: {$o->order_no} | SubTotal: {$o->sub_total} | Discount: {$o->discount_amount} | Paid: {$o->paid_amount} | Due: {$o->due_amount} | Status: {$status}\n";
}
