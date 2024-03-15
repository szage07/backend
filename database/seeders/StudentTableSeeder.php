<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Student::factory(10)->create();

        // \App\Models\Student::factory()->create([
        //     'first_name' => 'Test User',
        //     'last_name' => 'Test User',
        //     'student_id' => '123456',
        //     'date_of_birth'=> '2002-09-14',
        //     'email' => 'test@example.com',
        // ]);
    }
}
