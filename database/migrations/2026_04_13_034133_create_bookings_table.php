<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained()->onDelete('cascade');

            // Data Customer
            $table->string('customer_name');
            $table->string('whatsapp_number');

            // Time Logic (In and Out Time)
            $table->dateTime('start_date');
            $table->integer('duration_hours'); // 12h or 24h

            // Payment Logic
            $table->integer('total_price');
            $table->integer('dp_amount')->default(0);
            $table->integer('remains_payment'); // total - dp

            $table->enum('status', ['pending', 'active', 'completed', 'cancelled'])->default('pending');
            $table->text('notes')->nullable(); // For collateral records (KTP/Motorcycle)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
