<div class="row py-2">
    <div class="col-12 col-md-10 mx-auto">
        <h2 class="text-center mb-3">Liste des utilisateurs</h2>
    </div>
    <div class="col-12 col-md-10 mx-auto mb-3">
        @if (auth()->user()->role == 'admin')
            <button class="btn btn-edic mt-1 ml-auto font-weight-bold" data-bs-toggle="modal" data-bs-target="#userModal"
                role="button">Ajouter un utilisateur</button>
        @endif
    </div>
    <div class="col-12 col-md-10 mx-auto">
        <div class="table-responsive">
            <table class="table table-bordered table-striped1 bg-white">
                <thead class="bg-primary text-white border-0">
                    <tr class="text-center">
                        <th>Nom prénom</th>
                        <th>Commune</th>
                        <th>Role</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="fw-normal text-center">
                            <td>{{ $data->name }}</td>
                            <td>{{ App\Models\Countries\Commune::find($data->commune_id)->commune_name }}</td>
                            <td>
                                @if (isset($data->role))
                                    {{ $data->role }}
                                @endif
                                @if (!isset($data->role))
                                    Ce compte n'est pas encore activé
                                @endif
                            </td>
                            <td>
                                <span>Email: {{ $data->email }}</span><br />
                                <span>Tél: +226 {{ $data->mobile }}</span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    @if (!isset($data->role))
                                        <button data-bs-toggle="modal" data-bs-target="#statusModal{{ $data['id'] }}"
                                            class="btn btn-info font-weight-bold my-1 mx-1"
                                            role="button">Activer</button>


                                            <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$data['id']}}"
                                            class="btn btn-danger font-weight-bold text-white mx-1 my-1">Effacer</button>
                                    @endif
                                    @if (isset($data->role))
                                        <a data-bs-toggle="modal" data-bs-target="#statusModal{{ $data['id'] }}"
                                            class="btn btn-warning font-weight-bold my-1 mx-1" role="button">Désactiver
                                        </a>

                                            <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$data['id']}}"
                                                class="btn btn-danger font-weight-bold text-white mx-1 my-1">Effacer</button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="statusModal{{ $data['id'] }}">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Attribution ou modification de rôle</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('setRole') }}">
                                            @csrf
                                            <div class="form-group mt-3">
                                                <label class="form-label fw-normal">Sélectionnez un rôle</label>
                                                <select name="role" class="form-select w-100 px-3">
                                                    <option>Sélectionnez un rôle</option>
                                                    <option value="editeur">Editeur</option>
                                                    <option value="verificateur">Verificateur</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="">désactiver</option>
                                                </select>
                                                <input name="id" hidden value="{{ $data->id }}" />
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-edic mr-auto">Enregistrer</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="modal" id="deleteModal{{$data['id']}}">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                    
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirmation de suppression d'utilisateur</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Voulez-vous vraiment supprimer cet utilisateur ? 
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{route('delete.user')}}">
                                            @csrf
                                            @method('DELETE')
                                            <input name="id" value="{{$data['id']}}" hidden/>
                                            <button type="submit"
                                                class="btn btn-danger font-weight-bold text-white mx-1 my-1">Effacer</button>
                                        </form>
                                        <button type="button" class="btn btn-edic"
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

    <div class="modal" id="userModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Attribution ou modification de rôle</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form class="row row-cols-1" method="POST" action="{{ route('create.user') }}">
                        @csrf
                        <div class="col-12">
                            <div class="form-group mt-1">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Nom Prenom') }}</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class=" mt-1">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Addresse Email') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class=" mt-1">
                            <label for="mobile"
                                class="col-md-4 col-form-label text-md-right">{{ __('Numéro de telephone') }}</label>

                            <input id="mobile" type="number"
                                class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                value="{{ old('mobile') }}" autocomplete="tel">

                            @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class=" mt-1 ">
                            <label for="commune"
                                class="col-md-4 col-form-label @error('commune') is-invalid @enderror text-md-right">{{ __('Commune') }}</label>
                            <input type="text" class="form-control" id="commune" name="commune"
                                placeholder="Ouagadougou" autocomplete="off" required>

                            @error('commune')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-edic mr-auto">Enregistrer</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
