<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_name' => fake()->randomElement(['Toyota', 'Honda', 'Ford', 'Chevrolet', 'Nissan', 'Volkswagen', 'BMW', 'Mercedes-Benz', 'Audi', 'Hyundai', 'Kia', 'Subaru', 'Lexus', 'Mazda', 'Volvo']),
            'driver_name' => fake()->name(),
            'fuel_consumption' => fake()->randomFloat(2, 0, 100),
            'service_schedule' => fake()->randomElement(['Daily', 'Weekly', 'Monthly', 'Yearly']),
        ];
    }
}
