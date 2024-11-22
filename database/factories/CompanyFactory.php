<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');
        $trading_name = fake()->company();

        return [
            "trading_name"=>$trading_name,
            "document"=>$faker->cnpj(),
            "slug"=>sanitize_string($trading_name),
            "base_address_id"=>Address::factory()->create()->id,
            "owner_id"=>User::all()->random()->id,
        ];
    }
}
