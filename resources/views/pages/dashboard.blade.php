@extends('layouts.app')

@section('content')
    <dashboard-component :authuser="{{ Auth::user() }}" />
@endsection
