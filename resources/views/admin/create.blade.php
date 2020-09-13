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
                                        <input id="newsTitle" type="text" class="form-control" name="title" value="{{ $news->title ?? old('title') }}" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="newsCategory" class="col-md-4 col-form-label text-md-right">Категория новости</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="category" id="newsCategory">
                                            @forelse($categories as $item)
                                                <option @if ($item['id'] == old('name')) selected @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                            @empty
                                                <option value="0" selected>Нет категории</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="newsText" class="col-md-4 col-form-label text-md-right">Текст новости</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" name="text" id="newsText" cols="30" rows="10">{{ $news->text ?? old('text') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right"></label>
                                    <div class="col-md-6">
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif class="form-check-input" type="checkbox" id="newsPrivate" name="isPrivate" value="1">
                                            <label class="form-check-label" for="newsPrivate">
                                                Новость приватная
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            @if ($news->id)Изменить@elseДобавить@endif
                                        </button>
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
