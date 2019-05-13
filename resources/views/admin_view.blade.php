@extends('layouts.app')

@section('content')
{{ Auth::guard('admin')->user()->name }}
@endsection