@extends('layout')

@section('pagecss')
    <link href="css/admin.css" rel="stylesheet" type="text/css">
@endsection

@section('pagejs')
    <script src="js/admin.js" type="text/javascript"></script>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h1 class="col-md-2 offset-5">
                Administration
            </h1>
            <form method="post" action="admin/del">
                @csrf
                <div class="row col-12">
                    <div class="col-2">Chose</div>
                    <div class="col-2"># briques</div>
                    <div class="col-6">Couleurs</div>
                    <div class="col-2">Action</div>
                </div>
                @foreach($things as $thing)
                    <div class="row col-12 p-2">
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
                            <button name="delete" value="{{ $thing->id }}" class="btn btn-danger">Supprimer</button>
                        </div>
                    </div>
                @endforeach
            </form>
            <form method="post" action="admin/add">
                @csrf
                    <div class="row col-12">
                        <div class="col-2"><input type="text" name="newname" value="{{ old('newname') }}" id="txtnewname"></div>
                        <div class="col-2"><input type="number" name="newbricks" value="{{ old('newbricks') }}" id="nbrnewbricks"></div>
                        <div class="col-1">
                            <button name="add" value="{{ $thing->id }}" id="cmdAdd" class="btn btn-info d-none">Ajouter</button>
                        </div>
                        @if ($errors->has('newname'))
                            <div class="col-4">{{ $errors->first('newname') }}</div>
                        @endif
                        @if ($errors->has('dupmessage'))
                            <div class="col-4">{{ $errors->first('dupmessage') }}</div>
                        @endif
                    </div>
            </form>
            <br><br><button class="btn btn-primary"><a href="/" class="button-link">Home</a></button>
        </div>
    </div>
@endsection