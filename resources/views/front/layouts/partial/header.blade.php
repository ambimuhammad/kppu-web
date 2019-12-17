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

			<!-- CART / SEARCH -->
			<div class="header-x pull-right">
				<div class="s-search">
					<div class="ss-trigger"><i class="icon-search2"></i></div>
					<div class="ss-content">
						<span class="ss-close icon-cross2"></span>
						<div class="ssc-inner">
							<form>
								<input type="text" placeholder="Type Search text here...">
								<button type="submit"><i class="icon-search2"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
				<ul class="nav navbar-nav">
					<li class="yamm-fw">
						<a href="{{ route('front.index') }}">
							Home
						</a>
					</li>

					<li class="yamm-fw">
						<a href="#">
							Service
						</a>
					</li>
					<li class="dropdown">
						<a href="{{ route('front.artikel') }}">
							Blog
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