<x-layout>
    <x-slot name="title">
        Watchlist
    </x-slot>
    <h1>Ma watchlist</h1>
    <ul role="list" class="anime-list">
        @foreach($watchlist as $anime)
            <li class="flow">
                <div class="flow">
                <div>
                    <img alt="" src="/covers/{{ $anime->cover }}" />
                </div>
                <h2>
                    {{ $anime->title }}
                </h2>
                </div>
                <a class="cta" href="/anime/{{ $anime->id }}">Voir</a>
            </li>
        @endforeach
    </ul>
</x-layout>