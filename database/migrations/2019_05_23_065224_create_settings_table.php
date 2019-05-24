<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->string('business_name')->nullable();
            $table->string('business_id')->nullable();
            $table->string('business_phone')->nullable();
            $table->string('business_location')->nullable();
            $table->string('business_zip')->nullable();
            $table->string('business_city')->nullable();
            $table->string('business_country')->nullable();

            $table->string('decimals')->nullable();
            $table->string('tax_type')->nullable();
            $table->text('logo')->nullable();
            $table->string('currency')->nullable();
            $table->text('footnote')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
