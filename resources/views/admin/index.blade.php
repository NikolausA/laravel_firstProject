@extends('layouts.main')

@section('title')
    @parentАдминка
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h2>CRUD Новостей</h2>
    @forelse($news as $item)
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">Категория новости</strong>
                    <h3 class="mb-0">{{ $item->title }}</h3>
                    <div class="mb-1 text-muted">Nov 12</div>

                </div>
                <div class="col-auto d-none d-lg-block">
                    <img src="{{ $item->image ?? asset('storage/news.jpg') }}" alt="">
                </div>

            </div>
            <a href="{{ route('admin.edit', $item) }}" class="btn btn-success">Edit</a>
            <a href="{{ route('admin.destroy', $item) }}" class="btn btn-danger">Delete</a>
        </div>
    @empty
        Нет новостей
    @endforelse
    {{ $news->links() }}
@endsection

