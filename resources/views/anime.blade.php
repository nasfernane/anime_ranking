<x-layout>
    <x-slot name="title">
        {{ $anime->title }}
    </x-slot>

    <article class="anime">
        <header class="anime__header">
            <div class="anime__header--cover">
                <img alt="" src="/covers/{{ $anime->cover }}" />
            </div>
            <div class="anime__header--title">
                <h1>{{ $anime->title }}</h1>
                <p>Note moyenne des utilisateurs: <strong><span>{{ $anime->avgRank }}</span>/10</strong></p>
            </div>
            
        </header>

        <section class="descriptionContainer">
            <p>{{ $anime->description }}</p>
        </section>

        <section class="actionsContainer">
            @error('reviewconnexion')
                <p>Vous devez être connecté pour ajouter une critique <a href="/login"> Se connecter</a></p>
            @enderror
            <div class="actions">
                @if (isset($userReview))
                    <div>
                        <a class="cta" href="/anime/{{ $anime->id }}/edit_review">Modifier ma review</a>
                    </div>
                @else
                    <div>
                        <a class="cta" href="/anime/{{ $anime->id }}/new_review">Ajouter une review</a>
                    </div>
                @endif  
                <form action="/anime/{{ $anime->id }}/add_to_watch_list" method="POST">
                    @csrf
                    <button class="cta">Ajouter à ma watchlist</button>
                </form>
            </div>
        </section>

        <section class="reviewsContainer">
            @isset($userReview)
                <div class="userReview">
                    <div class="userReview__header">
                        <span class="userReview__header--user">Ma review</span>
                        <span>{{ $userReview->note }}/10</span>
                    </div>
                    <span class="userReview__content">{{ $userReview->content }}</span> 
                </div>  
            @endisset
            @isset ($reviews)
                <div class="otherReviews">
                    @foreach ($reviews as $review)  
                        <div class="otherReviews__review">
                            <div class="otherReviews__review__header">
                                <span  class="userReview__header--user">Posté par : {{ $review->user_name }}</span>
                                <span>{{ $review->note }}/10</span>
                            </div>
                            
                            <span class="otherReviews__review__content">{{ $review->content }}</span>
                        </div>        
                    @endforeach
                </div> 
            @endisset
        </section>
  </article>
</x-layout>
