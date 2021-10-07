<ul id="menu" class="nav nav-pills nav-justified sin-bg-3">
    <li class="nav-item" title="Informations générales">
        <a class="nav-link @if (Route::currentRouteName() == 'datas.info') active @endif" href="{{ route('datas.info', isset($dataCommune) ? $dataCommune['slug'] : 'info_generale' ) }}">Info G</a>
    </li>
    <li class="nav-item" title="Plan Communal de Développement">
        <a class="nav-link @if (Route::currentRouteName() == 'datas.pcd') active @endif" href="{{ route('datas.pcd', isset($dataCommune) ? $dataCommune['slug'] : 'pcd') }}">PCD</a>
    </li>
    <li class="nav-item" title="Informations budgétaires">
        <a class="nav-link @if (Route::currentRouteName() == 'datas.bg') active @endif" href="{{ route('datas.bg', isset($dataCommune) ? $dataCommune['slug'] : 'bg') }}">Budget</a>
    </li>
    <li class="nav-item" title="Tableau de Bord">
        <a class="nav-link @if (Route::currentRouteName() == 'datas.tdb') active @endif" href="{{ route('datas.tdb', isset($dataCommune) ? $dataCommune['slug'] : 'tdb') }}">TdB</a>
    </li>
</ul>
