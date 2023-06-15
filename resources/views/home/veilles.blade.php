<div class="row py-2">
    <div class="col-12 col-md-10 mx-auto">
        <h2 class="text-center mb-3">Liste des alertes</h2>
    </div>
    <div class="col-12 col-md-10 mx-auto">
        <div class="table-responsive">
            <table class="table table-bordered table-striped1 bg-white">
                <thead class="bg-primary text-white border-0">
                    <tr class="text-center">
                        <th>Auteur</th>
                        <th>Contact</th>
                        <th>Problème</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="fw-normal">
                            <td>{{ $data->nom }}</td>
                            <td>
                                {{ $data->email }} <br />
                                {{ $data->numero }}
                            </td>
                            <td>
                                {{ $data->resumer }}
                            </td>

                            <td>
                                <div class="btn-group">
                                    <button data-bs-toggle="modal" data-bs-target="#detailModal"
                                        class="btn btn-info font-weight-bold my-1 mx-1 btn-coord" data-msg="{{$data['resumer']}}" data-desc="{!!$data['description']!!}" data-img="{{isset($data->medias()->first()) ? $data->medias()->first()->url ? : ""}}"
                                        data-lng="{{ $data['longitude'] }}" data-lat="{{ $data['latitude'] }}" style="cursor: pointer">Voir</button>
                                @if (!isset($data->status))
                                    @if (auth()->user()->role == 'admin')
                                    <button data-bs-toggle="modal" data-bs-target="#statusModal{{$data['id']}}"
                                        class="btn btn-success font-weight-bold my-1 mx-1" role="button">Publier</button>


                                    <form action="{{ route('data.destroy', $data->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-danger font-weight-bold text-white mx-1 my-1">Effacer</button>
                                    </form>
                                    @endif
                                @endif
                                @if (isset($data->status))
                                    @if (auth()->user()->role == 'admin')
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
                                @endif
                                </div>
                            </td>
                        </tr>
                        <div class="modal" id="statusModal{{$data['id']}}">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                    
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Changer le status de l'alerte</h4>
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
                                        <a href="{{route('status.veille', $data['slug'])}}" type="button data-bs-dismiss="modal"
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
        var btnCoords = document.querySelectorAll('.btn-coord');
                btnCoords.forEach(function(btn) {
                    
                    btn.addEventListener('click', function() {
                        var lat = this.getAttribute('data-lat');
                        var lng = this.getAttribute('data-lng');
                        var msg = this.getAttribute('data-msg')
                        var desc = this.getAttribute('data-desc')
                        var img = this.getAttribute('data-img')
                        var content = document.getElementById('card-body')
                        content.innerHTML = `
                            <h2>${msg}</h2>
                            <div>
                                <img width="100%" src="/${img}" alt="" />
                            </div>
                            <p>${desc}</p>
                        `
                    });
                })
    </script>
</div>
