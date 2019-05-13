@extends('layouts.app')

@section('content')
{{ Auth::guard('guru')->user()->name }}
@endsection