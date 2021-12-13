<script src="{{ asset('js/edicappresize.js') }}"></script>
  
<script src="https://www.gstatic.com/charts/loader.js"></script>
@if ( !str_contains(url()->current(), 'global'))
<script>
    //pcd, recettes
    google.charts.load("current", {
        packages: ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Density", {
                role: "style"
            }],
            ["Consolider la résilience, la sécurité, la cohésion sociale et la paix",
                @php
                if ($dataCommune != null) {
                    if ($dataCommune['satisfaction']->consolider_resilience_tres_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->consolider_resilience_tres_satisfaisant;
                    } elseif ($dataCommune['satisfaction']->consolider_resilience_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->consolider_resilience_satisfaisant;
                    } elseif ($dataCommune['satisfaction']->consolider_resilience_pas_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->consolider_resilience_pas_satisfaisant;
                    } else {
                        echo 0;
                    }
                }
                @endphp, "#b87333"
            ],
            ["Approfondir les réformes institutionnelles et moderniser l’administration publique",
                @php
                if ($dataCommune != null) {
                    if ($dataCommune['satisfaction']->approfondir_reforme_tres_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->approfondir_reforme_tres_satisfaisant;
                    } elseif ($dataCommune['satisfaction']->approfondir_reforme_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->approfondir_reforme_satisfaisant;
                    } elseif ($dataCommune['satisfaction']->approfondir_reforme_pas_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->approfondir_reforme_pas_satisfaisant;
                    } else {
                        echo 0;
                    }
                }
                @endphp, "silver"
            ],
            ["Consolider le développement du capital humain et la solidarité nationale",
                @php
                if ($dataCommune != null) {
                    if ($dataCommune['satisfaction']->consolider_developpement_tres_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->consolider_developpement_tres_satisfaisant;
                    } elseif ($dataCommune['satisfaction']->consolider_developpement_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->consolider_developpement_satisfaisant;
                    } elseif ($dataCommune['satisfaction']->consolider_developpement_pas_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->consolider_developpement_pas_satisfaisant;
                    } else {
                        echo 0;
                    }
                }
                @endphp, "gold"
            ],
            /*["Platinum", 21.45, "color: #e5e4e2"]*/
            ["Dynamiser les secteurs porteurs pour l’économie et les emplois",
                @php
                if ($dataCommune != null) {
                    if ($dataCommune['satisfaction']->dynamiser_secteurs_tres_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->dynamiser_secteurs_tres_satisfaisant;
                    } elseif ($dataCommune['satisfaction']->dynamiser_secteurs_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->dynamiser_secteurs_satisfaisant;
                    } elseif ($dataCommune['satisfaction']->dynamiser_secteurs_pas_satisfaisant != null) {
                        echo $dataCommune['satisfaction']->dynamiser_secteurs_pas_satisfaisant;
                    } else {
                        echo 0;
                    }
                }
                @endphp, "silver"
            ],
        ]);

        var data1 = google.visualization.arrayToDataTable([
            ["Element", "Density", {
                role: "style"
            }],
            ["{{ isset($dataCommune) ? $dataCommune['recette'][0]->annee : '' }}",
                {{ isset($dataCommune) ? $dataCommune['recette'][0]->fonctionnement + $dataCommune['recette'][0]->investissement : '' }},
                "red"
            ],
            ["{{ isset($dataCommune) ? $dataCommune['recette'][1]->annee : '' }}",
                {{ isset($dataCommune) ? $dataCommune['recette'][1]->fonctionnement + $dataCommune['recette'][1]->investissement : '' }},
                "red"
            ],
            ["{{ isset($dataCommune) ? $dataCommune['recette'][2]->annee : '' }}",
                {{ isset($dataCommune) ? $dataCommune['recette'][2]->fonctionnement + $dataCommune['recette'][2]->investissement : '' }},
                "red"
            ]
            /*["Platinum", 21.45, "color: #e5e4e2"]*/
        ]);

        var data2 = google.visualization.arrayToDataTable([
            ["Element", "Density", {
                role: "style"
            }],
            ["{{ isset($dataCommune) ? $dataCommune['depense'][0]->annee : '' }}",
                {{ isset($dataCommune) ? $dataCommune['depense'][0]->fonctionnement + $dataCommune['depense'][0]->investissement : '' }},
                "silver"
            ],
            ["{{ isset($dataCommune) ? $dataCommune['depense'][1]->annee : '' }}",
                {{ isset($dataCommune) ? $dataCommune['depense'][1]->fonctionnement + $dataCommune['depense'][1]->investissement : '' }},
                "silver"
            ],
            ["{{ isset($dataCommune) ? $dataCommune['depense'][2]->annee : '' }}",
                {{ isset($dataCommune) ? $dataCommune['depense'][2]->fonctionnement + $dataCommune['depense'][2]->investissement : '' }},
                "silver"
            ]
            /*["Platinum", 21.45, "color: #e5e4e2"]*/
            /*["Platinum", 21.45, "color: #e5e4e2"]*/
        ]);

        var data3 = google.visualization.arrayToDataTable([
            ["Element", "Density", {
                role: "style"
            }],
            ["Résultat d'investissement",
                {{ isset($dataCommune) ? $dataCommune['recetInvest']->dotation_globale + $dataCommune['recetInvest']->subvention_equipement + $dataCommune['recetInvest']->contribution_propre + $dataCommune['recetInvest']->dotation_liee + $dataCommune['recetInvest']->resultat_exercice - ($dataCommune['depensInvest']->etude_recherche + $dataCommune['depensInvest']->environnement + $dataCommune['depensInvest']->equipement + $dataCommune['depensInvest']->batiment + $dataCommune['depensInvest']->emprunt + $dataCommune['depensInvest']->autre_investissement + $dataCommune['depensInvest']->deficit_excedent) : '' }},
                "green"
            ],
            ["Résultat de fonctionnement",
                {{ isset($dataCommune) ? $dataCommune['recetFonct']->produit_exploitation + $dataCommune['recetFonct']->produit_domaniaux + $dataCommune['recetFonct']->produit_financier + $dataCommune['recetFonct']->recouvrement + $dataCommune['recetFonct']->produit_diver + $dataCommune['recetFonct']->impots_taxe_c_direct + $dataCommune['recetFonct']->impots_taxe_indirect + $dataCommune['recetFonct']->produit_exceptionnel + $dataCommune['recetFonct']->produit_anterieur - ($dataCommune['depensFonct']->sante + $dataCommune['depensFonct']->appui_scolaire + $dataCommune['depensFonct']->sport_culture + $dataCommune['depensFonct']->participation + $dataCommune['depensFonct']->frais_financier + $dataCommune['depensFonct']->refection_entretien + $dataCommune['depensFonct']->salaire_indemnite + $dataCommune['depensFonct']->entretien_vehicule + $dataCommune['depensFonct']->appui_fonctionnement + $dataCommune['depensFonct']->exedent_prelevement) : '' }},
                "#b87333"
            ],
            ["Résultat global {{ isset($dataCommune) ? $dataCommune['annee'] : '' }}",
                {{ isset($dataCommune)
                    ? $dataCommune['recetInvest']->dotation_globale +
                        $dataCommune['recetInvest']->subvention_equipement +
                        $dataCommune['recetInvest']->contribution_propre +
                        $dataCommune['recetInvest']->dotation_liee +
                        $dataCommune['recetInvest']->resultat_exercice -
                        ($dataCommune['depensInvest']->etude_recherche + $dataCommune['depensInvest']->environnement + $dataCommune['depensInvest']->equipement + $dataCommune['depensInvest']->batiment + $dataCommune['depensInvest']->emprunt + $dataCommune['depensInvest']->autre_investissement + $dataCommune['depensInvest']->deficit_excedent) +
                        ($dataCommune['recetFonct']->produit_exploitation + $dataCommune['recetFonct']->produit_domaniaux + $dataCommune['recetFonct']->produit_financier + $dataCommune['recetFonct']->recouvrement + $dataCommune['recetFonct']->produit_diver + $dataCommune['recetFonct']->impots_taxe_c_direct + $dataCommune['recetFonct']->impots_taxe_indirect + $dataCommune['recetFonct']->produit_exceptionnel + $dataCommune['recetFonct']->produit_anterieur - ($dataCommune['depensFonct']->sante + $dataCommune['depensFonct']->appui_scolaire + $dataCommune['depensFonct']->sport_culture + $dataCommune['depensFonct']->participation + $dataCommune['depensFonct']->frais_financier + $dataCommune['depensFonct']->refection_entretien + $dataCommune['depensFonct']->salaire_indemnite + $dataCommune['depensFonct']->entretien_vehicule + $dataCommune['depensFonct']->appui_fonctionnement + $dataCommune['depensFonct']->exedent_prelevement))
                    : '' }},
                "red"
            ]
            /*["Platinum", 21.45, "color: #e5e4e2"]*/
            /*["Platinum", 21.45, "color: #e5e4e2"]*/
        ]);

        var view = new google.visualization.DataView(data);
        var view1 = new google.visualization.DataView(data1);
        var view2 = new google.visualization.DataView(data2);
        var view3 = new google.visualization.DataView(data3);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        view1.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        view2.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);
        view3.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);


        var options = {
            title: "",
            /* width: 320,
             height: 220,*/
            bar: {
                groupWidth: "90%"
            },
            legend: {
                position: "false"
            },
            chartArea: {
                top: 20,
                width: '100%',
                height: '75%'
            }
        };

        var options1 = {
            title: "",
            /*width: 320,
            height: 220,*/
            bar: {
                groupWidth: "90%"
            },
            legend: {
                position: "true"
            },
            chartArea: {
                top: 20,
                width: '100%',
                height: '75%'
            }
        };

        var options2 = {
            title: "",
            /*width: 320,
            height: 220,*/
            bar: {
                groupWidth: "90%"
            },
            legend: {
                position: "true"
            },
            chartArea: {
                top: 20,
                width: '100%',
                height: '75%'
            }

        };

        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        var chart1 = new google.visualization.ColumnChart(document.getElementById("columnchart_values1"));
        var chart2 = new google.visualization.ColumnChart(document.getElementById("columnchart_values2"));
        var chart3 = new google.visualization.ColumnChart(document.getElementById("columnchart_values3"));

        /*image*/
        google.visualization.events.addListener(chart, 'ready', function() {
            document.getElementById("hidden_pcd").value = "" + chart.getImageURI();
        })
        google.visualization.events.addListener(chart1, 'ready', function() {
            document.getElementById("hidden_recette").value = "" + chart1.getImageURI();
        })
        google.visualization.events.addListener(chart2, 'ready', function() {
            document.getElementById("hidden_depense").value = "" + chart2.getImageURI();
        })
        google.visualization.events.addListener(chart3, 'ready', function() {
            document.getElementById("hidden_resultat").value = "" + chart3.getImageURI();
        })

        var hidden_bg_recett_fcnt = document.getElementById('hidden_bg_recett_fcnt');
        var hidden_bg_depens_fnct = document.getElementById('hidden_bg_depens_fnct');
        var hidden_bg_recett_invest = document.getElementById('hidden_bg_recett_invest');
        var hidden_bg_depens_invest = document.getElementById('hidden_bg_depens_invest');

        chart.draw(view, options1);
        chart1.draw(view1, options1);
        chart2.draw(view2, options2);
        chart3.draw(view3, options2);

        $(window).smartresize(function() {
            chart.draw(view, options);
            chart1.draw(view1, options1);
            chart2.draw(view2, options2);
        });
        chart3.draw(view3, options2);
    }
</script>
@endif

<script>
    // recettes fonctionnement
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
        var dataRecetteFonctn = google.visualization.arrayToDataTable([
            ['Language', 'Speakers (in millions)'],
            ["Produits de l’exploitation",{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_exploitation : '' }}],
            ["Produits domaniaux",{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_domaniaux : '' }}],
            ["Produits financiers",{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_financier : '' }}],
            ["Recouvrements et participations",{{ isset($dataCommune) ? $dataCommune['recetFonctN']->recouvrement : '' }}],
            ["Produits divers", {{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_diver : '' }}],
            ["Impôts taxes et contributions directes",{{ isset($dataCommune) ? $dataCommune['recetFonctN']->impots_taxe_c_direct : '' }}],
            ["Impôts et taxes indirects",{{ isset($dataCommune) ? $dataCommune['recetFonctN']->impots_taxe_indirect : '' }}],
            ["Produits exceptionnels",{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_exceptionnel : '' }}],
            ["Produits antérieurs",{{ isset($dataCommune) ? $dataCommune['recetFonctN']->produit_anterieur : '' }}],
            //["Autres dotations de transfert", {{ isset($dataCommune) ? $dataCommune['recetFonctN']->autres_dotations : '' }} ],
        ]);

        var dataDepenseFonctn = google.visualization.arrayToDataTable([
            ['Language', 'Speakers (in millions)'],
            ["Santé",{{ isset($dataCommune) ? $dataCommune['depensFonctN']->sante : '' }}],
            ["Appui scolaire", {{ isset($dataCommune) ? $dataCommune['depensFonctN']->appui_scolaire : '' }}],
            ["Sport & culture & jeunesse", {{ isset($dataCommune) ? $dataCommune['depensFonctN']->sport_culture : '' }}],
            ["Participation et prestation", {{ isset($dataCommune) ? $dataCommune['depensFonctN']->participation : '' }}],
            ["Frais financier", {{ isset($dataCommune) ? $dataCommune['depensFonctN']->frais_financier : '' }}],
            ["Réfection /entretien bâtiment", {{ isset($dataCommune) ? $dataCommune['depensFonctN']->refection_entretien : '' }}],
            ["Salaires & Indemnités", {{ isset($dataCommune) ? $dataCommune['depensFonctN']->salaire_indemnite : '' }}],
            ["Entretien véhicules & autres [services extérieurs]", {{ isset($dataCommune) ? $dataCommune['depensFonctN']->entretien_vehicule : '' }}],
            ["Appui Fonctionnement /Autres dépenses de fonctionnement", {{ isset($dataCommune) ? $dataCommune['depensFonctN']->appui_fonctionnement : '' }}],
            ["Autres charges exceptionnels", {{ isset($dataCommune) ? $dataCommune['depensFonctN']->autres_charges_exceptionnel : '' }}],
            ["Excédent / Prélèvement", {{ isset($dataCommune) ? $dataCommune['depensFonctN']->exedent_prelevement : '' }}],
        ]);

        var dataRecetteInvestn = google.visualization.arrayToDataTable([
            ['Language', 'Speakers (in millions)'],
            ["Dotation globale",{{ isset($dataCommune) ? $dataCommune['recetInvestN']->dotation_globale : '' }}],
            ["Subventions d'équipement",{{ isset($dataCommune) ? $dataCommune['recetInvestN']->subvention_equipement : '' }}],
            ["Contribution propre/Réserves",{{ isset($dataCommune) ? $dataCommune['recetInvestN']->contribution_propre : '' }}],
            ["Dotations liées aux compétences transférées",{{ isset($dataCommune) ? $dataCommune['recetInvestN']->dotation_liee : '' }}],
            ["Résultats exercices ant. Excédent/déficit Inv Rep",{{ isset($dataCommune) ? $dataCommune['recetInvestN']->resultat_exercice : '' }}],
            ["Autres subventions d'équipement", {{ isset($dataCommune) ? $dataCommune['recetInvestN']->autre_dotation : '' }}], 
             
        ]);

        var dataDepenseInvestn = google.visualization.arrayToDataTable([
            ['Language', 'Speakers (in millions)'],
            ['Études & Recherches',{{ isset($dataCommune) ? $dataCommune['depensInvestN']->etude_recherche : 0 }}],
            ["Environnement",{{ isset($dataCommune) ? $dataCommune['depensInvestN']->environnement : 0 }}],
            ["Équipement",{{ isset($dataCommune) ? $dataCommune['depensInvestN']->equipement : 0 }}],
            ["Bâtiment",{{ isset($dataCommune) ? $dataCommune['depensInvestN']->batiment : 0 }}],
            ["Emprunt", {{ isset($dataCommune) ? $dataCommune['depensInvestN']->emprunt : '' }}],
            //["Déficit / Excédent d'investissement exer anté", isset($dataCommune) ? $dataCommune['depensInvestN']->deficit_excedent : 0 }}],
            /*["Autres dotations de transfert", isset($dataCommune) ? $dataCommune['recetFonctN']->autres_dotations : '' }} ],*/
        ]);

        var options = {
            title: '',
            legend: 'true',
            legend: {
                position: 'right'
            },
            //pieSliceText: 'label',
            slices: {
                1: {
                    offset: 0.2
                },
                2: {
                    offset: 0.2
                },
                3: {
                    offset: 0.2
                },
                4: {
                    offset: 0.2
                },
                5: {
                    offset: 0.2
                },
                6: {
                    offset: 0.2
                },
                7: {
                    offset: 0.2
                },
                8: {
                    offset: 0.2
                },
                9: {
                    offset: 0.2
                },
            },
            is3D: 'true',
            chartArea: {
                top: 1,
                width: '85%',
                height: '100%'
            },
            /* width: 320,
             height: 200,*/
        };

        var options1 = {
            title: '',
            legend: 'true',
            legend: {
                position: 'top'
            },
            pieSliceText: 'label',
            slices: {
                4: {
                    offset: 0.2
                },
                12: {
                    offset: 0.3
                },
                14: {
                    offset: 0.4
                },
                15: {
                    offset: 0.5
                },
            },
            is3D: 'true',
            chartArea: {
                top: 20,
                width: '100%',
                height: '100%'
            },
            /*width: 320,
            height: 200,*/
        };

        var chartRecetteFonctn = new google.visualization.PieChart(document.getElementById('piechartn'));
        var chartDepenseFonctn = new google.visualization.PieChart(document.getElementById('piechartn1'));
        var chartRecetteInvestn = new google.visualization.PieChart(document.getElementById('piechartn2'));
        var chartDepenseInvestn = new google.visualization.PieChart(document.getElementById('piechartn3'));

        google.visualization.events.addListener(chartRecetteFonctn, 'ready', function() {
            document.getElementById("hidden_bg_recett_fcntn").value = "" + chartRecetteFonctn.getImageURI();
        })
        google.visualization.events.addListener(chartDepenseFonctn, 'ready', function() {
            document.getElementById("hidden_bg_depens_fcntn").value = "" + chartDepenseFonctn.getImageURI();
        })
        google.visualization.events.addListener(chartRecetteInvestn, 'ready', function() {
            document.getElementById("hidden_bg_recett_investn").value = "" + chartRecetteInvestn.getImageURI();
        })
        google.visualization.events.addListener(chartDepenseInvestn, 'ready', function() {
            document.getElementById("hidden_bg_depens_investn").value = "" + chartDepenseInvestn.getImageURI();
        })

        chartRecetteFonctn.draw(dataRecetteFonctn, options);
        chartDepenseFonctn.draw(dataDepenseFonctn, options);
        chartRecetteInvestn.draw(dataRecetteInvestn, options);
        chartDepenseInvestn.draw(dataDepenseInvestn, options);

        $(window).smartresize(function() {
          chartRecetteFonctn.draw(dataRecetteFonctn, options);
          chartDepenseFonctn.draw(dataDepenseFonctn, options);
          chartRecetteInvestn.draw(dataRecetteInvestn, options);
          chartDepenseInvestn.draw(dataDepenseInvestn, options);
        });
        
    }
</script>
