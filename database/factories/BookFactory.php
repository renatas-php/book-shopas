<?php

namespace Database\Factories;

use App\Models\Book;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(30);
        return [
            'user_id' => rand(1, 100),
            'title' => $title,
            'cover_img' => 'covers\cover_img.png',
            'price' => rand(5, 40),
            'approved' => rand(0, 1),
            'description' => $this->faker->text(100),
            'slug' => Str::slug($title)
        ];
    }
}
