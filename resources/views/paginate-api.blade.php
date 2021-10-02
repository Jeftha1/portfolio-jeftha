@if($data->hasPages())
<?php 
	$total = $paginator->total(); 
	// 10 berichten per pagina. Verander dit in de PaginationController en hier als dat getal verandert. 
	$pages = ceil($total / 10);
?>

<a href="{{$data->nextPageUrl()}}">	
<input style="margin-right:  6px;"  class="float-right" type="button" value=">>"></a>
<a href="{{$data->previousPageUrl()}}">
<input style="margin-right:  6px;" class="float-right" type="button" value="<<"></a>
<a href="{{url('vacature-api?page=1')}}">
<input style="margin-right:  6px;" class="float-right" type="button" value="Reset"></a>
<p style="margin-left: 18px;">Pagina {{$data->currentPage()}} // {{$pages}} </p>

@endif