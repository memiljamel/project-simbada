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
        Schema::create('assets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('code')->unique();
            $table->foreignUuid('category_id')
                ->constrained('categories', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignUuid('brand_id')
                ->constrained('brands', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('type');
            $table->string('manufacturer');
            $table->string('serial_number')->unique();
            $table->integer('production_year');
            $table->text('description')->nullable();
            $table->date('purchase_date');
            $table->foreignUuid('distributor_id')
                ->constrained('distributors', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('invoice_number');
            $table->integer('qty');
            $table->bigInteger('unit_price');
            $table->bigInteger('total_price');
            $table->text('photo')->nullable();
            $table->text('notes')->nullable();
            $table->text('qr_code');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
