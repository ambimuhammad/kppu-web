@extends('front.layouts.primary')
@section('content')
<!-- INNER CONTENT -->
<div class="inner-content">
    <div class="container">

        <!-- ABOUT -->
        <div class="section-about space100">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img src="{{ asset('front/trend/images/other/2.jpg') }}" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <h3>Who We Are &amp; What We Do</h3>
                        {!! $about->deskripsi !!}
                    </div>
                </div>
            </div>
        </div>

        <!-- SERVICES -->
        <div class="section-services2 space40">
            <div class="row">
                <div class="col-md-4">
                    <h3>Awesome Features<br>packed in one</h3>
                    <p class="space30">Lorem Ipsum as their default model text
                        andasearchfor lorem ipsum will uncover many
                        web sites versions have over the years
                    </p>
                    <a href="#" class="button one space30">Get Started!</a>
                </div>
                <!-- end section -->
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4 ss2-content">
                            <i class="icon-layout"></i>
                            <h4>80+ HTML pages</h4>
                            <p>Suspendisse gravida purus nec facilisis quis ipsum massa hendrerit vitae lacinia odio
                                rhoncus.</p>
                        </div>
                        <!-- end section -->
                        <div class="col-md-4 ss2-content">
                            <i class="icon-bell2"></i>
                            <h4>Tons of Features</h4>
                            <p>Suspendisse gravida purus nec facilisis quis ipsum massa hendrerit vitae lacinia odio
                                rhoncus.</p>
                        </div>
                        <!-- end section -->
                        <div class="col-md-4 ss2-content">
                            <i class="icon-download22"></i>
                            <h4>FREE Updates</h4>
                            <p>Suspendisse gravida purus nec facilisis quis ipsum massa hendrerit vitae lacinia odio
                                rhoncus.</p>
                        </div>
                        <!-- end section -->
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <!-- TESTIMONIALS -->
        <section id="section-testimonials">
            <div class="container">
                <h2 class="content-head text-center">Testimonials <em>Our industry experts help scale grow and
                        succeed.</em></h2>
                <div class="testimonial-box">
                    <div id="testimonial" class="owl-carousel">
                        <div class="quote-info">
                            <img src="{{ asset('front/trend/images/quote/1.jpg') }}" class="img-responsive" alt="">
                            <p>Duis iaculis mauris dui tellus arcu rhoncus tellus non suscipit nisl tincidunt eget.
                                Mauris in porta sapien. Pellentesque luctus urna volutpat, mollis dolor porttitor,
                                rutrum sem. Aliquam vitae orci a libero iaculis sollicitudin. Sed ullamcorper lorem
                                justo, ut elementum enim dapibus vel.</p>
                            <h2>David Billie</h2>
                        </div>
                        <div class="quote-info">
                            <img src="{{ asset('front/trend/images/quote/2.jpg') }}" class="img-responsive" alt="">
                            <p>Duis iaculis mauris dui tellus arcu rhoncus tellus non suscipit nisl tincidunt eget.
                                Mauris in porta sapien. Pellentesque luctus urna volutpat, mollis dolor porttitor,
                                rutrum sem. Aliquam vitae orci a libero iaculis sollicitudin. Sed ullamcorper lorem
                                justo, ut elementum enim dapibus vel.</p>
                            <h2>Katey Thane</h2>
                        </div>
                        <div class="quote-info">
                            <img src="{{ asset('front/trend/images/quote/3.jpg') }}" class="img-responsive" alt="">
                            <p>Duis iaculis mauris dui tellus arcu rhoncus tellus non suscipit nisl tincidunt eget.
                                Mauris in porta sapien. Pellentesque luctus urna volutpat, mollis dolor porttitor,
                                rutrum sem. Aliquam vitae orci a libero iaculis sollicitudin. Sed ullamcorper lorem
                                justo, ut elementum enim dapibus vel.</p>
                            <h2>Wally Buddy</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection