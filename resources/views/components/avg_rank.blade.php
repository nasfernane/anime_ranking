<?php

$overallString = '';
foreach ($anime->overallRanks as $rank => $count) {
    $overallString .= "$count &nbsp;personnes&nbsp;ont donné une note de&nbsp;$rank";
}

?>

<strong class="animeRank">
    <span class="animeRank__note" data-tooltip="
    @foreach ($anime->overallRanks as $rank => $count)
    @if ($count === 1)
    {{$count}}&nbsp;personne&nbsp;a&nbsp;donné&nbsp;une&nbsp;note&nbsp;de&nbsp;{{$rank}}.
    @else
    {{$count}}&nbsp;personnes&nbsp;ont&nbsp;donné&nbsp;une&nbsp;note&nbsp;de&nbsp;{{$rank}}.
    @endif
    @endforeach
    " data-tooltip-location="bottom">
        <span class="animeRank__note--{{ $color }}">{{ $anime->avgRank }}</span>&nbsp;/&nbsp;10  
    </span>
    
</strong>