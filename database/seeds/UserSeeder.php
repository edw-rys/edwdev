<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name','admin')->first();
        $user = new User();
        $user->name ='Edw Rys';
        // $user->last_name ='Rys';
        $user->email ='edw@edw.com';
        $user->password = bcrypt('edw');
        $user->save();
        $user->roles()->attach($role);
    }
}
