<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edic - Actualités</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset(css / styles . css) }}" />

    <script src="https://kit.fontawesome.com/8b7c4e5629.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Task", "Hours per Day"],
                ["Work", 11],
                ["Eat", 2],
                ["Commute", 2],
                ["Watch TV", 2],
                ["Sleep", 7],
            ]);

            var options = {
                //title: '{{ isset($troisMeilleur)
                    ? $troisMeilleur[2]->marche
                    : '
                        //' }}',
                legend: "top",
                pieSliceText: "label",
                pieStartAngle: 100,
                is3D: true,
                chartArea: {
                    //left: 20,
                    top: 20,
                    width: "100%",
                    height: "100%",
                },
            };

            var chart = new google.visualization.PieChart(
                document.getElementById("piechart")
            );
            var chart1 = new google.visualization.PieChart(
                document.getElementById("piechart1")
            );
            var chart2 = new google.visualization.PieChart(
                document.getElementById("piechart2")
            );

            chart.draw(data, options);
            chart1.draw(data, options);
            chart2.draw(data, options);
        }
    </script>
</head>

<body>
    @include("header")
    <div id="app" class="container sin-m-t pb-0">
        @yield('content')
    </div>
    @include("footer")
    @livewireScripts
</body>

</html>
