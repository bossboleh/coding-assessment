<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Event</title>
</head>

<body>
    <form method="post" action="/api/v1/events/{{ $event->id }}">
        @csrf
        @method('patch')
        <div>
            <label for="name">Event Name:</label>
            <input type="text" value="{{ $event->name }}" name="name" />
        </div>
        <div>
            <label for="slug">Slug:</label>
            <input type="text" value="{{ $event->slug }}" name="slug" />
        </div>
        <div>
            <label for="date">Start At:</label>
            <input type="date" value="{{ date('Y-m-d', strtotime($event->start_at)) }}" name="start_at" />
        </div>
        <div>
            <label for="end_at">End At:</label>
            <input type="date" value="{{ date('Y-m-d', strtotime($event->end_at)) }}" name="end_at" />
        </div>
        <div>
            <button type='button' onclick="window.location='/events'">Return</button>
            <button>Update</button>
        </div>
    </form>
</body>

</html>
