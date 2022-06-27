<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'cover' => 'cover.jpg',
            'attach_file' => 'download.pdf',
            'description' => '<div><strong>My Header</strong><br/><br/>This text is paragraph</div>',
            'user_id' => $this->faker->numberBetween(1, 20),
            'type_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
