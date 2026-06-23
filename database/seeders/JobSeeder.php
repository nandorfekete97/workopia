<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobListings = include database_path("seeders/data/job_listings.php");

        $userIds = User::pluck('id')->toArray();

        foreach ($jobListings as &$jobListing) {
            $jobListing["user_id"] = $userIds[array_rand($userIds)];
            $jobListing["created_at"] = now();
            $jobListing["updated_at"] = now();

        }

        DB::table('job_listings')->insert($jobListings);
        echo "Jobs created successfully.\n";
    }
}
