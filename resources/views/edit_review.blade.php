<x-layout>
    <x-slot name="title">
        Nouvelle critique de {{ $anime->title }}
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
                <form action="/review/{{ $userReview->id }}/update" method="POST">
                    @csrf
                    <div class="input-group input__group--range">
                        <label for="note">Votre note</label>
                        <input type="range" id="note" name="note" required min="0" max="10" step="1" list="notelist" value="{{ $userReview->note }}"/>
                        <datalist id="notelist" class="range__list">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                        </datalist>
                    </div>

                    <div class="input-group">
                        <label for="content">Votre critique</label>
                        <input type="text" id="content" name="content" required value="{{ $userReview->content }}"/>
                        @error('username')
                        <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                    <button class="cta">Modifier</button>
                </form>
            </div>
        </div>
    </article>
  
</x-layout>