@extends('layouts/layout')
@section('title', 'Our Services')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Our Services</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Service 1">
                <div class="card-body">
                    <h5 class="card-title">Service 1</h5>
                    <p class="card-text">Description of Service 1. It provides amazing features and benefits.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Service 2">
                <div class="card-body">
                    <h5 class="card-title">Service 2</h5>
                    <p class="card-text">Description of Service 2. It offers top-notch quality and performance.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Service 3">
                <div class="card-body">
                    <h5 class="card-title">Service 3</h5>
                    <p class="card-text">Description of Service 3. Exceptional value and customer satisfaction guaranteed.</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
