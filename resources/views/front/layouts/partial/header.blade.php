<!-- HEADER -->
<header id="header-main">
	<div class="container">
		<div class="navbar yamm navbar-default">
			<div class="navbar-header navbar-heade">
				<button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.html" class="navbar-brand"><img
						src="{{ asset('front/trend/images/basic/logo-dirgatz.png') }}" width="40" height="150"
						alt="" /></a>
			</div>

			<div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
				<ul class="nav navbar-nav">
					<li class="yamm-fw">
						<a href="{{ route('front.index') }}">
							Home
						</a>
					</li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							About Us
							<div class="arrow-up"><i class="fa fa-angle-down"></i></div>
						</a>
						<ul class="dropdown-menu" role="menu">
							{!! Helper::get_menu_about() !!}
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							Service
							<div class="arrow-up"><i class="fa fa-angle-down"></i></div>
						</a>
						<ul class="dropdown-menu" role="menu">
							{!! Helper::get_menu_service() !!}
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" data-toggle="dropdown" class="dropdown-toggle">
							Product
							<div class="arrow-up"><i class="fa fa-angle-down"></i></div>
						</a>
						<ul class="dropdown-menu" role="menu">
							{!! Helper::get_menu_product() !!}
						</ul>
					</li>
					<li class="dropdown">
						<a href="{{ route('front.artikel') }}">
							Blog
						</a>
					</li>
					<li class="dropdown">
						<a href="#">
							Project Gallery
						</a>
					</li>
					<li class="dropdown">
						<a href="{{ route('front.contact') }}">
							Contact
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</header>