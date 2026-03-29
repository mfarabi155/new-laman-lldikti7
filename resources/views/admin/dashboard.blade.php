@extends('admin.layouts.master')

@section('title', 'Dashboard Utama')

@section('content')

    {{-- 4 KARTU STATISTIK ATAS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-6">

        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wide mb-1">Total Peraturan</p>
                    <h3 class="text-2xl font-bold text-argon-dark">{{ number_format($totalPeraturan, 0, ',', '.') }} Data
                    </h3>
                </div>
                <div
                    class="w-12 h-12 rounded-full bg-gradient-to-br from-red-400 to-red-600 flex items-center justify-center text-white shadow-md">
                    <i class="fas fa-gavel text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wide mb-1">Pengunjung Web</p>
                    <h3 class="text-2xl font-bold text-argon-dark">{{ number_format($totalPengunjung, 0, ',', '.') }}</h3>
                </div>
                <div
                    class="w-12 h-12 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-white shadow-md">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wide mb-1">Dokumen Kinerja</p>
                    <h3 class="text-2xl font-bold text-argon-dark">{{ number_format($totalKinerja, 0, ',', '.') }}</h3>
                </div>
                <div
                    class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-white shadow-md">
                    <i class="fas fa-chart-bar text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl p-5 shadow-sm border border-slate-100 flex flex-col">
            <div class="flex justify-between items-start mb-2">
                <div>
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wide mb-1">Indeks Kepuasan</p>
                    <h3 class="text-2xl font-bold text-argon-dark">{{ $avgIkmKeseluruhan }}%</h3>
                </div>
                <div
                    class="w-12 h-12 rounded-full bg-gradient-to-br from-cyan-400 to-cyan-600 flex items-center justify-center text-white shadow-md">
                    <i class="fas fa-chart-pie text-xl"></i>
                </div>
            </div>

            {{-- Logika Penentuan Kategori IKM --}}
            @php
                if ($avgIkmKeseluruhan >= 81.26) {
                    $labelIkm = 'Sangat Baik';
                    $colorIkm = 'text-emerald-500';
                    $iconIkm = 'fa-smile-beam';
                } elseif ($avgIkmKeseluruhan >= 62.51) {
                    $labelIkm = 'Baik';
                    $colorIkm = 'text-blue-500';
                    $iconIkm = 'fa-smile';
                } elseif ($avgIkmKeseluruhan >= 43.76) {
                    $labelIkm = 'Kurang Baik';
                    $colorIkm = 'text-orange-500';
                    $iconIkm = 'fa-meh';
                } else {
                    $labelIkm = 'Tidak Baik';
                    $colorIkm = 'text-red-500';
                    $iconIkm = 'fa-frown';
                }
            @endphp

            <p class="text-sm mt-auto pt-4 border-t border-slate-50">
                <span class="{{ $colorIkm }} font-bold flex items-center gap-1.5">
                    <i class="fas {{ $iconIkm }}"></i> Mutu Pelayanan {{ $labelIkm }}
                </span>
            </p>
        </div>
    </div>

    {{-- BAGIAN VISUALISASI IKM --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Kiri: Grafik Chart.js --}}
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex flex-col">
            <div class="flex justify-between items-center mb-6 border-b border-slate-100 pb-4">
                <div>
                    <h2 class="text-lg font-bold text-argon-dark">Tren Nilai IKM (Tahun {{ $tahunIni }})</h2>
                    <p class="text-xs text-slate-400 mt-1">Pergerakan nilai rata-rata Survei IKM per bulan</p>
                </div>
            </div>

            {{-- Wrapper Canvas Chart --}}
            <div class="relative w-full flex-grow" style="min-h: 300px;">
                <canvas id="ikmChart"></canvas>
            </div>
        </div>

        {{-- Kanan: Ringkasan Kepuasan Responden --}}
        <div class="bg-white rounded-xl shadow-sm border border-slate-100 p-6 flex flex-col">
            <div class="border-b border-slate-100 mb-6 pb-4">
                <h2 class="text-lg font-bold text-argon-dark">Distribusi Kepuasan</h2>
                <p class="text-xs text-slate-400 mt-1">Berdasarkan rata-rata seluruh data responden</p>
            </div>

            <div class="flex-grow flex flex-col justify-center gap-6">

                {{-- Sangat Puas --}}
                <div class="flex items-center justify-between group">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-500 flex items-center justify-center transition-transform group-hover:scale-110">
                            <i class="fas fa-smile-beam text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-700">Sangat Puas</h4>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-emerald-500">{{ $pctSangatPuas }}%</span>
                </div>

                {{-- Puas --}}
                <div class="flex items-center justify-between group">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-blue-100 text-blue-500 flex items-center justify-center transition-transform group-hover:scale-110">
                            <i class="fas fa-smile text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-700">Puas</h4>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-blue-500">{{ $pctPuas }}%</span>
                </div>

                {{-- Kurang Puas --}}
                <div class="flex items-center justify-between group">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-orange-100 text-orange-500 flex items-center justify-center transition-transform group-hover:scale-110">
                            <i class="fas fa-meh text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-700">Kurang Puas</h4>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-orange-500">{{ $pctKurangPuas }}%</span>
                </div>

                {{-- Tidak Puas --}}
                <div class="flex items-center justify-between group">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 rounded-full bg-red-100 text-red-500 flex items-center justify-center transition-transform group-hover:scale-110">
                            <i class="fas fa-frown text-xl"></i>
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-700">Tidak Puas</h4>
                        </div>
                    </div>
                    <span class="text-lg font-bold text-red-500">{{ $pctTidakPuas }}%</span>
                </div>

            </div>

            {{-- Total Responden Box --}}
            <div class="mt-6 pt-5 border-t border-slate-100">
                <div class="bg-slate-50 rounded-xl p-4 text-center border border-slate-200 shadow-inner">
                    <p class="text-xs text-slate-500 uppercase font-bold tracking-wider mb-1">Total Responden</p>
                    <h3 class="text-3xl font-extrabold text-argon-blue">{{ number_format($totalResponden, 0, ',', '.') }}
                        <span class="text-sm font-medium text-slate-400">Orang</span></h3>
                </div>
            </div>
        </div>

    </div>

    {{-- SCRIPT UNTUK CHART.JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('ikmChart').getContext('2d');

            const gradientBlue = ctx.createLinearGradient(0, 0, 0, 400);
            gradientBlue.addColorStop(0, 'rgba(94, 114, 228, 0.8)');
            gradientBlue.addColorStop(1, 'rgba(94, 114, 228, 0.2)');

            // Ambil data dinamis dari Controller yang sudah di-encode ke JSON
            const chartLabels = {!! json_encode($grafikBulan) !!};
            const chartData = {!! json_encode($grafikNilai) !!};

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Nilai Rata-rata IKM',
                        data: chartData,
                        backgroundColor: gradientBlue,
                        borderColor: '#5e72e4',
                        borderWidth: 1,
                        borderRadius: 6,
                        barPercentage: 0.6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#1e293b',
                            padding: 12,
                            titleFont: {
                                size: 14
                            },
                            bodyFont: {
                                size: 14,
                                weight: 'bold'
                            },
                            callbacks: {
                                label: function(context) {
                                    return ' Nilai: ' + context.parsed.y + '%';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            min: 0,
                            max: 100,
                            grid: {
                                borderDash: [4, 4],
                                color: '#f1f5f9',
                                drawBorder: false
                            },
                            ticks: {
                                color: '#94a3b8',
                                font: {
                                    size: 11
                                }
                            }
                        },
                        x: {
                            grid: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                color: '#94a3b8',
                                font: {
                                    size: 12,
                                    weight: '500'
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
