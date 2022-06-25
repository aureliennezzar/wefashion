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
            $table->text('description');
//            $table->string('image')->default('https://picsum.photos/400/600');
            $table->decimal('price', 8, 2);
            $table->enum('status', ['standard', 'solded']);
            $table->boolean('published')->default(false);
            $table->string('reference',16);
            $table->timestamps();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
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
