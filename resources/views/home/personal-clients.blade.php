@extends('layouts.app')

@section('title','My Clients')

@section('content')
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>My Clients</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a>
            </li>
            <li class="active">My Clients</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="row">
        <passport-clients></passport-clients>
    </div>
@endsection