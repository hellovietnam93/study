<?php

use Illuminate\Database\Seeder;
use studyhub\Entities\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
          [
            'name'         => 'admin',
            'display_name' => 'Administrator',
            'description'  => 'Administrator'
          ],
          [
            'name'         => 'lecturer',
            'display_name' => 'lecturer',
            'description'  => 'lecturer'
          ]
        ];

        foreach ($roles as $role) {
          Role::create($role);
        }
    }
}
