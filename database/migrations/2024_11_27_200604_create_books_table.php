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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); //primary key
            $table->string('name')->notNullable();
            $table->string('reason');
            $table->date('join_date');
            $table->integer('scale');
            $table->string('image');

            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->
            on('jobdesks')->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
