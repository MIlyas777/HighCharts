<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width, initial-scale-1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="
    stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x
    " crossorigin="anonymous">
    <title>hello world</title>
</head>

<body>
    <h1>Hello,world</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" rel="stylesheet" integrity="sha384-gtEjrD/seCtmISkJkNUaaKMoLD0//ElJl9smozuHV6z3Iehds+3Ulb98n9plx0x4" crossorigin="anonymous"></script>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class='navbar-nav'>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Client Side</a>
                        </li>

                        <li class="nav-item">
                            <a href class="nav link" href="kekeruhan.php">curah hujan</a>
                        </li>
                        <li class="nav-item">
                            <a href class="nav link" href="kekeruhan.php">Kekeruhan air</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            <div class="container-fluid mt-3">
                <?php
                include 'koneksi.php';
                $tma = mysqli_query($koneksi, "select * from tma");
                $data = array();
                while ($row = mysqli_fetch_array($tma)) {
                    array_push($data, "['" . $row['waktu'] . "'," . $row['nilai'] . "]");
                }
                ?>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-sm-9">
                    <div class="card">
                        <div class="card body">
                            <h5 class="card-title">Grafik Tinggi Permukaan Airr</h5>
                            <hr>
                            <div id="grafik"></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </main>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
        <script type="text/javascript">
            Highcharts.chart('grafik', {
                title: {
                    text: 'Tinggi Muka Air'
                },
                subtitle: {
                    text: 'Latihan Highcharts'
                },
                yAxis: {
                    title: {
                        text: 'Nilai Ketinggian'
                    }
                },
                xAxis: {
                    type: 'category',
                    accessibility: {
                        rangeDescription: 'Waktu'
                    }
                },
                tooltip: {
                    pointFormat: '{point.y} Meter'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle'
                },
                plotOptions: {
                    series: {
                        label: {
                            connectorAllowed: false
                        }
                    }
                },
                series: [{
                    name: 'Tinggi Muka Air',
                    lineWidth: 2,
                    data: [<?= join(',', $data) ?>]
                }],
                responsive: {
                    rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                layout: 'horizontal',
                                align: 'center',
                                verticalAlign: 'bottom'
                            }
                        }
                    }]
                }
            });
        </script>
</body>

</html>