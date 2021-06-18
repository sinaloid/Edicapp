<ul id ="menu" class="nav nav-pills nav-justified sin-bg-3">
    			<li class="nav-item">
      				<a class="nav-link active1 " href="{{ route('datas.info') }}">Info G</a>
    			</li>
    		<li class="nav-item">
      			<a class="nav-link" href="{{ route('datas.pcd') }}">PCD</a>
    		</li>
    		<li class="nav-item">
    		  <a class="nav-link" href="{{ route('datas.bg') }}">Budget</a>
    		</li>
    		<li class="nav-item">
    		  <a class="nav-link" href="{{ route('datas.tdb') }}">TdB</a>
    		</li>
  			</ul>

<script>

$(document).ready(function () {
    $( '#menu .nav-item' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
});
</script>