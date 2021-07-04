<ul id="menu" class="nav nav-pills nav-justified sin-bg-3">
    <li class="nav-item">
        <a class="nav-link @if (Route::currentRouteName() == 'datas.info') active @endif" href="{{ route('datas.info') }}">Info G</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (Route::currentRouteName() == 'datas.pcd') active @endif" href="{{ route('datas.pcd') }}">PCD</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (Route::currentRouteName() == 'datas.bg') active @endif" href="{{ route('datas.bg') }}">Budget</a>
    </li>
    <li class="nav-item">
        <a class="nav-link @if (Route::currentRouteName() == 'datas.tdb') active @endif" href="{{ route('datas.tdb') }}">TdB</a>
    </li>
</ul>
