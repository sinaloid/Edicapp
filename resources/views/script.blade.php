  <script src="../js/edicappresize.js"></script>
   
  <script   src="https://www.gstatic.com/charts/loader.js"></script>
  <script  >
  //pcd, recettes
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Reformer les institutions et moderniser l'administration",
        @php
        if($dataCommune != null){
          if($dataCommune['satisfaction']->reforme_tres_satisfaisant != null){
             echo $dataCommune['satisfaction']->reforme_tres_satisfaisant;
          } 
          elseif($dataCommune['satisfaction']->reforme_satisfaisant != null){
            echo $dataCommune['satisfaction']->reforme_satisfaisant;
          }
          elseif($dataCommune['satisfaction']->reforme_pas_satisfaisant != null){
            echo $dataCommune['satisfaction']->reforme_pas_satisfaisant;
          }else{
            echo 0;
          }
        }
        @endphp, "#b87333"],
        ["Développer le capital humain",
        @php
        if($dataCommune != null){
          if($dataCommune['satisfaction']->developper_tres_satisfaisant != null){
             echo $dataCommune['satisfaction']->developper_tres_satisfaisant;
          } 
          elseif($dataCommune['satisfaction']->developper_satisfaisant != null){
            echo $dataCommune['satisfaction']->developper_satisfaisant;
          }
          elseif($dataCommune['satisfaction']->developper_pas_satisfaisant != null){
            echo $dataCommune['satisfaction']->developper_pas_satisfaisant;
          }else{
            echo 0;
          }
        }
        @endphp
        , "silver"],
        ["Dynamiser les secteurs porteurs pour l'économie et les emplois",
        @php
        if($dataCommune != null){
          if($dataCommune['satisfaction']->dynamiser_tres_satisfaisant != null){
             echo $dataCommune['satisfaction']->dynamiser_tres_satisfaisant;
          } 
          elseif($dataCommune['satisfaction']->dynamiser_satisfaisant != null){
            echo $dataCommune['satisfaction']->dynamiser_satisfaisant;
          }
          elseif($dataCommune['satisfaction']->dynamiser_pas_satisfaisant != null){
            echo $dataCommune['satisfaction']->dynamiser_pas_satisfaisant;
          }else{
            echo 0;
          }
        }
        @endphp
        , "gold"]
        /*["Platinum", 21.45, "color: #e5e4e2"]*/
      ]);

      var data1 = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["{{ isset($dataCommune) ? $dataCommune['recette'][0]->annee : '' }}", {{ isset($dataCommune) ? $dataCommune['recette'][0]->fonctionnement + $dataCommune['recette'][0]->investissement : '' }}, "red"],
        ["{{ isset($dataCommune) ? $dataCommune['recette'][1]->annee : '' }}", {{ isset($dataCommune) ? $dataCommune['recette'][1]->fonctionnement + $dataCommune['recette'][1]->investissement : '' }}, "red"],
        ["{{ isset($dataCommune) ? $dataCommune['recette'][2]->annee : '' }}", {{ isset($dataCommune) ? $dataCommune['recette'][2]->fonctionnement + $dataCommune['recette'][2]->investissement : '' }}, "red"]
        /*["Platinum", 21.45, "color: #e5e4e2"]*/
      ]);

      var data2 = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["{{ isset($dataCommune) ? $dataCommune['depense'][0]->annee : '' }}", {{ isset($dataCommune) ? $dataCommune['depense'][0]->fonctionnement + $dataCommune['depense'][0]->investissement : '' }}, "silver"],
        ["{{ isset($dataCommune) ? $dataCommune['depense'][1]->annee : '' }}", {{ isset($dataCommune) ? $dataCommune['depense'][1]->fonctionnement + $dataCommune['depense'][1]->investissement : '' }}, "silver"],
        ["{{ isset($dataCommune) ? $dataCommune['depense'][2]->annee : '' }}", {{ isset($dataCommune) ? $dataCommune['depense'][2]->fonctionnement + $dataCommune['depense'][2]->investissement : '' }}, "silver"]
        /*["Platinum", 21.45, "color: #e5e4e2"]*/
        /*["Platinum", 21.45, "color: #e5e4e2"]*/
      ]);

      var data3 = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["Résultat d'investissement", {{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_globale
                + $dataCommune['recetInvest']->subvention_equipement
                + $dataCommune['recetInvest']->contribution_propre
                + $dataCommune['recetInvest']->dotation_liee
                + $dataCommune['recetInvest']->resultat_exercice 
                - ($dataCommune['depensInvest']->etude_recherche
                + $dataCommune['depensInvest']->environnement
                + $dataCommune['depensInvest']->equipement
                + $dataCommune['depensInvest']->batiment
                + $dataCommune['depensInvest']->emprunt
                + $dataCommune['depensInvest']->autre_investissement
                + $dataCommune['depensInvest']->deficit_excedent) : '' }}, "green"],
        ["Résultat de fonctionnement", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exploitation
                + $dataCommune['recetFonct']->produit_domaniaux
                + $dataCommune['recetFonct']->produit_financier
                + $dataCommune['recetFonct']->recouvrement
                + $dataCommune['recetFonct']->produit_diver 
                + $dataCommune['recetFonct']->impots_taxe_c_direct
                + $dataCommune['recetFonct']->impots_taxe_indirect
                + $dataCommune['recetFonct']->produit_exceptionnel
                + $dataCommune['recetFonct']->produit_anterieur
                - ($dataCommune['depensFonct']->sante
                + $dataCommune['depensFonct']->appui_scolaire
                + $dataCommune['depensFonct']->sport_culture
                + $dataCommune['depensFonct']->participation
                + $dataCommune['depensFonct']->frais_financier
                + $dataCommune['depensFonct']->refection_entretien
                + $dataCommune['depensFonct']->salaire_indemnite
                + $dataCommune['depensFonct']->entretien_vehicule
                + $dataCommune['depensFonct']->appui_fonctionnement
                + $dataCommune['depensFonct']->exedent_prelevement) : '' }}, "#b87333"],
        ["Résultat global {{ isset($dataCommune) ? $dataCommune['annee'] : '' }}", {{ isset($dataCommune) ? 
                ($dataCommune['recetInvest']->dotation_globale
                + $dataCommune['recetInvest']->subvention_equipement
                + $dataCommune['recetInvest']->contribution_propre
                + $dataCommune['recetInvest']->dotation_liee
                + $dataCommune['recetInvest']->resultat_exercice 
                - ($dataCommune['depensInvest']->etude_recherche
                + $dataCommune['depensInvest']->environnement
                + $dataCommune['depensInvest']->equipement
                + $dataCommune['depensInvest']->batiment
                + $dataCommune['depensInvest']->emprunt
                + $dataCommune['depensInvest']->autre_investissement
                + $dataCommune['depensInvest']->deficit_excedent))
                + ($dataCommune['recetFonct']->produit_exploitation
                + $dataCommune['recetFonct']->produit_domaniaux
                + $dataCommune['recetFonct']->produit_financier
                + $dataCommune['recetFonct']->recouvrement
                + $dataCommune['recetFonct']->produit_diver 
                + $dataCommune['recetFonct']->impots_taxe_c_direct
                + $dataCommune['recetFonct']->impots_taxe_indirect
                + $dataCommune['recetFonct']->produit_exceptionnel
                + $dataCommune['recetFonct']->produit_anterieur
                - ($dataCommune['depensFonct']->sante
                + $dataCommune['depensFonct']->appui_scolaire
                + $dataCommune['depensFonct']->sport_culture
                + $dataCommune['depensFonct']->participation
                + $dataCommune['depensFonct']->frais_financier
                + $dataCommune['depensFonct']->refection_entretien
                + $dataCommune['depensFonct']->salaire_indemnite
                + $dataCommune['depensFonct']->entretien_vehicule
                + $dataCommune['depensFonct']->appui_fonctionnement
                + $dataCommune['depensFonct']->exedent_prelevement)) : '' }}, "red"]
        /*["Platinum", 21.45, "color: #e5e4e2"]*/
        /*["Platinum", 21.45, "color: #e5e4e2"]*/
      ]);

      var view = new google.visualization.DataView(data);
      var view1 = new google.visualization.DataView(data1);
      var view2 = new google.visualization.DataView(data2);
      var view3 = new google.visualization.DataView(data3);
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
    view3.setColumns([0, 1,
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
        legend: { position: "false" },
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
      var chart3 = new google.visualization.ColumnChart(document.getElementById("columnchart_values3"));
      
      /*image*/
      google.visualization.events.addListener(chart, 'ready', function() {
        document.getElementById("hidden_pcd").value = ""+chart.getImageURI();
        })
      google.visualization.events.addListener(chart1, 'ready', function() {
        document.getElementById("hidden_recette").value = ""+chart1.getImageURI();
        })
      google.visualization.events.addListener(chart2, 'ready', function() {
        document.getElementById("hidden_depense").value = ""+chart2.getImageURI();
        })
      google.visualization.events.addListener(chart3, 'ready', function() {
        document.getElementById("hidden_resultat").value = ""+chart3.getImageURI();
        })
      
      
      
      

      var hidden_bg_recett_fcnt = document.getElementById('hidden_bg_recett_fcnt');
      var hidden_bg_depens_fnct = document.getElementById('hidden_bg_depens_fnct');
      var hidden_bg_recett_invest = document.getElementById('hidden_bg_recett_invest');
      var hidden_bg_depens_invest = document.getElementById('hidden_bg_depens_invest');

      chart.draw(view, options1);
      chart1.draw(view1, options1);
      chart2.draw(view2, options2);
      chart3.draw(view3, options2);

      $(window).smartresize(function () {
      chart.draw(view, options);
      chart1.draw(view1, options1);
      chart2.draw(view2, options2);});
      chart3.draw(view3, options2);
  }
  </script>

  
    <script  >
    // recettes fonctionnement
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ["Produits de l’exploitation", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exploitation : '' }} ],
          ["Produits domaniaux", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_domaniaux : '' }} ],
          ["Produits financiers", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_financier : '' }} ],
          ["Recouvrements et participations", {{ isset($dataCommune) ? $dataCommune['recetFonct']->recouvrement : '' }} ],
          ["Produits divers", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_diver : '' }} ],
          ["Impots taxes et contributions directes", {{ isset($dataCommune) ? $dataCommune['recetFonct']->impots_taxe_c_direct : '' }} ],
          ["Impots et taxes indirects", {{ isset($dataCommune) ? $dataCommune['recetFonct']->impots_taxe_indirect : '' }} ],
          ["Produits exceptionnels", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exceptionnel : '' }} ],
          ["Produits antérieurs", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_anterieur : '' }} ],
          //["Autres dotations de transfert", {{ isset($dataCommune) ? $dataCommune['recetFonct']->autres_dotations : '' }} ],
        ]);

        var dataDepenseFonct = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ["Etudes & Recherche", {{ isset($dataCommune) ? $dataCommune['depensInvest']->etude_recherche : '' }} ],
          ["Environnement", {{ isset($dataCommune) ? $dataCommune['depensInvest']->environnement : '' }} ],
          ["Equipement", {{ isset($dataCommune) ? $dataCommune['depensInvest']->equipement : '' }} ],
          ["Batiment", {{ isset($dataCommune) ? $dataCommune['depensInvest']->batiment : '' }} ],
          ["Emprunt", {{ isset($dataCommune) ? $dataCommune['depensInvest']->emprunt : '' }} ],
          ["Autres investissements", {{ isset($dataCommune) ? $dataCommune['depensInvest']->autre_investissement : '' }} ],
          ["Déficit / Excédent d'investissement exer anté", {{ isset($dataCommune) ? $dataCommune['depensInvest']->deficit_excedent : '' }} ],


          /*['Assamese', 13], ['Bengali', 83], ['Bodo', 300],
          ['Dogri', 2.3], ['Gujarati', 46], ['Hindi', 20.0],
          ['Kannada', 38], ['Kashmiri', 5.5]/*, ['Konkani', 5],
          ['Maithili', 20], ['Malayalam', 33], ['Manipuri', 1.5],
          ['Marathi', 72], ['Nepali', 2.9], ['Oriya', 33],
          ['Punjabi', 29], ['Sanskrit', 0.01], ['Santhali', 6.5],
          ['Sindhi', 2.5], ['Tamil', 61], ['Telugu', 74], ['Urdu', 52]*/
        ]);

        var dataRecetteInvest = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ["Dotation globale", {{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_globale : '' }}], 
          ["Subvention d'équipement", {{ isset($dataCommune) ? $dataCommune['recetInvest']->subvention_equipement : '' }}], 
          ["Contribution propre/Reserves", {{ isset($dataCommune) ? $dataCommune['recetInvest']->contribution_propre : '' }}], 
          ["Dotation liée aux compétences transférées", {{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_liee : '' }}],
          ["Résultats exercices ant. Excédent/déficit Inv Rep", {{ isset($dataCommune) ? $dataCommune['recetInvest']->resultat_exercice : '' }}],
          /*["Autres subventions d'équipement", {{ isset($dataCommune) ? $dataCommune['recetInvest']->autre_subvention   : '' }}], 
          */
        ]);

        var dataDepenseInvest = google.visualization.arrayToDataTable([
          ['Language', 'Speakers (in millions)'],
          ['Produits de l’exploitation', {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exploitation : 0 }}],
          ["Produits domaniaux", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_domaniaux : 0 }} ],
          ["Produits financiers", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_financier : 0 }} ],
          ["Recouvrements et participations", {{ isset($dataCommune) ? $dataCommune['recetFonct']->recouvrement : 0 }} ],
          ["Produits divers", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_diver : '' }} ],
          ["Impots taxes et contributions directes", {{ isset($dataCommune) ? $dataCommune['recetFonct']->impots_taxe_c_direct : 0 }} ],
          ["Impots et taxes indirects", {{ isset($dataCommune) ? $dataCommune['recetFonct']->impots_taxe_indirect : 0 }} ],
          ["Produits exceptionnels", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exceptionnel : 0 }} ],
          ["Produits antérieurs", {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_anterieur : 0 }} ],
          /*["Autres dotations de transfert", {{ isset($dataCommune) ? $dataCommune['recetFonct']->autres_dotations : '' }} ],*/
        ]);

        var options = {
          title: '',
          legend: 'true',
          legend: {position:'right'},
          //pieSliceText: 'label',
          slices: {  1: {offset: 0.2},
                    2: {offset: 0.2},
                    3: {offset: 0.2},
                    4: {offset: 0.2},
                    5: {offset: 0.2},
                    6: {offset: 0.2},
                    7: {offset: 0.2},
                    8: {offset: 0.2},
                    9: {offset: 0.2},
          },
          is3D: 'true',
          chartArea:{top:1,width:'85%',height:'100%'},
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
        var chartRecetteInvest = new google.visualization.PieChart(document.getElementById('piechart2'));
        var chartDepenseInvest = new google.visualization.PieChart(document.getElementById('piechart3'));

        google.visualization.events.addListener(chart, 'ready', function() {
          document.getElementById("hidden_bg_recett_fcnt").value = ""+chart.getImageURI();
        })
        google.visualization.events.addListener(chart1, 'ready', function() {
          document.getElementById("hidden_bg_depens_fnct").value = ""+chart1.getImageURI();
        })
        google.visualization.events.addListener(chartRecetteInvest, 'ready', function() {
          document.getElementById("hidden_bg_recett_invest").value = ""+chartRecetteInvest.getImageURI();
        })
        google.visualization.events.addListener(chartDepenseInvest, 'ready', function() {
          document.getElementById("hidden_bg_depens_invest").value = ""+chartDepenseInvest.getImageURI();
        })
      
        chart.draw(data, options);
        chart1.draw(dataDepenseFonct, options);
        chartRecetteInvest.draw(dataRecetteInvest, options);
        chartDepenseInvest.draw(dataDepenseInvest, options);

        $(window).smartresize(function () {
          chart.draw(data, options);
          chart1.draw(dataDepenseFonct, options);});
          chartRecetteInvest.draw(dataRecetteInvest, options);
          chartDepenseInvest.draw(dataDepenseInvest, options);
      }
    </script>
   
      