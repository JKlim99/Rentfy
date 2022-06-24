<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table){
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('password');
            $table->string('auth_key');
            $table->string('image_url')->nullable();
            $table->string('user_type');
            $table->timestamps();
        });
        Schema::create('invoice', function(Blueprint $table){
            $table->id();
            $table->integer('property_id');
            $table->integer('user_id');
            $table->decimal('amount',10,2);
            $table->string('type');
            $table->date('next_payment_date')->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->timestamps();
        });
        Schema::create('payment', function(Blueprint $table){
            $table->id();
            $table->integer('invoice_id');
            $table->string('ref_id');
            $table->decimal('amount',10,2);
            $table->string('status');
            $table->timestamps();
        });
        Schema::create('orders', function(Blueprint $table){
            $table->id();
            $table->integer('service_id');
            $table->integer('provider_id');
            $table->integer('user_id');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('postcode',10);
            $table->string('country');
            $table->string('type');
            $table->date('service_date');
            $table->time('service_time');
            $table->string('service_type');
            $table->string('service_provider');
            $table->string('user_first_name')->nullable();
            $table->string('user_last_name')->nullable();
            $table->string('user_phone_number')->nullable();
            $table->string('user_email');
            $table->string('building_type');
            $table->string('area_size');
            $table->timestamps();
        });
        Schema::create('service', function(Blueprint $table){
            $table->id();
            $table->integer('provider_id');
            $table->string('service_name');
            $table->string('service_type');
            $table->decimal('price',10,2);
            $table->text('description');
        });
        Schema::create('service_provider', function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('website')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->text('description');
            $table->string('type');
        });
        Schema::create('properties', function(Blueprint $table){
            $table->id();
            $table->string('building_type');
            $table->string('area_size');
            $table->string('name');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('address3')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('postcode',10);
            $table->string('country');
            $table->text('description');
            $table->timestamps();
        });
        Schema::create('properties_price', function(Blueprint $table){
            $table->id();
            $table->integer('property_id');
            $table->string('interval');
            $table->decimal('price',10,2);
        });
        Schema::create('properties_tenant', function(Blueprint $table){
            $table->id();
            $table->integer('property_id');
            $table->integer('user_id');
            $table->integer('price_id');
            $table->string('interval');
            $table->decimal('pay_amount',10,2);
            $table->date('started_at');
            $table->date('end_at')->nullable();
            $table->timestamps();
        });
        Schema::create('repair_service', function(Blueprint $table){
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('service_name');
            $table->string('service_type');
            $table->string('contact_name');
            $table->string('contact_number');
            $table->string('website');
            $table->text('description');
            $table->timestamps();
        });
        Schema::create('properties_repair_service', function(Blueprint $table){
            $table->id();
            $table->integer('repair_service_id');
            $table->integer('property_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
