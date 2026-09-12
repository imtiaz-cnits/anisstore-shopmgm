<?php
require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use App\Models\OrderPaymentDetails;

$orders = Order::all();
echo "Total orders found: " . count($orders) . "\n\n";

foreach ($orders as $o) {
    $pd = OrderPaymentDetails::where('order_id', $o->id)->first();
    $pMethod = $pd ? $pd->payment_method : 'N/A';
    $pStatus = $pd ? $pd->payment_status : 'N/A';
    $net = $o->sub_total - $o->discount_amount;
    echo "ID: {$o->id} | OrderNo: {$o->order_no} | SubTotal: {$o->sub_total} | Discount: {$o->discount_amount} | Net: {$net} | Paid: {$o->paid_amount} | Due: {$o->due_amount} | Method: {$pMethod} | Status: {$pStatus}\n";
}
