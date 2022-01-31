<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Animal;
use App\Models\Animalspecy;
use App\Models\Breed;

class AnimalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Animal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'breed_id' => Breed::factory(),
            'bithdate' => $this->faker->date(),
            'image' => $this->faker->word,
            'animalspecies_id' => Animalspecy::factory(),
        ];
    }
}
