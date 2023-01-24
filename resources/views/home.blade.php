@extends('layouts.app')

@section('content')
    {{-- Banner --}}
    <div id="main">
        <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators mb-5">
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="/public/assets/img/workout.png" alt="">
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left align-self-center">
                                    <h1 class="h1 text-dark"><b>Pundana</b> Gym Booking</h1>
                                    <h3 class="h2">Fitness is not a destination. It is a way of life.</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="/public/assets/img/trainer.png" alt="">
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left">
                                    <div class="text-align-left align-self-center">
                                        <h1 class="h1 text-dark"><b>Book </b>now!!!</h1>
                                        <h3 class="h3"> You are one step easier to book a gym room for yourself.
                                            Keep
                                            your timetable clean &
                                            organize your gym timing.</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="carousel-item">
                    <div class="container">
                        <div class="row p-5">
                            <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                                <img class="img-fluid" src="/public/assets/img/dumbell.png" alt="">
                            </div>
                            <div class="col-lg-6 mb-0 d-flex align-items-center">
                                <div class="text-align-left">
                                    <h1 class="h1">Repr in voluptate</h1>
                                    <h3 class="h2">Ullamco laboris nisi ut </h3>
                                    <p>
                                        We bring you 100% free CSS templates for your websites.
                                        If you wish to support TemplateMo, please make a small contribution via PayPal
                                        or
                                        tell your friends about our website. Thank you.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="text-center">
                <a href="/book" class="btn mb-3" style="background-color: #fab011;">Book now</a>
            </div>
            <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel"
                role="button" data-bs-slide="prev">
                <i class="fas fa-chevron-left"></i>
            </a>
            <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel"
                role="button" data-bs-slide="next">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
    </div>

    {{-- About us --}}
    <section id="about" class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-8 m-auto">
                <h1 class="h1">About us</h1>
                <p class="mt-5">
                    In UiTM Puncak Perdana Gym, we have all you need to get fit, the way you want. We have a cardio
                    area, free weights area, weight training area, playground area, and more! Whether you choose to work
                    out on your own, with a partner, we have what you need to achieve your fitness goals and get healthy
                    lifestyle.
                    There is no other place such as Uitm Pundana Gym where you can free to workout and get fitness for
                    the class. Healthy life towards to healthy students is our tagline. Get in here to have the best
                    experience workout using this gym!
                </p>
            </div>
        </div>
    </section>

    {{-- Feedback --}}
    <div id="feedback" class="d-flex align-items-center justify-content-center">
        <div class="shadow-lg p-3 mt-5 mb-5 bg-white rounded">
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                            <h1 class="display-5 mb-3">Any comments?</h1>
                            <p class="mb-4">Please write to us if you have any comment or suggestion so that we may
                                improve
                                your enjoyment at our venue</p>
                            <form method="post" action="{{ route('comment.store') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Leave a comment here" id="message" name="comment"
                                                style="height: 100px"></textarea>
                                            <label for="comment">Comment</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary py-3 px-4"
                                            style="background-color: #fab011; color: #000; border-width: 0;"
                                            type="submit">Send Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
