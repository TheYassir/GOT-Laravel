<ul class="characters-list">
    {{-- Forelse permet de faire à la fois un foreach sur un tableau, tout en précisant une action  à faire si le tableau est vide dans @empty --}}
    @forelse($characters as $character)
        <li class="character-card">
            <a href="{{ route('character-page', [ 'id' =>$character->id]) }}">
                <?php $houses = $character->houses ?>
                {{-- On utilise la couleur de la première maison du personnage pour faire le fond --}}
                <div class="avatar" style="background: #{{ $character->houses[0]->colour }};">
                    <img src="{{ url('/assets/img/' . $character->image) }}" alt="{{ $character->first_name }}">
                </div>
                <div class="name">
                    {{ $character->first_name}} {{ $character->last_name }}
                </div>
            </a>
        </li>
    @empty
        <li>Aucun personnage pour l'instant</li>
    @endforelse
</ul>