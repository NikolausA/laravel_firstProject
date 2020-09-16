@extends('layouts.main')

@section('title', 'Создание новости')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <h2>Добавление новости</h2>
        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Добавление новости</div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="POST" action="@if (!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif">
                                @csrf
                                @if($news->id) @method('PUT') @endif
                                <div class="form-group row">
                                    <label for="newsTitle" class="col-md-4 col-form-label text-md-right">Заголовок новости</label>
                                    <div class="col-md-6">
                                        @if ($errors->has('title'))
                                            <div class="alert alert-danger" role="alert">
                                                @foreach($errors->get('title') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif
                                        <input id="newsTitle" type="text" class="form-control" name="title" value="{{ old('title') ?? $news->title }}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newsCategory" class="col-md-4 col-form-label text-md-right">Категория новости</label>
                                    <div class="col-md-6">
                                        @if($errors->has('$category_id'))
                                            <div class="alert alert-danger" role="alert">
                                                @foreach($errors->get('category_id') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif
                                        <select class="form-control" name="category_id" id="newsCategory">
                                            @forelse($categories as $item)
                                                @if (old('category_id'))
                                                    <option @if ($item->id == old('category_id')) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                                @else
                                                    <option @if ($item->id == $news->category_id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
                                            @empty
                                                <option value="0" selected>Нет категории</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="newsText" class="col-md-4 col-form-label text-md-right">Текст новости</label>
                                    <div class="col-md-6">
                                        @if ($errors->has('text'))
                                            <div class="alert alert-danger" role="alert">
                                                @foreach($errors->get('text') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif
                                        <textarea class="form-control" name="text" id="newsText" cols="30" rows="10">{{ old('text') ?? $news->text }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right"></label>
                                    <div class="col-md-6">
                                        @if ($errors->has('$image'))
                                            <div class="alert alert-danger" role="alert">
                                                @foreach($errors->get('image') as $error)
                                                    {{ $error }}
                                                @endforeach
                                            </div>
                                        @endif
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            @if ($errors->has('$isPrivate'))
                                                <div class="alert alert-danger" role="alert">
                                                    @foreach($errors->get('isPrivate') as $error)
                                                        {{ $error }}
                                                    @endforeach
                                                </div>
                                            @endif
                                            <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif class="form-check-input" type="checkbox" id="newsPrivate" name="isPrivate" value="1">
                                            <label class="form-check-label" for="newsPrivate">
                                                Новость приватная
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">@if ($news->id)Изменить@elseДобавить@endif</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </for
@endsection
