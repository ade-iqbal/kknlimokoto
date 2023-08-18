<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Application;
use App\Models\Jorong;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'citizen_name' => $this->faker->word,
            'place_of_birth' => $this->faker->word,
            'date_of_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(["M","F"]),
            'religion' => $this->faker->word,
            'occupation' => $this->faker->word,
            'property_taxes' => $this->faker->word,
            'jorong_id' => Jorong::factory(),
            'date' => $this->faker->date(),
            'need' => $this->faker->word,
            'ref_number' => $this->faker->word,
            'accepted_date' => $this->faker->date(),
            'sign_url' => $this->faker->word,
        ];
    }
}
