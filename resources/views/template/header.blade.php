<div class="bg-light">
    <div class="container d-flex mx-auto">
        <div class="col-md-3 col-1 py-md-3 py-2 pr-md-5 pr-sm-0 pl-0 d-md-block d-flex align-items-center">
            <!--Main Logo Horizontal version-->
            <img class="logo-h pr-sm-0 pr-md-5 disappear" src="{{asset('img/logo-h.png')}}">
            <img class="logo-h pr-md-0 appear" src="{{asset('img/iso.png')}}">
        </div>
        <div class="col-lg-5 col-sm-4 col-5 d-flex align-items-center pr-md-0">
            <form class="ml-lg-auto">
                <!--Search form-->
                <div class="input-group my-2 my-md-0">
                    <input class="form-control search" type="text" placeholder="Search...">
                    <div class="input-group-prepend ">
                        <span class="input-group-text rounded-right search-icon" id="basic-addon1"><span class="ion ion-ios-search mr-0 " data-pack="android" data-tags=""></span></span>
                    </div>
                </div>
            </form>
        </div>
        <div class="row col-lg-4 col-md-5 col-sm-7 col-6 d-flex align-items-center pr-md-0 text-center text-primary">
            <!--menu items notificactions/settings /profile-->
            <div class="col-md-6 col-10 text-sm-right text-center px-sm-3 px-0 mt-2">
                <i class="pl-xl-3 pl-lg-2 mx-md-0 mx-sm-3"><span class="ion ion-ios-chatboxes-outline" data-pack="android" data-tags=""></span></i>
                <i class="pl-xl-3 pl-lg-2 mx-md-0 mx-sm-3 position-relative">
                        <span class="small position-absolute counter">
                            <span class="small text-white bg-danger rounded-circle">12</span>
                        </span>
                    <span class="ion ion-ios-bell-outline" data-pack="android" data-tags=""></span>
                </i>
                <i class="pl-xl-3 pl-lg-2 mx-md-0 mx-sm-3"><span class="ion ion-ios-gear-outline" data-pack="android" data-tags=""></span></i>
            </div>
            <div class="col-2 px-sm-3 px-0">
                <img class="rounded-circle profile img-thumbnail" src="{{asset('img/profile.jpg')}}">
            </div>
            <div class="col-4 disappear">
                <button class="btn btn-light dropdown-toggle font-weight-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Violeta Parra</button>
            </div>
        </div>
    </div>
</div>
<!--Dashboard main menu-->
<div class="bg-primary main-menu">
    <div class="row container d-flex mx-auto px-0">
        <ul class="nav nav-tabs mt-md-4 mt-sm-3 mt-2 border-0 pt-3 " id="myTab" role="tablist">
            <li class="nav-item">
                <a class="active nav-link px-md-4 py-md-3 py-sm-2 p-1" id="1-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="home" aria-selected="true"><span class="ion ion-ios-home-outline" data-pack="android" data-tags=""></span>Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-md-4 py-md-3 py-sm-2 p-1" id="2-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="profile" aria-selected="false"><span class="ion ion-ios-color-filter-outline" data-pack="android" data-tags=""></span>CRM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-md-4 py-md-3 py-sm-2 p-1" id="3-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="contact" aria-selected="false"><span class="ion flaticon-target" data-pack="android" data-tags=""></span>Leads</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-md-4 py-md-3 py-sm-2 p-1" id="4-tab" data-toggle="tab" href="#nav-4" role="tab" aria-controls="contact" aria-selected="false"><span class="ion flaticon-like" data-pack="android" data-tags=""></span>Deals</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-md-4 py-md-3 py-sm-2 p-1" id="5-tab" data-toggle="tab" href="#nav-5" role="tab" aria-controls="contact" aria-selected="false"><span class="ion ion-ios-pie-outline" data-pack="android" data-tags=""></span>Marketing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-md-4 py-md-3 py-sm-2 p-1" id="6-tab" data-toggle="tab" href="#nav-6" role="tab" aria-controls="contact" aria-selected="false"><span class="ion ion-ios-email-outline" data-pack="android" data-tags=""></span>Softmail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-md-4 py-md-3 py-sm-2 p-1" id="7-tab" data-toggle="tab" href="#nav-7" role="tab" aria-controls="contact" aria-selected="false"><span class="ion flaticon-tools" data-pack="android" data-tags=""></span>Tools</a>
            </li>
        </ul>
    </div>
</div>
<div class="mx-auto">
    <div class="col-12 tab-content sub-menu px-0" id="myTabContent">

        <div class="tab-pane fade bg-white active show border-bottom" id="nav-1" role="tabpanel" aria-labelledby="nav-first-tab">
            <ul class="nav nav-tabs border-0 container d-flex mx-auto bg-white row  px-0 " id="myTab1" role="tablist ">
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mr-3 ml-2"  href="{{url('leads')}}"><i class="ion flaticon-dashboard" data-pack="android" data-tags=""></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0  mx-3"  href="{{url('leads')}}"><span class="ion ion-ios-paper-outline" data-pack="android" data-tags=""></span>Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mx-3"  href="{{url('leads')}}"><span class="ion ion-ios-list-outline" data-pack="android" data-tags=""></span>Tasks</a>
                </li>
            </ul>
        </div>

        <div class="tab-pane fade bg-white border-bottom" id="nav-2" role="tabpanel" aria-labelledby="nav-second-tab">
            <ul class="nav nav-tabs border-0 container d-flex mx-auto bg-white row  px-0 " id="myTab2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mr-3 ml-2"  href="{{url('leads')}}" ><span class="ion ion-ios-person-outline" data-pack="android" data-tags=""></span>Contacts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mx-3"  href="{{url('leads')}}"><span class="ion ion-ios-briefcase-outline" data-pack="android" data-tags=""></span>Business</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mx-3"  href="{{url('leads')}}"><span class="ion flaticon-dollar" data-pack="android" data-tags=""></span>Lenders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mx-3"  href="{{url('leads')}}"><span class="ion flaticon-broker" data-pack="android" data-tags=""></span>Brokers</a>
                </li>
            </ul>

        </div>

        <div class="tab-pane fade bg-white border-bottom" id="nav-3" role="tabpanel" aria-labelledby="nav-third-tab">

            <ul class="nav nav-tabs border-0 container d-flex mx-auto bg-white row  px-0 " id="myTab3" role="tablist">
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mr-3 ml-2" id="3-1-tab" data-toggle="tab" href="{{url('leads')}}" role="tab" aria-controls="profile" aria-selected="false"><span class="ion flaticon-target" data-pack="android" data-tags=""></span>Leads list</a>
                </li>
            </ul>

        </div>

        <div class="tab-pane fade bg-white border-bottom" id="nav-4" role="tabpanel" aria-labelledby="nav-fourth-tab">

            <ul class="nav nav-tabs border-0 container d-flex mx-auto bg-white row  px-0 " id="myTab4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mr-3 ml-2" id="4-1-tab" data-toggle="tab" href="{{url('leads')}}" role="tab" aria-controls="profile" aria-selected="false"><span class="ion flaticon-like" data-pack="android" data-tags=""></span>Deals list</a>
                </li>
            </ul>

        </div>

        <div class="tab-pane fade bg-white border-bottom" id="nav-5" role="tabpanel" aria-labelledby="nav-fifth-tab">

            <ul class="nav nav-tabs border-0 container d-flex mx-auto bg-white row  px-0 " id="myTab5" role="tablist">
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mr-3 ml-2" id="5-1-tab" data-toggle="tab" href="{{url('leads')}}" role="tab" aria-controls="home" aria-selected="false"><span class="ion ion-ios-world-outline" data-pack="android" data-tags=""></span>Affiliate Network</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mx-3" id="5-2-tab" data-toggle="tab" href="{{url('leads')}}" role="tab" aria-controls="profile" aria-selected="true"><span class="ion flaticon-cube" data-pack="android" data-tags=""></span>Materials</a>
                </li>
            </ul>

        </div>

        <div class="tab-pane fade bg-white border-bottom" id="nav-6" role="tabpanel" aria-labelledby="nav-sixth-tab">

            <ul class="nav nav-tabs border-0 container d-flex mx-auto bg-white row  px-0 " id="myTab6" role="tablist">
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mr-3 ml-2" id="6-1-tab" data-toggle="tab" href="{{url('leads')}}" role="tab" aria-controls="home" aria-selected="true"><span class="ion ion-ios-email-outline" data-pack="android" data-tags=""></span>Emails</a>
                </li>
            </ul>

        </div>

        <div class="tab-pane fade bg-white border-bottom" id="nav-7" role="tabpanel" aria-labelledby="nav-seventh-tab">

            <ul class="nav nav-tabs border-0 container d-flex mx-auto bg-white row  px-0 " id="myTab7" role="tablist">
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mr-3 ml-2" id="7-1-tab" data-toggle="tab" href="{{url('leads')}}" role="tab" aria-controls="profile" aria-selected="false"><span class="ion flaticon-exchange" data-pack="android" data-tags=""></span>Loan machine engine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mx-3" id="7-2-tab" data-toggle="tab" href="{{url('leads')}}" role="tab" aria-controls="home" aria-selected="false"><span class="ion flaticon-list-searching-variant" data-pack="android" data-tags=""></span>Guidelines</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link small py-md-4 py-sm-3 py-2 border-0 mx-3" id="7-3-tab" data-toggle="tab" href="{{url('leads')}}" role="tab" aria-controls="profile" aria-selected="true"><span class="ion flaticon-calculator" data-pack="android" data-tags=""></span>Calculators</a>
                </li>
            </ul>
        </div>
    </div>
</div>





