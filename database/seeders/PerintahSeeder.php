<?php

namespace Database\Seeders;

use App\Models\Perintah;
use Illuminate\Database\Seeder;

class PerintahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['settings' => 'otomatis'],
        ];

        foreach ($data as $d) {
            Perintah::create($d);
        }
    }
}
