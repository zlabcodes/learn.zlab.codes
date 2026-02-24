<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a super admin with a known email for easy login
        Admin::factory()->superAdmin()->create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'), // Default password
        ]);

        // Create 2 admins
        Admin::factory()->count(2)->create([
            'role' => 'admin',
        ]);

        // Create 2 moderators
        Admin::factory()->count(2)->create([
            'role' => 'moderator',
        ]);

        // Create 3 instructors
        Admin::factory()->instructor()->count(3)->create();

        // Create 2 content creators
        Admin::factory()->contentCreator()->count(2)->create();

        // Create 2 support staff
        Admin::factory()->support()->count(2)->create();

        // Create 2 analysts
        Admin::factory()->analyst()->count(2)->create();
    }
}
