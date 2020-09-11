@extends('layouts.main')

@section('title')
    @parentГлавная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h1>Новости</h1>
    @forelse($news as $item)
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">Категория новости</strong>
                    <h3 class="mb-0">{{ $item->title }}</h3>
                    <div class="mb-1 text-muted">Nov 12</div>
                    <p class="card-text mb-auto">Текст новости</p>
                    @if (!$item->isPrivate)
                        <a href="{{ route('news.oneNews', $item->id) }}" class="stretched-link">Подробнее ...</a>
                    @endif
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="{{ $item->image ?? asset('storage/news.jpg') }}" alt="">
{{--                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">--}}
{{--                            <img src="" alt=""></text></svg>--}}
                </div>
            </div>
        </div>
    @empty
        Нет новостей
    @endforelse
    {{ $news->links() }}
@endsection
