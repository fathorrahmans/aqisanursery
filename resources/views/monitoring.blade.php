@extends('index')
@push('css-custom')
    <style>
        .table thead th {
            vertical-align: middle;
            font-weight: 600;
            padding: 0.5rem 0.5rem 0.5rem 0.75rem;
            /*padding: top right bottom left; */
        }

        .table tbody th {
            font-weight: 600;
        }
    </style>
@endpush
@section('isi-content')
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body button-page">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-header-left">
                                        <h5>Pengaturan Alat </h5>
                                    </div>
                                    <div class="card-header-right">
                                        <i class="fa fa-minus minimize-card"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    @if ($setting == 'otomatis')
                                        <button class="btn btn-disabled disabled waves-effect waves-light"
                                            id="btnOtomatis">Otomatis</button>
                                        <button class="btn btn-primary waves-effect waves-light"
                                            id="btnManual">Manual</button>
                                    @else
                                        <button class="btn btn-primary waves-effect waves-light"
                                            id="btnOtomatis">Otomatis</button>
                                        <button class="btn btn-disabled disabled waves-effect waves-light"
                                            id="btnManual">Manual</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 id="infoSetting">{{ $setting == 'otomatis' ? 'Otomatis' : 'Manual' }}</h5>
                                    <span
                                        id="infoDetail">{{ $setting == 'otomatis' ? 'Sekarang Alat Berjalan Secara Otomatis' : 'Alat Dijalankan Secara Manual' }}
                                    </span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="tableMonitoring">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Tanggal</th>
                                                    <th rowspan="2">Waktu</th>
                                                    <th rowspan="2">Suhu</th>
                                                    <th rowspan="2">Kelembapan</th>
                                                    <th rowspan="2">Cahaya</th>
                                                    <th colspan="3" class="text-center">Durasi (fuzzy)</th>
                                                    <th rowspan="2">Keterangan</th>
                                                </tr>
                                                <tr>
                                                    <th>Kipas</th>
                                                    <th>Pompa</th>
                                                    <th>Atap</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="styleSelector"> </div>
        </div>
    </div>
@endsection
@push('js-custom')
    <script>
        $(document).ready(function() {
            $("#btnOtomatis").on('click', () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('ubahSetting') }}",
                    data: {
                        setting: 'otomatis'
                    },
                    success: function(data) {
                        if (data.message == 'otomatis') {
                            $("#btnManual").removeClass("btn-disabled disabled");
                            $("#btnManual").addClass("btn-primary");
                            $("#btnOtomatis").removeClass("btn-primary");
                            $("#btnOtomatis").addClass("btn-disabled disabled");
                            $("#infoSetting").text('Otomatis');
                            $("#infoDetail").text('Sekarang Alat Berjalan Secara Otomatis');
                        }
                    }
                });
            });

            $("#btnManual").on('click', () => {
                $.ajax({
                    type: "GET",
                    url: "{{ route('ubahSetting') }}",
                    data: {
                        setting: 'manual'
                    },
                    success: function(data) {
                        if (data.message == 'manual') {
                            $("#btnOtomatis").removeClass("btn-disabled disabled");
                            $("#btnOtomatis").addClass("btn-primary");
                            $("#btnManual").removeClass("btn-primary");
                            $("#btnManual").addClass("btn-disabled disabled");
                            $("#infoSetting").html(
                                '<i class="fa fa-circle-o-notch rotate-refresh" style="color:blue"></i> Manual'
                            );
                            $("#infoDetail").text('Proses Menjalankan Alat Sekarang');
                        }
                    }
                });
            });

            var tabelMonitoring = $("#tableMonitoring").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                processing: true,
                serverSide: true,
                ajax: "{{ route('monitoringJson') }}",
                columns: [{
                        data: 'tanggal_waktu',
                        name: 'tanggal_waktu',
                        render: (data) => {
                            if (data === null) return "";
                            return moment(data).format('DD/MM/YYYY');
                        }
                    },
                    {
                        data: "tanggal_waktu",
                        name: 'tanggal_waktu',
                        render: (data) => {
                            if (data === null) return "";
                            return moment(data).format('hh:mm');
                        }
                    },
                    {
                        data: 'suhu',
                        name: 'suhu'
                    },
                    {
                        data: 'kelembapan',
                        name: 'kelembapan'
                    },
                    {
                        data: 'cahaya',
                        name: 'cahaya'
                    },
                    {
                        data: 'kipas',
                        name: 'kipas'
                    },
                    {
                        data: 'pompa',
                        name: 'pompa'
                    },
                    {
                        data: 'atap',
                        name: 'atap'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    },
                ],
            });

            $(".card-header-right .reload-card").on('click', function() {
                var $this = $(this);
                $this.parents('.card').addClass("card-load");
                $this.parents('.card').append(
                    '<div class="card-loader"><i class="fa fa-circle-o-notch rotate-refresh"></div>');
                tabelMonitoring.ajax.reload(null, false);
                readSetting(); //baca setting sekarang
                setTimeout(function() {
                    $this.parents('.card').children(".card-loader").remove();
                    $this.parents('.card').removeClass("card-load");
                }, 1000);
            });

            function readSetting() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('readSettingSystem') }}",
                    data: {},
                    success: function(data) {
                        if (data.message == 'otomatis') {
                            $("#btnManual").removeClass("btn-disabled disabled");
                            $("#btnManual").addClass("btn-primary");
                            $("#btnOtomatis").removeClass("btn-primary");
                            $("#btnOtomatis").addClass("btn-disabled disabled");
                            $("#infoSetting").text('Otomatis');
                            $("#infoDetail").text('Sekarang Alat Berjalan Secara Otomatis');
                        }
                    }
                });
            }

        });
    </script>
@endpush
