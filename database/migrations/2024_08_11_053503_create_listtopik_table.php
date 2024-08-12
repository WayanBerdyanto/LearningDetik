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
        Schema::create('listtopik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kejuruan')->nullable();
            $table->foreign("id_kejuruan")->references("id")->on("kejuruan");

            $table->string('title');
            $table->longText('description');
            $table->string('status');
            $table->string('price')->nullable();
            $table->string('level')->nullable();
            $table->string('duration')->nullable();
            $table->string('instructor')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listtopik');
    }
};
