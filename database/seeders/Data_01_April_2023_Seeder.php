<?php

namespace Database\Seeders;

use App\Models\Monitoring;
use Illuminate\Database\Seeder;

class Data_01_April_2023_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ // 1
                'suhu' => 29.6,
                'kelembapan' => 41.06,
                'cahaya' => 7189.17,
                'kipas' => 8.24,
                'pompa' => 7.87,
                'atap' => 1.76,
                'tanggal_waktu' => '2023-04-01 11:00:14',
                'keterangan' => 'otomatis',
            ],
            [ // 2
                'suhu' => 29.7,
                'kelembapan' => 32.16,
                'cahaya' => 7932.5,
                'kipas' => 8.45,
                'pompa' => 8.24,
                'atap' => 1.76,
                'tanggal_waktu' => '2023-04-01 11:08:23',
                'keterangan' => 'manual',
            ],
            [ // 3
                'suhu' => 30.6,
                'kelembapan' => 29.33,
                'cahaya' => 8415.06,
                'kipas' => 10.6,
                'pompa' => 8.24,
                'atap' => 1.76,
                'tanggal_waktu' => '2023-04-01 12:00:09',
                'keterangan' => 'otomatis',
            ],
            [ // 4
                'suhu' => 31.4,
                'kelembapan' => 28.45,
                'cahaya' => 9230.2,
                'kipas' => 11.74,
                'pompa' => 8.24,
                'atap' => 1.76,
                'tanggal_waktu' => '2023-04-01 12:11:23',
                'keterangan' => 'manual',
            ],
            [ // 5
                'suhu' => 31.2,
                'kelembapan' => 27.08,
                'cahaya' => 9405.83,
                'kipas' => 11.74,
                'pompa' => 8.24,
                'atap' => 1.76,
                'tanggal_waktu' => '2023-04-01 12:21:12',
                'keterangan' => 'manual',
            ],
            [ // 6
                'suhu' => 32.1,
                'kelembapan' => 37.63,
                'cahaya' => 9317.32,
                'kipas' => 11.74,
                'pompa' => 8.24,
                'atap' => 1.76,
                'tanggal_waktu' => '2023-04-01 12:24:33',
                'keterangan' => 'manual',
            ],
            [ // 7
                'suhu' => 30.9,
                'kelembapan' => 32.65,
                'cahaya' => 8548.9,
                'kipas' => 11.43,
                'pompa' => 8.24,
                'atap' => 1.76,
                'tanggal_waktu' => '2023-04-01 13:00:08',
                'keterangan' => 'otomatis',
            ],
            [ // 8
                'suhu' => 31.3,
                'kelembapan' => 30.21,
                'cahaya' => 8456.17,
                'kipas' => 11.74,
                'pompa' => 8.24,
                'atap' => 1.76,
                'tanggal_waktu' => '2023-04-01 13:10:15',
                'keterangan' => 'manual',
            ],
            [ // 9
                'suhu' => 29.5,
                'kelembapan' => 28.54,
                'cahaya' => 8192.34,
                'kipas' => 8.03,
                'pompa' => 8.24,
                'atap' => 1.76,
                'tanggal_waktu' => '2023-04-01 14:00:11',
                'keterangan' => 'otomatis',
            ],
            [ // 10
                'suhu' => 29.8,
                'kelembapan' => 32.26,
                'cahaya' => 7909.03,
                'kipas' => 8.67,
                'pompa' => 8.24,
                'atap' => 1.76,
                'tanggal_waktu' => '2023-04-01 14:31:59',
                'keterangan' => 'manual',
            ],
        ];

        foreach ($data as $d) {
            Monitoring::create($d);
        }
    }
}
