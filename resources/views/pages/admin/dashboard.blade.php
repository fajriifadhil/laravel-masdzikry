@extends('layouts.admin')

@section('content')
<h1 class="h-section mb-14">Dashboard</h1>

<div class="grid grid-flow-row sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
    <a href="{{ route('sales.index') }}" class="bg-white border rounded-xl p-6 flex gap-3 items-center hover:bg-white/50">
        <div class="bg-blue-500 p-4 text-white rounded-lg">
            <i class="ri-shopping-cart-2-fill text-2xl"></i>
        </div>
        <div>
            <h3 class="font-semibold text-lg">Penjualan</h3>
            <p class="text-gray-500 font-medium">Rp {{ number_format($total_sales, 0, '', '.') }}</p>
        </div>
    </a>
    <a href="{{ route('users.index') }}" class="bg-white border rounded-xl p-6 flex gap-3 items-center hover:bg-white/50">
        <div class="bg-blue-500 p-4 text-white rounded-lg">
            <i class="ri-user-fill text-2xl"></i>
        </div>
        <div>
            <h3 class="font-semibold text-lg">Pelanggan</h3>
            <p class="text-gray-500 font-medium">{{ $total_users }}</p>
        </div>
    </a>
    <div class="bg-white border rounded-xl p-6 flex gap-3 items-center hover:bg-white/50">
        <div class="bg-blue-500 w-16 h-16 text-white rounded-full grid place-content-center">
            <i class="ri-user-fill text-4xl"></i>
        </div>
        <div>
            <h3 class="font-semibold text-lg">{{ session('user_name') }}</h3>
            <p class="text-gray-500 font-medium">{{ session('user_admin') }}</p>
        </div>
    </div>
</div>

<div class="mt-8 flex flex-wrap gap-5">
    <div class="bg-white rounded-xl border p-6 flex-grow">
        <h2 class="font-semibold text-2xl">Statistik Transaksi</h2>
        <div id="monthly-statistic" class="w-full mt-10"></div>
    </div>
    <div class="bg-white rounded-xl border p-6 flex-grow">
        <h2 class="font-semibold text-2xl">Penjualan</h2>
        <div id="sales-statistic" class="mt-10 mx-auto w-fit"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        series: [{
            data: [<?php for ($i = 1; $i <= 12; $i++) : ?> <?= isset($monthly_ts[$i]) ? $monthly_ts[$i] : 0 ?><?= $i < 12 ? "," : "" ?> <?php endfor ?>]
        }],
        chart: {
            height: 450,
            type: 'bar',
            events: {
                click: function(chart, w, e) {
                    // console.log(chart, w, e)
                }
            }
        },
        plotOptions: {
            bar: {
                distributed: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        legend: {
            show: false
        },
        xaxis: {
            categories: [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ],
            labels: {
                style: {
                    fontSize: '12px'
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#monthly-statistic"), options);
    chart.render();

    var options = {
        series: [<?= $total_pending_ts ?>, <?= $total_success_ts ?>],
        chart: {
            width: 400,
            type: 'pie',
        },
        dataLabels: {
            enabled: false
        },
        labels: ['Penjualan Berhasil', 'Menunggu Pembayaran'],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#sales-statistic"), options);
    chart.render();
</script>
@endsection