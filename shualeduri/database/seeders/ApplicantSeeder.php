<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applicants')->insert([
            'name' => 'Luka',
            'surname' => 'Gagnidze',
            'position' => 'Software Developer',
            'phone' => '555787878',
            'is_hired' => true
        ]);
        DB::table('applicants')->insert([
            'name' => 'Jesse',
            'surname' => 'Lingard',
            'position' => 'Banker',
            'phone' => '445557733',
            'is_hired' => false
        ]);
        DB::table('applicants')->insert([
            'name' => 'Marcus',
            'surname' => 'Rashford',
            'position' => 'Software Architect',
            'phone' => '588998899',
            'is_hired' => true
        ]);
        DB::table('applicants')->insert([
            'name' => 'Robert',
            'surname' => 'Levandowski',
            'position' => 'Doctor',
            'phone' => '577554421',
            'is_hired' => true
        ]);
        DB::table('applicants')->insert([
            'name' => 'Daniel',
            'surname' => 'James',
            'position' => 'Oracle Developer',
            'phone' => '578452437',
            'is_hired' => false
        ]);
        DB::table('applicants')->insert([
            'name' => 'Frenkie',
            'surname' => 'De Jong',
            'position' => 'Doctor',
            'phone' => '599785778',
            'is_hired' => true
        ]);
        DB::table('applicants')->insert([
            'name' => 'Jordi',
            'surname' => 'Alba',
            'position' => 'Network Engineer',
            'phone' => '577354490',
            'is_hired' => false
        ]);
    }
}
