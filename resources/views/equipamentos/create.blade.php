@extends('main')
@section('content')
  <form method="POST" action="/equipamentos">
    @csrf
    @include('equipamentos.form') 
  </form>
@endsection