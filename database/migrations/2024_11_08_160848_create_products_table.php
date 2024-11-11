<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');                        
            $table->text('description')->nullable();
            $table->decimal('price',10,2)->default(0);
            $table->integer('stock')->default(0);
            $table->foreignId('subcategory_id')->constrained()->onDelete('cascade');
            $table->foreignId('provider_id')->constrained()->onDelete('cascade');
            $table->enum('operation', ['entrada', 'salida', 'ventas']);
            $table->timestamps();
        });

        DB::statement(query: '
         CREATE TRIGGER 
         after_product_insert
         AFTER INSERT ON products FOR EACH ROW
         BEGIN
            INSERT INTO inventories (product_id, stock, price ,operation)
            VALUE(NEW.id, NEW.stock, NEW.price, NEW.operation);
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {        
        DB::statement(query:'
        DROP TRIGGER IF EXISTS after_product_insert
        ');
        Schema::dropIfExists('products');
    }
};
