<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>EDICApp - Données</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="{{ asset('/css/sin.css') }}" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
    @include("header")

    <div class="container sin-m-t bg-white myform">
            <!-- zone selectione -->
           <!-- <div class = "row" style="background : #111;">
                <div class = "col-sm-12">
                    <div class = " row">
                        <div class = "col-sm-3">
                            Burkina Faso
                        </div>
                    </div>
                    <div class = "row">
                        <div class = " col-sm-3">
                            Region
                        </div>
                        <div class = " col-sm-3">
                            Centre-Nord
                        </div>
                    </div>
                    <div class = "row">
                        <div class = " col-sm-3">
                            Province
                        </div>
                        <div class = " col-sm-3">
                            Sanmatenga
                        </div>
                    </div>
                    <div class = "row">
                        <div class = " col-sm-3">
                            Commune
                        </div>
                        <div class = " col-sm-3">
                            Korsimoro
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-sm-3">
                            compare
                        </div>
                        <div class = "col-sm-3">
                            exporter
                        </div>
                    </div>
                </div>
            </div> -->

            <!--zone data-->
            <!--<div class="row">
                !-- data compare option --
                <div class="col-sm-3" style="background : #444; height : 2000px;">
                    <div class = "row">
                        Autre Region
                    </div>
                </div>
                !-- data compare zone --
                <div class="col-sm-9" style="background : #555; height : 2000px;">
            
                </div>
            </div> -->
        <p>Page en cours de création. <br /> Ici on aura la possibilté de comparer les données (sous forme de tableau ou sous forme graphique) de 2 à 5 regions</p>
        
        <div>
            <canvas id="myChart"></canvas>
        </div>
    <script>
        const labels = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
];
const data = {
  labels: labels,
  datasets: [{
    label: 'My First dataset',
    backgroundColor: 'rgb(255, 99, 132)',
    borderColor: 'rgb(255, 99, 132)',
    data: [0, 10, 5, 2, 20, 30, 45],
  }]
};

const config = {
  type: 'line',
  data,
  options: {}
};

// === include 'setup' then 'config' above ===

var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
    </script>
    </div>

@include("footer")
    </body>
</html>