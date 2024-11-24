@extends('layouts/layout')
@section('title', 'About Us')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">About Us</h1>
    <div class="row">
        <div class="col-md-6">
            <h3>Our Mission</h3>
            <p>
                At [Your Company Name], our mission is to provide exceptional service and quality products 
                to our customers. We believe in building lasting relationships through trust and integrity.
            </p>
        </div>
        <div class="col-md-6">
            <h3>Our Vision</h3>
            <p>
                Our vision is to be a leader in the [industry] by continuously innovating and improving our services 
                to meet the needs of our customers. We strive to create a positive impact in our community.
            </p>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Our Values</h3>
            <ul>
                <li>Integrity</li>
                <li>Customer Commitment</li>
                <li>Quality</li>
                <li>Teamwork</li>
                <li>Innovation</li>
            </ul>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h3>Meet the Team</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Team Member 1">
                        <div class="card-body">
                            <h5 class="card-title">Team Member 1</h5>
                            <p class="card-text">Position and a brief bio of Team Member 1.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Team Member 2">
                        <div class="card-body">
                            <h5 class="card-title">Team Member 2</h5>
                            <p class="card-text">Position and a brief bio of Team Member 2.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="https://via.placeholder.com/300" class="card-img-top" alt="Team Member 3">
                        <div class="card-body">
                            <h5 class="card-title">Team Member 3</h5>
                            <p class="card-text">Position and a brief bio of Team Member 3.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
