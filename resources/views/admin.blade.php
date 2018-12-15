@extends('layout')

@section('pagecss')
    <link href="css/admin.css" rel="stylesheet" type="text/css">
@endsection

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
                <form method="post" action="admin/del">
                    @csrf
                    <table>
                        <tr>
                            <th>Chose</th>
                            <th>Nombre de briques</th>
                            <th>Couleurs</th>
                            <th>Action</th>
                        </tr>
                        @foreach($things as $thing)
                            <tr>
                                <td>{{ $thing->name }}</td>
                                <td>{{ $thing->nbBricks }}</td>
                                <td>
                                    @if (count($thing->colors) > 0)
                                        @foreach ($thing->colors as $color)
                                            <span>{{ $color->name }}</span>
                                        @endforeach
                                    @else
                                        <span>Aucune</span>
                                    @endif
                                </td>
                                <td>
                                    <button name="delete" value="{{ $thing->id }}">Supprimer</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </form>
                <form method="post" action="admin/add">
                    @csrf
                    <table>
                        <tr>
                            <td><input type="text" name="newname" value="{{ old('newname') }}"></td>
                            <td><input type="number" name="newbricks" value="{{ old('newbricks') }}"></td>
                            <td>
                                <button name="add" value="{{ $thing->id }}">Ajouter</button>
                            </td>
                            @if ($errors->has('newname'))
                                <td>{{ $errors->first('newname') }}</td>
                            @endif
                            @if ($errors->has('dupmessage'))
                                <td>{{ $errors->first('dupmessage') }}</td>
                            @endif
                        </tr>
                    </table>
                </form>
                <br><br><a href="/">Home</a>
            </div>
        </div>
    </div>
@endsection