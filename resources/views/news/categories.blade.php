@extends('layouts.main')

@section('title')
    @parentКатегории
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Категории новостей</h2>
    <nav class="nav d-flex justify-content-between">
        @forelse($categories as $item)
            <a href="{{ route('category.selected', ['slug' => $item->slug]) }}">{{ $item->name }}</a><br>
        @empty
            Нет такой категории
        @endforelse
    </nav>
@endsection



