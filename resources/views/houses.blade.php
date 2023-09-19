@extends('layout.app')

@section('content')
    <ul class="houses-list">
        @forelse ($houses as $house)
            <li class="house-logo"   style="background: #{{ $house->colour }};">
                <a href="{{ route('house', ['id' => $house->id]) }}">
                    <img src="{{ url('/assets/img/houses/' . $house->image) }}" alt="{{ $house->name }}">
                </a>
            </li>
        @empty
        
        @endforelse
    </ul>
@endsection