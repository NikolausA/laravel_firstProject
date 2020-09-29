@extends('layouts.main')

@section('title')
    @parentГлавная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    @if (!$news->isPrivate || Auth::check())
        <div class="col-md-10" style="margin: 15px; width: 100%; height: auto">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative" style="display: flex; justify-content: space-between; width: 100%">
                <div class="col p-4 d-flex flex-column position-static">
{{--                    <strong class="d-inline-block mb-2 text-primary">Категория новости</strong>--}}
                    <h3 class="mb-0">{{ $news->title }}</h3>
{{--                    <div class="mb-1 text-muted">Nov 12</div>--}}
                    <p class="card-text mb-auto">{{ $news->text }}</p>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="{{ $news->image ?? asset('storage/news.jpg') }}" alt="">
{{--                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Фото</text></svg>--}}
                </div>
            </div>
        </div>
    @else
        Для просмотра новости необходимо зарегистрироваться
    @endif
@endsection
