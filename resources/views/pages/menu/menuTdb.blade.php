<span class="badge bg-secondary @if(str_contains(url()->current(), 'bilan')) sin-bg-3 @endif">
    @if(str_contains(url()->current(), 'bilan'))
        <a class="text-white"
        href="#">#
        TdB Bilan</a>
    @else
        <a class="text-white"
        href="{{ route('datas.tdb', isset($dataCommune) ? ['bilan',$dataCommune['slug']] : 'tdb') }}">#
        TdB Bilan</a>
    @endif
    
</span>
<span class="badge bg-secondary @if(str_contains(url()->current(), 'planning')) sin-bg-3 @endif">
    @if(str_contains(url()->current(), 'planning'))
        <a class="text-white"
        href="#">#
        TdB Planning</a>
    @else
        <a class="text-white"
        href="{{ route('datas.tdb', isset($dataCommune) ? ['planning',$dataCommune['slug']] : 'tdb') }}">#
        TdB Planning</a>
    @endif
</span>
<span class="badge bg-secondary @if(str_contains(url()->current(), 'global')) sin-bg-3 @endif">
    @if(str_contains(url()->current(), 'global'))
        <a class="text-white"
        href="#">#
        TdB Global</a>
    @else
        <a class="text-white"
        href="{{ route('datas.tdb', isset($dataCommune) ? ['global',$dataCommune['slug']] : 'tdb') }}">#
        TdB Global</a>
    @endif
</span>