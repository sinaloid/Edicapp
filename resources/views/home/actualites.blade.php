<div class="row py-2">
    <div class="col-12 col-md-10 mx-auto">
        <h2 class="text-center mb-3">Liste des actualités</h2>
    </div>
    <div class="col-12 col-md-10 mx-auto mb-3">
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'verificateur' || auth()->user()->role == 'editeur')
            <button class="btn btn-edic mt-1 ml-auto font-weight-bold" data-bs-toggle="modal" data-bs-target="#actualite"
                href="{{ route('data.create') }}" role="button">Créer une actualité</button>
        @endif
    </div>
    <div class="col-12 col-md-10 mx-auto">
        <div class="table-responsive">
            <table class="table table-bordered table-striped1 bg-white">
                <thead class="bg-primary text-white border-0">
                    <tr class="text-center">
                        <th>Auteur</th>
                        <th>Contact</th>
                        <th>Titre de l'actualité</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="fw-normal">
                            <td>{{ $data->user()->first()->name }}</td>
                            <td>
                                {{ $data->user()->first()->email }} <br />
                                {{ $data->user()->first()->mobile }}
                            </td>
                            <td>
                                {{ $data->titre }}
                            </td>

                            <td>
                                {{ $data->categorie }}
                            </td>

                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-info font-weight-bold my-1 mx-1 btn-edit"
                                        data-bs-toggle="modal" data-bs-target="#actualiteUpdate"
                                        data-titre="{{ $data['titre'] }}" data-categorie="{{ $data['categorie'] }}"
                                        data-resumer="{{ $data['resumer'] }}"
                                        data-categorie="{{ $data['categorie'] }}"
                                        data-slug="{{ $data['slug'] }}"
                                        data-description="{{ $data['description'] }}" role="button">Voir</button>
                                    @if (!isset($data->status))
                                        <button
                                            data-bs-toggle="modal" data-bs-target="#statusModal{{$data['id']}}"
                                            class="btn btn-info font-weight-bold my-1 mx-1" role="button">Publier</button>

                                        <form action="{{ route('data.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger font-weight-bold text-white mx-1 my-1">Effacer</button>
                                        </form>
                                    @endif
                                    @if (isset($data->status))
                                        <button
                                        data-bs-toggle="modal" data-bs-target="#statusModal{{$data['id']}}"
                                            class="btn btn-warning font-weight-bold my-1 mx-1"
                                            role="button">Désactiver</button>
                                        <form>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger font-weight-bold text-white mx-1 my-1">Effacer</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="statusModal{{$data['id']}}">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                    
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Changer le status de l'actualité</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        @if (!isset($data['status']))
                                            Voulez-vous vraiment publier ces informations ?
                                        @endif 
                                        @if (isset($data['status']))
                                            Voulez-vous vraiment annuler la publication des informations ?
                                        @endif 
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{route('status.actualite', $data['slug'])}}" type="button data-bs-dismiss="modal"
                                            class="btn btn-edic mr-auto">Comfirmer</a>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    

    <div class="modal" id="actualite">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Création d'une actualité</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="p-0" method="POST" action="{{ route('create.actualites') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body p-0">

                                    <!--@csrf-->
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Titre de l'actualité</label>
                                        <input class="form-control w-100 px-3" name="titre" type="text"
                                            placeholder="Entrer un titre">
                                    </div>

                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Catégorie</label>
                                        <select name="categorie" class="form-select w-100 px-3">
                                            <option>Sélectionnez une catégorie pour l'actualité</option>
                                            <option>Politique nationale</option>
                                            <option>Économie et finance</option>
                                            <option>Santé et bien-être</option>
                                            <option>Éducation et formation</option>
                                            <option>Culture et loisirs</option>
                                            <option>Environnement et développement durable</option>
                                            <option>Sports et loisirs</option>
                                            <option>Technologies et innovations</option>
                                            <option>Faits divers et justice</option>
                                            <option>International et diplomatie</option>
                                            <option>Autres</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Ajoutez des images ou une vidéo courte en
                                            rapport avec l'actualité</label>
                                        <input name="medias[]" type="file" class="form-control w-100"
                                            autocomplete="off" multiple>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Résumé de l'actualité</label>
                                        <textarea class="form-control w-100 px-3" name="resumer" type="text" rows="3"
                                            placeholder="Entrer un résumé court de l'actualité (200 caractères maximun)"></textarea>
                                    </div>

                                    <div class="form-group my-3">
                                        <label class="form-label fw-normal">Description de l'actualité</label>
                                        <textarea id="editor" name="description" class="ckeditor14 form-control" name="editor"></textarea>
                                    </div>

                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button data-bs-dismiss="modal"
                                        class="btn btn-edic mr-auto">Enregistrer</button>
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

    <div class="modal" id="actualiteUpdate">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Actualité</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <form class="p-0" method="POST" action="{{ route('update.actualites') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body p-0">

                                    <!--@csrf-->
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Titre de
                                            l'actualité</label>
                                        <input id="titre" class="form-control w-100 px-3" name="titre" type="text"
                                            placeholder="Entrer un titre">
                                        <input id="slug" name="slug"  type="text" hidden>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Catégorie</label>
                                        <select id="categorie" name="categorie" class="form-select w-100 px-3">
                                            <option value="">Sélectionnez une catégorie pour l'actualité</option>
                                            <option value="Politique nationale">Politique nationale</option>
                                            <option value="Économie et finance">Économie et finance</option>
                                            <option value="Santé et bien-être">Santé et bien-être</option>
                                            <option value="Éducation et formation">Éducation et formation</option>
                                            <option value="Culture et loisirs">Culture et loisirs</option>
                                            <option value="Environnement et développement durable">Environnement et
                                                développement durable</option>
                                            <option value="Sports et loisirs">Sports et loisirs</option>
                                            <option value="Technologies et innovations">Technologies et innovations
                                            </option>
                                            <option value="Faits divers et justice">Faits divers et justice</option>
                                            <option value="International et diplomatie">International et diplomatie
                                            </option>
                                            <option value="Autres">Autres</option>
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Ajoutez des images ou
                                            une vidéo courte en
                                            rapport avec l'actualité</label>
                                        <input name="medias[]" type="file" class="form-control w-100"
                                            autocomplete="off" multiple>
                                    </div>

                                    <div class="form-group mt-3">
                                        <label class="form-label fw-normal">Résumé de
                                            l'actualité</label>
                                        <textarea id="resumer" class="form-control w-100 px-3" name="resumer" rows="3"
                                            placeholder="Entrer un résumé court de l'actualité (200 caractères maximun)"></textarea>
                                    </div>

                                    <div class="form-group my-3">
                                        <label class="form-label fw-normal">Description de
                                            l'actualité</label>
                                        <textarea id="editorUpdate" name="description" class="ckeditor14 form-control" name="editorUpdate"></textarea>
                                    </div>

                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button data-bs-dismiss="modal"
                                        class="btn btn-edic mr-auto">Enregistrer</button>
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            CKEDITOR.replace("editorUpdate", {
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
</div>

<script>
    var btnCoords = document.querySelectorAll('.btn-edit');
    var titre = document.getElementById('titre');
    var categorie = document.getElementById('categorie');
    var editorUpdate = document.getElementById('editorUpdate');
    var resumer = document.getElementById('resumer');
    var slug = document.getElementById('slug');
    btnCoords.forEach(function(btn) {
        btn.addEventListener('click', function() {
            titre.value = this.getAttribute('data-titre');
            resumer.value = this.getAttribute('data-resumer');
            categorie.value = this.getAttribute('data-categorie');
            slug.value = this.getAttribute('data-slug');

            var editor = CKEDITOR.instances.editorUpdate;

            editor.setData(this.getAttribute('data-description'));

        });
    });
</script>
