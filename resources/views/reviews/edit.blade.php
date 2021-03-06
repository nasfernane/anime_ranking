<x-layout>
  <x-slot name="title">
  Modification review de {{ $anime->title }}
  </x-slot>

    <div class="animeContainer">
        <div class="top-list__anime">
            <div class="top-list__anime__img">
                <img alt="{{ $anime->title }}" src="/covers/{{ $anime->cover }}" />
            </div>
            
            <div class="top-list__anime__content">
                <div class="top-list__anime__content--header">
                    <h2> {{ $anime->title }}</h2> 
                </div>
                        
                <p>{{ $anime->description }}</p>
                <div class="top-list__anime__content--actions">
                    <form action="/review/{{ $userReview->id }}/update" method="POST">
                        @csrf
                        @method('PUT')
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
                            <textarea type="text" id="content" name="content" required >{{ $userReview->content }}</textarea>
                            @error('content')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <button class="cta">Modifier</button>
                </div>                      
        </div>     
    </div>
</x-layout>
