<x-layout>
    <h1>Classement des utilisateurs</h1>
  <ul role="list" class="top-list">
    @foreach($animes as $anime)
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
                <img alt="" src="/covers/{{ $anime->cover }}" />
            </div>
            
            <div class="top-list__anime__content">
                <h2> {{ $anime->title }} </h2>
                <span class="animeRank">
                    <span class="animeRank__note animeRank__note--{{ $color }}">
                        {{ $anime->avgRank }}
                    </span> / 10   
                </span>
            </div>
            
            
        
            <a class="cta" href="/anime/{{ $anime->id }}">Voir</a>
        </li>
    @endforeach
  </ul>
</x-layout>