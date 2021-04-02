<x-layout>
  <x-slot name="title">
    Nouvelle critique de {{$anime->title}}
  </x-slot>

  <article class="anime">
    <header class="anime--header">
      <div>
        <img alt="" src="/covers/{{ $anime->cover }}" />
      </div>
      <h1>{{ $anime->title }}</h1>
    </header>
    <p>{{ $anime->description }}</p>
    <div>
      <div class="actions">
        <form action="/anime/{id}/new_review" method="POST">
        @csrf
        <div class="input-group">
          <label for="content">Votre critique</label>
          <input id="content" name="content" required />
          @error('username')
            <p class="error">{{ $message }}</p>
          @enderror
        </div>

        <button class="cta">Ajouter</button>

        </form>
      </div>
    </div>
  </article>
  

  

  
</x-layout>
