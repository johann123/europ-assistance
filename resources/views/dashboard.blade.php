<?php
/**
 * @var $events \App\Models\Event[]
 */
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table style="width: 100%">
                        <thead style="border-bottom: 1px solid black">
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Date') }}</th>
                            <th>{{ __('Description') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Performers') }}</th>
                            <th>{{ __('Location') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody style="text-align: center">
                        @foreach ($events as $event)
                            <tr>
                                <td>
                                    {{ $event->name }}
                                </td>
                                <td>
                                    {{ $event->date }}
                                </td>
                                <td>
                                    {{ $event->desc }}
                                </td>
                                <td>
                                    {{ $event->price }}
                                </td>
                                <td>
                                    @foreach($event->performers as $performer)
                                        {{ $performer->name }}
                                        @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    {{ $event->location?->name }}
                                </td>
                                <td>
                                    @if (!$event->reservations->contains('user_id', Auth::user()->id))
                                        <a href="{{ route('reserve', [$event->id]) }}" class="">{{ __('Reserve') }}</a>
                                    @else
                                        {{ __('Reserved') }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
