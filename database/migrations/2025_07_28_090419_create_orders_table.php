<?php

use App\Enums\OrderStatus;
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
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->string('order_code')->unique();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('customer_id');
                $table->string('recipient_name');
                $table->string('recipient_phone');
                $table->decimal('total_amount', 15);
                $table->unsignedTinyInteger('status')->default(OrderStatus::Pending->value);
                $table->string('order_source')->nullable();
                $table->text('note')->nullable();
                $table->text('shipping_note')->nullable();
                $table->text('shipping_address')->nullable();
                $table->string('tracking_number')->nullable();
                $table->timestamp('ordered_at')->nullable();
                $table->timestamps();
                $table->softDeletes();
                // Foreign keys
                $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
