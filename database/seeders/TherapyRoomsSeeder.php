<?php

namespace Database\Seeders;

use App\Models\TherapyRoom;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TherapyRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 20; $i++){
            TherapyRoom::create([
                'name' => "Room $i"
            ]);
        }
    }
}
