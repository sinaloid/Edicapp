<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work', 11],
            ['Eat', 2],
            ['Commute', 2],
            ['Watch TV', 2],
            ['Sleep', 7]
        ]);

        var options = {
            title: 'My Daily Activities',
            pinHole: 0.4
        };

        var chart_area = document.getElementById('piechart');
        var chart = new google.visualization.PieChart(chart_area);

        google.visualization.events.addListener(chart, 'ready', function() {
            //console.log(chart.getImageURI() )
            chart_area.innerHTML = '<img src="' + chart.getImageURI() + '"class="img-responsive">';
        })

        chart.draw(data, options);
    }
    </script>
</head>

<body style="width: 2640px; hight:2481px">
    <br> <br>
    <div class="container1" id="testing">
        <h3 class="text-center">Export Google Chart to PDF using PHP with DomPDF</h3>
        <br>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Export Google chart to PDF using PHP with DomPDF</h3>
            </div>
            <div class="panel-body">
                <div id="piechart" style="width: 900px; height: 500px;"></div>
            </div>
        </div>
        <br>
        <div class="justify-content-center">
            <form id="make_pdf" action="{{ route('make_pdf') }}" method="post">
                @csrf
                <input type="hidden" name="hidden_html" id="hidden_html" />
                <button type="button" name="create_pdf" id="create_pdf" class="btn btn-danger btn-xs">Make PDF</button>
            </form>
        </div>

    </div>
</body>

</html>

<script>
$(document).ready(function() {
    $('#create_pdf').click(function() {
        $('#hidden_html').val($('#testing').html());
        $('#make_pdf').submit();
    });
})
</script>