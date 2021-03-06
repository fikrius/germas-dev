@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endsection


@section('content')
    <div class=”container”>
        @if(\Session::has('error'))
            <div class="alert alert-danger">
                {{\Session::get('error')}}
            </div>
        @endif
        <div class="row justify-content-center" style="height: auto;">
            <div class="col-md-10">

                {{-- jumbotron --}}
                <div class="jumbotron">
                  <h1 class="display-4">Selamat datang {{ Auth::user()->name }}</h1>
                  <h2 class="display-5">Relawan RW {{ auth()->user()->rw }}</h2>
                  <p>Petakan Pemilih Sekarang</p>
                  <a class="btn btn-primary btn-lg" href="{{ url('petakanpemilih') }}" role="button">Petakan</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
                <div class="col-md-6">
                    <canvas id="ChartPerWilayah" width="400" height="400"></canvas>
                </div>
            </div>
        </div>

        {{-- label Analisis --}}
        <div class="row mt-5 justify-content-center">
            <h1 class="display-5">Analisis Tiap RW</h1>
        </div>

        {{-- Analisis lebih lanjut tiap RW --}}
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-4">
                    <h5>RW 1</h5>
                    <canvas id="AnalisisRW1" ></canvas>
                </div>
                <div class="col-md-4">
                    <h5>RW 2</h5>
                    <canvas id="AnalisisRW2" ></canvas>
                </div>
                <div class="col-md-4">
                    <h5>RW 3</h5>
                    <canvas id="AnalisisRW3" ></canvas>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4">
                    <h5>RW 4</h5>
                    <canvas id="AnalisisRW4" ></canvas>
                </div>
                <div class="col-md-4">
                    <h5>RW 5</h5>
                    <canvas id="AnalisisRW5" ></canvas>
                </div>
                <div class="col-md-4">
                    <h5>RW 6</h5>
                    <canvas id="AnalisisRW6" ></canvas>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-4 offset-4">
                    <h5>RW 7</h5>
                    <canvas id="AnalisisRW7" ></canvas>
                </div>
            </div>
        </div>
        {{-- //end analisis lebih lanjut --}}
    </div>
@endsection

@section('javascripts')
    
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    <script>
        $(document).ready(function(){

            $.ajax({

                url: "{{url('/home/dataChart')}}",
                type: "GET",
                dataType: "json",
                success: function(data){
                    chart(data.pasti_memilih, data.ragu_memilih, data.tidak_memilih, data.jumlah_belum_vote, data.jumlah_pemilih);
                }
 
            });

            $.ajax({

                url: "{{url('/home/ChartPerWilayah')}}",
                type: "GET",
                dataType: "json",
                success: function(data){
                    ChartPerWilayah(data.rw1, data.rw2, data.rw3, data.rw4, data.rw5, data.rw6, data.rw7);
                }

            });

            $.ajax({

                url: "{{url('/home/ChartAnalisis')}}",
                type: "GET",
                dataType: "json",
                success: function(data){
                    ChartAnalisisRW1(data.rw1.pasti, data.rw1.ragu, data.rw1.tidak);
                    ChartAnalisisRW2(data.rw2.pasti, data.rw2.ragu, data.rw2.tidak);
                    ChartAnalisisRW3(data.rw3.pasti, data.rw3.ragu, data.rw3.tidak);
                    ChartAnalisisRW4(data.rw4.pasti, data.rw4.ragu, data.rw4.tidak);
                    ChartAnalisisRW5(data.rw5.pasti, data.rw5.ragu, data.rw5.tidak);
                    ChartAnalisisRW6(data.rw6.pasti, data.rw6.ragu, data.rw6.tidak);
                    ChartAnalisisRW7(data.rw7.pasti, data.rw7.ragu, data.rw7.tidak);
                }

            });

            function ChartAnalisisRW1($rw1,$rw2,$rw3){
                var ctx = document.getElementById('AnalisisRW1');
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: ['Pasti', 'Ragu', 'Tidak'],
                        datasets: [{
                            label: 'Analisis RW 1',
                            data: [$rw1,$rw2,$rw3],
                            backgroundColor: [
                                'rgba(85, 250, 25, 1)',
                                'rgba(255, 221, 0, 1)',
                                'rgba(208, 22, 22, 1)'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            
            }

            function ChartAnalisisRW2($rw1,$rw2,$rw3){
                var ctx = document.getElementById('AnalisisRW2');
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: ['Pasti', 'Ragu', 'Tidak'],
                        datasets: [{
                            label: 'Analisis RW 2',
                            data: [$rw1,$rw2,$rw3],
                            backgroundColor: [
                                'rgba(85, 250, 25, 1)',
                                'rgba(255, 221, 0, 1)',
                                'rgba(208, 22, 22, 1)'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

            function ChartAnalisisRW3($rw1,$rw2,$rw3){
                var ctx = document.getElementById('AnalisisRW3');
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: ['Pasti', 'Ragu', 'Tidak'],
                        datasets: [{
                            label: 'Analisis RW 3',
                            data: [$rw1,$rw2,$rw3],
                            backgroundColor: [
                                'rgba(85, 250, 25, 1)',
                                'rgba(255, 221, 0, 1)',
                                'rgba(208, 22, 22, 1)'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

            function ChartAnalisisRW4($rw1,$rw2,$rw3){
                var ctx = document.getElementById('AnalisisRW4');
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: ['Pasti', 'Ragu', 'Tidak'],
                        datasets: [{
                            label: 'Analisis RW 4',
                            data: [$rw1,$rw2,$rw3],
                            backgroundColor: [
                                'rgba(85, 250, 25, 1)',
                                'rgba(255, 221, 0, 1)',
                                'rgba(208, 22, 22, 1)'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

            function ChartAnalisisRW5($rw1,$rw2,$rw3){
                var ctx = document.getElementById('AnalisisRW5');
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: ['Pasti', 'Ragu', 'Tidak'],
                        datasets: [{
                            label: 'Analisis RW 5',
                            data: [$rw1,$rw2,$rw3],
                            backgroundColor: [
                                'rgba(85, 250, 25, 1)',
                                'rgba(255, 221, 0, 1)',
                                'rgba(208, 22, 22, 1)'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

            function ChartAnalisisRW6($rw1,$rw2,$rw3){
                var ctx = document.getElementById('AnalisisRW6');
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: ['Pasti', 'Ragu', 'Tidak'],
                        datasets: [{
                            label: 'Analisis RW 6',
                            data: [$rw1,$rw2,$rw3],
                            backgroundColor: [
                                'rgba(85, 250, 25, 1)',
                                'rgba(255, 221, 0, 1)',
                                'rgba(208, 22, 22, 1)'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

            function ChartAnalisisRW7($rw1,$rw2,$rw3){
                var ctx = document.getElementById('AnalisisRW7');
                var myChart = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: ['Pasti', 'Ragu', 'Tidak'],
                        datasets: [{
                            label: 'Analisis RW 7',
                            data: [$rw1,$rw2,$rw3],
                            backgroundColor: [
                                'rgba(85, 250, 25, 1)',
                                'rgba(255, 221, 0, 1)',
                                'rgba(208, 22, 22, 1)'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

            

            function ChartPerWilayah($rw1,$rw2,$rw3,$rw4,$rw5,$rw6,$rw7){
                var ctx = document.getElementById('ChartPerWilayah');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['RW 1', 'RW 2', 'RW 3', 'RW 4', 'RW 5', 'RW 6', 'RW 7'],
                        datasets: [{
                            label: 'Jumlah Pemilih Per RW',
                            data: [$rw1,$rw2,$rw3,$rw4,$rw5,$rw6,$rw7],
                            backgroundColor: [
                                'rgba(85, 250, 25, 1)',
                                'rgba(255, 221, 0, 1)',
                                'rgba(208, 22, 22, 1)',
                                'rgba(136, 142, 133, 1)',
                                'rgba(47, 177, 228, 1)',
                                'rgba(136, 142, 133, 1)',
                                'rgba(47, 177, 228, 1)'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

            function chart($pasti_memilih, $ragu_memilih, $tidak_memilih, $jumlah_belum_vote, $jumlah_pemilih){
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Pasti', 'Ragu', 'Tidak', 'Belum dipetakan', 'Jumlah Pemilih'],
                        datasets: [{
                            label: 'Grafik Pemetaan pemilih',
                            data: [$pasti_memilih, $ragu_memilih, $tidak_memilih, $jumlah_belum_vote, $jumlah_pemilih],
                            backgroundColor: [
                                'rgba(85, 250, 25, 1)',
                                'rgba(255, 221, 0, 1)',
                                'rgba(208, 22, 22, 1)',
                                'rgba(136, 142, 133, 1)',
                                'rgba(47, 177, 228, 1)'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }

        });
    </script>

@endsection