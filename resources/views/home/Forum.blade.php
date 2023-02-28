<div class="row py-2">
    <div class="col-12 col-md-10 mx-auto">
        <h2 class="text-center mb-3">Liste des questions du forum</h2>
    </div>
    <div class="col-12 col-md-10 mx-auto">
        <div class="table-responsive">
            <table class="table table-bordered table-striped1 bg-white">
                <thead class="bg-primary text-white border-0">
                    <tr class="text-center">
                        <th>Auteur</th>
                        <th>Contact</th>
                        <th>Commune</th>
                        <th>Titre</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="fw-normal text-center">
                            <td>{{ $data->membre()->first()->nom }}</td>
                            <td>{{ $data->membre()->first()->email }}</td>
                            <td>{{ App\Models\Countries\Commune::find($data->commune_id)->commune_name }}</td>

                            <td>
                                {{ $data->titre }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('forumDetail', $data->slug) }}" id=""
                                        class="btn btn-info font-weight-bold my-1 mx-1" role="button">Voir</a>

                                    @if (auth()->user()->role == 'admin')
                                        <form action="{{ route('data.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger font-weight-bold text-white mx-1 my-1">Effacer</button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
