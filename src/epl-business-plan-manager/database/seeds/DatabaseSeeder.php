<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(BusinessPlanSeeder::class);
        $this->call(GoatsTableSeeder::class);
        $this->call(GoatUserTableSeeder::class);
        $this->call(DepartmentGoatTableSeeder::class);
        $this->call(DepartmentUserTableSeeder::class);
    }
}
