<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CollectionPoint>
 */
class CollectionPointFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');

        $opening_hours = $faker->dateTimeBetween('00:00', '23:59');
        $closing_hours = (clone $opening_hours)->modify('+' . rand(1, 120) . ' minutes');

        return [
            "address_id"=>Address::factory()->create()->id,
            "opening_hours"=>$opening_hours,
            "closing_hours"=>$closing_hours,
            "has_lunch"=>(bool)random_int(0, 1),
            "name" => collect($faker->words(5))->join(' '), // Gera um nome de ponto de coleta
            "description" => $faker->sentence(),
            "company_id"=>Company::all()->random()->id,
        ];
    }
}
