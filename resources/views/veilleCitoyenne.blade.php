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
            <h1 class="title-bannier">Veille citoyenne</h1>
            <p class="col-12 col-md-8 mx-auto text-center my-1">
                Participez à la résolution des problèmes locaux au Burkina Faso : signaler, visualiser et discuter sur EDIC,
                la plateforme de veille citoyenne
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
                            discrimination, l'injustice sociale, la pauvreté, l'exclusion sociale, etc.
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
                        Cliquez ensuite sur l'icône 'Signaler un problème' qui
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
                <button class="btn btn-edic ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">Signaler un
                    problème</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-10 mx-auto ">
            <div class="row ">
                <div class="col-4">
                    <h2 class="mb-3 text-22">Problèmes récemment signalés</h2>
                    @for ($i = 0; $i < 6; $i++)
                        <div class="d-flex bg-white p-2 mb-2">
                            <p class="me-2"><img width="80px" src="{{ asset('img/vc/vc1.jpg') }}" alt="" /></p>
                            <div>
                                <h3 class="text-14">Lorem ipsum dolor, sit amet consectetur</h3>
                                <p class="text-14">19h11 aujourd'hui</p>
                            </div>
                        </div>
                    @endfor
                    <div class="text-center">
                        <a class="text-primary" href="#">Voir tous les rapports</a>
                    </div>

                </div>
                <div class="col-8">
                    <h2 class="mb-3 text-22">Problèmes récemment signalés</h2>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const map = L.map('map').setView([51.505, -0.09], 13);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const marker = L.marker([51.5, -0.09]).addTo(map)
            .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

        const circle = L.circle([51.508, -0.11], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map).bindPopup('I am a circle.');

        const polygon = L.polygon([
            [51.509, -0.08],
            [51.503, -0.06],
            [51.51, -0.047]
        ]).addTo(map).bindPopup('I am a polygon.');


        const popup = L.popup()
            .setLatLng([51.513, -0.09])
            .setContent('I am a standalone popup.')
            .openOn(map);

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent(`You clicked the map at ${e.latlng.toString()}`)
                .openOn(map);
        }

        map.on('click', onMapClick);
    </script>
@endsection
