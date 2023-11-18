@extends('index')
@section('isi-content')
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Beranda</h5>
                        <p class="m-b-0">Selamat Datang</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('adminBeranda') }}"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Beranda</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <!-- LINE CHART start -->
                        <div class="col-md-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Suhu</h5>
                                </div>
                                <div class="card-block">
                                    <div>
                                        <canvas id="grafikSuhu"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Kelembapan Media Tanam</h5>
                                </div>
                                <div class="card-block">
                                    <div>
                                        <canvas id="grafikLembap"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Cahaya (Lux)</h5>
                                </div>
                                <div class="card-block">
                                    <div>
                                        <canvas id="grafikCahaya"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- LINE CHART Ends -->
                    </div>
                </div>
            </div>
        </div>
        <div id="styleSelector"></div>
    </div>
@endsection
@push('js-custom')
    <script>
        $(document).ready(() => {
            setInterval(() => {
                getData();
            }, 3000);

            //=============================================================
            var chartSuhu = new Chart($('#grafikSuhu'), {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Suhu',
                        data: [],
                        borderWidth: 1,
                        lineTension: 0.5,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            function fungsiSuhu(tanggal, waktu, suhu) {
                if (chartSuhu.data.datasets[0].data.length >= 5) {
                    chartSuhu.data.labels.shift();
                    chartSuhu.data.datasets[0].data.shift();
                }
                chartSuhu.data.labels.push(`${tanggal} ${waktu}`);
                chartSuhu.data.datasets[0].data.push(suhu);
                chartSuhu.update();
            }
            //=============================================================
            //=============================================================
            var chartLembap = new Chart($('#grafikLembap'), {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Kelembapan Tanah',
                        data: [],
                        borderWidth: 1,
                        borderColor: '#E21818',
                        backgroundColor: '#E21818',
                        lineTension: 0.5,

                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            function fungsiLembap(tanggal, waktu, suhu) {
                if (chartLembap.data.datasets[0].data.length >= 5) {
                    chartLembap.data.labels.shift();
                    chartLembap.data.datasets[0].data.shift();
                }
                chartLembap.data.labels.push(`${tanggal} ${waktu}`);
                chartLembap.data.datasets[0].data.push(suhu);
                chartLembap.update();
            }
            //=============================================================
            //=============================================================
            var chartCahaya = new Chart($('#grafikCahaya'), {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Cahaya (Lux)',
                        data: [],
                        borderWidth: 1,
                        borderColor: '#F7C04A',
                        backgroundColor: '#F7C04A',
                        lineTension: 0.5,
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            function fungsiCahaya(tanggal, waktu, suhu) {
                if (chartCahaya.data.datasets[0].data.length >= 5) {
                    chartCahaya.data.labels.shift();
                    chartCahaya.data.datasets[0].data.shift();
                }
                chartCahaya.data.labels.push(`${tanggal} ${waktu}`);
                chartCahaya.data.datasets[0].data.push(suhu);
                chartCahaya.update();
            }
            //=============================================================
            var lastRecord = [];

            function getData() {
                $.ajax({
                    type: "GET",
                    url: "{{ route('monitoringChart') }}",
                    // data: ,
                    success: function(data) {
                        if (!lastRecord.length) {
                            for (const i in data) {
                                fungsiSuhu(data[i].tanggal, data[i].waktu, data[i]
                                    .suhu);
                                fungsiLembap(data[i].tanggal, data[i].waktu, data[i]
                                    .kelembapan);
                                fungsiCahaya(data[i].tanggal, data[i].waktu, data[i]
                                    .cahaya);
                                lastRecord.push(data[i].id);
                            }
                        } else {
                            for (const i in data) {
                                if (!lastRecord.includes(data[i].id)) {
                                    lastRecord.shift();
                                    lastRecord.push(data[i].id);
                                    fungsiSuhu(data[i].tanggal, data[i].waktu, data[i]
                                        .suhu);
                                    fungsiLembap(data[i].tanggal, data[i].waktu, data[i]
                                        .kelembapan);
                                    fungsiCahaya(data[i].tanggal, data[i].waktu, data[i]
                                        .cahaya);
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
@endpush
