<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id('Owner_id');
            $table->string('Name');
            $table->string('CPF')->unique();
            $table->string('Address');
            $table->string('Phone');
            $table->string('Email');
            $table->integer('Date_of_Birth');
            $table->datetimes('created_at')->nullable()->default(null);
            $table->datetimes('updated_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owners');
    }
};
