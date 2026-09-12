<?php
require __DIR__ . '/../../../vendor/autoload.php';
$app = require_once __DIR__ . '/../../../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Order;
use App\Models\OrderPaymentDetails;
use Illuminate\Support\Facades\DB;

DB::beginTransaction();
try {
    $orders = Order::all();
    echo "Updating " . count($orders) . " orders to fully paid...\n";

    foreach ($orders as $o) {
        $net = max(0, $o->sub_total - $o->discount_amount);
        $o->paid_amount = $net;
        $o->due_amount = 0;
        $o->save();

        $pd = OrderPaymentDetails::where('order_id', $o->id)->first();
        if ($pd) {
            $pd->paid_amount = $net;
            $pd->payment_status = 'নগদ';
            $pd->payment_method = 'cash';
            $pd->save();
        } else {
            OrderPaymentDetails::create([
                'order_id' => $o->id,
                'paid_amount' => $net,
                'payment_method' => 'cash',
                'payment_status' => 'নগদ',
                'user_id' => $o->user_id ?? 1
            ]);
        }
    }

    DB::commit();
    echo "DB Update Successful! All existing invoices updated to paid.\n";
} catch (\Exception $e) {
    DB::rollBack();
    echo "ERROR: " . $e->getMessage() . "\n";
}
