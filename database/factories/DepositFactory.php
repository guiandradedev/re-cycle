<?php

namespace Database\Factories;

use App\Enums\PaymentMethod;
use App\Enums\TransactionStatus;
use App\Enums\TransactionType;
use App\Models\Company;
use App\Models\Deposit;
use App\Models\Deposits;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deposits>
 */
class DepositFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');
        $items = [
            "Jornais" => 5,
            "Revistas" => 6,
            "Folhas de papel" => 2,
            "Caixas de papelão" => 8,
            "Embalagens de papel" => 3,
            "Cadernos usados" => 4,
            "Garrafas PET" => 10,
            "Tampas plásticas" => 1,
            "Sacolas plásticas" => 2,
            "Embalagens de produtos de limpeza" => 7,
            "Copos descartáveis" => 1,
            "Canudos plásticos" => 1,
            "Potes de vidro" => 15,
            "Garrafas de vidro" => 12,
            "Frascos de cosméticos" => 10,
            "Latas de alumínio" => 20,
            "Latas de aço" => 18,
            "Panelas velhas" => 25,
            "Tampinhas de garrafa" => 2,
            "Ferragens" => 30,
            "Papel-alumínio limpo" => 5,
            "Cartolinas" => 3,
            "Brinquedos de plástico" => 7,
            "Vidros de conservas" => 10
        ];

        $item = array_rand($items);
        $amount = $faker->randomDigitNotNull();

        return [
            "item"=>$item,
            "coins"=>$amount * $items[$item],
            "amount"=>$amount,
            "company_id"=>Company::all()->random()->id,
            "user_id"=>User::all()->random()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Deposit $deposit) {
            Transaction::create([
                // "transaction_code"=>"",
                "user_id"=>$deposit->user_id,
                "company_id"=>$deposit->company_id,
                "amount"=>$deposit->coins,
                "transaction_type"=>TransactionType::PAYMENT->name,
                "transaction_status"=>TransactionStatus::COMPLETED->name,
                "transaction_date"=>now(),
                "payment_method"=>PaymentMethod::INTERN->name,
                "description"=>"Pagamento do deposito",
                "deposit_id"=>$deposit->id,
            ]);

            $user = User::find($deposit->user_id);
            $user->update(['coins'=>$user->coins + $deposit->coins]);
        });
    }
}
