@extends('layouts.main')

@section('title')
    @parentНовости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h2>Новости категории {{ $name }}</h2>
    @forelse($news as $item)
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">{{ $name }}</strong>
                    <h3 class="mb-0">{{ $item->title }}</h3>
                    <div class="mb-1 text-muted">Nov 12</div>
{{--                    <p class="card-text mb-auto">Текст новости</p>--}}
                    @if (!$item->isPrivate)
                        <a href="{{ route('news.oneNews', $item->id) }}" class="stretched-link">Подробнее ...</a>
                    @endif
                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="{{ $item->image ?? asset('storage/news.jpg') }}" alt="">

                </div>
            </div>
        </div>
    @empty
        Нет новостей
    @endforelse
@endsection

