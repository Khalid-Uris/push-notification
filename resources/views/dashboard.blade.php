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



                        <form id="notification-form">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" required>
                            </div>

                            <div class="form-group">
                                <label>Body</label>
                                <textarea class="form-control" name="body" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Send Notification</button>
                        </form>

                        <div id="success-message" class="mt-2 text-success" style="display:none;">
                            ✅ Notification Sent!
                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"></script>

    {{-- <script>
        const firebaseConfig = {
            apiKey: "AIzaSyDBp8yB0pifJqEZeGhShoO18X66xE-lw04",
            authDomain: "crm-staffshaw.firebaseapp.com",
            projectId: "crm-staffshaw",
            storageBucket: "crm-staffshaw.firebasestorage.app",
            messagingSenderId: "612678404336",
            appId: "1:612678404336:web:a0384e3b8b1a0418245a35",
            measurementId: "G-6RBE6R49CD"
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
            console.log('Message received from FCM:', payload);

            const noteTitle = payload.notification.title;

            const noteOptions = {

                body: payload.notification.body,

                icon: payload.notification.icon,

            };

            new Notification(noteTitle, noteOptions);

        });
    </script> --}}

    <script>
        // Your Firebase config
        const firebaseConfig = {
            apiKey: "AIzaSyDBp8yB0pifJqEZeGhShoO18X66xE-lw04",
            authDomain: "crm-staffshaw.firebaseapp.com",
            projectId: "crm-staffshaw",
            storageBucket: "crm-staffshaw.appspot.com", // fixed typo: .app → .com
            messagingSenderId: "612678404336",
            appId: "1:612678404336:web:a0384e3b8b1a0418245a35",
            measurementId: "G-6RBE6R49CD"
        };

        // Initialize Firebase
        const app = firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        // Register Service Worker and request permission
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/firebase-messaging-sw.js')
                .then(function(registration) {
                    console.log('Service Worker registered with scope:', registration.scope);
                    messaging.useServiceWorker(registration);

                    // Request notification permission and get token
                    return messaging.requestPermission();
                })
                .then(() => messaging.getToken())
                .then((token) => {
                    console.log('FCM Token:', token);

                    // Send token to server
                    fetch('{{ route('save.fcm.token') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            token
                        }),
                    });
                })
                .catch((error) => {
                    console.error('FCM permission denied or error', error);
                });
        } else {
            console.warn('Service workers are not supported by this browser.');
        }

        // Handle messages when the app is in the foreground
        messaging.onMessage(function(payload) {
            console.log('Message received from FCM:', payload);

            const noteTitle = payload.notification.title;
            const noteOptions = {
                body: payload.notification.body,
                //icon: payload.notification.icon || '/logo.png' // fallback icon
            };

            // Show browser notification
            // alert("Will try to show notification now.");
            console.log(noteTitle);
            console.log(noteOptions.body);
            new Notification(noteTitle, noteOptions.body);
            // console.log("Notification Permission ", Notification.permission);


            // Notification.requestPermission().then(function(permission) {
            //     if (permission === "granted") {
            //         new Notification(noteTitle, noteOptions);
            //     } else {
            //         console.warn("Notification permission not granted.");
            //     }
            // });
        });
    </script>


    <script>
        document.getElementById('notification-form').addEventListener('submit', function(e) {
            e.preventDefault();

            let title = this.title.value;
            let body = this.body.value;

            fetch('{{ route('send.notification') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        title: title,
                        body: body
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.sent) {
                        document.getElementById('success-message').style.display = 'block';

                        // Optional: show browser notification instantly
                        new Notification(title, {
                            body: body,
                            //icon: '/logo.png' // use a valid icon if you want
                        });
                    }
                })
                .catch(err => {
                    console.error('Error sending notification:', err);
                });
        });
    </script>
@endsection
