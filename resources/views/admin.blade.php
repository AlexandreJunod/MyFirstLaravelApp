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
            </tr>

            @foreach($things as $thing)
            <tr>
                <td><a href="/admin/hide/{{$thing->getId()}}">{{ $thing->getName() }}</a></td>
                <td>{{ $thing->getNbBricks() }}</td>
                <td>{{ $thing->getColor() }}</td>
            </tr>
            @endforeach
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
