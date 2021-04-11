@foreach($posts as $post)
	@include('layouts.postList',['post' => $post ])
@endforeach
<div class="row mt-5">
    <div class="col-xl-12">
		<div class="single-wrap d-flex justify-content-center">
			<nav aria-label="Page navigation example">
				@if ($posts->lastPage() > 1)
					<ul class="pagination justify-content-start">
						<li class="page-item {{ ($posts->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link" href="{{ $posts->url(1) }}"><span class="ti-angle-left"></span></a></li>

						@for ($i = 1; $i <= $posts->lastPage(); $i++)
						    <li class="page-item {{ ($posts->currentPage() == $i) ? ' active' : '' }}">
						        <a href="{{ $posts->url($i) }}" class="page-link">{{ $i }}</a>
						    </li>
						@endfor
						<li class="page-item {{ ($posts->currentPage() == $posts->lastPage()) ? ' disabled' : '' }}"><a class="page-link" href="{{ $posts->url($posts->currentPage()+1) }}"><span class="ti-angle-right"></span></a></li>
					</ul>
				@endif
			</nav>
		</div>
	</div>
</div>