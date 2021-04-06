<x-layout>
  <x-slot name="title">
    {{ $anime['title'] }}
  </x-slot>

  <article class="anime">
    <header class="anime--header">
      <div>
        <img alt="" src="/covers/{{ $anime['cover'] }}" />
      </div>
      <h1>{{ $anime['title'] }}</h1>
    </header>
    <p>{{ $anime['description'] }}</p>
    <div>
        @error('reviewconnexion')
            <p>Vous devez être connecté pour ajouter une critique <a href="/login"> Se connecter</a></p>
        @enderror
        <div class="actions">
            @if (isset($userReview))
                <div>
                    <a class="cta" href="/anime/{{ $anime['id'] }}/edit_review">Modifier votre critique</a>
                </div>
            @else
                <div>
                    <a class="cta" href="/anime/{{ $anime['id'] }}/new_review">Écrire une critique</a>
                </div>
            @endif  
            <form action="/anime/{{ $anime['id'] }}/add_to_watch_list" method="POST">
                <button class="cta">Ajouter à ma watchlist</button>
            </form>
        </div>
    </div>
    <div>
        @isset($userReview)
            <p>Votre critique</p> 
            <p>{{ $userReview->content }}</p>  
        @endisset
        @foreach ($reviews as $review)
            <div>
                <p>Posté par : {{ $review->user_id }}</p>
                <p>{{ $review->content }}</p>
            </div>
            
        @endforeach
    </div>
  </article>
</x-layout>
