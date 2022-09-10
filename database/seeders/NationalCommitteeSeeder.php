<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\NationalCommittee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NationalCommitteeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = Country::get();
        for ($i=0; $i < count($countries); $i++) {
            NationalCommittee::create([
                'country_id' => $countries[$i]->id,
                'business_name' => 'Miss Universe '.$countries[$i]->name,
                'national_director' => fake()->name()
            ]);
        }
    }
}
