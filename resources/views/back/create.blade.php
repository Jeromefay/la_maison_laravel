@extends('layouts.master')

@section('content')


<div class="container">
    <br>
    <div class="row">
        <div class="col-md-6">
            <h1>Créer un produit : </h1>
            <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form">
                    <div class="form-group">
                        <label for="title">Titre :</label>
                        <input type="text" name="title" value="{{old('title')}}" class="form-control" id="title"
                            placeholder="Titre du produit">
                            @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea type="text" name="description" class="form-control">{{old('description')}}</textarea>
                        @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span>@endif
                    </div>
                    <div class="form-group">
                        <label for="price">Prix :</label>
                        <input type="text" name="price" value="{{old('price')}}" class="form-control" id="price"
                            placeholder="Prix du produit">
                            @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span>@endif
                    </div>


                    <div class="form-select">
                        <label for="category">Catégorie :</label>
                        <select id="category" name="category_id">
                            @foreach($categories as $id => $title)
                            <option value="{{$id}}">{{$title}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-select">
                        <label for="size">Taille :</label>
                        <select id="size" name="size">

                            <option value="{{$id}}">46</option>
                            <option value="{{$id}}">48</option>
                            <option value="{{$id}}">50</option>
                            <option value="{{$id}}">52</option>

                        </select>
                        <div class="input-file">
                            <label>File :</label>
                            <input class="file" type="file" name="picture">
                        </div>
                        <button type="submit" class="btn btn-primary">Créer un produit</button>

                    </div>
                </div>
        </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-radio"><br>
                            <h2>Statut</h2>
                            <input type="radio" @if(old('status')=='published' ) checked @endif name="status"
                                value="published" checked> Publier<br>
                            <input type="radio" @if(old('status')=='draft' ) checked @endif name="status" value="dash">
                            Brouillon<br>
                        </div>
                        <div class="form-select">
                            <label for="my-input">Code produit</label>
                            <select id="my-input" class="form-control" name="code">
                                <option>solde</option>
                                <option>new</option>
                            </select>
                        </div>
                        <div class="form-group">
                        <label for="ref">Référence :</label>
                        <input type="text" name="ref" value="{{old('ref')}}" class="form-control" id="ref"
                            placeholder="Référence du produit">
                            @if($errors->has('ref')) <span class="error">{{$errors->first('ref')}}</span>@endif

                    </div>

                    </div>
                </div>


        </form>
    </div>
    @endsection
