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
            $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('booking_code')->unique();

            $table->string('customer_name');
            $table->string('whatsapp_number');

            $table->dateTime('start_date');
            $table->integer('duration_hours');
            $table->dateTime('end_date');

            $table->integer('total_price');
            $table->integer('dp_amount')->default(0); // Bisa diisi Admin pas approve
            $table->integer('remains_payment')->default(0);
            $table->decimal('cash_paid', 15, 0)->nullable();
            $table->decimal('change_amount', 15, 0)->nullable();

            $table->dateTime('actual_end_date')->nullable();
            $table->integer('penalty_amount')->default(0);
            $table->integer('final_total_price')->nullable();
            $table->text('return_notes')->nullable();

            // Ini kunci buat "Approve" Admin
            $table->enum('status', ['pending', 'active', 'completed', 'cancelled'])->default('pending');
            $table->boolean('is_walkin')->default(false);
            $table->text('notes')->nullable();

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
