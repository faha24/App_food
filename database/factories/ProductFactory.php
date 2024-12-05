<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 5, 100), // Giá từ 5 đến 100
            'stock' => $this->faker->numberBetween(0, 100), // Số lượng tồn kho từ 0 đến 100
            'image_url' => $this->faker->imageUrl(640, 480, 'technics', true, 'Product'),
            'category_id' => $this->faker->numberBetween(1, 4), // Giả sử có 5 danh mục
        ];
    }
}
