@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Aggiungi un post</div>
                <div class="card-body">
                    <form action="{{route("admin.posts.update" , $post['id'])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Inserisci il titolo" value="{{$post['title']}}">
                            @error('title')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Post</label>
                            <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror" cols="30" rows="10" placeholder="Inserisci il testo del tuo post..." >{{$post['content']}}</textarea>
                            @error('content')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Categoria</label>
                            <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" >
                                <option value="">--seleziona una categoria--</option>
                                @foreach ($categories as $category)
                                   <option {{ old("category_id") == $category['id'] || isset($post['category']) && $post['category']['id']? 'selected' : null}} value="{{$category['id']}}">{{$category['name']}}</option> 
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Salva Modifiche</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection