<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trade;
use App\Models\Order;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trade>
 */
class TradeFactory extends Factory
{

    protected $model = Trade::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $buy_order_id = Order::inRandomOrder()->first()->id;
        $sell_order_id = Order::inRandomOrder()->first()->id;
        $faker = Faker::create();
        
        return [
            'buy_order_id' => $buy_order_id,
            'sell_order_id' => $sell_order_id,
            'message' => $faker->sentence(),
            'amount' => $faker->randomFloat(8, 0.0001, 10),
        ];
    }
}
