<?php

namespace Database\Seeders;

use App\Models\Headquarter;
use Illuminate\Database\Seeder;

class HeadquarterSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            [
                'code' => 'L-001',
                'name' => 'Location 1',
                'image' => 'https://via.placeholder.com/150',
            ],
            [
                'code' => 'L-002',
                'name' => 'Location 2',
                'image' => 'https://via.placeholder.com/150',
            ],
            [
                'code' => 'L-003',
                'name' => 'Location 3',
                'image' => 'https://via.placeholder.com/150',
            ],
            [
                'code' => 'L-004',
                'name' => 'Location 4',
                'image' => 'https://via.placeholder.com/150',
            ],
            [
                'code' => 'L-005',
                'name' => 'Location 5',
                'image' => 'https://via.placeholder.com/150',
            ],
        ];

        foreach ($locations as $location) {
            Headquarter::create($location);
        }
    }
}
