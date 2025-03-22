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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
        
            $table->BigInteger('type_id')->unsigned();
$table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

$table->foreignId('destination_id')->constrained()->onDelete('cascade');

$table->unsignedBigInteger('country_id');
$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
$table->unsignedBigInteger('state_id');
$table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
$table->unsignedBigInteger('city_id');
$table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

$table->date('start_date');
$table->date('end_date');

$table->string('number_of_people');
$table->string('remaining_chair');
$table->text('description');
$table->string('price');
$table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};