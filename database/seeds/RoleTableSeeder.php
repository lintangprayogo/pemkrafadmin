<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Role::create(['name'=>'guest']);
       Role::create(['name'=>'super']);
       Role::create(['name'=>'ekraf']);
       Role::create(['name'=>'pariwisata']);
       Role::create(['name'=>'budaya']);

    }
}
