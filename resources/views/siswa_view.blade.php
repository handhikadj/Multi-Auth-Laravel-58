@extends('layouts.app')

@section('content')
{{ Auth::guard('siswa')->user()->name }}
@endsection