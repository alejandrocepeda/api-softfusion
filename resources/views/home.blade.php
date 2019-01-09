@extends('layouts.app')

@section('content')
    <div class="row px-md-5 px-0 pt-4 content tab-content" id="myTab1Content">
        <div class="tab-pane fade col-md-12 active show mx-3" id="nav-1-1" role="nav-1-1" aria-labelledby="nav-first-tab">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Home</h4>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="float-right">
                        <ol class="breadcrumb small p-1">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active font-weight-light" aria-current="page">System</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 bg-white border mb-5 border-bottom-3"></div>
            </div>
        </div>
    </div>
@endsection
