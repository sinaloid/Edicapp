<div class="row">
    <div class="col-12 font-weight-bolder text-center text-uppercase" style="color:#ff8043">Évaluation de l'exécution
        du PCD de la commune</div>
    <div class="col-12 table-responsive mt-2 px-0 ">
        <table class="table-sm table-hover mx-auto">
            <tr>
                <th class="sin-table-bg">Date de début</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->date_de_conception  : '' }}</td>
                <th class="sin-table-bg">Date de fin</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->date_d_expiration  : '' }}</td>
            </tr>
            <tr>
                <th class="sin-table-bg">Montant Total</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->montant_total  : '' }}</td>
                <th class="sin-table-bg">Montant mobilisé</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->montant_mobilise  : '' }}</td>
            </tr>
            <tr>
                <th class="sin-table-bg">Problèmes majeurs (en quelques mots)</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->probleme_majeur  : '' }}</td>
                <!--td> </td>
                <td> </td-->
            </tr>
            <tr>
                <th class="sin-table-bg">Perspectives (en quelques mots)</th>
                <td>{{ isset($dataCommune) ? $dataCommune['appreciation']->perpective_dix_mot  : '' }}</td>
                <!--td> </td>
                <td> </td-->
            </tr>
        </table>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 font-weight-bolder text-center text-uppercase" style="color:#ff8043">Appréciation : donnez une note pour chaque
        axe (3 - 7 - 10)</div>
    <div class="col-12 table-responsive mt-2 px-0 ">
    <table class="table-sm table-hover mx-auto">
            <thead>
                <tr>
                    <th class="sin-table-bg" rowspan="2">Axes stratégiques</th>
                    <th class="sin-table-bg text-center" colspan="3">Degré de satisfaction</th>
                </tr>
                <tr>
                    <th>Très satisfaisant</th>
                    <th>Satisfaisant</th>
                    <th> Pas Satisfaisant</th>
                </tr>
            </thead>
            <!--cot-->
            <tr>
                <th class="sin-table-bg">1 : Consolider la résilience, la sécurité, la cohésion sociale et la paix :</th>
                <td>{{ isset($dataCommune) ? $dataCommune['satisfaction']->reforme_tres_satisfaisant : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['satisfaction']->reforme_satisfaisant : '' }}</td>
                <td> {{ isset($dataCommune) ? $dataCommune['satisfaction']->reforme_pas_satisfaisant : '' }}</td>
            </tr>
            <tr>
                <th class="sin-table-bg">2 : Approvondir les réformes institutionnelles et moderniser l’administration publique</th>
                <td>{{ isset($dataCommune) ? $dataCommune['satisfaction']->developper_tres_satisfaisant : '' }}</td>
                <td> {{ isset($dataCommune) ? $dataCommune['satisfaction']->developper_satisfaisant : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['satisfaction']->developper_pas_satisfaisant : '' }}</td>
            </tr>
            <tr>
                <th class="sin-table-bg">3 : Consolider le développement du capital humain et la solidarité nationale</th>
                <td> {{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_tres_satisfaisant : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_satisfaisant : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_pas_satisfaisant : '' }}</td>
            </tr>
            <tr>
                <th class="sin-table-bg">4 : Dynamiser les secteurs porteurs pour l’économie et les emplois</th>
                <td> {{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_tres_satisfaisant : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_satisfaisant : '' }}</td>
                <td>{{ isset($dataCommune) ? $dataCommune['satisfaction']->dynamiser_pas_satisfaisant : '' }}</td>
            </tr>
        </table>
    </div>
</div>
<div class="row mt-3 notation">
    <div class="col-3 col-md-5 text-center text-secondary ">Notation: </div>
    <div class="col-9 col-md-7 text-center">
        <p class="text-success">Très satisfaisant :<span class="mx-auto"> 10 / 10</span></p>
        <p class="text-info">Satisfaisant :<span class="mx-auto"> 7 / 10</span></p>
        <p class="text-danger">Pas satisfaisant :<span class="mx-auto"> 3 / 10</span></p>
    </div>
</div>

<div class="row ">
    <div class="col-12 table-responsive mt-2 px-0">
        <table class="table-sm  mx-auto">
            <tr>
                <th class="sin-table-bg">Commentaire sur votre appréciation: en cinq mots</th>
                <td>{{ isset($dataCommune) ? $dataCommune['satisfaction']->commentaire_appreciation : '' }}</td>
            </tr>
        </table>
    </div>
</div>
