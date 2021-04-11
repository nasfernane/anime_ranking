<x-layout>
    
  <ul role="list" class="top-list">
    <h1>Ma watchlist</h1>
    @unless (isset($watchlist[0]))
        <h2>Vous n'avez pas encore ajouté d'anime à votre watchlist</h2>
    @endunless
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
                {{-- <h2> #{{ $loop->index + 1 }} {{ $anime->title }} 
                    @include ('components.avg_rank')
                </h2> --}}
                <div class="top-list__anime__content--header">
                    <h2>{{ $anime->title }}</h2> 
                    <div class="top-list__anime__content--header__rank">
                        @include ('components.avg_rank')
                        <p>Ajouté le {{ $anime->created_at->format('d/m/Y') }}</p>
                    </div>
                    
                </div>
                <p>{{ $anime->description }}</p>
                <div class="top-list__anime__content--actions">
                    <a class="cta" href="/animes/{{ $anime->id }}">Reviews</a>
                    <form action="{{ route('watchlist.destroy', ['id' => $anime->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="cta">Supprimer de ma watchlist</button>
                </form>
                </div>       
            </div>       
        </li>
    @endforeach
  </ul>
</x-layout>