<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('type');
            $table->string('name');
            $table->bigInteger('contact_user');
            $table->string('email');
            $table->bigInteger('phone');
            $table->bigInteger('mobile');
            $table->string('website')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('company_registratoin_number')->nullable();
            $table->bigInteger('address');
            $table->bigInteger('mail_address');
            $table->string('additional_informations')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partners');
    }
}
