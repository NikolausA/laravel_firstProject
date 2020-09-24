@extends('layouts.main')

@section('title')
    @parentПользователи
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <h2>CRUD Пользователей</h2>
    @forelse($users as $user)
        <div class="col-md-4">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">{{ $user->name }}</h3>
                        <div class="mb-1 text-muted">Статус: @if($user->is_admin)Администратор@elseПользователь@endif</div>
                    <form action="{{ route('admin.user.setAdmin', $user) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <input type="submit" class="btn btn-success" value="Изменить статус">
                    </form>
                </div>
            </div>
            <form action="{{ route('admin.user.destroy', $user) }}" method="post">
                <a href="" class="btn btn-success">Edit</a>
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        </div>
    @empty
        There are no users!
    @endforelse

@endsection
{{--class="col p-4 d-flex flex-column position-static user-card"--}}
