<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // List of cryptocurrency types you want to generate (e.g., BTC, ETH, XRP, LTC, DOGE)
        $cryptos = ['BTC', 'ETH', 'XRP', 'LTC', 'DOGE'];

        // Create 10 dummy cryptocurrency entries
        foreach ($cryptos as $crypto) {
            // Generate a random cryptocurrency amount (with 8 decimal places, e.g., 0.005 BTC, 1.23 ETH)
            $amount = $faker->randomFloat(8, 0.0001, 10); // Between 0.0001 and 10 units

            // Pick a random cryptocurrency type (BTC, ETH, etc.)
            $cryptoType = $crypto;

            // Create a new record in the Currency table
            Currency::create([
                'name' => $cryptoType,  // e.g., BTC, ETH, etc.
                'rate' => $amount,  // Random cryptocurrency amount
            ]);
    }
  }
}
