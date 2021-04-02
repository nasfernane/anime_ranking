<x-layout>
  <x-slot name="title">
    {{ $anime->title }}
  </x-slot>

  <article class="anime">
    <header class="anime--header">
      <div>
        <img alt="" src="/covers/{{ $anime->cover }}" />
      </div>
      <h1>{{ $anime->title }}</h1>
    </header>
    <p>{{ $anime->description }}</p>
    <div>
        @error('reviewconnexion')
            <p>Vous devez être connecté pour ajouter une critique</p>
        @enderror
      <div class="actions">
        
        <div>
          <a class="cta" href="/anime/{{ $anime->id }}/new_review">Écrire une critique</a>
        </div>
        <form action="/anime/{{ $anime->id }}/add_to_watch_list" method="POST">
          <button class="cta">Ajouter à ma watchlist</button>
        </form>
      </div>
    </div>
  </article>
</x-layout>
