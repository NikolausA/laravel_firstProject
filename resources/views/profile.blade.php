@extends('layouts.main')

@section('title', 'Профиль')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Изменение профиля</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('updateProfile') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="newsTitle" class="col-md-4 col-form-label text-md-right">Имя пользователя</label>
                                <div class="col-md-6">
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get('name') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get('email') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') ?? $user->email }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Текущий пароль</label>
                                <div class="col-md-6">
                                    @if ($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get('password') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                        <input type="password" id="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Новый пароль</label>
                                <div class="col-md-6">
                                    @if ($errors->has('newPassword'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach($errors->get('newPassword') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                    <input type="password" id="password-confirm" name="newPassword" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Изменить профиль</button>
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
