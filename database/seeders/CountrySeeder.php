<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = collect([
            [
                'name' => 'India',
                'slug' => 'india',
            ],
            [
                'name' => 'USE',
                'slug' => 'uae',
            ],
            [
                'name' => 'Usa',
                'slug' => 'usa',
            ],
            [
                'name' => 'Indonesia',
                'slug' => 'indonesia',
            ],
            [
                'name' => 'Qatar',
                'slug' => 'qatar',
            ]
        ]);

        $countries->each(function ($country) {
            Country::create([
                'name' => $country['name'],
                'slug' => $country['slug'],
            ]);
        });
    }
}
