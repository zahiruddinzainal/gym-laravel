
@extends('layouts.app')

@section('head')
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel='stylesheet' href='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.1.221/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.1.221/styles/kendo.material.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2018.1.221/styles/kendo.material.mobile.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.9/jquery.timepicker.min.css" />

@endsection

@section('content')
    <div id="feedback" class="p-5">
        @if (Session::has('book_success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('book_success') }}</p>
        @endif
        @if (Session::has('book_full'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('book_full') }}</p>
        @endif
        <div class="shadow-lg p-3 mt-5 mb-2 bg-white rounded">

            <div class="d-flex justify-content-center">
                <div class="gym-men"></div>
                <p style="color:#fff;">--</p>
                <p>Mens Gym</p>
            </div>
            <div class="d-flex justify-content-center">
                <div class="gym-women"></div>
                <p style="color:#fff;">--</p>
                <p>Women Gym</p>
            </div>

            <div id="calendar"></div>
        </div>
    </div>

    @auth
        <div class="text-center m-5">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-primary btn-full" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Book Gym
                </button>
            </div>
        </div>

        {{-- Booking Modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ route('book.gym') }}">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Book Gym as {{ Auth::user()->username }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="start">Select gym type</label>
                            <div id="start"class="input-group date" data-provide="datepicker">
                                <select class="form-select" name="gym_type" required>
                                    <option value="1" selected>Mens Gym</option>
                                    <option value="2">Womens Gym</option>
                                </select>
                            </div>
                            <br>
                            <label for="start">Select date to book</label>
                            <div id="start"class="input-group date" data-provide="datepicker">
                                <input type="date" class="form-control" name="date" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <br>

                            <label for="start">Select time to book</label>
                            <div id="start"class="input-group date" data-provide="datepicker">

                                <input id="timepicker" name="time"title="timepicker" min="07:00" max="23:00"
                                    style="width: 100%;" />

                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Book</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endauth

    @guest
        <div class="text-center m-5">
            <div class="d-grid gap-2 col-6 mx-auto">
                <a href="/login" class="btn btn-primary btn-full">
                    Book Gym
                </a>
            </div>
        </div>
    @endguest
@endsection

@section('scripts')
    {{-- Scripts --}}
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="js/main.js"></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js'></script>
    <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js'></script>
    <script src='https://raw.githubusercontent.com/gf3/moment-range/master/lib/moment-range.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.8.9/jquery.timepicker.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2018.1.221/js/kendo.all.min.js"></script>
    <script>
        $(document).ready(function() {
            jQuery(function() {
                jQuery('#date-picker-time').timepicker({
                    timeFormat: 'HH:mm',
                    interval: 60,
                    interval: 15, //still showing/displaying 30 mins interval
                    minHour: 0,
                    maxHour: 20,
                    dropdown: true,
                    dynamic: false,
                });
            });
            booking_jsons = [];
            @foreach ($bookings as $booking)
                if ({{ $booking->gym_type }} == 1) {
                    booking_jsons.push({
                        title: 'Booked by {{ \App\Models\User::find($booking->requestor)->username }} from {{ date("h:i A", strtotime("$booking->start_at")) }} to {{ date("h:i A", strtotime(\Carbon\Carbon::Parse(date("Y-m-d H:i:s", strtotime("$booking->end_at")))->addMinutes(1)))  }}',
                        start: '{{ $booking->start_at }}',
                        end: '{{ $booking->end_at }}',
                        color: '#61116a',
                        allDay: false
                    }, );
                } else {
                    booking_jsons.push({
                        title: 'Booked by {{ \App\Models\User::find($booking->requestor)->username }} from {{ date("h:i A", strtotime("$booking->start_at"))  }} to {{ date("h:i A", strtotime(\Carbon\Carbon::Parse(date("Y-m-d H:i:s", strtotime("$booking->end_at")))->addMinutes(1)))  }}',
                        start: '{{ $booking->start_at }}',
                        end: '{{ $booking->end_at }}',
                        color: '#febe10',
                        textColor: '#000',
                        allDay: false
                    }, );
                }
            @endforeach
            console.log(booking_jsons)
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'agendaWeek agendaDay'
                },
                weekends: true,
                weekMode: 'fixed',
                weekNumbers: false,
                defaultView: 'agendaWeek',
                allDaySlot: true,
                // selectable: true,
                // selectHelper: true,
                // unselectAuto: true,
                eventSources: [{
                    events: booking_jsons
                    // events: [{
                    //         title: 'event1',
                    //         start: '2023-01-05 12:30:00',
                    //         end: '2023-01-05 12:40:00',
                    //         allDay: false
                    //     },
                    //     {
                    //         title: 'event2',
                    //         start: '2023-01-08',
                    //         end: '2023-01-8',
                    //         allDay: false
                    //     },
                    //     {
                    //         title: 'event3',
                    //         start: '2023-01-05 12:30:00',
                    //         allDay: false
                    //     },
                    // ]
                }]
            });
        });
        // create TimePicker from input HTML element
        $("#timepicker").kendoTimePicker({
            dateInput: false
        });
    </script>
@endsection
