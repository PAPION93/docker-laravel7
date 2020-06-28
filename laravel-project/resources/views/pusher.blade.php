<!DOCTYPE html>
<head>
  <title>Pusher Test</title>
  <script src="{{ mix('js/app.js') }}"></script>

  <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
  <script>

Echo.channel('my-channel') // 채널 이름
  .listen('MyEvent', (e) => { // 이벤트 이름
  console.log(e);
});


    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('484f272dc60e43e15f6b', {
      cluster: 'ap3'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>my-channel</code>
    with event name <code>my-event</code>.
  </p>
</body>
