<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actions = [
            'add_user',
            'view_all_stats',
            'view_own_stats',
            'view_team_stats',
            'add_product'
        ];

        foreach ($actions as $action) {
            \App\Models\Permission::create([
                'name' => $action,
            ]);
        }
    }
}
