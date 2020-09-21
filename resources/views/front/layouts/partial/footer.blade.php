<!-- FOOTER -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h4 class="space30">About us</h4>
				<img src="{{ asset('front/trend/images/basic/logo-dirgatz.png') }}" class="img-responsive space20"
					width="70" alt="" />
			</div>
			<div class="col-md-4">
				<h4 class="space30">Recent Posts</h4>
				<ul class="f-posts">
					{!! Helper::get_recent_post() !!}
				</ul>
			</div>
			<div class="col-md-4">
				<h4 class="space30">Contact</h4>
				<ul class="c-info">
					{!! Helper::get_footer_contact() !!}
					<div class="clearfix space10"></div>
			</div>
		</div>
	</div>
</footer>

<!-- FOOTER COPYRIGHT -->
<div class="footer-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<p>&copy; Copyright 2020. Designed by Dirgatz.</p>
			</div>
		</div>
	</div>
</div>