@extends('layouts.master')

@section('styles')
	{{-- Bootstrap --}}
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
	{{-- FontAwesome --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection

<div class="col-lg-1 d-none d-lg-block">
	<a class="slider-control slider-control-prev" href="#sliderControls" role="button" data-slide="prev">
		<i class="fas fa-chevron-left" aria-hidden="true"></i>
	</a>
</div>
<div class="col-lg-10 col-md-12 mt-5 pt-5">
	<div id="sliderControls" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
			@foreach ($testimonials as $testimonial)
				<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
					<img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->client_name }}" width="100%">
					<div class="card">
						<div class="card-body pt-5 mt-3 px-0">
							<div class="media">
								<img class="mr-lg-5 mr-3 mt-1" src="{{ asset('images/quotes.svg') }}" width="85">
								<div class="media-body">
									<blockquote class="blockquote mb-0">
										{!! $testimonial->content !!}
										<footer class="blockquote-footer font-weight-bold">
											<a href="{{ $testimonial->client_url }}" class="text-gray">{{ $testimonial->client_name }}</a></footer>
									</blockquote>
								</div>
								<img class="ml-5 mt-5 d-none d-lg-block" src="{{ asset('images/quotes.svg') }}" width="85">
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
<div class="col-lg-1 d-none d-lg-block">
	<a class="slider-control slider-control-next" href="#sliderControls" role="button" data-slide="next">
		<i class="fas fa-chevron-right"></i>
	</a>
</div>

@section('scripts')
	{{-- Bootstrap --}}
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
	{{-- FontAwesome --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
@endsection