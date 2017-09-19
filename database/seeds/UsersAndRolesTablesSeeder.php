<?php

use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersAndRolesTablesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::forceCreate([
            'title' => 'admin',
        ]);

        $adminRole->permissions()->createMany([
            ['title' => 'manage users'],
            ['title' => 'manage staff'],
            ['title' => 'manage pages'],
        ]);

        $staffRole = Role::forceCreate([
            'title' => 'staff',
        ]);

        $staffRole->permissions()->createMany([
            ['title' => 'manage users'],
            ['title' => 'manage pages'],
        ]);

        $userRole = Role::forceCreate([
            'title' => 'user',
        ]);

        $userRole->permissions()->createMany([
            ['title' => 'manage pages'],
        ]);

        factory(User::class)->create(['username' => 'admin1'])->roles()->attach($adminRole->id);
        factory(User::class)->create(['username' => 'admin2'])->roles()->attach($adminRole->id);
        factory(User::class)->create(['username' => 'admin3'])->roles()->attach($adminRole->id);

        for ($i = 1; $i <= 10; $i++) {
            factory(User::class)->create(['username' => "staff$i"])->roles()->attach($staffRole->id);
        }

        for ($i = 1; $i <= 50; $i++) {
            factory(User::class)->create(['username' => "user$i"])->roles()->attach($userRole->id);
            factory(User::class)->states('inactive')->create(['username' => "inactiveUser$i"])->roles()->attach($userRole->id);
        }

    }
}
