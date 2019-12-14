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
					<div class="tp-caption customin customout tp-resizeme" data-x="left" data-hoffset="60" data-y="170"
						data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="1000" data-start="500" data-easing="Back.easeInOut" data-endspeed="300"
						style="font-size:80px;color:#fff;text-transform:uppercase;font-weight: 800 !important;letter-spacing: 0px;line-height: 120% !important;">
						Creative <br>
						Clean Design
					</div>
					<div class="tp-caption light_title customin customout tp-resizeme" data-x="left" data-hoffset="60"
						data-y="370"
						data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
						data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
						data-speed="1000" data-start="700" data-easing="Back.easeInOut" data-endspeed="300"
						style="font-size:18px;color:#fff;">{{ strip_tags($slide->deskripsi) }}
					</div>
					<a href="#" class="tp-caption small_title  customin customout tp-resizeme" data-x="left"
						data-hoffset="60" data-y="450"
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
							">Buy now</a>
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
			<h3 class="uppercase text-center">Recent Works</h3>
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

	<div id="stats2" class="pattern-bg1">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="stats2-info">
						<p><span class="count">200</span></p>
						<h2>Completed Projects</h2>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="stats2-info">
						<p><span class="count">150</span></p>
						<h2>Awards Received</h2>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="stats2-info">
						<p><span class="count">387</span></p>
						<h2>Happy Clients</h2>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="stats2-info">
						<p><span class="count">1540</span></p>
						<h2>Coffee Consumed</h2>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="space30"></div>
	<div class="container padding40">
		<div class="row" id="team2">
			<h3 class="uppercase text-center no-margin">Our Awesome team</h3>
			<div class="space50"></div>
			<div class="col-md-3">
				<div class="staff-img">
					<img src="{{ asset('front/trend/images/team/1.jpg') }}" class="img-responsive" alt="">
				</div>
				<h2>Maud Elfreda</h2>
				<span>Marketing Expert</span>
				<div class="space10"></div>
				<div class="text-center">
					<p>Nam quis convallis erat, a fermentum tortor. Aliquam auctor felis eu mi tincidunt mollis. Morbi
						quis viverra lectus, eu accumsan nunc.</p>
					<ul class="team-social">
						<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="staff-img">
					<img src="{{ asset('front/trend/images/team/2.jpg') }}" class="img-responsive" alt="">
				</div>
				<h2>Maud Elfreda</h2>
				<span>Marketing Expert</span>
				<div class="space10"></div>
				<div class="text-center">
					<p>Nam quis convallis erat, a fermentum tortor. Aliquam auctor felis eu mi tincidunt mollis. Morbi
						quis viverra lectus, eu accumsan nunc.</p>
					<ul class="team-social">
						<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="staff-img">
					<img src="{{ asset('front/trend/images/team/3.jpg') }}" class="img-responsive" alt="">
				</div>
				<h2>Maud Elfreda</h2>
				<span>Marketing Expert</span>
				<div class="space10"></div>
				<div class="text-center">
					<p>Nam quis convallis erat, a fermentum tortor. Aliquam auctor felis eu mi tincidunt mollis. Morbi
						quis viverra lectus, eu accumsan nunc.</p>
					<ul class="team-social">
						<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-3">
				<div class="staff-img">
					<img src="{{ asset('front/trend/images/team/4.jpg') }}" class="img-responsive" alt="">
				</div>
				<h2>Maud Elfreda</h2>
				<span>Marketing Expert</span>
				<div class="space10"></div>
				<div class="text-center">
					<p>Nam quis convallis erat, a fermentum tortor. Aliquam auctor felis eu mi tincidunt mollis. Morbi
						quis viverra lectus, eu accumsan nunc.</p>
					<ul class="team-social">
						<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix space30"></div>
<div class="container space10">
	<div class="testimonial-box">
		<div id="testimonial" class="owl-carousel">
			<div class="quote-info">
				<img src="{{ asset('front/trend/images/quote/1.jpg') }}" class="img-responsive" alt="">
				<p>Duis iaculis mauris dui tellus arcu rhoncus tellus non suscipit nisl tincidunt eget. Mauris in porta
					sapien. Pellentesque luctus urna volutpat, mollis dolor porttitor, rutrum sem. Aliquam vitae orci a
					libero iaculis sollicitudin. Sed ullamcorper lorem justo, ut elementum enim dapibus vel.</p>
				<h2>David Billie</h2>
			</div>
			<div class="quote-info">
				<img src="{{ asset('front/trend/images/quote/2.jpg') }}" class="img-responsive" alt="">
				<p>Duis iaculis mauris dui tellus arcu rhoncus tellus non suscipit nisl tincidunt eget. Mauris in porta
					sapien. Pellentesque luctus urna volutpat, mollis dolor porttitor, rutrum sem. Aliquam vitae orci a
					libero iaculis sollicitudin. Sed ullamcorper lorem justo, ut elementum enim dapibus vel.</p>
				<h2>Katey Thane</h2>
			</div>
			<div class="quote-info">
				<img src="{{ asset('front/trend/images/quote/3.jpg') }}" class="img-responsive" alt="">
				<p>Duis iaculis mauris dui tellus arcu rhoncus tellus non suscipit nisl tincidunt eget. Mauris in porta
					sapien. Pellentesque luctus urna volutpat, mollis dolor porttitor, rutrum sem. Aliquam vitae orci a
					libero iaculis sollicitudin. Sed ullamcorper lorem justo, ut elementum enim dapibus vel.</p>
				<h2>Wally Buddy</h2>
			</div>
		</div>
	</div>
</div>

<div class="clients container padding80">
	<h4 class="uppercase space40 text-center">Our awesome Clients</h4>
	<div id="carousel_five" class="owl-carousel">
		<div class="item client-logo">
			<a href="#"><img src="{{ asset('front/trend/images/clients/1.png') }}" class="img-responsive" alt="" /></a>
		</div>
		<div class="item client-logo">
			<a href="#"><img src="{{ asset('front/trend/images/clients/2.png') }}" class="img-responsive" alt="" /></a>
		</div>
		<div class="item client-logo">
			<a href="#"><img src="{{ asset('front/trend/images/clients/3.png') }}" class="img-responsive" alt="" /></a>
		</div>
		<div class="item client-logo">
			<a href="#"><img src="{{ asset('front/trend/images/clients/4.png') }}" class="img-responsive" alt="" /></a>
		</div>
		<div class="item client-logo">
			<a href="#"><img src="{{ asset('front/trend/images/clients/5.png') }}" class="img-responsive" alt="" /></a>
		</div>
		<div class="item client-logo">
			<a href="#"><img src="{{ asset('front/trend/images/clients/6.png') }}" class="img-responsive" alt="" /></a>
		</div>
		<div class="item client-logo">
			<a href="#"><img src="{{ asset('front/trend/images/clients/7.png') }}" class="img-responsive" alt="" /></a>
		</div>
	</div>
</div>
@endsection