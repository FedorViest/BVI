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
        //
        Schema::table('orders', function ($table){
            $table->string('first_name', 50)->nullable(false);
            $table->string('last_name', 50)->nullable(false);
            $table->string('email', 256)->nullable(false);
            $table->string('phone_prefix', 3)->nullable(false);
            $table->string('phone_number', 9)->nullable(false);
            $table->string('street', 30)->nullable(false);
            $table->integer('street_number')->nullable(false);
            $table->string('postcode', 5)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //

        Schema::table('orders', function ($table){
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('email');
            $table->dropColumn('phone_prefix');
            $table->dropColumn('phone_number');
            $table->dropColumn('street');
            $table->dropColumn('street_number');
            $table->dropColumn('postcode');
        });
    }
};
