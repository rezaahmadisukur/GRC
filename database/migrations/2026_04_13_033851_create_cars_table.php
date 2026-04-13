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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');               // Ex: "Inova Ribon", "Avanza"
            $table->string('plate_code');         // Unique code transfortation: "TRM", "ALZ", "TYV"
            $table->string('color');              // Color transfortation
            $table->enum('transmission', ['AT', 'MT']);

            $table->integer('price_12h');
            $table->integer('price_24h');

            $table->boolean('is_available')->default(true); // Status Unit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
