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
        Schema::create('collection_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id')->nullable()->constrained(
                table: 'addresses', indexName: 'collection_point_addresses_id'     
            );
            $table->time('opening_hours');
            $table->time('closing_hours');
            $table->boolean('has_lunch')->default(false); // Almoço: Sim ou Não
            $table->text('description')->nullable();      // Descrição pode ser nulo
            $table->string('name');

            $table->foreignId('company_id')->nullable()->constrained(
                table: 'companies', indexName: 'collection_point_company_id'     
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collection_points');
    }
};
