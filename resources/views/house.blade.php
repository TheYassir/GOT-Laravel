@extends('layout.app')

@section('content')
    <h2>Maison {{ $house->name }}</h2>
    {{-- On inclut le template de liste --}}
   @include('partials/list')
@endsection