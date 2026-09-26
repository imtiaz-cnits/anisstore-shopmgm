<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('invests')) {
            Schema::create('invests', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('investor_info_id')->nullable();
                $table->decimal('invest_amount', 15, 2)->default(0);
                $table->text('invest_details')->nullable();
                $table->date('date')->nullable();
                $table->unsignedBigInteger('user_id')->nullable();
                $table->timestamps();

                $table->foreign('investor_info_id')->references('id')->on('investor_infos')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invests');
    }
};
