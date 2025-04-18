<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Currency;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::inRandomOrder()->first()->id;
        $currency_id = Currency::inRandomOrder()->first()->id;
        $faker = Faker::create();
        
        return [
            'user_id' => $user_id,
            'currency_id' => $currency_id,
            'amount' => $faker->randomFloat(8, 0.0001, 10),
        ];
    }
}
