<?php

namespace App\Http\Controllers;

use App\Models\Perintah;
use Illuminate\Http\Request;

class PerintahController extends Controller
{
    public function index()
    {
    }

    public function readSetting()
    {
        $data = Perintah::first();

        return ['message' => $data->settings];
    }

    /** Function Ubah Perintah */
    public function ubahPerintah(Request $request)
    {
        $task = Perintah::first();
        $perintah =  $request->setting;
        $update =  $task->update([
            'settings' => $perintah,
        ]);

        if (!empty($update)) {
            return ['message' => $perintah];
        } else {
            return ['message' => 'gagal'];
        }
    }

    /** Function API Baca Perintah */
    public function readTask()
    {
        $data = Perintah::first(); //Ini dikoment untuk sementara ini
        $data->update([
            'status' => 'online',
        ]);

        return response($data, 200);
    }

    public function statusKoneksiAlat()
    {
        $data = Perintah::first();
        if ($data->status == 'online') {
            $data->update([
                'status' => 'offline',
            ]);
            return ['status' => 'online'];
        } else {
            return ['status' => 'offline'];
        }
    }
}
