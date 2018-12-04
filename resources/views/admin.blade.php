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
            <div class="links">
                <form method="post" action="admin/crud">
                    @csrf
                    <table>
                        <tr>
                            <th>Personnage</th>
                            <th>Action</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->getName() }}</td>
                                <td>
                                    <button name="delete" value="{{ $user->getId() }}">Supprimer</button>
                                </td>
                            </tr>
                        @endforeach
                        <td><input type="text" name="newname"></td>
                        <td>
                            <button name="add" value="{{ $user->getId() }}">Ajouter</button>
                        </td>
                    </table>
                </form>
                <br><br><a href="/">Home</a>
            </div>
        </div>
    </div>
@endsection