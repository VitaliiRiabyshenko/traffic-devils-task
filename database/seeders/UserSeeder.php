<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Enum\RoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createAdminUser();
    }
 
    public function createAdminUser()
    {
        User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password'),
        ])->roles()->sync(Role::where('name', RoleEnum::ADMIN->value)->first());

        User::create([
            'name'     => 'Team Lead User',
            'email'    => 'team_lead@team_lead.com',
            'password' => bcrypt('password'),
        ])->roles()->sync(Role::where('name', RoleEnum::TEAM_LEAD->value)->first());

        User::create([
            'name'     => 'Bayer User',
            'email'    => 'Bayer',
            'password' => bcrypt('password'),
            'team_lead_id' => User::where('email', 'team_lead@team_lead.com')->first()->id,
        ])->roles()->sync(Role::where('name', RoleEnum::BAYER->value)->first());
    }
}
