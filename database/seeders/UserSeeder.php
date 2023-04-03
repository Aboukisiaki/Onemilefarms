<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Request $request)
    {
    User::insert([

        'name'=>str::random(10),
        'email'=>str::random(10).'@gmail.com',
        'password'=>str::random(10),
    ]);
    }
}
