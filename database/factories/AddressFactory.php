<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');

        $citiesInSaoPaulo = [
            'São Paulo', 'Campinas', 'Santos', 'Sorocaba', 'São José dos Campos',
            'Ribeirão Preto', 'Bauru', 'Piracicaba', 'Jundiaí', 'Barueri'
        ];

        $cepSaoPaulo = $faker->numberBetween(01000, 19999) . '-' . $faker->numberBetween(100, 999);

        // $latitudeSaoPaulo = $faker->latitude(-24.73, -20.53);  // SP está entre essas latitudes
        // $longitudeSaoPaulo = $faker->longitude(-54.00, -44.00); // SP está entre essas longitudes

        return [
            "street" => $faker->streetAddress(),
            "city" => $faker->randomElement($citiesInSaoPaulo), // Seleciona uma cidade aleatória de SP
            "neighborhood" => $faker->randomElement($citiesInSaoPaulo), // Seleciona uma cidade aleatória de SP
            "state" => 'São Paulo', // Define o estado como São Paulo
            "zipcode" => $cepSaoPaulo, // Gera um CEP válido para São Paulo
            "number"=>fake()->buildingNumber(),
            "complement"=>"",
            'country'=>'Brazil'
        ];

        // return [
        //     "zipcode"=>fake()->postcode(),
        //     "street"=>fake()->streetName(),
        //     "number"=>fake()->buildingNumber(),
        //     "neighborhood"=>fake()->secondaryAddress(),
        //     "state"=>fake()->state(),
        //     "city"=>fake()->city(),
        //     "country"=>fake()->country(),
        //     "complement"=>""
        // ];
    }
}
