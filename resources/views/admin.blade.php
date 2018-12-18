@extends('layout')
@section('content')
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Administration
        </div>

        @if (count($things) > 0)
        <table>
            <tr>
                <th>Nom</th>
                <th>Briques</th>
                <th>Couleur</th>
                <th>Bouton</th>
            </tr>

            <form method="post" action="/admin/kill">
                @csrf
                @foreach($things as $thing)
                <tr>
                    <td>{{ $thing->name }}</td>
                    <td>{{ $thing->nbBricks }}</td>
                    <td>{{ $thing->color->name }}</td>
                    <td><button name="delid" value="{{ $thing->id }}">Delete</button></td>
                </tr>
                @endforeach
            </form>

            <form method="post" action="/admin/add">
                @csrf
                <input type="text" name="addvalue">
                <button name="addbutton">Add</button>
            </form>
        </table>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @else
        <div>On en a {{ count($things) }}</div>
        @endif
    </div>
</div>
@endsection
