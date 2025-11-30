@extends('guest.home')
@section('content')

<h1>Featured Properties</h1>

<table border="1">
  <tr>
    <th>Title</th>
    <th>Price</th>
    <th>Image</th>
    <th>Location</th>
    <th>Description</th>
    <th>Type</th>
    <th>Category</th>
  </tr>
  @foreach ($properties as $p)
    <tr>
      <th>{{$p -> title}}</th>
      <th>{{$p -> price}}</th>
      <th><img src="{{$p -> image_main_url}}" alt="" width="90" height="90"></th>
      <th>{{$p -> location}}</th>
      <th>{{$p -> description}}</th>
      <th>{{$p -> type}}</th>
      <th>{{$p -> category}}</th>
    </tr>
  @endforeach
</table>

@endsection