<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::create([
                'user_id' => 1,
                'path' => 'path de archivo',
                'name' => 'name.csv',
                'secuencia' => 0,
                'status' => false,
                'apply' => false,
                'rectificar' => false,

            ]);
    }
}
