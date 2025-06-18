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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('description',500);
            $table->decimal('price', 8, 2);
            $table->foreignId('currency_id')->constrained('currencies')->onDelete('cascade');
            $table->decimal('tax_cost', 8, 2);
            $table->decimal('manufacturing_cost', 8, 2);
            $table->timestamps();
        });
        /*
            // $table->integer('currency_id');
            name string Nombre del producto
            description string Descripción del producto
            price decimal Precio del producto en la divisa base
            currency_id integer Identificador de la divisa base
            tax_cost decimal Costo de impuestos del producto
            manufacturing_cost decimal Costo de fabricación del producto
        */
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
