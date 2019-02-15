@extends('layouts.master')

@section('content')

@include('back.partials.flash')
<table class="table table-hover">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Categorie</th>
            <th>Prix</th>
            <th>Statut</th>
            <th>Mettre à jour</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td><a href="{{route('products.edit', $product->id)}}">{{$product->title}}</a></td>
        <td>
            {{$product->category->title}}
        </td>
        <td>
            {{$product->price}} €
        </td>
        <td>
            {{$product->status}}
        </td>
        <td>
        <a href="{{route('products.edit', $product->id)}}"><button type="button" class="btn btn-info">Mettre à jour</button></a>
        </td>
        <td>
        <form class="delete" method="POST" action="{{route('products.destroy', $product->id)}}">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <input class="btn btn-danger" type="submit" value="delete" >
            </form>
        </td>
        @endforeach
    </tbody>
</table>


{{$products->links()}}











@endsection

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection