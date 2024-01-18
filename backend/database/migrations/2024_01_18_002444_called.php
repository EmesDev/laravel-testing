<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('called', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('owners')->onDelete('cascade');
            $table->date('title');
            $table->text('description');
            $table->timestamps();

            $table->index('owner_id');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('called');
    }
};
