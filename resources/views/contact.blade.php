@extends('layouts/layout')
@section('title', 'Contact')

@section('content')
<div class="container mt-5 contact-form">
    <h3 class="text-center mb-4">Drop Us a Message</h3>
    <form method="post">
        @csrf <!-- Add CSRF token for form security in Laravel -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" name="txtName" class="form-control" placeholder="Your Name *" required />
                </div>
                <div class="form-group">
                    <input type="email" name="txtEmail" class="form-control" placeholder="Your Email *" required />
                </div>
                <div class="form-group">
                    <input type="tel" name="txtPhone" class="form-control" placeholder="Your Phone Number *" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="btnSubmit" class="btn btn-primary" value="Send Message" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <textarea name="txtMsg" class="form-control" placeholder="Your Message *" required style="height: 150px;"></textarea>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
