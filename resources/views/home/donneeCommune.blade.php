<div class="row">
    <div class="col-12 col-md-10 mx-auto">
        <h2 class="text-center mb-3">Données budgétaires</h2>
    </div>
    <div class="col-12 col-md-10 mx-auto mb-3">
        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'verificateur' || auth()->user()->role == 'editeur')
            <a name="" id="" class="btn btn-edic mt-1 ml-auto font-weight-bold"
                href="{{ route('data.create') }}" role="button">Creer</a>
        @endif
    </div>
    <div class="col-12 col-md-10 mx-auto">
        <div class="table-responsive">
            <table class="table table-bordered table-striped1 bg-white">
                <thead class="bg-primary text-white border-0">
                    <tr class="text-center">
                        <th>Commune</th>
                        <th>Année</th>
                        <th>Auteur</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="fw-normal">
                            <td>{{ $data->commune()->first()->commune_name }}</td>
                            <td>{{ $data->annee }}</td>
                            <td>
                                {{ $data->user()->first()->name }}
                            </td>
                            <td>
                                {{ $data->user()->first()->email }} <br />
                                {{ $data->user()->first()->mobile }}
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    @php
                                        $auth = auth()->user()->commune_id == $data->commune_id ? true : false;
                                        $autorisation = auth()->user()->role == 'editeur' || auth()->user()->role == 'verificateur' ? true : false;
                                        $status = $auth && $autorisation ? true : false;
                                    @endphp
                                    @if ($status == true || auth()->user()->role == 'admin')
                                        @if (auth()->user()->role == 'verificateur' || auth()->user()->role == 'admin')
                                            <form action="{{ route('data.publier', $data->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="btn {{ $data->publier != 0 ? 'btn-success' : 'btn-secondary' }} font-weight-bold text-white my-1 mx-1"
                                                    style="min-width:90px">{{ $data->publier != 0 ? 'Publier' : 'Non publier' }}</button>
                                            </form>
                                        @endif
                                        <form action="{{ route('data.terminer', $data->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn {{ $data->terminer != 0 ? 'btn-success text-white' : 'btn-warning text-black' }} font-weight-bold my-1 mx-1">{{ $data->terminer != 0 ? 'Terminer' : 'En cours' }}</button>
                                        </form>
                                    @endif
                                    @if (!$status && auth()->user()->role != 'admin')
                                        <a href="{{ route('datas.info', $data->slug) }}" id=""
                                            class="btn btn-info font-weight-bold my-1 mx-1" role="button">Afficher</a>
                                    @else
                                        @if ($data->terminer == 0)
                                            <a href="{{ route('data.edit', $data->id) }}" id=""
                                                class="btn btn-info font-weight-bold my-1 mx-1"
                                                role="button">Editer</a>


                                                <button data-bs-toggle="modal" data-bs-target="#deleteModal{{$data['id']}}"
                                                class="btn btn-danger font-weight-bold text-white mx-1 my-1">Effacer</button>
                                        @endif
                                    @endif
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="deleteModal{{$data['id']}}">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                    
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Suppression des données</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Êtes-vous sûr(e) de vouloir supprimer ces données ?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('data.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
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
</div>
