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
				<!-- SLIDE  -->
				{{-- <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-saveperformance="on"  data-title="Ken Burns Slide">
						<!-- MAIN IMAGE -->
						<img src="{{ asset('front/trend/images/dummy.png') }}" alt="2"
				data-lazyload="{{ asset('front/trend/images/slider/2.jpg') }}" data-bgposition="right top"
				data-kenburns="on" data-duration="12000" data-ease="Power0.easeInOut" data-bgfit="115"
				data-bgfitend="100" data-bgpositionend="center bottom">
				<!-- LAYERS -->
				<!-- LAYER NR. 1 -->
				<div class="tp-caption small_text lft tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="210"
					data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
					data-speed="500" data-start="1200" data-easing="Power3.easeInOut" data-splitin="none"
					data-splitout="none" data-elementdelay="0.05" data-endelementdelay="0.1" style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;
							min-height: 0px;
							position: absolute;
							color: #fff;
							text-shadow: none;
							font-weight: 400;
							font-size: 14px;
							line-height: 20px;
							margin: 0px;
							border-width: 0px;
							border-style: none;
							text-transform: uppercase;
							white-space: nowrap;
							letter-spacing: 1.8px;
							"><span>Why you choose this template</span>
				</div>
				<!-- LAYER NR. 2 -->
				<div class="tp-caption small_text customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="256"
					data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
					data-speed="500" data-start="1400" data-easing="Power3.easeInOut" data-splitin="none"
					data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;   width: 60px !important;
							height: 1px !important;
							background: #fff !important;
							">
					<p class="line white"></p>
				</div>
				<!-- LAYER NR. 3 -->
				<div class="tp-caption finewide_medium_white lfl tp-resizeme rs-parallaxlevel-0 center-align"
					data-x="center" data-y="280"
					data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
					data-speed="500" data-start="1800" data-easing="Power3.easeInOut" data-splitin="none"
					data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 8; max-width: auto; max-height: auto; white-space: nowrap;  color: #222222;
							text-shadow: none;
							font-size: 48px;
							line-height: 50px;
							font-weight: 900;
							background-color: none;
							text-decoration: none;
							font-family:Open Sans, sans-serif;
							text-transform: uppercase;
							border-width: 0px;
							color: #fff;
							text-align:center;
							border-color: transparent;
							border-style: none;
							letter-spacing: 2.5;
							"><span>A Creative way to show <br> your projects</span>
				</div>
				<!-- LAYER NR. 4 -->
				<div class="tp-caption small_text customin tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="405"
					data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
					data-speed="500" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none"
					data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1"
					style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">
					<p class="line white"></p>
				</div>
				<!-- LAYER NR. 5 -->
				<div class="tp-caption small_text lfr tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="435"
					data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
					data-speed="500" data-start="2400" data-easing="Power3.easeInOut" data-splitin="none"
					data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;  position: absolute;
							color: #222222;
							text-shadow: none;
							font-weight: 400;
							font-size: 14px;
							line-height: 20px;
							margin: 0px;
							border-width: 0px;
							font-family:Open Sans, sans-serif;
							text-transform: uppercase;
							white-space: nowrap;
							color: #fff;
							letter-spacing: 1.8px;
							"><span>Create UNLIMITED portfolios and showcase them ANYWHERE</span>
				</div>
				<!-- LAYER NR. 6 -->
				<a href="#" class="tp-caption lfb tp-resizeme rs-parallaxlevel-0" data-x="center" data-y="490"
					data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
					data-speed="500" data-start="2800" data-easing="Power3.easeInOut" data-splitin="none"
					data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-linktoslide="next"
					style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;padding:18px 28px;
							color: #fff;
							text-transform: uppercase;
							border: none;
							background:#000;
							font-size: 13px;
							letter-spacing: 2px;
							font-family: Montserrat;
							border-radius: 0px;
							display: table;
							transition: .4s;
							border-radius:5px;">buy this theme</a>
				</li> --}}
				<!-- SLIDE  -->
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
			<h2>Welcome to trend</h2>
			<p class="lead">The best looking template with mindblowing features</p>
		</div>
	</div>
	<div class="space10"></div>
	<div class="container">
		<div class="services">
			<div class="row">
				<div class="col-md-3">
					<div class="service-content text-center">
						<span><i class="icon-monitor"></i></span>
						<div class="services-content">
							<h2>Responsive Design</h2>
							<p>Curabitur eleifend leo justo id risus vel imperdiet justo a cursus risusauctor
								ullamcorper elit a feugiat.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-content text-center">
						<span><i class="icon-cog3"></i></span>
						<div class="services-content">
							<h2>Fully Customizable</h2>
							<p>Curabitur eleifend leo justo id risus vel imperdiet justo a cursus risusauctor
								ullamcorper elit a feugiat.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-content text-center">
						<span><i class="icon-layout"></i></span>
						<div class="services-content">
							<h2>unlimited Layouts</h2>
							<p>Curabitur eleifend leo justo id risus vel imperdiet justo a cursus risusauctor
								ullamcorper elit a feugiat.</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="service-content text-center">
						<span><i class="icon-support"></i></span>
						<div class="services-content">
							<h2>Live Support</h2>
							<p>Curabitur eleifend leo justo id risus vel imperdiet justo a cursus risusauctor
								ullamcorper elit a feugiat.</p>
						</div>
					</div>
				</div>
			</div>
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
						<p>Cum nascetur ridiculus mus. Prae sent non sem eu mi malesuada viverra volutpat ut libero.
							Nullam a venenatis tellus. Nam fen convallis tristique. In imperdiet est sed aliquet
							imperdiet. Nulla libero orci, cursus ut consecr ac, tempus a odio. Etiam quis massa ac ante
							adipiscing consectetur. Duis dui turpis, porttitor sit amet metus sed, interdum tempus
							ipsum. Integer aliquam sem elementum pellentesque. Donec mollis eros dolor, a ongue neque
							venenatis vulputate. Etiam a eros adipiscing, dapibus ante id, luctus massa. Maecenas non
							quam interdum, aliquam leo a, ornare mi. Integer. faucibus turpis sed leo gravida laoreet.
							Curabitur at ligula. </p>
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
			<li><a href="#" data-option-value=".branding">Branding</a></li>
			<li><a href="#" data-option-value=".illustration">Illustration</a></li>
			<li><a href="#" data-option-value=".web-design">Web Design</a></li>
			<li><a href="#" data-option-value=".print">Print</a></li>
		</ul>
		<div id="portfolio-home" class="isotope">
			<div class="project-item photography branding">
				<div class="project-gal">
					<img src="{{ asset('front/trend/images/projects/1.jpg') }}" class="img-responsive" alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset('front/trend/images/projects/1.jpg') }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="portfolio-single-slider.html"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Aliquam tincidunt risus.</h2>
					<p>Web , Creative</p>
				</div>
			</div>
			<div class="project-item illustration web-design illustration">
				<div class="project-gal">
					<img src="{{ asset('front/trend/images/projects/2.jpg') }}" class="img-responsive" alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset('front/trend/images/projects/2.jpg') }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="portfolio-single-slider.html"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Vestibulum auctor</h2>
					<p>Image Gallery</p>
				</div>
			</div>
			<div class="project-item illustration print">
				<div class="project-gal">
					<img src="{{ asset('front/trend/images/projects/3.jpg') }}" class="img-responsive" alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset('front/trend/images/projects/3.jpg') }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="portfolio-single-slider.html"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Cras ornare tristique elit</h2>
					<p>Photoshop</p>
				</div>
			</div>
			<div class="project-item photography web-design">
				<div class="project-gal">
					<img src="{{ asset('front/trend/images/projects/4.jpg') }}" class="img-responsive" alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset('front/trend/images/projects/4.jpg') }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="portfolio-single-slider.html"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Praesent placerat risus quis</h2>
					<p>UI/UX, Web Design</p>
				</div>
			</div>
			<div class="project-item branding">
				<div class="project-gal">
					<img src="{{ asset('front/trend/images/projects/5.jpg') }}" class="img-responsive" alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset('front/trend/images/projects/5.jpg') }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="portfolio-single-slider.html"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Ut aliquam sollicitudin</h2>
					<p>Web Development</p>
				</div>
			</div>
			<div class="project-item illustration web-design print">
				<div class="project-gal">
					<img src="{{ asset('front/trend/images/projects/6.jpg') }}" class="img-responsive" alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset('front/trend/images/projects/6.jpg') }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="portfolio-single-slider.html"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Cras ornare tristique</h2>
					<p>Creative, Web</p>
				</div>
			</div>
			<div class="project-item photography branding illustration">
				<div class="project-gal">
					<img src="{{ asset('front/trend/images/projects/7.jpg') }}" class="img-responsive" alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset('front/trend/images/projects/7.jpg') }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="portfolio-single-slider.html"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Vestibulum auctor</h2>
					<p>Image Gallery</p>
				</div>
			</div>
			<div class="project-item illustration web-design">
				<div class="project-gal">
					<img src="{{ asset('front/trend/images/projects/8.jpg') }}" class="img-responsive" alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset('front/trend/images/projects/8.jpg') }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="portfolio-single-slider.html"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Aliquam tincidunt risus.</h2>
					<p>Image Gallery</p>
				</div>
			</div>
			<div class="project-item branding web-design print">
				<div class="project-gal">
					<img src="{{ asset('front/trend/images/projects/9.jpg') }}" class="img-responsive" alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset('front/trend/images/projects/9.jpg') }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="portfolio-single-slider.html"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Cras ornare tristique</h2>
					<p>Image Gallery</p>
				</div>
			</div>
			<div class="project-item photography branding">
				<div class="project-gal">
					<img src="{{ asset('front/trend/images/projects/10.jpg') }}" class="img-responsive" alt="">
					<div class="overlay-folio">
						<div class="hover-box">
							<div class="hover-zoom">
								<a class="mp-lightbox zoom" href="{{ asset('front/trend/images/projects/10.jpg') }}"><i
										class="icon-plus2"></i></a>
								<a class="link" href="portfolio-single-slider.html"><i class="icon-link3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="project-info">
					<h2>Aliquam erat volutpat</h2>
					<p>Image Gallery</p>
				</div>
			</div>
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