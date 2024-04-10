<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Domain\URL\Interfaces\UrlShortenerInterface;
use App\Domain\URL\Services\UrlShortenerService;
use Hashids\Hashids;

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
        $longUrl = $this->faker->url('https');
        $shortUrl = "to be or not to be shortened";

        return [
            'url' => $longUrl,
            'url_short' => $shortUrl,
            'short_url_access_count' => rand(0,20)
        ];
    }
}
