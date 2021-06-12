<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = [
            ['label' => 'writer', 'name' => 'Scénariste'],
            ['label' => 'director', 'name' => 'Réalisateur'],
            ['label' => 'cast', 'name' => 'Casting'],
            ['label' => 'producer', 'name' => 'Producteur'],
            ['label' => 'distribution_co', 'name' => 'Société de distribution'],
            ['label' => 'sales_co', 'name' => 'Société de ventes']
        ];

        Job::insert($jobs);
    }
}
