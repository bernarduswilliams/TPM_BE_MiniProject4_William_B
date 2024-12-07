<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Jobdesk;



class JobdeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jobdesks')->insert([
            'job_category' => 'Marketing'
        ]);

        DB::table('jobdesks')->insert([
            'job_category' => 'Product'
        ]);

        DB::table('jobdesks')->insert([
            'job_category' => 'Internal'
        ]);
    }
}
