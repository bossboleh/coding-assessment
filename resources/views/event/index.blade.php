<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Event
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('event.create') }}">
                        <button type="button" class="btn" style="float:right; background-color:#838cf1; color:#ffffff">Create</button>
                    </a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Start</th>
                                <th scope="col">End</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <th scope="row">{{ $event->id }}</th>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->slug }}</td>
                                    <td>{{ $event->start_at }}</td>
                                    <td>{{ $event->end_at }}</td>
                                    <td>
                                        <a href="{{ route('event.detail', ["id" => $event->id]) }}"><button type="button" class="btn btn-primary">View</button></a>
                                        <a href="{{ route('event.update', ["id" => $event->id]) }}"><button type="button" class="btn btn-secondary">Edit</button></a>
                                        <a href="{{ route('event.delete.action', ["id" => $event->id])}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        
                    <div>
                        {!! $events->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
