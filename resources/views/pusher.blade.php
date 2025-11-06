<!DOCTYPE html>
<html>
<head>
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
</head>
<body>
    <h2>Pusher Test</h2>
    <div id="messages"></div>

    <script>
        // Enable Pusher logging (optional for debugging)
        Pusher.logToConsole = true;

        // Initialize Pusher with your app key and cluster
        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
        });

        // Subscribe to the channel
        const channel = pusher.subscribe('chat-channel');

        // Listen for the event
        channel.bind('message-sent', function(data) {
            const div = document.getElementById('messages');
            div.innerHTML += `<p><strong>Received:</strong> ${data.message}</p>`;
        });
    </script>
</body>
</html>

