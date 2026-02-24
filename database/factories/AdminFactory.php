<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'), // Default password for testing
            'phone' => fake()->phoneNumber(),
            'avatar' => null,
            'role' => fake()->randomElement(['admin', 'moderator', 'instructor', 'content_creator', 'support', 'analyst']),
            'status' => 'active',
            'bio' => fake()->paragraph(),
            'permissions' => null,
            'email_verified_at' => now(),
            'last_login_at' => fake()->dateTimeBetween('-30 days', 'now'),
            'last_login_ip' => fake()->ipv4(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the admin is a super admin.
     */
    public function superAdmin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'super_admin',
            'permissions' => ['*'], // All permissions
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Indicate that the admin is an instructor.
     */
    public function instructor(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'instructor',
            'permissions' => ['manage_courses', 'create_content', 'view_analytics'],
        ]);
    }

    /**
     * Indicate that the admin is a content creator.
     */
    public function contentCreator(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'content_creator',
            'permissions' => ['create_content', 'edit_content', 'upload_media'],
        ]);
    }

    /**
     * Indicate that the admin is support staff.
     */
    public function support(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'support',
            'permissions' => ['view_tickets', 'respond_tickets', 'view_users'],
        ]);
    }

    /**
     * Indicate that the admin is an analyst.
     */
    public function analyst(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'analyst',
            'permissions' => ['view_analytics', 'export_reports', 'view_dashboard'],
        ]);
    }

    /**
     * Indicate that the admin is unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Indicate that the admin is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'inactive',
        ]);
    }

    /**
     * Indicate that the admin is suspended.
     */
    public function suspended(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'suspended',
        ]);
    }
}
