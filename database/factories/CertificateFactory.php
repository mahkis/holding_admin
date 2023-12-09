<?php

namespace Database\Factories;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CertificateFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificate::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => $this->faker->numerify,
            'name' => $this->faker->name,
            'uuid' => $this->faker->uuid(),
            'whom' => $this->faker->name,
            'date' => $this->faker->date,
            'file_id' => $this->faker->uuid . '.' . $this->faker->fileExtension(),
            'file_name' => $this->faker->randomLetter .'.'. $this->faker->fileExtension(),
            'inn' => $this->faker->uuid,
            'region' => $this->faker->city,
            'address' => $this->faker->address,
            'application_area' => $this->faker->company,
            'by_industry' => $this->faker->company,
            'expired_date' => $this->faker->date,
        ];
    }
}
