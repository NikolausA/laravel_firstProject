@extends('layouts.main')

@section('title')
    @parentНовости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Новости категории {{ $name }}</h2>
    @forelse($selected as $news)
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">{{ $name }}</strong>
                    <h3 class="mb-0">{{ $news['title'] }}</h3>
                    <div class="mb-1 text-muted">Nov 12</div>
{{--                    <p class="card-text mb-auto">Текст новости</p>--}}
                    @if (!$news['isPrivate'])
                        <a href="{{ route('news.oneNews', $news['id']) }}" class="stretched-link">Подробнее ...</a>
                    @endif
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Фото</text></svg>
                </div>
            </div>
        </div>
    @empty
        Нет новостей
    @endforelse
@endsection
