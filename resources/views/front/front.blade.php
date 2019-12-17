@extends('front.layouts.primary')
@section('content')
<!-- SLIDER -->
<div class="slider-wrap">
	<div class="tp-banner-container">
		<div class="tp-banner">
			<ul>
				<!-- SLIDE  -->
				@foreach($slides as $slide)
				<li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-thumb="" data-delay="13000"
					data-saveperformance="off" data-title="Our Workplace">
					<img src="{{ asset($slide->path) }}" alt="kenburns1" data-bgposition="left center"
						data-kenburns="on" data-duration="14000" data-ease="Linear.easeNone" data-bgfit="100"
						data-bgfitend="130" data-bgpositionend="right center">
					{{-- <div class="tp-caption customin customout tp-resizeme" data-x="left" data-hoffset="60" data-y="170"
						data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="1000" data-start="500" data-easing="Back.easeInOut" data-endspeed="300"
						style="font-size:80px;color:#fff;text-transform:uppercase;font-weight: 800 !important;letter-spacing: 0px;line-height: 120% !important;">
						{{ strip_tags($slide->deskripsi) }}
		</div>
		<div class="tp-caption light_title customin customout tp-resizeme" data-x="left" data-hoffset="60" data-y="370"
			data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
			data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="1000" data-start="700" data-easing="Back.easeInOut" data-endspeed="300"
			style="font-size:18px;color:#fff;">{{ strip_tags($slide->deskripsi) }}
		</div>
		<a href="#" class="tp-caption small_title  customin customout tp-resizeme" data-x="left" data-hoffset="60"
			data-y="450"
			data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
			data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
			data-speed="1600" data-start="900" data-easing="Back.easeInOut" data-endspeed="300" style="	background: #000;
							padding:18px 28px;
							color: #fff;
							text-transform: uppercase;
							border: none;
							font-size: 13px;
							letter-spacing: 2px;
							border-radius: 0px;
							display: table;
							transition: .4s;
							border-radius:5px;
							">Buy now</a> --}}
		</li>
		@endforeach
		</ul>
		<div class="tp-bannertimer"></div>
	</div>
</div>
</div>

<div class="inner-content no-padding">
	<div class="space40"></div>
	<div class="container">
		<div class="space60"></div>
		<div class="welcome-content text-center">
			<h2>Welcome to Dirgatz Indonesia</h2>
			<p class="lead">The best looking template with mindblowing features</p>
		</div>
	</div>

	<div class="space10"></div>
	<div class="container padding70">
		<div class="section-about">
			<div class="row">
				<div class="col-md-6">
					<div>
						<img src="{{ asset('front/trend/images/other/6.png') }}" class="img-responsive" alt="">
					</div>
				</div>
				<div class="col-md-6">
					<div>
						<div class="space70"></div>
						<h3>Who We Are &amp; What We Do</h3>
						{!! htmlspecialchars_decode($about->deskripsi) !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="space50"></div>
	<section id="portfolio-section">
		<div class="container">
			<h3 class="uppercase text-center">Project Gallery</h3>
		</div>
		<ul class="filter" data-option-key="filter">
			<li><a class="selected" href="#filter" data-option-value="*">All</a></li>
			@foreach($recent as $re)
			<li><a href="#" data-option-value=".{{ $re->kategori_recent_work }}">{{ $re->kategori_recent_work }}</a>
			</li>
			@endforeach
		</ul>
		<div id="portfolio-home" class="isotope">
			@foreach($recent as $res)
			@foreach($res->galleries as $rest)
			<div class="project-item {{ $res->kategori_recent_work }}">
				<div class="project-gal">
					<img src="{{ asset($rest->path) }}" style="width: 333px; height: 214px;" class="img-responsive"
						alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset($rest->path) }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="{{ url('portfolio', $res->id) }}"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Aliquam tincidunt risus.</h2>
					<p>Web , Creative</p>
				</div>
			</div>
			@endforeach
			@endforeach
		</div>
	</section>
</div>

<div class="clearfix space30"></div>
<div class="clients container padding80">
	<h4 class="uppercase space40 text-center">Our awesome Clients</h4>
	<div id="carousel_five" class="owl-carousel">
		@foreach($client as $clients)
		<div class="item client-logo">
			<a href="{{ $clients->link_client }}"><img src="{{ asset($clients->path) }}"
					style="width: 333px; height: 214px; margin-left: 10px;" class="img-responsive" alt="" /></a>
			<p><a href="{{ $clients->link_client }}">{{ ucwords($clients->nama_client) }}</a></p>
		</div>
		@endforeach
	</div>
</div>
@endsection