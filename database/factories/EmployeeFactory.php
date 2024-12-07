<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;
use App\Models\Jobdesk;
use Faker\Factory as faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jobdesk = Jobdesk::inRandomOrder()->first();

        return [
            'name' => $this->faker->name,
            'reason' => $this->faker->sentence,
            'join_date' => $this->faker->date,
            'scale' => $this->faker->numberBetween(1, 10), // Scale between 1 and 10
            'job_id' => $jobdesk->id, // Random job desk
        ];
    }
}
