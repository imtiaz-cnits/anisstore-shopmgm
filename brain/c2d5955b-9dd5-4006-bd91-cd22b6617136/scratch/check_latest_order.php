<?php
require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use App\Models\OrderPaymentDetails;

$latestPayment = OrderPaymentDetails::orderBy('created_at', 'desc')->first();
echo "Latest OrderPaymentDetails:\n";
if ($latestPayment) {
    print_r($latestPayment->toArray());
    $order = Order::find($latestPayment->order_id);
    echo "\nCorresponding Order:\n";
    if ($order) {
        print_r($order->toArray());
    } else {
        echo "Order not found for ID: " . $latestPayment->order_id . "\n";
    }
} else {
    echo "No OrderPaymentDetails found.\n";
}

$latestOrder = Order::orderBy('created_at', 'desc')->first();
echo "\nLatest Order:\n";
if ($latestOrder) {
    print_r($latestOrder->toArray());
}
