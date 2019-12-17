<!-- FOOTER -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<h4 class="space30">About us</h4>
				<img src="{{ asset('front/trend/images/basic/logo-ico.png') }}" class="img-responsive space20"
					width="70" alt="" />
				<p>Lorem ipsum dolor sit amet consec tetur elit vel quam ligula. Duis vel pulvinar diam in lacus non
					nisl commodo convallis.</p>
				<p>Phasellus rutrum urna ut nibh congue, ut vehicula nibh ultricies.</p>
			</div>
			<div class="col-md-3">
				<h4 class="space30">Recent Posts</h4>
				<ul class="f-posts">
					{!! Helper::get_recent_post() !!}
				</ul>
			</div>
			<div class="col-md-3">
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
				<p>&copy; Copyright 2015. Trend. Designed by <a href="http://www.ckthemes.com" target="_blank">CK
						Themes</a>.</p>
			</div>
			<div class="col-md-4">
				<div class="f-social pull-right">
					<a class="fa fa-twitter" href="#"></a>
					<a class="fa fa-facebook" href="#"></a>
					<a class="fa fa-linkedin" href="#"></a>
					<a class="fa fa-dribbble" href="#"></a>
					<a class="fa fa-google-plus" href="#"></a>
					<a class="fa fa-skype" href="#"></a>
					<a class="fa fa-behance" href="#"></a>
					<a class="fa fa-stumbleupon" href="#"></a>
					<a class="fa fa-rss" href="#"></a>
				</div>
			</div>
		</div>
	</div>
</div>