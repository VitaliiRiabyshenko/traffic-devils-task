<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Enum\RoleEnum;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = RoleEnum::getRoles();

        foreach ($roles as $role) {
            Role::create([
                'name' => $role->value,
            ]);
        }

        $adminPermissions = Permission::all()->pluck('id')->toArray();

        Role::where('name', RoleEnum::ADMIN->value)->first()->permissions()->sync($adminPermissions);

        $teamLeadPermissions = Permission::where('name', '<>', 'view_all_stats')->pluck('id')->toArray();

        Role::where('name', RoleEnum::TEAM_LEAD->value)->first()->permissions()->sync($teamLeadPermissions);

        Role::where('name', RoleEnum::BAYER->value)->first()->permissions()->sync([
            Permission::where('name', 'view_own_stats')->first()->id,
            Permission::where('name', 'add_product')->first()->id
        ]);
    }
}
