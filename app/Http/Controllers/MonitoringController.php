<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Perintah;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        $task = Perintah::first();

        return view('monitoring', [
            'setting' => $task->settings,
        ]);
    }

    public function dataChart()
    {
        $record = Monitoring::orderBy('id', 'DESC')->take(5)->get();
        $data = [];
        foreach ($record as $r) {
            $data[] = [
                'id' => $r->id,
                'suhu' => $r->suhu,
                'kelembapan' => $r->kelembapan,
                'cahaya' => $r->cahaya,
                'tanggal' =>  date("d/m/y", strtotime($r->created_at)),
                'waktu' => date("H:i", strtotime($r->tanggal_waktu)),
            ];
        }
        $data = array_reverse($data);
        // $data = $data->reverse()->values();
        return $data;
    }

    public function dataJson()
    {
        $record = Monitoring::limit(10)->orderBy('id', 'desc');
        return DataTables::of($record)->make(true);
    }


    public function store(Request $request)
    {
        $input = Monitoring::create([
            'suhu' => $request->suhu,
            'kelembapan' => $request->kelembapan,
            'cahaya' => $request->cahaya,
            'kipas' => $request->kipas,
            'pompa' => $request->pompa,
            'atap' => $request->atap,
            'tanggal_waktu' => $request->tanggal,
            'keterangan' => $request->keterangan,
        ]);

        $data = Perintah::first();
        if ($data->settings == 'manual') {
            $task = Perintah::first();
            $task->update([
                'settings' => 'otomatis',
            ]);
        }

        if (!empty($input)) {
            return response([
                'message' => 'sukses',
            ], 200);
        } else {
            return response([
                'message' => 'gagal',
            ], 500);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
