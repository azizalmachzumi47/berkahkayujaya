<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3 class="text-center"><?= $title; ?></h3>

                <div class="ecommerce-widget">

                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Pesanan Masuk</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?= $total_pesanan ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Kayu</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?= $total_kayu ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-muted">Total Kegiatan</h5>
                                    <div class="metric-value d-inline-block">
                                        <h1 class="mb-1"><?= $total_kegiatan ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div style="width: 50%; margin: auto;">
            <h5 class="text-muted">Grafik Pesanan</h5>
            <canvas id="chartPesananKayu"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
        // Array warna untuk membedakan setiap id_kayu
        const colors = [
            'rgba(255, 99, 132, 1)', // Merah muda
            'rgba(54, 162, 235, 1)', // Biru
            'rgba(255, 206, 86, 1)', // Kuning
            'rgba(75, 192, 192, 1)', // Hijau
            'rgba(153, 102, 255, 1)', // Ungu
            'rgba(255, 159, 64, 1)', // Oranye
            'rgba(199, 199, 199, 1)' // Abu-abu
        ];

        // Data dari PHP
        const labels = [
            <?php foreach ($pesanan_by_kayu as $data) {
            echo '"' . $data->jenis_kayu . '", ';
        } ?>
        ];

        const dataValues = [
            <?php foreach ($pesanan_by_kayu as $data) {
            echo $data->jumlah . ', ';
        } ?>
        ];

        const backgroundColors = labels.map((_, index) => colors[index % colors.length]);

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('chartPesananKayu').getContext('2d');
            const chartPesananKayu = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Jumlah Pesanan',
                        data: dataValues,
                        backgroundColor: backgroundColors,
                        borderWidth: 0 // Menghilangkan garis tepi
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false // Sembunyikan label legend
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Jenis Kayu'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Jumlah Pesanan'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        });
        </script>