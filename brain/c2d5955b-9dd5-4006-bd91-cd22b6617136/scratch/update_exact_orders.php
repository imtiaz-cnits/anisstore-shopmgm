<?php
require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use App\Models\OrderPaymentDetails;
use Illuminate\Support\Facades\DB;

$orderDues = [
    1  => ['due' => 40.00,  'prev' => 0.00],
    2  => ['due' => 40.00,  'prev' => 0.00],
    3  => ['due' => 40.00,  'prev' => 0.00],
    4  => ['due' => 40.00,  'prev' => 0.00],
    6  => ['due' => 40.00,  'prev' => 0.00],
    7  => ['due' => 300.00, 'prev' => 200.00],
    8  => ['due' => 300.00, 'prev' => 200.00],
    9  => ['due' => 40.00,  'prev' => 800.00],
    10 => ['due' => 40.00,  'prev' => 0.00],
];

DB::beginTransaction();
try {
    foreach ($orderDues as $orderId => $info) {
        $o = Order::find($orderId);
        if (!$o) continue;

        $due = $info['due'];
        $prev = $info['prev'];
        $net = max(0, $o->sub_total - $o->discount_amount);
        $paid = max(0, $net - $due);

        $status = 'বাকী';
        if ($paid >= $net && $net > 0) {
            $status = 'নগদ';
        } elseif ($paid > 0) {
            $status = 'আংশিক';
        }

        $o->paid_amount = $paid;
        $o->due_amount = $due;
        $o->previous_due_amount = $prev;
        $o->save();

        $pd = OrderPaymentDetails::where('order_id', $o->id)->first();
        if ($pd) {
            $pd->paid_amount = $paid;
            $pd->payment_status = $status;
            $pd->payment_method = $paid > 0 ? 'cash' : 'due';
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
        echo "Order #{$o->id} ({$o->order_no}): Subtotal={$o->sub_total}, Discount={$o->discount_amount}, Net={$net} => Paid={$paid}, Due={$due}, Status={$status}\n";
    }

    DB::commit();
    echo "\nDB UPDATE COMPLETED SUCCESSFULLY!\n";
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}
