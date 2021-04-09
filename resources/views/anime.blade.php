<?php
    $color = '';
    if ($anime->avgRank > 6) {
        $color = 'green';
    } else if ($anime->avgRank > 4) {
        $color = 'white';
    } else {
        $color = 'red';
    }
?>

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
                <h1>
                    {{ $anime->title }}
                    @include ('components.avg_rank')
                </h1>
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
                @if (!isset($userReview))                   
                    <div>
                        <a class="cta" href="/review/{{ $anime->id }}/create">Ajouter une review</a>
                    </div>
                @endif  
                <form action="/watchlist/{{ $anime->id }}/store" method="POST">
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
                    <div class="userReview__actions">
                        <form action="/review/{{ $userReview->id }}/edit" method="POST">
                            @csrf
                            <button class="cta">Modifier ma review</button>
                        </form>
                        <form action="/review/{{ $userReview->id }}/delete" method="POST">
                            @csrf
                            <button class="cta">Supprimer ma review</button>
                        </form>
                    </div>
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
