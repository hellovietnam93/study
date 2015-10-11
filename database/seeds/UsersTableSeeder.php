<?php

use studyhub\Entities\Users\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin1 = factory(User::class)->create([
          'name' => 'Dao Duc Cuong',
          'email' => 'daoduccuong@gmail.com',
          'password' => '12345678',
        ]);

        $admin2 = factory(User::class)->create([
          'name' => 'Nguyen Tien Trung',
          'email' => 'hellovietnam93@gmail.com',
          'password' => '12345678',
        ]);

        $admin1->roles()->attach(1);
        $admin2->roles()->attach(1);

        $lecturer = factory(User::class)->create([
          'name' => 'Lecturer',
          'email' => 'lecturer@gmail.com',
          'password' => '12345678',
        ]);

        $lecturer->roles()->attach(2);

        factory(User::class, 300)->create();
    }
}
