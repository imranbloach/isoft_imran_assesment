<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('Test@123');
        $adminRecords = [
            "id"=>1,
            "name"=>"Muhammad Imran",
            "type"=>"admin",
            "email"=>"admin@admin.com",
            "password"=>$password,
        ];
        Admin::insert($adminRecords);
    }
}
