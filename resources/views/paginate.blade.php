@if($data->hasPages())
<?php 
	$total = $paginator->total(); 
	// 2 berichten per pagina. Verander dit in de postscontroller en hier als dat getal verandert. 
	$pages = ceil($total / 4);
	$last = $paginator->lastPage();  
?>
<?php echo '<a href="logboek?page=', urlencode($last), '">';?>
<div class="divider">
<input style="margin-right:  12px;" class="float-right" type="button" value="Laatste pagina"></a>
<a href="{{$data->nextPageUrl()}}">	
<div> 
<input style="margin-right:  6px;"  class="float-right" type="button" value="Volgende>>"></a>
<a href="{{$data->previousPageUrl()}}">
<input style="margin-right:  6px;" class="float-right" type="button" value="<<Vorige"></a>
<a href="{{url('logboek?page=1')}}">
<input style="margin-right:  6px;" class="float-right" type="button" value="Eerste pagina"></a>
<p style="margin-left: 18px;">Pagina {{$data->currentPage()}} van {{$pages}} </p>

@endif