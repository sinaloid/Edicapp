<section class="my-5">
    @if (session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mettre à jour les informations du profile</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form wire:submit.prevent="updateProfileInformation" role="form">

                <div class="form-group">
                    <label for="state.email">Nom Prenom</label>
                    <input type="text" class="form-control" id="state.name" wire:model="state.name"/>
                </div>

                <div class="form-group">
                    <label for="state.email">Addresse Email</label>
                    <input type="email" class="form-control" id="state.email"  wire:model="state.email"/>
                </div>
                <div class="form-group">
                    <label for="state.mobile">Numéro de telephone</label>
                    <input type="number" class="form-control" id="state.mobile"  wire:model="state.mobile"/>
                </div>
                <div class="form-group">
                    <label for="state.pays">Pays</label>
                    <input type="text" class="form-control" id="state.pays"  wire:model="state.pays"/>
                </div>
                <div class="form-group">
                    <label for="state.region">Region</label>
                    <input type="text" class="form-control" id="state.region"  wire:model="state.region"/>
                </div>
                <div class="form-group">
                    <label for="state.province">Province</label>
                    <input type="text" class="form-control" id="state.province"  wire:model="state.province"/>
                </div>

                <div class="form-group">
                    <label for="state.commune">Commune</label>
                    <input type="text" class="form-control" id="state.commune"  wire:model="state.commune"/>
                </div>
                

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Mettre à jour les infos</button>
                </div>
            </form>
        </div>
    </div>
</section>
