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
        //Creacion de la definicion de la tabla Scools
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hs_id');
            $table->unsignedBigInteger('director_id');
            $table->unsignedBigInteger('mec_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('city_id');
            $table->string('name',255);
            $table->char('postal',5);
            $table->char('phone',12)->unique();
            $table->string('password',255);
            $table->string('email',255)->unique();
            $table->string('email2',255)->nullable();
            $table->string('website',255);
            $table->char('fax',12)->nullable();
            $table->string('address',255);
            $table->string('address_short',255)->nullable();
            $table->decimal('latitude',10,8);
            $table->decimal('longitude',10,8);
            $table->string('plan_preference',10);
            $table->integer('leads');
            $table->string('business_status',50);
            $table->integer('google_user_ratings_total');
            $table->decimal('google_rating',10,1);
            $table->string('revisor',255);
            $table->boolean('active');
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
        Schema::dropIfExists('schools');
    }
};

