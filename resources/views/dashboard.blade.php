@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
    </div> --}}

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                {{-- <center>

                    <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()"
                        class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>

                </center> --}}

                <div class="card">

                    <div class="card-header">{{ __('Dashboard') }}</div>



                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">

                                {{ session('status') }}

                            </div>
                        @endif



                        <form action="{{ route('send.notification') }}" method="POST">

                            @csrf

                            <div class="form-group">

                                <label>Title</label>

                                <input type="text" class="form-control" name="title">

                            </div>

                            <div class="form-group">

                                <label>Body</label>

                                <textarea class="form-control" name="body"></textarea>

                            </div>

                            <button type="submit" class="btn btn-primary">Send Notification</button>

                        </form>



                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>

    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyDBp8yB0pifJqEZeGhShoO18X66xE-lw04",
            authDomain: "crm-staffshaw.firebaseapp.com",
            projectId: "crm-staffshaw",
            storageBucket: "crm-staffshaw.firebasestorage.app",
            messagingSenderId: "612678404336",
            appId: "1:612678404336:web:a0384e3b8b1a0418245a35",
            // measurementId: "G-6RBE6R49CD"
        };

        const app = firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        messaging.requestPermission()
            .then(() => messaging.getToken())
            .then((token) => {
                fetch('{{ route('save.fcm.token') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        token: token
                    }),
                });
            })
            .catch((error) => {
                console.error('FCM permission denied or error', error);
            });

        messaging.onMessage(function(payload) {

            const noteTitle = payload.notification.title;

            const noteOptions = {

                body: payload.notification.body,

                icon: payload.notification.icon,

            };

            new Notification(noteTitle, noteOptions);

        });
    </script>
@endsection
