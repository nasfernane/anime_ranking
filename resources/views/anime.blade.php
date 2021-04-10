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
    
    <div class="animeContainer">
        <div class="top-list__anime">
            <div class="top-list__anime__img">
                <img alt="{{ $anime->title }}" src="/covers/{{ $anime->cover }}" />
            </div>
            
            <div class="top-list__anime__content">
                <div class="top-list__anime__content--header">
                    <h2> {{ $anime->title }}</h2> 
                    @include ('components.avg_rank')
                </div>
                        
                <p>{{ $anime->description }}</p>
                <div class="top-list__anime__content--actions">
                    @if (!isset($userReview))
                        <a class="cta" href="{{ route('review.create', ['id' => $anime->id]) }}">Ajouter une review</a>
                    @else 
                        <form action="{{ route('review.edit', ['id' => $userReview->id]) }}" method="POST">
                            @csrf
                            <button class="cta">Modifier ma review</button>
                        </form>
                    @endif
                    <form action="{{ route('watchlist.store', ['id' => $anime->id]) }}" method="POST">
                        @csrf
                        <button class="cta">Ajouter à ma watchlist</button>
                    </form>
                </div>       
            </div>             
        </div>

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
    </div>
   
</x-layout>
