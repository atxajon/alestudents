<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generate a timestamp using mt_rand.
        $timestamp = mt_rand(1, time());

        // Format that timestamp into a date string.
        $randomDate = date("Y-m-d", $timestamp);

        $fakeName = $this->faker->text(10);
        $fakeNameNoSpaces = str_replace(' ', '', $fakeName);
        $fakeNameNoSpacesNoDots = str_replace('.', '', $fakeNameNoSpaces);

        $fakeSurName = $this->faker->text(14);
        $fakeSurNameNoSpaces = str_replace(' ', '', $fakeSurName);
        $fakeSurNameNoSpacesNoDots = str_replace('.', '', $fakeSurNameNoSpaces);

        return [
            'name' => $fakeNameNoSpacesNoDots,
            'surname' => $fakeSurNameNoSpacesNoDots,
            'dob' => $randomDate,
        ];
    }
}
