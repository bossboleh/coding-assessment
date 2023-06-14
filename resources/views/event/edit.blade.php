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
                    <form method="POST" action="{{ route('event.update.action', ['id' => $event->id]) }}">
                        @csrf
                        <div class="row" style="padding-bottom: 1rem;">
                            <div class="col-3">name</div>
                            <div class="col">
                                <input name="name" class="form-control" value="{{ $event->name }}"  required>
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 1rem;">
                            <div class="col-3">slug</div>
                            <div class="col">
                                <input name="slug" class="form-control" value="{{ $event->slug }}"  required>
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 1rem;">
                            <div class="col-3">start at</div>
                            <div class="col">
                                <input name="start_at" type="datetime-local" step="1" value="{{ $event->start_at }}" required>
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 1rem;">
                            <div class="col-3">end at</div>
                            <div class="col">
                                <input name="end_at" type="datetime-local" step="1" value="{{ $event->end_at }}" required>
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 1rem;">
                            <div>
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
