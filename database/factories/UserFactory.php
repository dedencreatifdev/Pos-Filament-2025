<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->unique()->phoneNumber(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'country' => $this->faker->country(),
            'postal_code' => $this->faker->postcode(),
            'profile_picture' => $this->faker->imageUrl(200, 200, 'people'),
            'bio' => $this->faker->text(200),
            'website' => $this->faker->url(),
            'social_media_links' => $this->faker->url(),
            'role' => 'user', // Default role
            'status' => 'active', // Default status
            'verification_code' => $this->faker->uuid(),
            'verification_code_expiry' => '2025-04-01', // 30 minutes from now
            'two_factor_code' => $this->faker->randomNumber(6, true),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => $this->faker->optional()->dateTime(),
            'password' => Hash::make('password'), // Default password
            // $table->string('password');
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
