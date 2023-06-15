@extends('layout.app')

@section('title')
    <title>Edic - Accueil</title>
@endsection
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endsection
@section('script')
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
@endsection
@section('content')
    <div class="row bannier"></div>
    <div class="row">
        <div class="col-12">
            <h1 class="title-bannier">Veille Citoyenne</h1>
            <p class="col-12 col-md-8 mx-auto text-center my-1">
                Participez à la résolution des problèmes locaux au Burkina Faso : signaler, visualiser et discuter sur EDIC
            </p>
        </div>
    </div>
    <div class="row my-5 py-5">
        <div class="col-12 col-md-10 mx-auto ">
            <div class="row bg-gray py-4">
                <div class="col-12 col-md-4">
                    <img width="100%" src="{{ asset('img/vc/og.jpg') }}" alt="" />
                </div>
                <div class="col-12 col-md-8">
                    <p class="text-22 fw-bold text-primary">Voici quelques exemples de problèmes qui peuvent être signalés à
                        travers la plateforme EDIC :</p>
                    <ol>
                        <li class="fw-normal mb-3">
                            <span class="fw-bold"> Infrastructures défectueuses :</span> signaler des problèmes tels que des
                            routes ou des ponts endommagés, des poteaux électriques tombés, des fuites d'eau, etc.
                        </li>
                        <li class="fw-normal mb-3">
                            <span class="fw-bold">Problèmes de sécurité :</span> signaler des problèmes tels que des vols,
                            des cambriolages, des actes de violence, etc.
                        </li>
                        <li class="fw-normal mb-3">
                            <span class="fw-bold">Problèmes de santé publique :</span> signaler des problèmes tels que des
                            épidémies, des foyers de maladies infectieuses, des problèmes d'hygiène publique, etc.
                        </li>
                        <li class="fw-normal mb-3">
                            <span class="fw-bold">Problèmes environnementaux :</span> signaler des problèmes tels que des
                            déchets toxiques, des pollutions, des dégradations de la nature, etc.
                        </li>
                        <li class="fw-normal mb-3">
                            <span class="fw-bold">Problèmes sociaux :</span> signaler des problèmes tels que la
                            discrimination, l'injustice sociale, la pauvreté, l'exclusion sociale, violence basée sur le
                            genre (VGB), abus sexuel sur l'enfant, etc.
                        </li>
                        <li class="fw-normal mb-3">
                            <span class="fw-bold">Problème de gouvernance</span> : Corruption, Achat de conscience, Abus de
                            confiance / de pouvoir, détournement de deniers publics, destrcution de biens publics, etc.
                        </li>
                    </ol>
                    <p>Ces exemples ne sont pas exhaustifs et tout problème local qui affecte la communauté peut être
                        signalé à travers la plateforme EDIC.
                        En signalant ces problèmes, les citoyens peuvent contribuer à améliorer leur
                        communauté et à promouvoir un Burkina Faso plus juste et plus équitable pour tous.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5 bg-gray py-5">
        <div class="col-12 col-md-10 mx-auto ">
            <p class="text-center fw-bold text-22 mb-5">Comment ça marche ?</p>
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <div class="n-circle d-flex align-items-center justify-content-center">
                            <span class="text-22">1</span>
                        </div>
                    </div>
                    <p class="mt-4">
                        Afin de signaler un problème, merci de nous fournir les informations suivantes : localisation
                        précise (secteur, nom de rue, zone, coordonnées GPS) et des photos ou une courte vidéo de moins
                        d'une minute. Pour signaler un problème, vous pouvez utiliser notre carte interactive en cliquant
                        sur l'icône 'Signaler un problème' et remplir le formulaire qui s'affichera.
                    </p>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <div class="n-circle d-flex align-items-center justify-content-center">
                            <span class="text-22">2</span>
                        </div>
                    </div>
                    <p class="mt-4">
                        Pour signaler un problème, il suffit de cliquer sur le bouton dédié
                        'Signaler un problème' et de remplir le formulaire qui s'affichera en
                        renseignant les détails du problème. Ensuite, il ne reste plus qu'à
                        cliquer sur le bouton 'Envoyer' pour que votre signalement soit pris en compte
                    </p>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <div class="n-circle d-flex align-items-center justify-content-center">
                            <span class="text-22">3</span>
                        </div>
                    </div>
                    <p class="mt-4">
                        Pour signaler un problème, commencez par localiser
                        le lieu du problème sur notre carte interactive.
                        Cliquez ensuite sur le button 'Selectionner' qui
                        apparaîtra sur la carte. Remplissez le formulaire qui
                        s'affichera en renseignant les détails du problème, puis cliquez sur
                        le bouton 'Envoyer' pour que votre signalement soit pris en compte.
                    </p>
                </div>

            </div>
        </div>
    </div>
    <div class="row mt-5 mb-3">
        <div class="col-12 col-md-10 mx-auto">
            <div class="d-flex">
                <button class="btn btn-edic ms-auto" data-bs-toggle="modal" data-bs-target="#problemeModal">Signaler un
                    problème</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 mx-auto ">
            <div class="row ">
                <div class="col-4">
                    <h2 class="mb-3 text-22">Problèmes récemment signalés</h2>
                    @foreach ($datas as $data)
                    @php
                        $image = $data->medias()->first();
                        //dd($image->url);
                    @endphp
                        <div class="d-flex bg-white p-2 mb-2">
                            <p class="me-2"><img width="80px" src="{{$data->medias()->first() !== null ? $data->medias()->first()->url : ''}}" alt="Pas d'image disponible" /></p>
                            <div>
                                <h3 class="text-14 btn-coord" data-msg="{{$data['resumer']}}" data-desc="{!!$data['description']!!}" data-img="{{$data->medias()->first() !== null ? $data->medias()->first()->url : ''}}"
                                data-lng="{{ $data['longitude'] }}" data-lat="{{ $data['latitude'] }}" style="cursor: pointer">{{ $data['resumer'] }}</h3>
                                <p class="text-14">{{ date_format($data['created_at'], 'd/m/Y H:i:s') }}</p>
                                <input type="button" data-lng="{{ $data['longitude'] }}"
                                    data-lat="{{ $data['latitude'] }}" hidden />

                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        <a class="text-primary" href="#">Voir tous les rapports</a>
                    </div>

                </div>
                <div class="col-8">
                    <h2 class="mb-3 text-22">Signaler un problème en sélectionnant l'emplacement sur la carte</h2>
                    <div id="map" style="width: 100%; height: 600px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5 bg-gray py-5">
        <div class="col-12 col-md-10 mx-auto ">
            <p class="text-center fw-bold text-22 mb-5">Statistiques des rapports</p>
            <div class="row row-cols-1 row-cols-md-3">
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <div class="n-circle d-flex align-items-center justify-content-center">
                            <span class="text-22">9500</span>
                        </div>
                    </div>
                    <p class="text-center py-2">
                        Problèmes signalés dernièrement
                    </p>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <div class="n-circle d-flex align-items-center justify-content-center">
                            <span class="text-22">40084</span>
                        </div>
                    </div>
                    <p class="text-center py-2">
                        Problèmes résolus
                    </p>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <div class="n-circle d-flex align-items-center justify-content-center">
                            <span class="text-22">59584</span>
                        </div>
                    </div>
                    <p class="text-center py-2">
                        Problèmes signalés au total
                    </p>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="problemeModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Signaler un problème</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="p-0" method="POST" action="{{ route('veilleCitoyenne.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body p-0">

                                    <!--@csrf-->
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Nom prénom</label>
                                        <input class="form-control w-100 px-3" name="nom" type="text"
                                            placeholder="Nom prénom">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Numéro de téléphone</label>
                                        <input class="form-control w-100 px-3" name="numero" type="text"
                                            placeholder="Numéro de téléphone">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Email</label>
                                        <input class="form-control w-100 px-3" name="email" type="email"
                                            placeholder="Adresse email">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Catégorie</label>
                                        <select name="categorie" class="form-select w-100 px-3">
                                            <option>Sélectionnez une catégorie pour le problème</option>
                                            <option>Infrastructures défectueuses</option>
                                            <option>Problèmes de sécurité</option>
                                            <option>Problèmes de santé publique</option>
                                            <option>Problèmes environnementaux</option>
                                            <option>Problèmes sociaux</option>
                                            <option>Problème de gouvernance</option>
                                            <option>Autres</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Ajoutez des images ou une vidéo courte en
                                            rapport avec le problème</label>
                                        <input name="medias[]" type="file" class="form-control w-100"
                                            autocomplete="off" multiple>
                                    </div>
                                    <div id="localisation" class="form-group mt-3">
                                        <label class="form-label fw-normal">
                                            <span>Localisation du problème</span> <br />
                                            <span class="text-12 text-muted">Exemple: Avenue Kwamé Nkrumah à
                                                Ouagadougou</span>
                                        </label>
                                        <input class="form-control w-100 px-3" name="localisation" type="text"
                                            placeholder="Localisation du problème">
                                        <input id="lng" name="longitude" type="text" hidden>
                                        <input id="lat" name="latitude" type="text" hidden>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">
                                            <span>Résumez le problème</span> <br />
                                            <span class="text-12 text-muted">Exemple: Panne de l'éclairage public sur
                                                l'avenue Kwamé Nkrumah à Ouagadougou</span>
                                        </label>
                                        <input class="form-control w-100 px-3" name="resumer" type="text"
                                            placeholder="Résumez le problème">
                                    </div>
                                    <div class="form-group my-3">
                                        <label class="form-label fw-normal">Description du problème</label>
                                        <textarea id="editor" name="description" class="ckeditor14 form-control" name="editor"></textarea>
                                    </div>

                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button data-bs-dismiss="modal"
                                        class="btn btn-edic mr-auto">Envoyer</button>
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <script src="https://cdn.ckeditor.com/4.18.0/standard-all/ckeditor.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            CKEDITOR.replace('editor', {
                                extraPlugins: 'editorplaceholder',
                                editorplaceholder: 'Expliquez ce qui ne va pas',
                                removeButtons: 'PasteFromWord'
                            });


                        });
                    </script>
                </div>



            </div>
        </div>
    </div>
    <div class="modal" id="detailModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        Problème signalé
                         
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div id="card-body" class="card-body p-0">
                                
                            </div>
                            <!-- Modal footer -->
                            
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-edic"
                        data-bs-dismiss="modal">Fermer</button>
                </div>


            </div>
        </div>
    </div>
    <script>
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var long = position.coords.longitude;
                console.log("Ma position actuelle est : " + lat + ", " + long);

                const map = L.map('map').setView([lat, long], 13);

                const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                const marker = L.marker([lat, long]).addTo(map)
                    .bindPopup('<b>Votre position</b>') //.openPopup();

                function addMarker(lat, lng, msg) {
                    var marker = L.marker([lat, lng])
                    .addTo(map)
                    .bindPopup(`
                    <b>${msg}</b> <br />
                    <botton class="btn btn-edic text-12 mt-2" data-bs-toggle="modal" data-bs-target="#detailModal">Voir +<botton>

                    `);
                }

                // Événement clic sur un bouton de coordonnées
                var btnCoords = document.querySelectorAll('.btn-coord');
                btnCoords.forEach(function(btn) {
                    
                    btn.addEventListener('click', function() {
                        var lat = this.getAttribute('data-lat');
                        var lng = this.getAttribute('data-lng');
                        var msg = this.getAttribute('data-msg')
                        var desc = this.getAttribute('data-desc')
                        var img = this.getAttribute('data-img')
                        var content = document.getElementById('card-body')
                        addMarker(lat, lng, msg);
                        content.innerHTML = `
                            <h2>${msg}</h2>
                            <div>
                                <img width="100%" src="${img}" alt="" />
                            </div>
                            <p>${desc}</p>
                        `
                    });
                })

               
                /*const circle = L.circle([lat, long], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.5,
                    radius: 500
                }).addTo(map).bindPopup('I am a circle.');

                const polygon = L.polygon([
                    [51.509, -0.08],
                    [51.503, -0.06],
                    [51.51, -0.047]
                ]).addTo(map).bindPopup('I am a polygon.');*/


                const popup = L.popup()
                /*.setLatLng([lat, long])
                .setContent('I am a standalone popup.')
                .openOn(map);*/

                function onMapClick(e) {
                    popup
                        .setLatLng(e.latlng)
                        .setContent(`
                <span class="fw-bold">Vous avez cliqué sur la carte à ${e.latlng.toString()}<span> <br />
                <botton class="btn btn-edic text-12 mt-2" data-bs-toggle="modal" data-bs-target="#problemeModal"><i class="fa-solid fa-location-dot"></i> Sélectionner<botton>
                `).openOn(map);

                    console.log(e)
                    var localisation = document.getElementById("localisation");

                    localisation.innerHTML = `<div id="localisation" class="form-group mt-3">
                                        <label class="form-label fw-normal">
                                            <span>Localisation du problème</span> <br />
                                            <span class="fw-bold text-12 text-primary">Longitude: ${e.latlng.lng}</span> <br />
                                            <span class="fw-bold text-12 text-primary">Latitude: ${e.latlng.lat}</span>
                                        </label> <br />
                                        <input id="lng" name="longitude" type="text" hidden>
                                        <input id="lat" name="latitude" type="text" hidden>
                                    <input id="lat" name="localisation" type="text" hidden>
                                    </div>`
                    var lng = document.getElementById("lng");
                    var lat = document.getElementById("lat");

                    lng.value = e.latlng.lng
                    lat.value = e.latlng.lat

                    //var modal = document.getElementById("problemeModal");
                    //$(modal).modal('show');

                }

                map.on('click', onMapClick);
            });
        } else {
            console.log("La géolocalisation n'est pas supportée par votre navigateur.");
        }
    </script>
@endsection
