@extends('layouts.app')

@section('title','Authorized Clients')

@section('content')
<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">
    <h1>Authorized Clients</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('home')}}">Home</a>
        </li>
        <li class="active">Authorized Clients</li>
    </ol>
</div>
<!-- END BREADCRUMBS -->
<div class="row">
           <passport-authorized-clients></passport-authorized-clients>
    </div>
@endsection