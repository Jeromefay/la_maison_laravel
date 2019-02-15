@extends('layouts.master')

@section('content')

<div class="container">
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
  <div class="row bg-white">
    <div class="col-sm">
      
      <a href="#"><img class="leftPictures" width="180px" src="{{asset('images/'.$product->url_image)}}" alt="" /></a>
      <a href="#"><img class="leftPictures" width="180px" src="{{asset('images/'.$product->url_image)}}" alt="" /></a>
      <a href="#"><img width="180px" src="{{asset('images/'.$product->url_image)}}" alt="" /></a>
    </div>
    <div class="col-sm">
    <img width="600px" src="{{asset('images/'.$product->url_image)}}" alt="" />
    </div>
    <div class="col-sm">
    <p>{{$product->title}}</p>
    <p>ref: {{$product->ref}}</p>
    <p>{{$product->price}} euros</p>
    <form action="" method="post">
        <div class="form-group">
            <select id="my-input" class="custom-select">
                <option value="">Taille</option>
                <option value="">46</option>
                <option value="">48</option>
                <option value="">50</option>
                <option value="">52</option>
            </select>
        </div>
    </form>
    </div>
  </div>
</div>
<h6>Description :</h6>
<p>{{$product->description}}</p>


@endsection