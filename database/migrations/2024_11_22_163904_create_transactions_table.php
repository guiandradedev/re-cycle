<?php

use App\Enums\PaymentMethod;
use App\Enums\TransactionStatus;
use App\Enums\TransactionType;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_code')->unique()->nullable();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'transaction_user_id'     
            );
            $table->foreignId('company_id')->nullable()->constrained(
                table: 'companies', indexName: 'transaction_company_id'     
            );
            $table->float('amount');
            $table->enum('transaction_type', array_column(TransactionType::cases(),'name'));
            $table->enum('transaction_status', array_column(TransactionStatus::cases(),'name'))->default(TransactionStatus::PENDING->name);
            $table->datetime('transaction_date');

            $table->enum('payment_method', array_column(PaymentMethod::cases(),'name'));
            // // pontos online
            // card_last_four_digits //opcional
            // payment_gateway //opcional

            $table->text('description');
            $table->foreignId('deposit_id')->nullable()->constrained(
                table: 'deposits', indexName: 'transaction_deposits_id'     
            );
            // order_id
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
