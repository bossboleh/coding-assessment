<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <table class="event-list" border="1">
            <thead>
                <th>Event Name</th>
                <th>Event Slug</th>
                <th>Start - End Date</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="event-row">
                        <td class="event-col">{{ $event->name }} </td>
                        <td class="event-col">{{ $event->slug }} </td>
                        <td class="event-col">{{ $event->start_at . ' - ' . $event->end_at }}</td>
                        <td class="event-col">
                            <form action="/events/{{ $event->id }}/edit">
                                <button>Edit</button>
                            </form>
                            <form method="post" action="/events/{{ $event->id }}">
                                @csrf
                                @method('delete')
                                <button>Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div>

        <button {{ $prev_page < 0 ? 'disabled' : '' }}
            onclick="window.location='/events/page/{{ $prev_page }}'">Prev</button>
        <button {{ $next_page == 0 ? 'disabled' : '' }}
            onclick="window.location='/events/page/{{ $next_page }}'">Next</button>
    </div>
</body>

</html>
