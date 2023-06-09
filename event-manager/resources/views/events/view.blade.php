<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Event</title>
</head>

<body>
    <div>
        <label for="name">Event Name:</label>
        <input readonly type="text" value="{{ $event->name }}" name="name" />
    </div>
    <div>
        <label for="slug">Slug:</label>
        <input readonly type="text" value="{{ $event->slug }}" name="slug" />
    </div>
    <div>
        <label for="date">Start At:</label>
        <input readonly type="date" value="{{ date('Y-m-d', strtotime($event->start_at)) }}" name="start_at" />
    </div>
    <div>
        <label for="end_at">End At:</label>
        <input readonly type="date" value="{{ date('Y-m-d', strtotime($event->end_at)) }}" name="end_at" />
    </div>
    <div>
        <button onclick="window.location='/events'">Return</button>
    </div>
</body>

</html>