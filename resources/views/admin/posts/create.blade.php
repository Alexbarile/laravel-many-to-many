@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 m-3">
                <h1>AGGIUNGI NUOVO POST</h1>
            </div>
            <div class="class-12">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
                <form method="POST" action="{{route('admin.posts.store')}}">
                    @csrf
                    <div class="form-group m-2">
                        <label class="fs-2 fw-semibold" for="title">Titolo</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Titolo">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group m-2">
                        <label class="fs-2 fw-semibold" for="content">Contenuto</label>
                        <textarea type="password" class="form-control" name="content" id="content" placeholder="Contenuto"></textarea>
                        @error('content')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group m-2">
                        <label class="fs-2 fw-semibold" for="type_id">Categorie</label>
                        <select class="form-control" name="type_id" id="type_id">
                            <option value="">Seleziona categoria</option>
                            @foreach ($types as $type)
                            <option value="{{$type->id}}">
                                {{$type->name}}
                            </option>  
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection