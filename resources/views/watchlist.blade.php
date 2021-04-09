<x-layout>
    
  <ul role="list" class="top-list">
    <h1>Ma watchlist</h1>
    @foreach($watchlist as $anime)
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
        <li class="top-list__anime">
            <div class="top-list__anime__img">
                <img alt="{{ $anime->title }}" src="/covers/{{ $anime->cover }}" />
            </div>
            
            <div class="top-list__anime__content">
                <h2> #{{ $loop->index + 1 }} {{ $anime->title }} 
                    <strong class="animeRank">
                        <span class="animeRank__note animeRank__note--{{ $color }}">{{ $anime->avgRank }}</span>&nbsp;/&nbsp;10  
                    </strong>
                </h2>
                <p>{{ $anime->description }}</p>
                <div class="top-list__anime__content--actions">
                    <a class="cta" href="/animes/{{ $anime->id }}">Reviews</a>
                    <form action="/watchlist/{{ $anime->id }}/destroy" method="POST">
                    @csrf
                    <button class="cta">Supprimer de ma watchlist</button>
                </form>
                </div>       
            </div>       
        </li>
    @endforeach
  </ul>
</x-layout>