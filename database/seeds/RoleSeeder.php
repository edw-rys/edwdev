<?php

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'      => 'admin',
            'guard_name'=> 'web',
            'created_at'=> Carbon::now() 
        ]);
    }
}
