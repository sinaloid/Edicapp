  <script src="../js/edicappresize.js"></script>
   
  <script   src="https://www.gstatic.com/charts/loader.js"></script>
  <script  >
  //pcd, recettes
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Reformer les int..", 8.94, "#b87333"],
        ["Développer le ...", 10.49, "silver"],
        ["Dynamiser les sect...", 19.30, "gold"]
        /*["Platinum", 21.45, "color: #e5e4e2"]*/
      ]);

      var data1 = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["2018", 325604058, "red"],
        ["2019", 351253673, "red"],
        ["2020", 241871659, "red"]
        /*["Platinum", 21.45, "color: #e5e4e2"]*/
      ]);

      var data2 = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["2018", 375625002, "red"],
        ["2019", 382757761, "red"],
        ["2020", 319536778, "red"]
        /*["Platinum", 21.45, "color: #e5e4e2"]*/
      ]);

      var view = new google.visualization.DataView(data);
      var view1 = new google.visualization.DataView(data1);
      var view2 = new google.visualization.DataView(data2);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      view1.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      view2.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "",
       /* width: 320,
        height: 220,*/
        bar: {groupWidth: "90%"},
        legend: { position: "true" },
        chartArea:{top:20,width:'100%',height:'75%'}
      };

      var options1 = {
        title: "",
        /*width: 320,
        height: 220,*/
        bar: {groupWidth: "90%"},
        legend: { position: "true" },
        chartArea:{top:20,width:'100%',height:'75%'}
      };

      var options2 = {
        title: "",
        /*width: 320,
        height: 220,*/
        bar: {groupWidth: "90%"},
        legend: { position: "true" },
        chartArea:{top:20,width:'100%',height:'75%'}
        
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      var chart1 = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
      var chart2 = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
      chart.draw(view, options);
      chart1.draw(view1, options1);
      chart2.draw(view2, options2);

      $(window).smartresize(function () {
      chart.draw(view, options);
      chart1.draw(view1, options1);
      chart2.draw(view2, options2);});
  }
  </script>

  
    <script  >
    // recettes fonctionnement
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ['Assamese', 13], ['Bengali', 83], ['Bodo', 1.4],
          ['Dogri', 2.3], ['Gujarati', 46], ['Hindi', 300],
          ['Kannada', 38], ['Kashmiri', 5.5]/*, ['Konkani', 5],
          ['Maithili', 20], ['Malayalam', 33], ['Manipuri', 1.5],
          ['Marathi', 72], ['Nepali', 2.9], ['Oriya', 33],
          ['Punjabi', 29], ['Sanskrit', 0.01], ['Santhali', 6.5],
          ['Sindhi', 2.5], ['Tamil', 61], ['Telugu', 74], ['Urdu', 52]*/
        ]);

        var data1 = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ['Assamese', 13], ['Bengali', 83], ['Bodo', 300],
          ['Dogri', 2.3], ['Gujarati', 46], ['Hindi', 20.0],
          ['Kannada', 38], ['Kashmiri', 5.5]/*, ['Konkani', 5],
          ['Maithili', 20], ['Malayalam', 33], ['Manipuri', 1.5],
          ['Marathi', 72], ['Nepali', 2.9], ['Oriya', 33],
          ['Punjabi', 29], ['Sanskrit', 0.01], ['Santhali', 6.5],
          ['Sindhi', 2.5], ['Tamil', 61], ['Telugu', 74], ['Urdu', 52]*/
        ]);

        var options = {
          title: '',
          legend: 'true',
          legend: {position:'top'},
          pieSliceText: 'label',
          slices: {  4: {offset: 0.2},
                    12: {offset: 0.3},
                    14: {offset: 0.4},
                    15: {offset: 0.5},
          },
          is3D: 'true',
          chartArea:{top:20,width:'100%',height:'100%'},
         /* width: 320,
          height: 200,*/
        };

        var options1 = {
          title: '',
          legend: 'true',
          legend: {position:'top'},
          pieSliceText: 'label',
          slices: {  4: {offset: 0.2},
                    12: {offset: 0.3},
                    14: {offset: 0.4},
                    15: {offset: 0.5},
          }, 
          is3D: 'true',
          chartArea:{top:20,width:'100%',height:'100%'}, 
          /*width: 320,
          height: 200,*/
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
        chart1.draw(data1, options1);

        $(window).smartresize(function () {
          chart.draw(data, options);
          chart1.draw(data1, options1);});
      }
    </script>
   
      