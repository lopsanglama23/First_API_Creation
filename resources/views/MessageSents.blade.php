<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusher Chat</title>
</head>
<body>
    <h2>Live Chat Messages</h2>
    <div id="messages" style="border:1px solid #ccc; padding:10px; width:300px; height:200px; overflow-y:auto;">
        <!-- messages will appear here -->
    </div>

    <script src="https://js.pusher.com/8.2/pusher.min.js"></script>
    <script>
        // Initialize Pusher
        const pusher = new Pusher('a0de0f0bdfe94a66377e', {
            cluster: 'ap1',
            encrypted: true
        });

        // Subscribe to your channel
        const channel = pusher.subscribe('chat-channel');

        // Listen for event
        channel.bind('message-sent', function(data) {
            console.log('Message received:', data);

            // Display message
            const box = document.getElementById('messages');
            const item = document.createElement('div');
            item.textContent = data.message;
            box.appendChild(item);
        });
    </script>
</body>
</html>
