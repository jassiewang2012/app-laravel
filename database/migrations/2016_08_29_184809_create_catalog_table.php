<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('catalog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sectionName');
            $table->boolean('hide');
            $table->timestamps();
        });
        Schema::create('partner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('partnerName');
            $table->boolean('hide');
            $table->timestamps();
        });

        Schema::create('productGroup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('groupName');
            $table->integer('sectionId')->unsigned();
            $table->foreign('sectionId')->references('id')->on('catalog');
            $table->boolean('hide');
            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('itemName');
            $table->integer('groupId')->unsigned();
            $table->integer('partnerId')->unsigned();
            $table->foreign('groupId')->references('id')->on('productGroup');
            $table->foreign('partnerId')->references('id')->on('partner');
            $table->boolean('hide');
            $table->timestamps();
        });

        Schema::create('fieldCol', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fieldName');
            $table->text('description');
            $table->boolean('hide');
            $table->timestamps();
        });

        Schema::create('item-field', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fieldValue');
            $table->text('fieldNote');
            $table->integer('itemId')->unsigned();
            $table->integer('fieldId')->unsigned();
        });

        Schema::create('image', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fileName');
            $table->text('fileUrl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('catalog');
        Schema::drop('partner');
        Schema::drop('productGroup');
        Schema::drop('fieldCol');
        Schema::drop('item-field');
        Schema::drop('product');
        Schema::drop('image');
    }

}
