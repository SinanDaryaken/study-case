<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Department;
use App\Models\DepartmentTranslation;
use App\Models\DepartmentUser;
use App\Models\Language;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => Hash::make('123123'),
        ]);
    }
}
