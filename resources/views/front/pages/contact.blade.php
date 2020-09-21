@extends('front.layouts.primary')
@section('content')
<!-- INNER CONTENT -->
<div class="inner-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 margin30">
                <div class="form-contact">
                    <form class="b-form b-contact-form contact-form" action="contact.php">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                        <label>Name<span>*</span></label>
                                        <input class="field-name form-control input-lg" type="text"
                                            placeholder="Name (required)">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 controls">
                                        <label>Email Address<span>*</span></label>
                                        <input class="field-email form-control input-lg" type="text"
                                            placeholder="E-mail (required)">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12  controls">
                                <label>Phone Number<span>*</span></label>
                                <input class="field-phone form-control" placeholder="Phone Number" type="tel">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 controls">
                                <label>Message<span>*</span></label>
                                <textarea rows="5" class="field-comments form-control input-lg"
                                    placeholder="Message"></textarea>
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="required">
                            <p>( <span style="color:red">*</span> fields are required )</p>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn-submit button btn-md">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--contact form-->
            </div>
            <div class="col-md-4">
                <h3 class="no-margin">Contact info</h3>
                <div class="space20"></div>
                <ul class="contact-info">
                    <li>
                        <p><strong><i class="fa fa-map-marker"></i> Address:</strong> {{ $contact->alamat }}</p>
                    </li>
                    <li>
                        <p><strong><i class="fa fa-envelope"></i> Mail Us:</strong> <a
                                href="#">{{ $contact->email }}</a>
                        </p>
                    </li>
                    <li>
                        <p><strong><i class="fa fa-phone"></i> Phone:</strong> {{ $contact->telepon }}</p>
                    </li>
                    <li>
                        <p><strong><i class="fa fa-print"></i> Fax:</strong> {{ $contact->fax }}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection