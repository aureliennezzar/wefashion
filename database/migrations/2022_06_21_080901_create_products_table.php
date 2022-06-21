<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            //Product fields
            $table->id();
            $table->string('name',100);
            $table->string('image');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->enum('sizes', ['XS', 'S', 'M', 'L', 'XL']);
            $table->enum('status', ['standard', 'solded']);
            $table->boolean('published')->default(false);;
            $table->string('reference',16);
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
        Schema::dropIfExists('products');
    }
};
