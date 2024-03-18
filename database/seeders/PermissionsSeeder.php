<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list achetenows']);
        Permission::create(['name' => 'view achetenows']);
        Permission::create(['name' => 'create achetenows']);
        Permission::create(['name' => 'update achetenows']);
        Permission::create(['name' => 'delete achetenows']);

        Permission::create(['name' => 'list certifications']);
        Permission::create(['name' => 'view certifications']);
        Permission::create(['name' => 'create certifications']);
        Permission::create(['name' => 'update certifications']);
        Permission::create(['name' => 'delete certifications']);

        Permission::create(['name' => 'list contacts']);
        Permission::create(['name' => 'view contacts']);
        Permission::create(['name' => 'create contacts']);
        Permission::create(['name' => 'update contacts']);
        Permission::create(['name' => 'delete contacts']);

        Permission::create(['name' => 'list critereimmeubles']);
        Permission::create(['name' => 'view critereimmeubles']);
        Permission::create(['name' => 'create critereimmeubles']);
        Permission::create(['name' => 'update critereimmeubles']);
        Permission::create(['name' => 'delete critereimmeubles']);

        Permission::create(['name' => 'list etatachats']);
        Permission::create(['name' => 'view etatachats']);
        Permission::create(['name' => 'create etatachats']);
        Permission::create(['name' => 'update etatachats']);
        Permission::create(['name' => 'delete etatachats']);

        Permission::create(['name' => 'list exigenceimmeubles']);
        Permission::create(['name' => 'view exigenceimmeubles']);
        Permission::create(['name' => 'create exigenceimmeubles']);
        Permission::create(['name' => 'update exigenceimmeubles']);
        Permission::create(['name' => 'delete exigenceimmeubles']);

        Permission::create(['name' => 'list exigenceparticulieres']);
        Permission::create(['name' => 'view exigenceparticulieres']);
        Permission::create(['name' => 'create exigenceparticulieres']);
        Permission::create(['name' => 'update exigenceparticulieres']);
        Permission::create(['name' => 'delete exigenceparticulieres']);

        Permission::create(['name' => 'list maisoncertifs']);
        Permission::create(['name' => 'view maisoncertifs']);
        Permission::create(['name' => 'create maisoncertifs']);
        Permission::create(['name' => 'update maisoncertifs']);
        Permission::create(['name' => 'delete maisoncertifs']);

        Permission::create(['name' => 'list allrendezvous']);
        Permission::create(['name' => 'view allrendezvous']);
        Permission::create(['name' => 'create allrendezvous']);
        Permission::create(['name' => 'update allrendezvous']);
        Permission::create(['name' => 'delete allrendezvous']);

        Permission::create(['name' => 'list surfaceannexes']);
        Permission::create(['name' => 'view surfaceannexes']);
        Permission::create(['name' => 'create surfaceannexes']);
        Permission::create(['name' => 'update surfaceannexes']);
        Permission::create(['name' => 'delete surfaceannexes']);

        Permission::create(['name' => 'list terraincertifs']);
        Permission::create(['name' => 'view terraincertifs']);
        Permission::create(['name' => 'create terraincertifs']);
        Permission::create(['name' => 'update terraincertifs']);
        Permission::create(['name' => 'delete terraincertifs']);

        Permission::create(['name' => 'list typecertifications']);
        Permission::create(['name' => 'view typecertifications']);
        Permission::create(['name' => 'create typecertifications']);
        Permission::create(['name' => 'update typecertifications']);
        Permission::create(['name' => 'delete typecertifications']);

        Permission::create(['name' => 'list typedesurfaces']);
        Permission::create(['name' => 'view typedesurfaces']);
        Permission::create(['name' => 'create typedesurfaces']);
        Permission::create(['name' => 'update typedesurfaces']);
        Permission::create(['name' => 'delete typedesurfaces']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
