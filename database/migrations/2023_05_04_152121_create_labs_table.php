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
        Schema::create('labs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('patient_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->decimal('amount', 8, 2);
            $table->text('report');
            $table->timestamps();
            $table->foreign('patient_id')->references('id')->on('patients')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('service_id')->references('id')->on('services')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('labs');
    }
};
