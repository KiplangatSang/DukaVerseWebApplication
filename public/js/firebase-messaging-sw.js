importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
firebase.initializeApp({
    apiKey: "AIzaSyDr39kd9qTF87nP59vLytmJTKE-HM8raw8",
    projectId: "hs-microfinance",
    messagingSenderId: "XXXXXXXXX",
    appId: "1:953266534737:android:72c66fb0f901c768717b70"
});
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});