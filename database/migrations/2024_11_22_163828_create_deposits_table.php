<?php

use App\Models\Deposits;
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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->float('coins');
            $table->integer('amount');
            $table->foreignId('company_id')->nullable()->constrained(
                table: 'companies', indexName: 'deposits_company_id'     
            );
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'deposits_user_id'     
            );
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
