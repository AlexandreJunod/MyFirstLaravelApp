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
                    <td>{{ $thing->getName() }}</td>
                    <td>{{ $thing->getNbBricks() }}</td>
                    <td>{{ $thing->getColor() }}</td>
                    <td><button name="delid" value="{{$thing->getId()}}">Delete</button></td>
                </tr>
                @endforeach
            </form>

            <form method="post" action="/admin/add">
                @csrf
                <input type="text" name="addvalue">
                <button name="addbutton">Add</button>
            </form>

        </table>
        @else
        <div>On en a {{ count($things) }}</div>
        @endif
        <div class="links">
            <a href="/">Home</a>
            <!--a href="/admin/12/toto">edit12</a-->
        </div>
    </div>
</div>
@endsection
