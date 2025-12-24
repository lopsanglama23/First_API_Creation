<!DOCTYPE html>
<html>
<head>
    <title>Test FCM Token</title>
    <!-- Load Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-messaging-compat.js"></script>
</head>
<body>
    <h1>FCM Token Generator (for Testing)</h1>
    <button onclick="getToken()">Generate & Save Token</button>
    <p id="token"></p>

    <script>
        // Firebase config pulled from env/services.php
        const firebaseConfig = {
            apiKey: "{{ config('services.firebase.api_key') }}",
            authDomain: "{{ config('services.firebase.auth_domain') }}",
            projectId: "{{ config('services.firebase.project_id') }}",
            storageBucket: "{{ config('services.firebase.storage_bucket') }}",
            messagingSenderId: "{{ config('services.firebase.messaging_sender_id') }}",
            appId: "{{ config('services.firebase.app_id') }}"
        };

        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        async function getToken() {
            try {
                // Request permission
                const permission = await Notification.requestPermission();
                if (permission === 'granted') {
                    // Get token using your VAPID public key
                    const token = await messaging.getToken({ vapidKey: "{{ config('services.firebase.vapid_key') }}" });
                    document.getElementById('token').innerText = 'Token: ' + token;

                    // Send token to Laravel backend to store
                    fetch('/save-fcm-token', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify({ fcm_token: token })
                    }).then(res => res.json())
                     .then(data => console.log('Saved:', data));
                } else {
                    alert('Notification permission denied');
                }
            } catch (err) {
                console.error('Error:', err);
            }
        }
    </script>
</body>
</html>