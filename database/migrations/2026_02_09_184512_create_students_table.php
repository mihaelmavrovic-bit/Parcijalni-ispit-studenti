<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('studenti', function (Blueprint $table) {
            $table->id();
            $table->string('ime', 60);
            $table->string('prezime', 80);
            $table->integer('godiste'); // promijenjeno s date na integer
            $table->decimal('prosjek', 3, 2); // npr. 2.88
            $table->enum('status', ['redovni', 'izvanredni']);
            $table->timestamps(); // dodaje created_at i updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('studenti');
    }
};
