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
                    <div class="row">
                        <div class="col">
                            ID
                        </div>
                        <div class="col">
                            {{ $event->id }}
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            Name
                        </div>
                        <div class="col">
                            {{ $event->name }}
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            Slug
                        </div>
                        <div class="col">
                            {{ $event->slug }}
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            Start At
                        </div>
                        <div class="col">
                            {{ $event->start_at }}
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col">
                            End At
                        </div>
                        <div class="col">
                            {{ $event->end_at }}
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
