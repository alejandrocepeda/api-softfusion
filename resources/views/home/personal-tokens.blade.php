@extends('layouts.app')

@section('title','My Tokens')

@section('content')
    <!-- BEGIN BREADCRUMBS -->
    <div class="breadcrumbs">
        <h1>My Tokens</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('home')}}">Home</a>
            </li>
            <li class="active">My Tokens</li>
        </ol>
    </div>
    <!-- END BREADCRUMBS -->
    <div class="row">
           <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
@endsection