importScripts("https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js");
importScripts(
    "https://www.gstatic.com/firebasejs/8.10.0/firebase-messaging.js"
);

firebase.initializeApp({
    apiKey: "AIzaSyDBp8yB0pifJqEZeGhShoO18X66xE-lw04",
    authDomain: "crm-staffshaw.firebaseapp.com",
    projectId: "crm-staffshaw",
    storageBucket: "crm-staffshaw.appspot.com",
    messagingSenderId: "612678404336",
    appId: "1:612678404336:web:a0384e3b8b1a0418245a35",
    measurementId: "G-6RBE6R49CD",
});

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload
    );

    const notificationTitle = payload.notification.title;
    const notificationOptions = {
        body: payload.notification.body,
        icon: "/logo.png", // optional icon
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions
    );
});
