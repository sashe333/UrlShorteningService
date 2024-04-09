<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Url>
 */
class UrlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $shortUrl = 'to be or not to be';
        return [
            'url' => $this->faker->url('https'),
            'url_short' => $shortUrl,
            'short_url_access_count' => rand(0,20)
        ];
    }
}
