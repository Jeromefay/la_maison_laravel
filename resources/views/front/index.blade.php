@extends('layouts.master')

@section('content')

@php
    $segments = Request::segments();
    $href = url('/');
@endphp
    <ol class="breadcrumb bg-dark">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Boutique</a></li>
        @foreach($segments as $segment)
            @php
                $href .= "/".$segment;
            @endphp
            @if ($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $segment }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $href }}">{{ $segment }}</a></li>
            @endif
        @endforeach
    </ol>
    {{$products->links()}}
<h1>Tous les produits</h1>
<h3>Nombre de produits trouvés: {{$count}}</h3>
<div class="row">
  @foreach ($products as $product)
  <div class="col-lg-4">
    <a href="{{url('product', $product->id)}}">
      @if(!is_null($product->url_image) > 0)
      <img src="{{asset('images/'.$product->url_image)}}" alt="" width="375px" height="300px">
    </a>
      @endif
      <h3><a href="{{url('product', $product->id)}}">{{$product->title}}</a></h3>
      <h3>Prix: {{$product->price}} €</h3>
    </div>
  @endforeach
  </div>



@endsection


