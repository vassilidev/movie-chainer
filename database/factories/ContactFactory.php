<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $genders = ['mr', 'mme'];

        $gender = $genders[rand(0, count($genders) - 1)];

        return [
            'gender' => $gender,
            'name' => ucfirst($this->faker->firstName($gender)),
            'surname' => Str::upper($this->faker->lastName),
        ];
    }
}
