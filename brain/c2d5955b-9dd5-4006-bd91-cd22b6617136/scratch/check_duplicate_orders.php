<?php
require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use App\Models\OrderDetails;

$orders = Order::all();
echo "--- ALL ORDERS IN DB ---\n";
foreach ($orders as $o) {
    $itemsCount = OrderDetails::where('order_id', $o->id)->count();
    echo "ID: {$o->id} | OrderNo: {$o->order_no} | Subtotal: {$o->sub_total} | Discount: {$o->discount_amount} | Paid: {$o->paid_amount} | Due: {$o->due_amount} | CreatedAt: {$o->created_at} | ItemsCount: {$itemsCount}\n";
}
