<x-layout>
    <h1>Classement des utilisateurs</h1>
  <ul role="list" class="anime-list">
    @foreach($animes as $anime)
      <li class="flow">
        <div class="flow">
          <div>
            <img alt="" src="/covers/{{ $anime->cover }}" />
          </div>
          <h2>
            {{ $anime->title }} {{ $anime->avgRank }}/10
          </h2>
        </div>
        <a class="cta" href="/anime/{{ $anime->id }}">Voir</a>
      </li>
    @endforeach
  </ul>
</x-layout>