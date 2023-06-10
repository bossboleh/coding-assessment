<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Event</title>
</head>

<body>
    <form method="post" action="/api/v1/events">
        @csrf
        <div>
            <label for="name">Event Name:</label>
            <input type="text" name="name" />
        </div>
        <div>
            <label for="slug">Slug:</label>
            <input type="text" name="slug" />
        </div>
        <div>
            <label for="date">Start At:</label>
            <input type="date" name="start_at" />
        </div>
        <div>
            <label for="end_at">End At:</label>
            <input type="date" name="end_at" />
        </div>
        <div>
            <button type='button' onclick="window.location='/events'">Return</button>
            <button>Create</button>
        </div>
    </form>
</body>

</html>
