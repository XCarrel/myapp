@extends('layout')

@section('pagecss')
    <link href="css/admin.css" rel="stylesheet" type="text/css">
@endsection

@section('pagejs')
    <script src="js/admin.js" type="text/javascript"></script>
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
            <h1>
                Administration
            </h1>
            <div class="links">
                <form method="post" action="admin/del">
                    @csrf
                    <div class="row col-12">
                        <div class="col-2">Chose</div>
                        <div class="col-2">Nombre de briques</div>
                        <div class="col-6">Couleurs</div>
                        <div class="col-2">Action</div>
                    </div>
                    @foreach($things as $thing)
                        <div class="row col-12">
                            <div class="col-2">{{ $thing->name }}</div>
                            <div class="col-2">{{ $thing->nbBricks }}</div>
                            <div class="col-6">
                                @if (count($thing->colors) > 0)
                                    @foreach ($thing->colors as $color)
                                        <span class="colortag">{{ $color->name }}</span>
                                    @endforeach
                                @else
                                    <span>Aucune</span>
                                @endif
                            </div>
                            <div class="col-2">
                                <button name="delete" value="{{ $thing->id }}" class="button button-red">Supprimer</button>
                            </div>
                        </div>
                    @endforeach
                </form>
                <form method="post" action="admin/add">
                    @csrf
                    <table>
                        <tr>
                            <td><input type="text" name="newname" value="{{ old('newname') }}" id="txtnewname"></td>
                            <td><input type="number" name="newbricks" value="{{ old('newbricks') }}" id="nbrnewbricks"></td>
                            <td>
                                <button name="add" value="{{ $thing->id }}" id="cmdAdd" class="hide">Ajouter</button>
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
                <br><br><button><a href="/">Home</a></button>
            </div>
        </div>
    </div>
@endsection