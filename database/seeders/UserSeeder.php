<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password= bcrypt("123456789");
        DB::insert("insert into users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) VALUES
            (1, 'prueba', 'prueba@gmail.com', NULL, '$password', NULL, '2023-06-04 17:55:44', '2023-06-04 17:55:44')");
    }
}
