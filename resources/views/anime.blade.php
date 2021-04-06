<x-layout>
    <x-slot name="title">
        {{ $anime['title'] }}
    </x-slot>

    <article class="anime">
        <header class="anime__header">
            <div class="anime__header--cover">
                <img alt="" src="/covers/{{ $anime['cover'] }}" />
            </div>
            <div class="anime__header--title">
                <h1>{{ $anime['title'] }}</h1>
            </div>
            
        </header>

        <section class="descriptionContainer">
            <p>{{ $anime['description'] }}</p>
        </section>

        <section class="actionsContainer">
            @error('reviewconnexion')
                <p>Vous devez être connecté pour ajouter une critique <a href="/login"> Se connecter</a></p>
            @enderror
            <div class="actions">
                @if (isset($userReview))
                    <div>
                        <a class="cta" href="/anime/{{ $userReview->id }}/edit_review">Modifier votre critique</a>
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
        </section>

        <section class="reviewsContainer">
            @isset($userReview)
                <div class="userReview"></div>
                <p>Votre critique</p> 
                <p>{{ $userReview->content }}</p>  
            @endisset
            @isset ($reviews)
                <div class="otherReviews">
                    @foreach ($reviews as $review)  
                        <div class="otherReviews__review">
                            <div class="otherReviews__review__header">
                                <p>Posté par : {{ $review->user_name }}</p>
                                <p>{{ $review->note }}</p>
                            </div>
                            
                            <p>{{ $review->content }}</p>
                        </div>
                        
                                    
                    @endforeach
                </div> 
            @endisset
        </section>
  </article>
</x-layout>
