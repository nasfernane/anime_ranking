
<strong class="animeRank">
    <span class="animeRank__note" 

    data-tooltip="
        @foreach ($anime->overallRanks as $rank => $count)
            @if ($count === 1)
            {{$count . ' personne a donné une note de  ' . $rank}}
            @else
            {{ $count . ' personnes ont donnés une note de  ' . $rank}}
            @endif       
        @endforeach
    " 
    
    data-tooltip-location="bottom">
        <span class="animeRank__note--{{ $color }}">{{ $anime->avgRank }}</span>&nbsp;/&nbsp;10  
    </span>
    
</strong>