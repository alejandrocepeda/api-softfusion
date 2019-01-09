@extends('layouts.app')

@section('content')

    <div class="row px-md-5 px-0 pt-4 border-top bg-body">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-6 my-3">
                    <!--Main title-->

                    <h4 class="float-left mr-5">Chloe Moretz</h4>

                    <!--Breadcrumb-->

                    <nav>
                        <ol class="breadcrumb small p-0 mt-2">
                            <li class="breadcrumb-item">
                                <a href="#" class="text-primary">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#" class="text-primary">Deals list</a>
                            </li>
                            <li class="breadcrumb-item active font-weight-light">Chloe Moretz</li>
                        </ol>
                    </nav>

                    <!--End breadcrumb-->

                </div>
                <div class="col-sm-6 float-right">

                    <!--Right buttons for actions in the page -->

                    <button class="btn-success small text-white float-right d-flex align-items-center rounded-0 py-2 px-3">
                        <span class="ion ion-android-document"></span> Make Application
                    </button>

                </div>

                <!--Here starts the information in these case boxes should be collapsable-->

                <div class="information">

                    <!--Box application info-->

                    <div class="col-12 bg-white border mb-4 border-bottom-3">
                        <div class="mb-4 row mx-0">
                            <div class="col-12 small border-bottom pb-3">
                                <a href="#application-collapse" data-toggle="collapse" class="card-link link-collapse collapsed" aria-expanded="false">
                                    <h6 class="mt-3 mb-0">
                                        <span class="ion ion-briefcase"></span>Application ID: A452364
                                        <span class="ion ion-chevron-right text-default float-right arrow-collapse mt-1"></span>
                                    </h6>
                                </a>
                            </div>
                            <div class="col-12">
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Product Type:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <select id="product-type" class="text-default border-0 rounded-0">
                                            <option value="Equipment Financing">Product Type: Equipment Financing</option>
                                            <option value="Revenue Based Business Loans">Revenue Based Business Loans
                                            </option>
                                            <option value="Merchant Cash Advance">Merchant Cash Advance</option>
                                            <option value="1-5 Year Business Term Loan">1-5 Year Business Term Loan</option>
                                            <option value="Residential Real State Financing">Residential Real State
                                                Financing
                                            </option>
                                            <option value="Commercial Real State Financing">Commercial Real State
                                                Financing
                                            </option>
                                        </select>
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-social-usd-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Loan Request:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input readonly id="loan-request" placeholder="Loan Request" class="text-default border-0"  value="$ 200,000">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-person-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Processor:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <select id="processor" class="text-default border-0 rounded-0">
                                            <option value="Tommy Green">Processor: Tommy Green</option>
                                            <option value="Jason Red">Jason Red</option>
                                            <option value="Zach Black">Zach Black</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="collapse" id="application-collapse">
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion flaticon-push-pin text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Loan purpose:</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <input readonly id="loan-purpose" placeholder="Loan purpose" class="text-default border-0" value="Dolor sit amet">
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion ion-ios-person-outline text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Bankrupcty:</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <select id="bankruptcy" class="text-default border-0 rounded-0">
                                                <option value="No"> No</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion flaticon-push-pin text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Collateral:</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <select id="collateral" class="text-default border-0 rounded-0">
                                                <option value="No">No</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion flaticon-push-pin text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Exist debt:</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <select id="exist-debt" class="text-default border-0 rounded-0">
                                                <option value="No">No</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--End Box application info-->

                    <!--Box lead info-->

                    <div class="col-12 bg-white border mb-4 border-bottom-3 ">
                        <div class="mb-4 row mx-0">
                            <div class="col-12 small border-bottom pb-3">
                                <a href="javascript:;" id="lead-collapse-closed" data-toggle="collapse" data-target=".lead-info"  class="card-link link-collapse collapsed" >
                                    <h6 class="mt-3 mb-0">
                                        <span class="ion ion-briefcase"></span>Lead ID:
                                        1452364<span class="ion ion-chevron-right text-default float-right arrow-collapse mt-1"></span>
                                    </h6>
                                </a>
                            </div>

                            <!--Box lead info collapsed-->

                            <div class="col collapse show lead-info border-bottom">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="text-center">
                                            <img src="../img/lead_profile.jpg" class="rounded-circle my-3 img-thumbnail info-img">
                                        </div>
                                    </div>
                                    <div class="col pl-0 pr-3">
                                        <div class="col-12 small px-0">
                                            <h6 class="mb-2 text-primary mt-3 field">
                                                <span class="small ion ion-edit position-absolute"></span>
                                                <input readonly id="lead-name" placeholder="Contact name" class="text-primary border-0 w-100" value="Chloe Moretz">
                                            </h6>
                                        </div>
                                        <div class="col-12 small px-0">
                                            <p class="mb-2 field">
                                                <span class="small ion ion-edit position-absolute collapse-edit"></span>
                                                <input readonly id="lead-phone" placeholder="Phone Number" class="text-default border-0 w-100" value="(458) 245-2145">
                                            </p>
                                        </div>
                                        <div class="col-12 small px-0">
                                            <p class="field">
                                                <span class="small ion ion-edit position-absolute collapse-edit"></span>
                                                <input readonly id="lead-email" placeholder="Email" class="text-default border-0 w-100" value="b.flash@mail.com">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--End lead info collapsed-->

                            <!--Box lead info not collapsed-->

                            <div class="lead-info col-12 collapse" >
                                <div class="text-center my-2">
                                    <img src="../img/lead_profile.jpg" class="rounded-circle my-3 img-thumbnail info-img-lg">
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-person-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Name:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input id="lead-name" class="text-default border-0" value="Chloe Moretz">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-email-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Email:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input id="lead-email" placeholder="Email" class="text-default border-0" value="b.flash@mail.com">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-location-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Street Address:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input id="lead-address" placeholder="Street Address" class="text-default border-0" value="Fake street 123">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion flaticon-push-pin text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">City:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <select id="lead-city" class="text-default border-0 rounded-0">
                                            <option value="New York">New York</option>
                                            <option value="Washington DC">Washington DC</option>
                                            <option value="Los Angeles">Los Angeles</option>
                                            <option value="Miami">Miami</option>
                                            <option value="San Francisco">San Francisco</option>
                                            <option value="Las Vegas">Las Vegas</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-flag-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">State:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <select id="lead-state" class="text-default border-0 rounded-0">
                                            <option value="New York">New York</option>
                                            <option value="Florida">Florida</option>
                                            <option value="Texas">Texas</option>
                                            <option value="Nebraska">Nebraska</option>
                                            <option value="California">California</option>
                                            <option value="New Jersey">New Jersey</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion flaticon-mailbox text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Zip Code:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input id="lead-zip" placeholder="Zip code" class="text-default border-0" value="1001">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-telephone-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Phone Number:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input id="lead-phone" placeholder="Phone Number" class="text-default border-0" value="(458) 245-2145">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion flaticon-id-card text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Social Security:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input id="lead-ss" placeholder="Social Security" class="text-default border-0" value="7854 14589-14">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-calendar-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Birthday:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input id="lead-birthday" placeholder="Birthday" class="text-default border-0" value="22-07-2000">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field w-100  mb-0 py-2">
                                        <span class="ion flaticon-broker text-primary" data-pack="android" data-tags=""></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Broker:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <select id="lead-broker" class="text-default border-0 rounded-0">
                                            <option value="New York">Wally West</option>
                                            <option value="Megan Mars">Megan Mars</option>
                                            <option value="Dick Grayson">Dick Grayson</option>
                                            <option value="Tim Drake">Tim Drake</option>
                                            <option value="Roy Harper">Roy Harper</option>
                                            <option value="Jason Todd">Jason Todd</option>
                                        </select>
                                    </p>
                                </div>
                            </div>

                            <!--End Box lead info not collapsed-->

                        </div>
                    </div>

                    <!--End Box lead info-->

                    <!--Box coborrower info-->

                    <div class="col-12 bg-white border mb-4 border-bottom-3">
                        <div class="mb-4 row mx-0">
                            <div class="col-12 small border-bottom pb-3">
                                <a href="javascript:;" data-toggle="collapse" data-target=".coborrower-info" id="coborrower-collapse-closed" class="card-link link-collapse">
                                    <h6 class="mt-3 mb-0">
                                        <span class="ion ion-briefcase"></span>Coborrower<span class="ion ion-chevron-right text-default float-right arrow-collapse mt-1"></span>
                                    </h6>
                                </a>
                            </div>

                            <!--Coborrower info colapsed-->

                            <div class="col collapse show coborrower-info border-bottom">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="text-center">
                                            <img src="../img/coborrower.jpg" class="rounded-circle my-3 img-thumbnail info-img">
                                        </div>
                                    </div>
                                    <div class="col pl-0 pr-3">
                                        <div class="col-12 small px-0">
                                            <h6 class="mb-2 text-primary mt-3 field">
                                                <span class="small ion ion-edit position-absolute"></span>
                                                <input readonly id="coborrower-name" placeholder="Coborrower Name" class="text-primary border-0 w-100 " value="Coborrower Name">
                                            </h6>
                                        </div>
                                        <div class="col-12 small px-0">
                                            <p class="mb-2 field">
                                                <span class="small ion ion-edit position-absolute collapse-edit"></span>
                                                <input readonly id="coborrower-phone" placeholder="Phone number" class="text-default border-0 w-100" value="(458) 245-2145">
                                            </p>
                                        </div>
                                        <div class="col-12 small px-0">
                                            <p class="field">
                                                <span class="small ion ion-edit position-absolute collapse-edit"></span>
                                                <input readonly id="coborrower-email" placeholder="Email" class="text-default border-0 pt-1 w-100" value="cobor.flash@jla.com">
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Coborrower info not colapsed-->

                            <div class="coborrower-info col-12 collapse">
                                <div class="text-center my-2">
                                    <img src="../img/coborrower.jpg" class="rounded-circle my-3 img-thumbnail info-img-lg">
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-person-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Coborrower:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input readonly id="coborrower-name" placeholder="Coborrower Name" class="text-default border-0" value="Victoria Justice">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-email-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Email:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input readonly id="coborrower-email" placeholder="Email" class="text-default border-0"  value="cobor.flash@jla.com">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-location-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Street Address:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input readonly id="coborrower-address" placeholder="Street Address" class="text-default border-0"  value="Fake street 123">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion flaticon-push-pin text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">City:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <select id="coborrower-city" class="text-default border-0 rounded-0">
                                            <option value="New York">New York</option>
                                            <option value="Washington DC">Washington DC</option>
                                            <option value="Los Angeles">Los Angeles</option>
                                            <option value="Miami">Miami</option>
                                            <option value="San Francisco">San Francisco</option>
                                            <option value="Las Vegas">Las Vegas</option>
                                        </select>
                                    </p>

                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-flag-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">State:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <select id="coborrower-state" class="text-default border-0 rounded-0">
                                            <option value="New York">New York</option>
                                            <option value="Florida">Florida</option>
                                            <option value="Texas">Texas</option>
                                            <option value="Nebraska">Nebraska</option>
                                            <option value="California">California</option>
                                            <option value="New Jersey">New Jersey</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion flaticon-mailbox text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Zip Code:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input readonly id="coborrower-zip" placeholder="Zip code" class="text-default border-0" value="1001">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-telephone-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Phone Number:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input readonly id="coborrower-phone" placeholder="Phone Number" class="text-default border-0" value="(458) 275-2145">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion flaticon-id-card text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Social Security:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input readonly id="coborrower-ss" placeholder="Social Security" class="text-default border-0" value="7454 14589-14">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-calendar-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Birthday:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input readonly id="coborrower-birthday" placeholder="Birthday" class="text-default border-0" value="02-06-1991">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--End Box coborrower info-->

                    <!--Business info same thing as lead editable and stuff-->

                    <div class="col-12 bg-white border mb-5 border-bottom-3">
                        <div class="mb-4 row mx-0">
                            <div class="col-12 small border-bottom pb-3">
                                <a href="#business-collapse" data-toggle="collapse" class="card-link collapsed link-collapse" aria-expanded="false">
                                    <h6 class="mt-3 mb-0">
                                        <span class="ion ion-briefcase"></span>Business
                                        <span class="ion ion-chevron-right text-default float-right arrow-collapse mt-1"></span>
                                    </h6>
                                </a>
                            </div>
                            <div class="col-12">

                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Business Name:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input readonly id="business-name" placeholder="Business Name" class="text-default border-0" value="Kick Ass Corp">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field mb-0 py-2 w-100">
                                        <span class="ion ion-ios-location-outline text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">Street Address:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <input readonly id="business-address" placeholder="Street Addres" class="text-default border-0" value="Fake street 123">
                                    </p>
                                </div>
                                <div class="row px-3 small position-relative">
                                    <p class="border-bottom field w-100  mb-0 py-2">
                                        <span class="ion flaticon-push-pin text-primary"></span>
                                        <label class="font-weight-normal mb-0 small text-primary">City:</label>
                                        <span class="small ion ion-edit position-absolute"></span>
                                        <select id="business-city" class="text-default border-0 rounded-0">
                                            <option value="Los Angeles">Los Angeles</option>
                                            <option value="New York">New York</option>
                                            <option value="Washington DC">Washington DC</option>
                                            <option value="Miami">Miami</option>
                                            <option value="San Francisco">San Francisco</option>
                                            <option value="Las Vegas">Las Vegas</option>
                                        </select>
                                    </p>
                                </div>
                                <div class="collapse" id="business-collapse">

                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field w-100  mb-0 py-2">
                                            <span class="ion ion-ios-flag-outline text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">State:</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <select id="business-state" class="text-default border-0 rounded-0">
                                                <option value="California">California</option>
                                                <option value="Florida">Florida</option>
                                                <option value="Texas">Texas</option>
                                                <option value="Nebraska">Nebraska</option>
                                                <option value="New York">New York</option>
                                                <option value="New Jersey">New Jersey</option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion flaticon-mailbox text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Zip code:</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <input readonly id="business-zip" placeholder="Zip code" class="text-default border-0" value="1001">
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion ion-ios-telephone-outline text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Phone Number</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <input readonly id="business-phone" placeholder="Phone Number" class="text-default border-0" value="(458) 245-2145">
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion ion-ios-time-outline text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Time in Businness</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <input readonly id="business-time" placeholder="Time in Business" class="text-default border-0" value="+3 Years">
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion ion-social-usd-outline text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Monthly Revenue:</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <input readonly id="business-monthly" placeholder="Monthly Revenue" class="text-default border-0" value="$10,000">
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion ion-iphone text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Credit Score:</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <input readonly id="business-credit" placeholder="Credit Score" class="text-default border-0" value="$100,000">
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field w-100  mb-0 py-2">
                                            <span class="ion flaticon-two-gears text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Industry:</label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <select id="business-industry" class="text-default border-0 rounded-0">
                                                <option value="Marketing">Marketing</option>
                                                <option value="Health">Health</option>
                                                <option value="Food">Food</option>
                                                <option value="Sports">Sports</option>
                                                <option value="Politics">Politics</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion flaticon-percentage text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Ownership: </label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <input readonly id="business-ownership" placeholder="Ownership (Percentage)" class="text-default border-0" value="100%">
                                        </p>
                                    </div>
                                    <div class="row px-3 small position-relative">
                                        <p class="border-bottom field mb-0 py-2 w-100">
                                            <span class="ion ion-ios-world-outline text-primary"></span>
                                            <label class="font-weight-normal mb-0 small text-primary">Web source: </label>
                                            <span class="small ion ion-edit position-absolute"></span>
                                            <input readonly id="business-web" placeholder="Web source" class="text-default border-0" value="www.kickass.com">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--End Business info same thing as lead editable and stuff-->

                </div>

                <!--End information-->

                <!--The main content -->

                <div class="col-lg-10 col-12 main-content pl-lg-4 pl-0 pr-0">

                    <!--Box with progress bar -->

                    <div class="col-12 bg-white border mb-4 border-bottom-3">
                        <div>

                            <!--Progress bar-->

                            <div class="row px-3 my-3 mr-0">
                                <div id="deal-status-new-application" class="col bg-success border-success p-2 text-white progress-bar">
                                    <span>New application</span>
                                </div>
                                <div id="deal-status-documentation" class="col bg-progress border-progress p-2 text-white progress-bar">
                                    <span class="dropdown-toggle" data-toggle="dropdown">Documentation complete</span>
                                    <div class="dropdown-menu">
                                        <a id="choose-doc-complete" class="dropdown-item small text-default" href="javascript:;">Documentation
                                            complete</a>
                                        <a id="choose-doc-pending" class="dropdown-item small text-default" href="javascript:;">Documentation
                                            pending</a>
                                    </div>
                                </div>
                                <div id="deal-status-lender" class="col bg-progress border-progress p-2 text-white progress-bar">
                                    <span class="dropdown-toggle" data-toggle="dropdown">Lender approved</span>
                                    <div class="dropdown-menu">
                                        <a id="choose-l-approved" class="dropdown-item small text-default" href="javascript:;">Lender
                                            approved</a>
                                        <a id="choose-l-not-approved" class="dropdown-item small text-default" href="javascript:;" data-toggle="modal" data-target="#modal-not-approved">Not
                                            approved</a>
                                    </div>
                                </div>

                                <!--Modal Not approved-->

                                <div class="modal fade" id="modal-not-approved" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Why Not approved?</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea class="form-control border-0 pt-3 text-default content-textarea" placeholder="Start writing to leave a note..."></textarea>
                                                <div class="px-2 mx-1 my-2 note-options">
                                                    <span class="ion text-default mr-3">T</span>
                                                    <span class="ion ion-link text-default mr-3"></span>
                                                    <span class="ion ion-paperclip text-default mr-2"></span>
                                                </div>

                                            </div>
                                            <div class="col-12 clearfix pt-3 border-top modal-footer">
                                                <button class="btn btn-primary btn-sm mr-2 disabled save-note">Save Note
                                                </button>
                                                <button class="btn btn-outline-primary btn-sm discard" data-dismiss="modal">
                                                    Discard
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--End Modal-->

                                <div id="deal-status-approved" class="col bg-progress border-progress p-2 text-white progress-bar">
                                    <span class="dropdown-toggle" data-toggle="dropdown">Contract sent</span>
                                    <div class="dropdown-menu">
                                        <a id="choose-c-sent" class="dropdown-item small text-default" href="javascript:;">Contract
                                            sent</a>
                                        <a id="choose-c-signed" class="dropdown-item small text-default" href="javascript:;">Contract
                                            signed</a>
                                    </div>
                                </div>
                                <div id="deal-status-funded" class="col bg-progress border-progress p-2 text-white progress-bar">
                                    <span class="dropdown-toggle" data-toggle="dropdown">Funded</span>
                                    <div class="dropdown-menu">
                                        <a id="choose-funded" class="dropdown-item small text-default" href="javascript:;">Funded</a>
                                        <a id="choose-declined" class="dropdown-item small text-default" href="javascript:;" data-toggle="modal" data-target="#modal-declined">Declined</a>
                                    </div>
                                </div>

                                <!--Modal declined-->

                                <div class="modal fade" id="modal-declined" tabindex="-1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Why Declined?</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea class="form-control border-0 pt-3 text-default content-textarea" placeholder="Start writing to leave a note..."></textarea>
                                                <div class="px-2 mx-1 my-2 note-options">
                                                    <span class="ion text-default mr-3">T</span>
                                                    <span class="ion ion-link text-default mr-3"></span>
                                                    <span class="ion ion-paperclip text-default mr-2"></span>
                                                </div>

                                            </div>
                                            <div class="col-12 clearfix pt-3 border-top modal-footer">
                                                <button class="btn btn-primary btn-sm mr-2 disabled save-note">Save Note
                                                </button>
                                                <button class="btn btn-outline-primary btn-sm discard" data-dismiss="modal">
                                                    Discard
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--End Modal-->

                            </div>
                        </div>
                    </div>

                    <!--End Box with progress bar -->

                    <!--Note: tabs for documentation (docs, matchs etc..)-->

                    <div class="col-12 bg-white border mb-4 border-bottom-3">
                        <div class="mb-4">
                            <div id="documentation-application" role="tabpanel" class="tab-pane border-bottom create-tabs">
                                <ul role="tablist " class="nav nav-tabs border-0  d-flex mx-auto row ">

                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#create_document" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2 show active">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-folder-outline"></span>Documents
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#create_underwriting" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-book-outline"></span>
                                            Underwritings </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#create_match" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-flame-outline"></span>
                                            Matchs </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#create_approval" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-checkmark-outline"></span>Approvals
                                        </a>
                                    </li>

                                </ul>

                            </div>


                            <div class="tab-content" id="nav-tabContent ">

                                <!--Note: documents tab-->

                                <div id="create_document" role="tabpanel" class="tab-pane fade active show">
                                    <div class="row align-items-center px-3 my-3">
                                        <div class="col-auto">
                                            <h6 class="mb-0 text-primary">Documentation required</h6>
                                        </div>
                                        <div class="col">

                                            <button class="btn-primary small text-white float-right d-flex align-items-center rounded-0 py-2 px-3 dropdown-toggle" data-toggle="dropdown">
                                                <span class="ion ion-arrow-up-a"></span>Upload Documents
                                            </button>
                                            <div class="dropdown-menu">
                                                <a id="doc-application" class="dropdown-item small text-default" href="javascript:;">
                                                    <div class="custom-file h-0 c-pointer">
                                                        <input type="file" class="custom-file-input" accept="application/pdf" id="application-pdf">
                                                        <label class="drop-docs custom-file-label p-0 border-0 bg-transparent" for="application-pdf">Application
                                                            (.pdf)</label>
                                                    </div>
                                                </a>

                                                <a id="doc-bankstatement-4" class="dropdown-item small text-default" href="javascript:;" data-toggle="modal" data-target="#modal-bankstatement-4">Bank
                                                    statements</a>
                                                <a id="doc-invoice" class="dropdown-item small text-default" href="javascript:;">
                                                    <div class="custom-file c-pointer">
                                                        <input type="file" class="custom-file-input" id="copy-invoice">
                                                        <label class="drop-docs custom-file-label p-0 border-0 bg-transparent" for="copy-invoice">Copy
                                                            of invoice <br>
                                                            <span class="small">(Equipment information)</span> </label>
                                                    </div>
                                                </a>
                                                <a id="doc-other" class="dropdown-item small text-default" href="javascript:;">
                                                    <div class="custom-file h-0 c-pointer">
                                                        <input type="file" class="custom-file-input" id="other-files">
                                                        <label class="drop-docs custom-file-label p-0 border-0 bg-transparent" for="other-files">Other
                                                            Files</label>
                                                    </div>
                                                </a>
                                            </div>

                                            <button class="btn-success small text-white float-right d-flex align-items-center rounded-0 py-2 px-3 mr-3">
                                                <span class="ion ion-ios-paperplane"></span>Send deal signature
                                            </button>

                                            <button class="btn-success small text-white float-right d-flex align-items-center rounded-0 py-2 px-3 mr-3">
                                                <span class="ion ion-ios-paperplane"></span>Send coborrower signature
                                            </button>

                                        </div>

                                        <!--Modal Bankstatement -->

                                        <div class="modal fade opacity-modal" id="modal-bankstatement-4" tabindex="-1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content rounded-0">
                                                    <div class="px-5 modal-header rounded-0 bg-secondary text-white">
                                                        <h5 class="modal-title font-weight-normal">Bank statements</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span class="text-white font-weight-light" aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body px-5 mt-2">
                                                        <p class="small text-default">You must upload the last 4 months
                                                            of bank statements</p>
                                                        <div id="circle" align="center" data-percent="20">
                                                            <strong class="position-absolute text-center w-100"></strong>
                                                        </div>
                                                        <div class="custom-file mt-3 c-pointer">
                                                            <input type="file" class="custom-file-input" id="upload-files" multiple>
                                                            <label for="upload-files" class="drop-docs custom-file-label p-0 border-0 bg-transparent">
                                                                <button class="btn-primary small text-white mx-auto d-flex align-items-center rounded-0 py-2 px-3">
                                                                    <span class="ion ion-arrow-up-a"></span>Upload Files
                                                                </button>
                                                            </label>
                                                        </div>


                                                        <div class="alert alert-secondary small p-1 border-secondary row rounded-0 my-3 mx-2 align-items-center" role="alert">
                                                            <div class="col-1">
                                                                <span class="text-primary c-pointer text-left"><strong>x</strong></span>
                                                            </div>
                                                            <div class="col-4 text-center"><strong>Filename.pdf</strong>
                                                            </div>
                                                            <div class="col-7 text-right"><span>Choose a month</span>
                                                                <select class="form-control-sm small mx-2">
                                                                    <option value="April">April</option>
                                                                    <option value="March">March</option>
                                                                    <option value="February">February</option>
                                                                    <option value="January">January</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="px-5 col-12 clearfix pt-3 border-top modal-footer justify-content-start">
                                                        <button class="mr-3 btn btn-primary btn-sm disabled px-3 py-2 rounded-0 save-note small">
                                                            Finish
                                                        </button>
                                                        <button class="btn btn-outline-primary btn-sm discard small rounded-0 px-3 py-2" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--End Modal-->


                                        <!--Modal Preview documents -->

                                        <div class="modal fade modal-prev-doc" tabindex="-1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Doc Preview</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body embed-responsive embed-responsive-1by1">
                                                        <iframe class="preview-iframe embed-responsive-item pt-3 px-3 bg-body" src="https://getbootstrap.com/docs/4.0/components/input-group/#custom-file-input">
                                                            <p>Your browser does not support iframes.</p>
                                                        </iframe>
                                                    </div>
                                                    <div class="col-12 clearfix pt-3 border-top modal-footer">
                                                        <a class="btn btn-primary btn-sm mr-2 download-prev" href="javascript:;" download>
                                                            Download </a>
                                                        <button class="btn btn-outline-primary btn-sm discard" data-dismiss="modal">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--End Modal-->

                                    </div>
                                    <hr class="mt-0">
                                    <div class="row align-items-center px-3 my-3">
                                        <div class="col">

                                        </div>
                                        <div class="col-3">
                                            <div class="input-group my-2 my-md-0">
                                                <input class="form-control search" type="text" placeholder="Search...">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text rounded-right search-icon" id="basic-addon1"><span class="ion ion-ios-search mr-0 " data-pack="android" data-tags=""></span></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!--Note: List of application Documents-->

                                    <table class="table small text-default">
                                        <thead>
                                        <tr class="d-none table-edit">

                                            <!--Note: actions for documents -->

                                            <td scope="col" colspan="5" class="border-bottom-table-secondary top-table-border">
                                                <a href="javascript:;" class="mr-3 delete-checked-file">
                                                    <span class="ion ion-ios-trash-outline text-primary bg-transparent mr-0"></span>Delete
                                                </a>
                                                <a href="javascript:;" class="mr-3 edit-checked-file">
                                                    <span class="ion ion-ios-compose-outline text-primary bg-transparent mr-0"></span>Edit
                                                </a>
                                                <a href="javascript:;" class="mr-3 rename-checked-file">
                                                    <span class="ion ion-ios-color-wand-outline text-primary bg-transparent mr-0"></span>Rename
                                                </a>
                                            </td>

                                        </tr>
                                        <tr class="table-header">
                                            <th scope="col" width="3%" class="border-bottom-table-secondary top-table-border"></th>
                                            <th scope="col" class="border-bottom-table-secondary top-table-border">Document name</th>
                                            <th scope="col" width="10%" class="border-bottom-table-secondary top-table-border">Type</th>
                                            <th scope="col" class="border-bottom-table-secondary text-center top-table-border">Download</th>
                                            <th scope="col" width="15%" class="border-bottom-table-secondary top-table-border">Last updated</th>
                                        </tr>
                                        </thead>
                                        <tbody id="documentation-table-body">
                                        <tr>
                                            <td width="3%" ><input type="checkbox" class="form-control rounded-0"></td>
                                            <td>
                                                <a data-toggle="modal" class="doc-prev-link" data-target=".modal-prev-doc" href="javascript:;">March|Bankstatement.pdf</a>
                                            </td>
                                            <td width="10%" >Bank statement</td>
                                            <td  class="text-center">
                                                <a href="javascript:;"><span class="ion ion-ios-download-outline view text-default"></span></a>
                                            </td>
                                            <td width="15%">Yesterday</td>
                                        </tr>
                                        <tr>
                                            <td width="3%" ><input type="checkbox" class="form-control rounded-0"></td>
                                            <td>
                                                <a data-toggle="modal" class="doc-prev-link" data-target=".modal-prev-doc" href="javascript:;">Invoiceofmy.pdf</a>
                                            </td>
                                            <td width="10%" >Copy of invoice</td>
                                            <td  class="text-center">
                                                <a href="javascript:;"><span class="ion ion-ios-download-outline view text-default"></span></a>
                                            </td>
                                            <td width="15%">5 hours ago</td>
                                        </tr>
                                        <tr>
                                            <td width="3%" ><input type="checkbox" class="form-control rounded-0"></td>
                                            <td>
                                                <a data-toggle="modal" class="doc-prev-link" data-target=".modal-prev-doc" href="javascript:;">April|Bankstatement.pdf</a>
                                            </td>
                                            <td width="10%" >Bank statement</td>
                                            <td class="text-center">
                                                <a href="javascript:;"><span class="ion ion-ios-download-outline view text-default"></span></a>
                                            </td>
                                            <td width="15%">05-04-2018</td>
                                        </tr>
                                        </tbody>
                                        <thead>
                                        <tr>
                                            <th scope="col" class="border-bottom-table-secondary top-table-border"></th>
                                            <th scope="col" class="border-bottom-table-secondary top-table-border">
                                                Document Name
                                            </th>
                                            <th scope="col" class="border-bottom-table-secondary top-table-border">
                                                Type
                                            </th>
                                            <th scope="col" class="text-center border-bottom-table-secondary top-table-border">
                                                Download
                                            </th>
                                            <th scope="col" class="border-bottom-table-secondary top-table-border">Last
                                                updated
                                            </th>
                                        </tr>
                                        </thead>

                                    </table>
                                </div>

                                <!--End documents tab-->

                                <!--Note: underwritigs tab-->

                                <div id="create_underwriting" role="tabpanel" class="tab-pane fade">
                                    <div class="row align-items-center px-3 my-3">
                                        <div class="col-auto">
                                            <h6 class="mb-0 text-primary">Underwritings</h6>
                                        </div>
                                        <div class="col">
                                            <button id="watch-advances" class="btn-primary small text-white float-right d-flex align-items-center rounded-0 py-2 px-3 ">
                                                <span class="ion ion-ios-eye"></span>Watch advances
                                            </button>
                                            <button class="btn-success small text-white float-right d-flex align-items-center rounded-0 py-2 px-3 mr-3" data-toggle="modal" data-target=".modal-add-underwriting">
                                                <span class="ion ion-plus"></span>Add new underwriting
                                            </button>
                                            <button class="btn-success small text-white float-right d-flex align-items-center rounded-0 py-2 px-3 mr-3" data-toggle="modal" data-target=".modal-add-new-balance">
                                                <span class="ion ion-plus"></span>Add new client advance
                                            </button>
                                        </div>

                                        <!--Modal Underwritings -->

                                        <div class="modal opacity-modal fade modal-add-underwriting" tabindex="-1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content rounded-0">
                                                    <div class="px-5 modal-header bg-secondary rounded-0 text-white">
                                                        <h5 class="modal-title font-weight-normal">Add new underwriting</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true" class="text-white font-weight-light">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body px-5 mt-2">
                                                        <p class="small text-default">Please fill the fields: </p>

                                                        <form class="create-form modal-create">
                                                            <div class="row mb-3">
                                                                <div class="col-md">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Month</label>
                                                                    <input class="form-control">
                                                                </div>
                                                                <div class="col-md-2 ">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Year</label>
                                                                    <input class="form-control">
                                                                </div>
                                                                <div class="col-md">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Total Deposit Banks</label>
                                                                    <input class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Number of Deposits</label>
                                                                    <input class="form-control">
                                                                </div>
                                                                <div class="col-md">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Ending Balance </label>
                                                                    <input class="form-control">

                                                                </div>
                                                                <div class="col-md">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Average Daily Balance</label>
                                                                    <input class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">NSFs</label>
                                                                    <input class="form-control">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Negative Days</label>
                                                                    <input class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col-md-6">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Choose a Bank</label>
                                                                    <input class="form-control">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Last 4 digits</label>
                                                                    <input class="form-control">
                                                                </div>
                                                            </div>

                                                        </form>

                                                    </div>
                                                    <div class="px-5 col-12 clearfix pt-3 border-top modal-footer justify-content-start">
                                                        <button class="rounded-0 px-3 py-2 small btn btn-primary btn-sm mr-3 disabled save-note">
                                                            Save register
                                                        </button>
                                                        <button class="rounded-0 px-3 py-2 btn small btn-outline-primary btn-sm discard" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--End Modal-->

                                        <!--Modal new advance -->

                                        <div class="modal fade modal-add-new-balance opacity-modal" tabindex="-1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content rounded-0">
                                                    <div class="px-5 modal-header rounded-0 bg-secondary text-white">
                                                        <h5 class="modal-title font-weight-normal">Add new balance</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span class="text-white font-weight-light" aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body mt-2 px-5">
                                                        <p class="small text-default">Only complete if client currently has an advance. </p>

                                                        <form class="create-form modal-create">
                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Funding company:</label>
                                                                    <input class="form-control" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3 d-flex align-items-center">
                                                                <div class="col">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Payment </label>
                                                                    <input class="form-control" type="number">

                                                                </div>
                                                                <div class="col">
                                                                    <div class="row px-3 mt-4">
                                                                        <label class="small text-default">Daily </label>
                                                                        <input class="col ml-1" name="periodicity" type="radio">
                                                                        <label class="small text-default">Weekly </label>
                                                                        <input type="radio" name="periodicity" class="col ml-1">
                                                                        <label class="small text-default">Monthly </label>
                                                                        <input type="radio" name="periodicity" class="col ml-1">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <span class="ion ion-ios-calendar-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Funding Date</label>
                                                                    <input class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Ammount</label>
                                                                    <input class="form-control">
                                                                </div>
                                                            </div>

                                                        </form>

                                                    </div>
                                                    <div class="px-5 col-12 clearfix pt-3 border-top modal-footer justify-content-start">
                                                        <button class="small px-3 py-2 rounded-0 btn btn-primary btn-sm mr-3 disabled save-note">
                                                            Save register
                                                        </button>
                                                        <button class="small px-3 py-2 rounded-0 btn btn-outline-primary btn-sm discard" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--End Modal-->

                                    </div>
                                    <hr class="mt-0">
                                    <div class="row align-items-center px-3 my-3">
                                        <div class="col">

                                        </div>
                                        <div class="col-3">
                                            <div class="input-group my-2 my-md-0">
                                                <input class="form-control search" type="text" placeholder="Search...">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text rounded-right search-icon" id="basic-addon1"><span class="ion ion-ios-search mr-0 " data-pack="android" data-tags=""></span></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!--Note: Banks associated with deal  -->

                                    <div class="row px-3 mb-0">

                                        <div class="col-12 small pb-3 px-2 border-bottom border-bottom-table-secondary">
                                            <a href="javascript:;" data-target=".deal-bank" id="deal-bank-collapse-closed" data-toggle="collapse" class="card-link link-collapse collapsed text-default">
                                                <h6 class="mt-3 mb-0">
                                                     Bank of America
                                                    <span class="ion ion-chevron-right text-default float-right arrow-collapse mt-1"></span>
                                                </h6>
                                            </a>
                                        </div>

                                        <!--Note: List of underwritings or tables -->
                                        <div class="collapse col-12 px-0 deal-bank">
                                            <table class="mb-4 border-primary border-bottom border-bottom-2 table d-table small text-default">
                                                <thead>

                                                <tr class="table-header bg-body">

                                                    <th width="11%" scope="col" class="border-0">
                                                        Last four digits
                                                    </th>
                                                    <th width="10%" scope="col" class="border-0">
                                                        Month
                                                    </th>
                                                    <th width="14%" scope="col" class="border-0">
                                                        Total bank deposits
                                                    </th>
                                                    <th width="13%" scope="col" class="border-0">
                                                        Number of deposits
                                                    </th>
                                                    <th width="13%" scope="col" class="border-0">
                                                        Ending balance
                                                    </th>
                                                    <th width="15%" scope="col" class="border-0">
                                                        Average daily balance
                                                    </th>
                                                    <th width="6%" scope="col" class="border-0">
                                                        NSFs
                                                    </th>
                                                    <th width="11%" scope="col" class="border-0">
                                                        Negative days
                                                    </th>
                                                    <th scope="col" class="border-0">Actions</th>

                                                </tr>
                                                </thead>
                                                <tbody id="underwritings-table-body">

                                                <tr>

                                                    <td>0125</td>
                                                    <td>March, 2018</td>
                                                    <td>$ 5,475</td>
                                                    <td>65</td>
                                                    <td>$ 10,000</td>
                                                    <td>$ 0</td>
                                                    <td>8</td>
                                                    <td>2</td>
                                                    <td>
                                                        <a href="javascript:;" data-toggle="modal" data-target=".modal-add-underwriting" class="mr-2">
                                                            <span class="ion ion-ios-compose-outline text-default view bg-transparent mr-0"></span>
                                                        </a> <a href="javascript:;" class="mr-3 delete-checked-row">
                                                            <span class="delete ion ion-ios-trash-outline text-default bg-transparent mr-0"></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td>0125</td>
                                                    <td>February, 2018</td>
                                                    <td>$ 9,478</td>
                                                    <td>69</td>
                                                    <td>$ 8,547</td>
                                                    <td>$ 0</td>
                                                    <td>6</td>
                                                    <td>2</td>
                                                    <td>
                                                        <a href="javascript:;" data-toggle="modal" data-target=".modal-add-underwriting" class="mr-2">
                                                            <span class="ion ion-ios-compose-outline text-default view bg-transparent mr-0"></span>
                                                        </a> <a href="javascript:;" class="mr-3 delete-checked-row">
                                                            <span class="ion delete ion-ios-trash-outline text-default bg-transparent mr-0"></span>
                                                        </a>
                                                    </td>

                                                </tr>
                                                <tr class="font-result-size font-weight-normal text-primary">

                                                    <td class="font-weight-normal">Average</td>
                                                    <td></td>
                                                    <td>$ 2,001.5</td>
                                                    <td>67</td>
                                                    <td>$ 9,273.5</td>
                                                    <td>$ 0</td>
                                                    <td>7</td>
                                                    <td>2</td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="collapse show col-12 px-0 deal-bank">
                                            <table class="mb-4 border-primary border-bottom border-bottom-2 table d-table small text-default">
                                                <thead>

                                                <tr class="bg-body">

                                                    <th width="11%" scope="col" class="border-0">

                                                    </th>
                                                    <th width="10%" scope="col" class="border-0">

                                                    </th>

                                                    <th width="14%" scope="col" class="border-0">
                                                        Total bank deposits
                                                    </th>

                                                    <th width="13%" scope="col" class="border-0">
                                                        Number of deposits
                                                    </th>
                                                    <th width="13%" scope="col" class="border-0">
                                                        Ending balance
                                                    </th>
                                                    <th width="15%" scope="col" class="border-0">
                                                        Average daily balance
                                                    </th>
                                                    <th width="6%" scope="col" class="border-0">
                                                        NSFs
                                                    </th>

                                                    <th width="11%" scope="col" class="border-0">
                                                        Negative days
                                                    </th>
                                                    <th scope="col" class="border-0">

                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="font-result-size font-weight-normal text-primary">

                                                    <td>Average</td>
                                                    <td></td>
                                                    <td>$ 2,001.5</td>
                                                    <td>67</td>
                                                    <td>$ 9,273.5</td>
                                                    <td>$ 0</td>
                                                    <td>7</td>
                                                    <td>2</td>
                                                    <td></td>
                                                </tr>

                                                </tbody>

                                            </table>
                                        </div>

                                    </div>

                                    <div class="row px-3 mb-0">

                                        <div class="col-12 px-2 small pb-3 border-bottom border-bottom-table-secondary">
                                            <a href="javascript:;" data-target=".deal-bank-2" id="deal-bank-collapse-closed" data-toggle="collapse" class="card-link link-collapse collapsed text-default">
                                                <h6 class="mt-3 mb-0">
                                                    Bank of DC
                                                    <span class="ion ion-chevron-right text-default float-right arrow-collapse mt-1"></span>
                                                </h6>
                                            </a>
                                        </div>

                                        <!--Note: List of underwritings or tables -->
                                        <div class="collapse col-12 px-0 deal-bank-2" id="deal-bank-2">
                                            <table class="mb-4 border-primary border-bottom border-bottom-2 table d-table small text-default">
                                                <thead>

                                                <tr class="bg-body table-header">

                                                    <th width="11%" scope="col" class="border-0">Last four digits
                                                    </th>
                                                    <th width="10%" scope="col" class="border-0">
                                                        Month
                                                    </th>
                                                    <th width="14%" scope="col" class="border-0">
                                                        Total bank deposits
                                                    </th>
                                                    <th width="13%" scope="col" class="border-0">
                                                        Number of deposits
                                                    </th>
                                                    <th width="13%" scope="col" class="border-0">
                                                        Ending balance
                                                    </th>
                                                    <th width="15%" scope="col" class="border-0">
                                                        Average daily balance
                                                    </th>
                                                    <th width="6%" scope="col" class="border-0">
                                                        NSFs
                                                    </th>

                                                    <th width="11%" scope="col" class="border-0">
                                                        Negative days
                                                    </th>
                                                    <th scope="col" class="border-0">Actions</th>

                                                </tr>
                                                </thead>
                                                <tbody id="underwritings-table-body">

                                                <tr>
                                                    <td>0125</td>
                                                    <td>March, 2018</td>
                                                    <td>$ 5,475</td>
                                                    <td>65</td>
                                                    <td>$ 10,000</td>
                                                    <td>$ 0</td>
                                                    <td>8</td>
                                                    <td>2</td>
                                                    <td>
                                                        <a href="javascript:;" data-toggle="modal" data-target=".modal-add-underwriting" class="mr-2">
                                                            <span class="ion ion-ios-compose-outline text-default view bg-transparent mr-0"></span>
                                                        </a> <a href="javascript:;" class="mr-3 delete-checked-row">
                                                            <span class="ion ion-ios-trash-outline text-default bg-transparent mr-0 delete"></span>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr class="font-result-size font-weight-normal text-primary">

                                                    <td class="font-weight-normal">Average</td>
                                                    <td></td>
                                                    <td>$ 5,475.5</td>
                                                    <td>65</td>
                                                    <td>$ 10,000</td>
                                                    <td>$ 0</td>
                                                    <td>8</td>
                                                    <td>2</td>
                                                    <td></td>
                                                </tr>

                                                </tbody>


                                            </table>
                                        </div>

                                        <!-- table resume-->

                                        <div class="collapse show col-12 px-0 deal-bank-2">
                                            <table class="mb-4 border-primary border-bottom border-bottom-2 table d-table small text-default">
                                                <thead>

                                                <tr class="bg-body">

                                                    <th width="11%" scope="col" class="border-0"></th>
                                                    <th width="10%" scope="col" class="border-0"></th>
                                                    <th width="14%" scope="col" class="border-0">
                                                        Total bank deposits
                                                    </th>

                                                    <th width="13%" scope="col" class="border-0">
                                                        Number of deposits
                                                    </th>
                                                    <th width="13%" scope="col" class="border-0">
                                                        Ending balance
                                                    </th>
                                                    <th width="15%" scope="col" class="border-0">
                                                        Average daily balance
                                                    </th>
                                                    <th width="6%" scope="col" class="border-0">
                                                        NSFs
                                                    </th>

                                                    <th width="11%" scope="col" class="border-0">
                                                        Negative days
                                                    </th>
                                                    <th scope="col" class="border-0"></th>

                                                </tr>
                                                </thead>
                                                <tbody>


                                                <tr class="font-result-size font-weight-normal text-primary">
                                                    <td class="font-weight-normal">Average</td>
                                                    <td></td>
                                                    <td>$ 5,475.5</td>
                                                    <td>65</td>
                                                    <td>$ 10,000</td>
                                                    <td>$ 0</td>
                                                    <td>8</td>
                                                    <td>2</td>
                                                    <td></td>
                                                </tr>

                                                </tbody>

                                            </table>
                                        </div>

                                    </div>

                                    <div class="row px-3 mb-0 ">

                                        <div class="col-12 px-2 small pb-3 border-bottom border-bottom-table-secondary">
                                            <a href="javascript:;" id="deal-bank-collapse-closed" class="card-link link-collapse collapsed text-default">
                                                <h6 class="mt-3 mb-0">
                                                     All banks accounts
                                                </h6>
                                            </a>
                                        </div>

                                        <!--Note: List of underwritings or tables -->
                                        <div class=" col-12 px-0">

                                            <!--Note: table with total resume -->

                                            <table class="mb-4 border-primary border-bottom border-bottom-2 table d-table small text-default">
                                                <tbody>
                                                <tr class="alert alert-primary font-result-size font-weight-normal text-primary">
                                                    <td width="11%" class="font-weight-normal">Average</td>
                                                    <td width="10%"></td>
                                                    <td width="14%">$ 3,738.5</td>
                                                    <td width="13%">66</td>
                                                    <td width="13%">9,636.75</td>
                                                    <td width="15%">$ 0</td>
                                                    <td width="6%">7,5</td>
                                                    <td width="11%">2</td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!--Note: Tables of advances and ranges-->

                                    <div id="advances-table" class="row px-3 mb-3">
                                        <div class="col-8 pl-0">

                                            <div class="small pb-3 px-2 border-bottom border-bottom-table-secondary">
                                                <a href="#deal-client-advance" id="deal-bank-collapse-closed" data-toggle="collapse" class="card-link link-collapse collapsed text-default ">
                                                    <h6 class="mt-3 mb-0">
                                                        Client Advances
                                                        <span class="ion ion-chevron-right text-default float-right arrow-collapse mt-1 rotated"></span>
                                                    </h6>
                                                </a>
                                            </div>

                                            <!--Note: List of underwritings or tables -->
                                            <div class="collapse show" id="deal-client-advance">
                                                <table class="mb-0 border-primary border-bottom border-bottom-2 table d-table small text-default">
                                                    <thead>

                                                    <tr class="bg-body table-header">

                                                        <th scope="col" class="border-0">
                                                            Funding company
                                                        </th>
                                                        <th scope="col" class="border-0">
                                                            Payment
                                                        </th>
                                                        <th scope="col" class="border-0">
                                                            Frequency
                                                        </th>
                                                        <th scope="col" class="border-0">
                                                            Funding date
                                                        </th>
                                                        <th scope="col" class="border-0">
                                                            Amount
                                                        </th>
                                                        <th scope="col" class="border-0"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="underwritings-table-body">

                                                    <tr>

                                                        <td>Kick ass corp</td>
                                                        <td>$ 39,770</td>
                                                        <td>Monthly</td>
                                                        <td>11-04-2018</td>
                                                        <td>$ 500</td>
                                                        <td>
                                                            <a href="javascript:;" data-toggle="modal" data-target=".modal-add-underwriting" class="mr-2">
                                                                <span class="ion ion-ios-compose-outline text-default view bg-transparent mr-0"></span>
                                                            </a> <a href="javascript:;" class="mr-3 delete-checked-row">
                                                                <span class="delete ion ion-ios-trash-outline text-default bg-transparent mr-0"></span>
                                                            </a>
                                                        </td>

                                                    </tr>

                                                    </tbody>


                                                </table>
                                            </div>
                                        </div>
                                        <div class="col pr-0">

                                            <div class="small pb-3 px-2 border-bottom border-bottom-table-secondary">
                                                <a href="#deal-client-range" id="deal-bank-collapse-closed" data-toggle="collapse" class="card-link link-collapse collapsed text-default">
                                                    <h6 class="mt-3 mb-0">
                                                         Approval Range
                                                        <span class="ion ion-chevron-right text-default float-right arrow-collapse mt-1 rotated"></span>
                                                    </h6>
                                                </a>
                                            </div>

                                            <!--Note: List of underwritings or tables -->
                                            <div class="collapse show" id="deal-client-range">
                                                <table class="mb-0 border-primary border-bottom border-bottom-2 table d-table small text-default">
                                                    <thead>

                                                    <tr class="bg-body">

                                                        <th scope="col" class="border-0">
                                                            Funding company
                                                        </th>
                                                        <th scope="col" class="border-0">
                                                            Payment
                                                        </th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <tr>
                                                        <td>Maximum</td>
                                                        <td>$ 56,990</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Medium</td>
                                                        <td>$ 45,880</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Minimum</td>
                                                        <td>$ 39,770</td>
                                                    </tr>

                                                    </tbody>


                                                </table>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <!--End underwritigs tab-->

                                <!--Note: matchs tab-->

                                <div id="create_match" role="tabpanel" class="tab-pane fade">
                                    <div class="row align-items-center px-3 my-3">
                                        <div class="col-auto">
                                            <h6 class="mb-0 text-primary">Matchs lenders</h6>
                                        </div>
                                    </div>
                                    <hr class="mt-0">
                                    <div class="row align-items-center px-3 my-3">
                                        <div class="col">

                                        </div>
                                        <div class="col-3">
                                            <div class="input-group my-2 my-md-0">
                                                <input class="form-control search" type="text" placeholder="Search...">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text rounded-right search-icon" id="basic-addon1"><span class="ion ion-ios-search mr-0 " data-pack="android" data-tags=""></span></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!--Note: List of matchs-->

                                    <table class="border-bottom border-bottom-2 border-primary small table text-default">
                                        <thead>

                                        <tr id="match-table-header">
                                            <th scope="col" class="border-bottom-table-secondary top-table-border">
                                                Lender Name
                                            </th>
                                            <th scope="col" class="border-bottom-table-secondary top-table-border"></th>

                                            <th scope="col" class="border-bottom-table-secondary top-table-border">
                                                Interest rate
                                            </th>
                                            <th scope="col" class="border-bottom-table-secondary top-table-border">
                                                Terms
                                            </th>


                                            <th width="20%" scope="col" class="border-bottom-table-secondary top-table-border">
                                                Status
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="match-table-body">


                                        <tr>

                                            <td class="font-weight-normal" style="
    font-size: 1rem;
">First Global <br><span class="text-default small"> R1243568</span><br>
                                                <p class="font-weight-normal mb-0 small text-primary"> (458)
                                                    245-2145</p>

                                            </td>
                                            <td>
                                                <img src="../img/1stglobal.png" class="img-thumbnail lender-img rounded-circle">
                                            </td>

                                            <td>
                                                <div><span class="font-size-3 font-weight-heavy">1.25 </span>
                                                    <span class="font-edit-size position-relative top-2-negative font-weight-heavy">% RATE</span>
                                                </div>
                                                <div class="align-items-center d-flex"><span class="align-items-center badge badge-danger d-flex font-weight-light mt-1 p-0 pl-1 pr-2 py-1"> <i class="font-size-1 ion ion-checkmark-circled mr-0 p-0 pt-1"></i> Recommended</span></div>
                                            </td>
                                            <td>
                                                <div class=""><span class="font-size-3 font-weight-heavy">2 </span>
                                                    <span class="font-edit-size position-relative top-2-negative font-weight-heavy">YEARS</span>
                                                </div>
                                                <p class="font-weight-normal mb-0 mt-1 position-relative small top-05">
                                                    Updated: May 10 - 2018</p>

                                            </td>


                                            <td>
                                                <button class="align-items-center btn-primary d-flex font-weight-light pb-1 pr-3 pt-2 rounded-0 text-white">
                                                    <span class="bg-primary ion ion-ios-paperplane top-05 position-relative bg-primary mr-1"></span>Send Docs
                                                </button>
                                                <a href="javascript:;" class="d-block font-weight-normal mt-2 pt-1 small text-primary"><span class="font-size-1 ion ion-plus-circled mr-1 pl-0"></span><span class="position-relative text-default top-1-negative">Lender Details</span>
                                                </a>


                                            </td>
                                        </tr><tr>

                                            <td class="font-weight-normal" style="
    font-size: 1rem;
">Five Tower<br><span class="text-default small"> R1243568</span><br>
                                                <p class="font-weight-normal mb-0 small text-primary"> (458)
                                                    245-2145</p>

                                            </td>
                                            <td>
                                                <img src="../img/5-tower.jpg" class="img-thumbnail lender-img rounded-circle">
                                            </td>

                                            <td>
                                                <div><span class="font-size-3 font-weight-heavy">1.97 </span>
                                                    <span class="font-edit-size position-relative top-2-negative font-weight-heavy">% RATE</span>
                                                </div>

                                            </td>
                                            <td>
                                                <div class=""><span class="font-size-3 font-weight-heavy">8 </span>
                                                    <span class="font-edit-size position-relative top-2-negative font-weight-heavy">MONTHS</span>
                                                </div>
                                                <p class="font-weight-normal mb-0 mt-1 position-relative small top-05">
                                                    Updated: May 10 - 2018</p>

                                            </td>


                                            <td>
                                                <button class="align-items-center btn-primary d-flex font-weight-light pb-1 pr-3 pt-2 rounded-0 text-white">
                                                    <span class="bg-primary ion ion-ios-paperplane top-05 position-relative bg-primary mr-1"></span>Send Docs
                                                </button>
                                                <a href="javascript:;" class="d-block font-weight-normal mt-2 pt-1 small text-primary"><span class="font-size-1 ion ion-plus-circled mr-1 pl-0"></span><span class="position-relative text-default top-1-negative">Lender Details</span>
                                                </a>


                                            </td>
                                        </tr>
                                        <tr>

                                            <td class="font-weight-normal" style="
    font-size: 1rem;
">Globality<br><span class="text-default small"> R1243568</span><br>
                                                <p class="font-weight-normal mb-0 small text-primary"> (458)
                                                    245-2145</p>

                                            </td>
                                            <td>
                                                <img src="../img/1stglobal.png" class="img-thumbnail lender-img rounded-circle">
                                            </td>

                                            <td>
                                                <div><span class="font-size-3 font-weight-heavy">1.07 </span>
                                                    <span class="font-edit-size position-relative top-2-negative font-weight-heavy">% RATE</span>
                                                </div>
                                                <div class="align-items-center d-flex"><span class="align-items-center badge badge-danger d-flex font-weight-light mt-1 p-0 pl-1 pr-2 py-1"> <i class="font-size-1 ion ion-checkmark-circled mr-0 p-0 pt-1"></i> Recommended</span></div>
                                            </td>
                                            <td>
                                                <div class=""><span class="font-size-3 font-weight-heavy">5 </span>
                                                    <span class="font-edit-size position-relative top-2-negative font-weight-heavy">YEARS</span>
                                                </div>
                                                <p class="font-weight-normal mb-0 mt-1 position-relative small top-05">
                                                    Updated: May 10 - 2018</p>

                                            </td>


                                            <td>
                                                <button class="align-items-center btn-primary d-flex font-weight-light pb-1 pr-3 pt-2 rounded-0 text-white">
                                                    <span class="bg-primary ion ion-ios-paperplane top-05 position-relative bg-primary mr-1"></span>Send Docs
                                                </button>
                                                <a href="javascript:;" class="d-block font-weight-normal mt-2 pt-1 small text-primary"><span class="font-size-1 ion ion-plus-circled mr-1 pl-0"></span><span class="position-relative text-default top-1-negative">Lender Details</span>
                                                </a>


                                            </td>
                                        </tr>





                                        </tbody>


                                    </table>
                                </div>

                                <!--End matchs tab-->

                                <!--Note: approvals tab-->

                                <div id="create_approval" role="tabpanel" class="tab-pane fade">
                                    <div class="row align-items-center px-3 my-3">
                                        <div class="col-auto">
                                            <h6 class="mb-0 text-primary">Approvals list</h6>
                                        </div>
                                        <div class="col">

                                            <button class="btn-success small text-white float-right d-flex align-items-center rounded-0 py-2 px-3" data-toggle="modal" data-target=".modal-add-approval">
                                                <span class="ion ion-plus"></span>Add new
                                            </button>

                                        </div>

                                        <!--Modal Approvals -->

                                        <div class="modal opacity-modal fade note-editor modal-add-approval" tabindex="-1">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content rounded-0">
                                                    <div class="px-5 modal-header rounded-0 bg-secondary text-white">
                                                        <h5 class="modal-title font-weight-normal">Add new approval</h5>
                                                        <button type="button" class="close" data-dismiss="modal">
                                                            <span aria-hidden="true" class="text-white font-weight-light">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body px-5 mt-2">
                                                        <p class="small text-default">Please fill the fields: </p>

                                                        <form class="create-form modal-create">
                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Choose a Lender</label>
                                                                    <input class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3 d-flex align-items-center">
                                                                <div class="col">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Payment</label>
                                                                    <input class="form-control">

                                                                </div>
                                                                <div class="col">
                                                                    <div class="row px-3 mt-4">
                                                                        <label class="small text-default">Daily </label>
                                                                        <input class="col ml-1 val-edit" name="periodicity" type="radio">
                                                                        <label class="small text-default">Weekly </label>
                                                                        <input type="radio" name="periodicity" class="col ml-1 val-edit">
                                                                        <label class="small text-default">Monthly </label>
                                                                        <input type="radio" name="periodicity" class="col ml-1 val-edit">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Payback</label>
                                                                    <input class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Terms (Months)</label>
                                                                    <input class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <div class="col">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Interest Rate (%)</label>
                                                                    <input class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Comission (%)</label>
                                                                    <input class="form-control">
                                                                </div>
                                                                <div class="col">
                                                                    <span class="ion ion-ios-briefcase-outline text-primary"></span>
                                                                    <label class="font-weight-normal mb-0 small text-primary">Choose Status</label>
                                                                    <input class="form-control">

                                                                </div>

                                                            </div>

                                                        </form>

                                                    </div>
                                                    <div class="px-5 col-12 clearfix pt-3 border-top modal-footer justify-content-start">
                                                        <button class="small rounded-0 px-3 py-2 btn btn-primary btn-sm mr-3 disabled save-note button-validate">
                                                            Finish
                                                        </button>
                                                        <button class="small rounded-0 px-3 py-2 btn btn-outline-primary btn-sm discard" data-dismiss="modal">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--End Modal-->

                                    </div>
                                    <hr class="mt-0">
                                    <div class="row align-items-center px-3 my-3">
                                        <div class="col">

                                        </div>
                                        <div class="col-3">
                                            <div class="input-group my-2 my-md-0">
                                                <input class="form-control search" type="text" placeholder="Search...">
                                                <div class="input-group-prepend ">
                                                    <span class="input-group-text rounded-right search-icon" id="basic-addon1"><span class="ion ion-ios-search mr-0 " data-pack="android" data-tags=""></span></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!--Note: List of approvals-->

                                    <table class="border-bottom border-bottom-2 border-primary small table text-default">
                                        <thead>

                                        <tr id="match-table-header">
                                            <th scope="col" class="border-bottom-table-secondary top-table-border">
                                                Lender Name
                                            </th>
                                            <th scope="col" class="border-bottom-table-secondary top-table-border"></th>

                                            <th scope="col" class="border-bottom-table-secondary top-table-border">
                                                Payment
                                            </th>
                                            <th scope="col" class="border-bottom-table-secondary top-table-border">
                                                Terms
                                            </th>
                                            <th scope="col" class="border-bottom-table-secondary top-table-border">
                                                Loan Approval
                                            </th>
                                            <th width="8%" scope="col" class="border-bottom-table-secondary top-table-border">
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody id="match-table-body">


                                        <tr>

                                            <td class="font-weight-normal" style="
    font-size: 1rem;
">First Global <br><span class="text-default small"> R1243568</span><br>
                                                <p class="font-weight-normal mb-0 small text-primary"> (458)
                                                    245-2145</p>

                                            </td>
                                            <td>
                                                <img src="../img/1stglobal.png" class="img-thumbnail lender-img rounded-circle">
                                            </td>

                                            <td>
                                                <div><span class="font-size-3 font-weight-heavy">$ 48 </span>
                                                    <span class="font-edit-size position-relative top-2-negative font-weight-heavy">WEEKLY</span>
                                                </div>
                                                <p class="font-weight-normal mb-0 mt-1 position-relative small top-05">
                                                    Payback: $ 0</p>
                                            </td>
                                            <td>
                                                <div class=""><span class="font-size-3 font-weight-heavy">2 </span>
                                                    <span class="font-edit-size position-relative top-2-negative font-weight-heavy">YEARS</span>
                                                </div>
                                                <p class="font-weight-normal mb-0 mt-1 position-relative small top-05">Interest Rate: 3.5%</p>

                                            </td>


                                            <td>
                                                <div><span class="font-size-3 font-weight-heavy">$ 120,000 </span>

                                                </div>
                                                <div class="align-items-center d-flex"><span class="align-items-center badge badge-success d-flex font-weight-light mt-1 p-0 pl-3 pr-4 py-1"> <i class="font-size-1 ion ion-checkmark-circled mr-0 p-0 pt-1"></i> Accepted</span></div>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-toggle="modal" data-target=".modal-add-underwriting" class="mr-2">
                                                    <span class="ion ion-ios-compose-outline text-default view bg-transparent mr-0"></span>
                                                </a> <a href="javascript:;" class="mr-3 delete-checked-row">
                                                    <span class="delete ion ion-ios-trash-outline text-default bg-transparent mr-0"></span>
                                                </a>
                                            </td>
                                        </tr><tr>

                                            <td class="font-weight-normal" style="
    font-size: 1rem;
">Five Tower<br><span class="text-default small"> R1243568</span><br>
                                                <p class="font-weight-normal mb-0 small text-primary"> (458)
                                                    245-2145</p>

                                            </td>
                                            <td>
                                                <img src="../img/5-tower.jpg" class="img-thumbnail lender-img rounded-circle">
                                            </td>

                                            <td>
                                                <div><span class="font-size-3 font-weight-heavy">$ 197 </span>
                                                    <span class="font-edit-size position-relative top-2-negative font-weight-heavy">MONTHLY</span>
                                                </div>
                                                <p class="font-weight-normal mb-0 mt-1 position-relative small top-05">
                                                    Payback: $ 0</p>

                                            </td>
                                            <td>
                                                <div class=""><span class="font-size-3 font-weight-heavy">8 </span>
                                                    <span class="font-edit-size position-relative top-2-negative font-weight-heavy">MONTHS</span>
                                                </div>
                                                <p class="font-weight-normal mb-0 mt-1 position-relative small top-05">Interest Rate: 1.75%</p>

                                            </td>


                                            <td>
                                                <div><span class="font-size-3 font-weight-heavy">$ 120,000 </span>

                                                </div>
                                                <div class="align-items-center d-flex"><span class="align-items-center badge badge-danger d-flex font-weight-light mt-1 p-0 pl-3 pr-4 py-1"> <i class="font-size-1 ion ion-close-circled mr-0 p-0 pt-1"></i> Rejected</span></div>
                                            </td>
                                            <td>
                                                <a href="javascript:;" data-toggle="modal" data-target=".modal-add-underwriting" class="mr-2">
                                                    <span class="ion ion-ios-compose-outline text-default view bg-transparent mr-0"></span>
                                                </a> <a href="javascript:;" class="mr-3 delete-checked-row">
                                                    <span class="delete ion ion-ios-trash-outline text-default bg-transparent mr-0"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!--End approvals tab-->

                            </div>
                        </div>
                    </div>

                    <!-- Note: These are the tabs for create (tasks, meetings, calls etc )-->

                    <div class="col-12 bg-white border mb-4 border-bottom-3">
                        <div class="border-bottom mb-4">
                            <div id="nav-1" role="tabpanel" class="tab-pane fade active show border-bottom create-tabs">
                                <ul role="tablist " class="nav nav-tabs border-0  d-flex mx-auto row ">
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#create_note" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2 active show">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-photos-outline"></span>New
                                            Note </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#create_task" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-list-outline"></span>Create
                                            Task </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#create_email" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-email-outline"></span>New
                                            Email </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#create_call" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-telephone-outline"></span>Register
                                            Calls </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#create_meeting" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-people-outline"></span>Schedule
                                            Meetings </a>
                                    </li>
                                </ul>
                            </div>


                            <div class="tab-content" id="nav-tabContent ">

                                <!-- Note: This is the tab For Create Notes-->

                                <div class="tab-pane fade show active" id="create_note" role="tabpanel">
                                    <textarea id="textarea-note-create" class="form-control border-0 pt-4 text-default content-textarea" placeholder="Start writing to leave a note..."></textarea>
                                    <div class="px-2 mx-1 my-2 note-options">
                                        <span class="ion text-default mr-3">T</span>
                                        <span class="ion ion-link text-default mr-3"></span>
                                        <span class="ion ion-paperclip text-default mr-2"></span>
                                    </div>
                                    <div class="col-12 clearfix mb-3 pt-3 border-top" id="buttons-note-create">
                                        <button class="btn btn-primary btn-sm mr-2">Save Note</button>
                                        <button class="btn btn-outline-primary btn-sm">Discard</button>
                                    </div>
                                </div>

                                <!-- End For Create notes-->

                                <!-- Note: This is the tab For Create Task-->

                                <div id="create_task" role="tabpanel" class="tab-pane fade">
                                    <div class="row px-3">
                                        <input type="text" id="input-task-create" placeholder="Enter your task" class="form-control text-default border-0 pt-3 col-sm-9 content-input tasks-fusion">
                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="text-left text-default small my-2">Due Date</p>
                                                </div>
                                                <div class="col-6 small text-primary">
                                                    <button class="btn bg-white dropdown-toggle text-primary btn-sm p-0" data-toggle="dropdown">
                                                        <span class="ion ion-ios-calendar-outline"></span>Tomorrow
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <!--Note: Here I put $day which means that the day is the variable (Monday, tuesday etc...)i guess, i Think it would be nice but i dont know if that is easy to do -->

                                                        <a class="dropdown-item small text-default" href="#">Today</a>
                                                        <a class="dropdown-item small text-default" href="#">Tomorrow</a>
                                                        <a class="dropdown-item small text-default" href="#">In 2 days
                                                            ($day)</a>
                                                        <a class="dropdown-item small text-default" href="#">In 3 days
                                                            ($day)</a>
                                                        <a class="dropdown-item small text-default" href="#">In 4 days
                                                            ($day)</a>
                                                        <a class="dropdown-item small text-default" href="#">In 5 days
                                                            ($day)</a>
                                                        <a class="dropdown-item small text-default" href="#">In a
                                                            week </a>
                                                        <a class="dropdown-item small text-default" href="#">In 2
                                                            weeks </a>
                                                        <a class="dropdown-item small text-default" href="#">In a
                                                            Month </a>
                                                        <a class="dropdown-item small text-default" href="#">Custom
                                                            date</a>
                                                    </div>
                                                </div>
                                                <div class="col-6 small text-primary">
                                                    <button class="btn bg-white dropdown-toggle text-primary btn-sm p-0" data-toggle="dropdown">
                                                        <span class="ion ion-ios-time-outline"></span>Add an hour
                                                    </button>

                                                    <!--Note: I still don't know if its better a clock input type, i made this based on hubspot, (They use a search box of course)-->

                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item small text-default" href="#">0:00</a>
                                                        <a class="dropdown-item small text-default" href="#">0:15</a>
                                                        <a class="dropdown-item small text-default" href="#">0:30</a>
                                                        <a class="dropdown-item small text-default" href="#">0:45</a>
                                                        <a class="dropdown-item small text-default" href="#">1:00</a>
                                                        <a class="dropdown-item small text-default" href="#">1:15</a>
                                                        <a class="dropdown-item small text-default" href="#">1:30</a>
                                                        <a class="dropdown-item small text-default" href="#">1:45</a>
                                                        <a class="dropdown-item small text-default" href="#">2:00</a>
                                                        <a class="dropdown-item small text-default" href="#">2:15</a>
                                                        <a class="dropdown-item small text-default" href="#">2:30</a>
                                                        <a class="dropdown-item small text-default" href="#">2:45</a>
                                                        <a class="dropdown-item small text-default" href="#">3:00</a>
                                                        <a class="dropdown-item small text-default" href="#">3:15</a>
                                                        <a class="dropdown-item small text-default" href="#">3:30</a>
                                                        <a class="dropdown-item small text-default" href="#">3:45</a>
                                                        <a class="dropdown-item small text-default" href="#">4:00</a>
                                                        <a class="dropdown-item small text-default" href="#">4:15</a>
                                                        <a class="dropdown-item small text-default" href="#">4:30</a>
                                                        <a class="dropdown-item small text-default" href="#">4:45</a>
                                                        <a class="dropdown-item small text-default" href="#">5:00</a>
                                                        <a class="dropdown-item small text-default" href="#">5:15</a>
                                                        <a class="dropdown-item small text-default" href="#">5:30</a>
                                                        <a class="dropdown-item small text-default" href="#">5:45</a>
                                                        <a class="dropdown-item small text-default" href="#">6:00</a>
                                                        <a class="dropdown-item small text-default" href="#">6:15</a>
                                                        <a class="dropdown-item small text-default" href="#">6:30</a>
                                                        <a class="dropdown-item small text-default" href="#">6:45</a>
                                                        <a class="dropdown-item small text-default" href="#">7:00</a>
                                                        <a class="dropdown-item small text-default" href="#">7:15</a>
                                                        <a class="dropdown-item small text-default" href="#">7:30</a>
                                                        <a class="dropdown-item small text-default" href="#">7:45</a>
                                                        <a class="dropdown-item small text-default" href="#">8:00</a>
                                                        <a class="dropdown-item small text-default" href="#">8:15</a>
                                                        <a class="dropdown-item small text-default" href="#">8:30</a>
                                                        <a class="dropdown-item small text-default" href="#">8:45</a>
                                                        <a class="dropdown-item small text-default" href="#">9:00</a>
                                                        <a class="dropdown-item small text-default" href="#">9:15</a>
                                                        <a class="dropdown-item small text-default" href="#">9:30</a>
                                                        <a class="dropdown-item small text-default" href="#">9:45</a>
                                                        <a class="dropdown-item small text-default" href="#">10:00</a>
                                                        <a class="dropdown-item small text-default" href="#">10:15</a>
                                                        <a class="dropdown-item small text-default" href="#">10:30</a>
                                                        <a class="dropdown-item small text-default" href="#">10:45</a>
                                                        <a class="dropdown-item small text-default" href="#">11:00</a>
                                                        <a class="dropdown-item small text-default" href="#">11:15</a>
                                                        <a class="dropdown-item small text-default" href="#">11:30</a>
                                                        <a class="dropdown-item small text-default" href="#">11:45</a>
                                                        <a class="dropdown-item small text-default" href="#">12:00</a>
                                                        <a class="dropdown-item small text-default" href="#">12:15</a>
                                                        <a class="dropdown-item small text-default" href="#">12:30</a>
                                                        <a class="dropdown-item small text-default" href="#">12:45</a>
                                                        <a class="dropdown-item small text-default" href="#">13:00</a>
                                                        <a class="dropdown-item small text-default" href="#">13:15</a>
                                                        <a class="dropdown-item small text-default" href="#">13:30</a>
                                                        <a class="dropdown-item small text-default" href="#">13:45</a>
                                                        <a class="dropdown-item small text-default" href="#">14:00</a>
                                                        <a class="dropdown-item small text-default" href="#">14:15</a>
                                                        <a class="dropdown-item small text-default" href="#">14:30</a>
                                                        <a class="dropdown-item small text-default" href="#">14:45</a>
                                                        <a class="dropdown-item small text-default" href="#">15:00</a>
                                                        <a class="dropdown-item small text-default" href="#">15:15</a>
                                                        <a class="dropdown-item small text-default" href="#">15:30</a>
                                                        <a class="dropdown-item small text-default" href="#">15:45</a>
                                                        <a class="dropdown-item small text-default" href="#">16:00</a>
                                                        <a class="dropdown-item small text-default" href="#">16:15</a>
                                                        <a class="dropdown-item small text-default" href="#">16:30</a>
                                                        <a class="dropdown-item small text-default" href="#">16:45</a>
                                                        <a class="dropdown-item small text-default" href="#">17:00</a>
                                                        <a class="dropdown-item small text-default" href="#">17:15</a>
                                                        <a class="dropdown-item small text-default" href="#">17:30</a>
                                                        <a class="dropdown-item small text-default" href="#">17:45</a>
                                                        <a class="dropdown-item small text-default" href="#">18:00</a>
                                                        <a class="dropdown-item small text-default" href="#">18:15</a>
                                                        <a class="dropdown-item small text-default" href="#">18:30</a>
                                                        <a class="dropdown-item small text-default" href="#">18:45</a>
                                                        <a class="dropdown-item small text-default" href="#">19:00</a>
                                                        <a class="dropdown-item small text-default" href="#">19:15</a>
                                                        <a class="dropdown-item small text-default" href="#">19:30</a>
                                                        <a class="dropdown-item small text-default" href="#">19:45</a>
                                                        <a class="dropdown-item small text-default" href="#">20:00</a>
                                                        <a class="dropdown-item small text-default" href="#">20:15</a>
                                                        <a class="dropdown-item small text-default" href="#">20:30</a>
                                                        <a class="dropdown-item small text-default" href="#">20:45</a>
                                                        <a class="dropdown-item small text-default" href="#">21:00</a>
                                                        <a class="dropdown-item small text-default" href="#">21:15</a>
                                                        <a class="dropdown-item small text-default" href="#">21:30</a>
                                                        <a class="dropdown-item small text-default" href="#">21:45</a>
                                                        <a class="dropdown-item small text-default" href="#">22:00</a>
                                                        <a class="dropdown-item small text-default" href="#">22:15</a>
                                                        <a class="dropdown-item small text-default" href="#">22:30</a>
                                                        <a class="dropdown-item small text-default" href="#">22:45</a>
                                                        <a class="dropdown-item small text-default" href="#">23:00</a>
                                                        <a class="dropdown-item small text-default" href="#">23:15</a>
                                                        <a class="dropdown-item small text-default" href="#">23:30</a>
                                                        <a class="dropdown-item small text-default" href="#">23:45</a>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <textarea id="textarea-task-create" placeholder="Notes..." class="form-control border-0 pt-1 text-default content-textarea tasks-fusion"></textarea>

                                    <!--Textarea mini menu, hopefully this will work but in a near future not really required by now-->

                                    <div class="px-2 mx-1 my-2 note-options">
                                        <span class="ion text-default mr-3 font-weight-bold">B</span>
                                        <span class="ion text-default mr-3 font-italic">I</span>
                                        <span class="ion text-default mr-3"><u>U</u></span>
                                        <span class="ion flaticon-rubber text-default mr-2"></span>
                                    </div>
                                    <hr class="mb-2">
                                    <div class="row">
                                        <div class="col-md-3">

                                            <!--Note: Type of task-->

                                            <p class="text-left text-default small my-2">Type</p>
                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                To do
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item small text-default" href="#">Doing</a>
                                                <a class="dropdown-item small text-default" href="#">Done</a>
                                                <a class="dropdown-item small text-default" href="#">To do</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <!--Note: assigned to... but i guess it could be only assigned to the lead im viewing still not sure-->

                                            <p class="text-left text-default small my-2">Assigned to</p>
                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                Chloe Moretz
                                            </button>
                                        </div>
                                        <div class="col-md-3">

                                            <!--Note: It is possible to make this a reminder -->

                                            <p class="text-left text-default small my-2">Reminder by mail</p>
                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                No reminder
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item small text-default" href="#">The day of</a>
                                                <a class="dropdown-item small text-default" href="#">The day before</a>
                                                <a class="dropdown-item small text-default" href="#">The week before</a>

                                                <!--Note: this needs to become a calendar shoul we use a plugin?-->

                                                <a class="dropdown-item small text-default" href="#">Custom Date</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="col-12 clearfix mb-3 pt-3 border-top" id="buttons-task-create">
                                        <button class="btn btn-primary btn-sm mr-2 disabled">Save Task</button>
                                        <button class="btn btn-outline-primary btn-sm">Cancel</button>
                                    </div>
                                </div>

                                <!-- End for create task-->

                                <!-- Note: This is the tab For Create email-->

                                <div id="create_email" role="tabpanel" class="tab-pane fade">
                                    <div class="row px-3 input-group-sm">
                                        <div class="mr-3"><p class="small text-default pt-2 mt-2"><strong>To:</strong>
                                            </p></div>
                                        <input type="text" class="form-control text-default border-0 py-0 col-sm-10 content-input pl-0 mr-5" value="Chloe Moretz (b.flash@mail.com)">
                                        <div class="col-sm-1">
                                            <div class="row pt-2 mt-2">
                                                <div class="col-6 small text-primary show">

                                                    <!--Note: these two, wll probably need a search box pop up or something alike -->

                                                    <button class="btn bg-white text-primary btn-sm p-0">
                                                        CC
                                                    </button>
                                                </div>
                                                <div class="col-6 small text-primary">
                                                    <button class="btn bg-white text-primary btn-sm p-0">CCO
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-0">
                                    <div class="row px-3 input-group-sm">
                                        <div class="mr-3"><p class="small text-default pt-2 mt-2"><strong>From:</strong>
                                            </p></div>
                                        <input type="text" class="form-control text-default border-0 col-sm-11 content-input p-0" value="Violeta Parra (vparra@gokapital.com)">
                                    </div>
                                    <hr class="my-0">
                                    <div class="row px-3 input-group-sm">
                                        <div class="mr-3"><p class="small text-default pt-2 mt-2">
                                                <strong>Subject:</strong></p></div>
                                        <input id="input-email-create" type="text" class="form-control text-default border-0 col-sm-11 content-input p-0 emails-fusion" placeholder="Add subject">
                                    </div>
                                    <hr class="mt-0 mb-2">
                                    <textarea placeholder="Write something..." id="textarea-email-create" class="form-control border-0 pt-1 text-default content-textarea emails-fusion "></textarea>
                                    <div class="px-2 mx-1 my-2 note-options">

                                        <!--TEXTAREA MINI MENU NOT REQUIRED BY NOW-->

                                        <span class="ion text-default mr-3">T</span><span class="ion ion-image text-default mr-3"></span>
                                        <span class="ion ion-link text-default mr-3"></span>
                                        <span class="ion ion-paperclip text-default mr-2"></span>
                                    </div>
                                    <div id="buttons-email-create" class="col-12 clearfix mb-3 pt-3 create-buttons border-top">
                                        <button class="btn btn-primary btn-sm mr-2 disabled">Send</button>
                                        <button class="btn btn-outline-primary btn-sm">Cancel</button>
                                    </div>
                                </div>

                                <!--End for create email-->

                                <!-- Note: This is the tab For Create call-->

                                <div id="create_call" role="tabpanel" class="tab-pane fade">
                                    <div class="row px-3">
                                        <input id="input1-call-create" type="text" placeholder="Contact Name" class="form-control text-default border-0 pt-3 col-sm-4 content-input calls-fusion">
                                        <input id="input2-call-create" type="number" placeholder="Phone number" class="form-control text-default border-0 pt-3 col-sm-4 content-input calls-fusion">
                                        <div class="col-sm-4">
                                            <div class="row mt-2 pt-2">
                                                <div class="col-4 small text-primary">
                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                        Unanswered
                                                    </button>

                                                    <!--Note: this phonecall statuses need to be put into the database??-->

                                                    <div class="dropdown-menu">
                                                        <a href="#" class="dropdown-item small text-default">Unanswered</a>
                                                        <a href="#" class="dropdown-item small text-default">Busy</a>
                                                        <a href="#" class="dropdown-item small text-default">Wrong
                                                            number</a>
                                                        <a href="#" class="dropdown-item small text-default">Leave live
                                                            message </a>
                                                        <a href="#" class="dropdown-item small text-default">Leave voice
                                                            mail</a>
                                                        <a href="#" class="dropdown-item small text-default">Online</a>
                                                    </div>
                                                </div>
                                                <div class="col-4 small text-primary">
                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">

                                                        <!--Note: it has to be a calendar-->

                                                        <span class="ion ion-ios-calendar-outline"></span>23 - 03 -2018
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="#" class="dropdown-item small text-default">This is
                                                            suppose to be a calendar</a>
                                                    </div>
                                                </div>
                                                <div class="col-4 small text-primary">
                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                        <span class="ion ion-ios-time-outline"></span>Add an hour
                                                    </button>

                                                    <!--Note: it is the best format or better a watch or an input ? I make this as a base from hubspot-->

                                                    <div class="dropdown-menu">
                                                        <a href="#" class="dropdown-item small text-default">0:00</a>
                                                        <a href="#" class="dropdown-item small text-default">0:15</a>
                                                        <a href="#" class="dropdown-item small text-default">0:30</a>
                                                        <a href="#" class="dropdown-item small text-default">0:45</a>
                                                        <a href="#" class="dropdown-item small text-default">1:00</a>
                                                        <a href="#" class="dropdown-item small text-default">1:15</a>
                                                        <a href="#" class="dropdown-item small text-default">1:30</a>
                                                        <a href="#" class="dropdown-item small text-default">1:45</a>
                                                        <a href="#" class="dropdown-item small text-default">2:00</a>
                                                        <a href="#" class="dropdown-item small text-default">2:15</a>
                                                        <a href="#" class="dropdown-item small text-default">2:30</a>
                                                        <a href="#" class="dropdown-item small text-default">2:45</a>
                                                        <a href="#" class="dropdown-item small text-default">3:00</a>
                                                        <a href="#" class="dropdown-item small text-default">3:15</a>
                                                        <a href="#" class="dropdown-item small text-default">3:30</a>
                                                        <a href="#" class="dropdown-item small text-default">3:45</a>
                                                        <a href="#" class="dropdown-item small text-default">4:00</a>
                                                        <a href="#" class="dropdown-item small text-default">4:15</a>
                                                        <a href="#" class="dropdown-item small text-default">4:30</a>
                                                        <a href="#" class="dropdown-item small text-default">4:45</a>
                                                        <a href="#" class="dropdown-item small text-default">5:00</a>
                                                        <a href="#" class="dropdown-item small text-default">5:15</a>
                                                        <a href="#" class="dropdown-item small text-default">5:30</a>
                                                        <a href="#" class="dropdown-item small text-default">5:45</a>
                                                        <a href="#" class="dropdown-item small text-default">6:00</a>
                                                        <a href="#" class="dropdown-item small text-default">6:15</a>
                                                        <a href="#" class="dropdown-item small text-default">6:30</a>
                                                        <a href="#" class="dropdown-item small text-default">6:45</a>
                                                        <a href="#" class="dropdown-item small text-default">7:00</a>
                                                        <a href="#" class="dropdown-item small text-default">7:15</a>
                                                        <a href="#" class="dropdown-item small text-default">7:30</a>
                                                        <a href="#" class="dropdown-item small text-default">7:45</a>
                                                        <a href="#" class="dropdown-item small text-default">8:00</a>
                                                        <a href="#" class="dropdown-item small text-default">8:15</a>
                                                        <a href="#" class="dropdown-item small text-default">8:30</a>
                                                        <a href="#" class="dropdown-item small text-default">8:45</a>
                                                        <a href="#" class="dropdown-item small text-default">9:00</a>
                                                        <a href="#" class="dropdown-item small text-default">9:15</a>
                                                        <a href="#" class="dropdown-item small text-default">9:30</a>
                                                        <a href="#" class="dropdown-item small text-default">9:45</a>
                                                        <a href="#" class="dropdown-item small text-default">10:00</a>
                                                        <a href="#" class="dropdown-item small text-default">10:15</a>
                                                        <a href="#" class="dropdown-item small text-default">10:30</a>
                                                        <a href="#" class="dropdown-item small text-default">10:45</a>
                                                        <a href="#" class="dropdown-item small text-default">11:00</a>
                                                        <a href="#" class="dropdown-item small text-default">11:15</a>
                                                        <a href="#" class="dropdown-item small text-default">11:30</a>
                                                        <a href="#" class="dropdown-item small text-default">11:45</a>
                                                        <a href="#" class="dropdown-item small text-default">12:00</a>
                                                        <a href="#" class="dropdown-item small text-default">12:15</a>
                                                        <a href="#" class="dropdown-item small text-default">12:30</a>
                                                        <a href="#" class="dropdown-item small text-default">12:45</a>
                                                        <a href="#" class="dropdown-item small text-default">13:00</a>
                                                        <a href="#" class="dropdown-item small text-default">13:15</a>
                                                        <a href="#" class="dropdown-item small text-default">13:30</a>
                                                        <a href="#" class="dropdown-item small text-default">13:45</a>
                                                        <a href="#" class="dropdown-item small text-default">14:00</a>
                                                        <a href="#" class="dropdown-item small text-default">14:15</a>
                                                        <a href="#" class="dropdown-item small text-default">14:30</a>
                                                        <a href="#" class="dropdown-item small text-default">14:45</a>
                                                        <a href="#" class="dropdown-item small text-default">15:00</a>
                                                        <a href="#" class="dropdown-item small text-default">15:15</a>
                                                        <a href="#" class="dropdown-item small text-default">15:30</a>
                                                        <a href="#" class="dropdown-item small text-default">15:45</a>
                                                        <a href="#" class="dropdown-item small text-default">16:00</a>
                                                        <a href="#" class="dropdown-item small text-default">16:15</a>
                                                        <a href="#" class="dropdown-item small text-default">16:30</a>
                                                        <a href="#" class="dropdown-item small text-default">16:45</a>
                                                        <a href="#" class="dropdown-item small text-default">17:00</a>
                                                        <a href="#" class="dropdown-item small text-default">17:15</a>
                                                        <a href="#" class="dropdown-item small text-default">17:30</a>
                                                        <a href="#" class="dropdown-item small text-default">17:45</a>
                                                        <a href="#" class="dropdown-item small text-default">18:00</a>
                                                        <a href="#" class="dropdown-item small text-default">18:15</a>
                                                        <a href="#" class="dropdown-item small text-default">18:30</a>
                                                        <a href="#" class="dropdown-item small text-default">18:45</a>
                                                        <a href="#" class="dropdown-item small text-default">19:00</a>
                                                        <a href="#" class="dropdown-item small text-default">19:15</a>
                                                        <a href="#" class="dropdown-item small text-default">19:30</a>
                                                        <a href="#" class="dropdown-item small text-default">19:45</a>
                                                        <a href="#" class="dropdown-item small text-default">20:00</a>
                                                        <a href="#" class="dropdown-item small text-default">20:15</a>
                                                        <a href="#" class="dropdown-item small text-default">20:30</a>
                                                        <a href="#" class="dropdown-item small text-default">20:45</a>
                                                        <a href="#" class="dropdown-item small text-default">21:00</a>
                                                        <a href="#" class="dropdown-item small text-default">21:15</a>
                                                        <a href="#" class="dropdown-item small text-default">21:30</a>
                                                        <a href="#" class="dropdown-item small text-default">21:45</a>
                                                        <a href="#" class="dropdown-item small text-default">22:00</a>
                                                        <a href="#" class="dropdown-item small text-default">22:15</a>
                                                        <a href="#" class="dropdown-item small text-default">22:30</a>
                                                        <a href="#" class="dropdown-item small text-default">22:45</a>
                                                        <a href="#" class="dropdown-item small text-default">23:00</a>
                                                        <a href="#" class="dropdown-item small text-default">23:15</a>
                                                        <a href="#" class="dropdown-item small text-default">23:30</a>
                                                        <a href="#" class="dropdown-item small text-default">23:45</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <textarea id="textarea-call-create" placeholder="Describe the phonecall..." class="form-control border-0 pt-1 text-default content-textarea calls-fusion"></textarea>
                                    <div class="px-2 mx-1 my-2 note-options">

                                        <!--Textarea mini menu not required by now-->

                                        <span class="ion text-default mr-3">T</span>
                                        <span class="ion ion-link text-default mr-3"></span>
                                        <span class="ion ion-paperclip text-default mr-2"></span></div>
                                    <div id="buttons-call-create" class="col-12 clearfix mb-3 pt-3 create-buttons border-top">
                                        <button class="btn btn-primary btn-sm mr-2 disabled">Register Call</button>
                                        <button class="btn btn-outline-primary btn-sm">Discard</button>
                                    </div>
                                </div>

                                <!-- End For Create content-->

                                <!-- Note: This is the tab For Create meeting-->

                                <div id="create_meeting" role="tabpanel" class="tab-pane fade">
                                    <div class="row px-3">
                                        <input id="input-meeting-create" type="text" placeholder="What is the meeting about?" class="form-control text-default border-0 pt-3 col-sm-9 content-input meetings-fusion">
                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="text-left text-default small my-2">Start Date</p></div>
                                                <div class="col-6 small text-primary">
                                                    <button class="btn bg-white dropdown-toggle text-primary btn-sm p-0" data-toggle="dropdown">

                                                        <!--needs to be a calendar -->

                                                        <span class="ion ion-ios-calendar-outline"></span>23 / 03 / 2018
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item small text-default" href="#">This is
                                                            suppose to be a calendar</a>

                                                    </div>
                                                </div>
                                                <div class="col-6 small text-primary">
                                                    <button class="btn bg-white dropdown-toggle text-primary btn-sm p-0" data-toggle="dropdown">
                                                        <span class="ion ion-ios-time-outline"></span>Add an hour
                                                    </button>

                                                    <!--Note: I use hubspot as a base but i dont know if its the best format -->

                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item small text-default" href="#">0:00</a>
                                                        <a class="dropdown-item small text-default" href="#">0:15</a>
                                                        <a class="dropdown-item small text-default" href="#">0:30</a>
                                                        <a class="dropdown-item small text-default" href="#">0:45</a>
                                                        <a class="dropdown-item small text-default" href="#">1:00</a>
                                                        <a class="dropdown-item small text-default" href="#">1:15</a>
                                                        <a class="dropdown-item small text-default" href="#">1:30</a>
                                                        <a class="dropdown-item small text-default" href="#">1:45</a>
                                                        <a class="dropdown-item small text-default" href="#">2:00</a>
                                                        <a class="dropdown-item small text-default" href="#">2:15</a>
                                                        <a class="dropdown-item small text-default" href="#">2:30</a>
                                                        <a class="dropdown-item small text-default" href="#">2:45</a>
                                                        <a class="dropdown-item small text-default" href="#">3:00</a>
                                                        <a class="dropdown-item small text-default" href="#">3:15</a>
                                                        <a class="dropdown-item small text-default" href="#">3:30</a>
                                                        <a class="dropdown-item small text-default" href="#">3:45</a>
                                                        <a class="dropdown-item small text-default" href="#">4:00</a>
                                                        <a class="dropdown-item small text-default" href="#">4:15</a>
                                                        <a class="dropdown-item small text-default" href="#">4:30</a>
                                                        <a class="dropdown-item small text-default" href="#">4:45</a>
                                                        <a class="dropdown-item small text-default" href="#">5:00</a>
                                                        <a class="dropdown-item small text-default" href="#">5:15</a>
                                                        <a class="dropdown-item small text-default" href="#">5:30</a>
                                                        <a class="dropdown-item small text-default" href="#">5:45</a>
                                                        <a class="dropdown-item small text-default" href="#">6:00</a>
                                                        <a class="dropdown-item small text-default" href="#">6:15</a>
                                                        <a class="dropdown-item small text-default" href="#">6:30</a>
                                                        <a class="dropdown-item small text-default" href="#">6:45</a>
                                                        <a class="dropdown-item small text-default" href="#">7:00</a>
                                                        <a class="dropdown-item small text-default" href="#">7:15</a>
                                                        <a class="dropdown-item small text-default" href="#">7:30</a>
                                                        <a class="dropdown-item small text-default" href="#">7:45</a>
                                                        <a class="dropdown-item small text-default" href="#">8:00</a>
                                                        <a class="dropdown-item small text-default" href="#">8:15</a>
                                                        <a class="dropdown-item small text-default" href="#">8:30</a>
                                                        <a class="dropdown-item small text-default" href="#">8:45</a>
                                                        <a class="dropdown-item small text-default" href="#">9:00</a>
                                                        <a class="dropdown-item small text-default" href="#">9:15</a>
                                                        <a class="dropdown-item small text-default" href="#">9:30</a>
                                                        <a class="dropdown-item small text-default" href="#">9:45</a>
                                                        <a class="dropdown-item small text-default" href="#">10:00</a>
                                                        <a class="dropdown-item small text-default" href="#">10:15</a>
                                                        <a class="dropdown-item small text-default" href="#">10:30</a>
                                                        <a class="dropdown-item small text-default" href="#">10:45</a>
                                                        <a class="dropdown-item small text-default" href="#">11:00</a>
                                                        <a class="dropdown-item small text-default" href="#">11:15</a>
                                                        <a class="dropdown-item small text-default" href="#">11:30</a>
                                                        <a class="dropdown-item small text-default" href="#">11:45</a>
                                                        <a class="dropdown-item small text-default" href="#">12:00</a>
                                                        <a class="dropdown-item small text-default" href="#">12:15</a>
                                                        <a class="dropdown-item small text-default" href="#">12:30</a>
                                                        <a class="dropdown-item small text-default" href="#">12:45</a>
                                                        <a class="dropdown-item small text-default" href="#">13:00</a>
                                                        <a class="dropdown-item small text-default" href="#">13:15</a>
                                                        <a class="dropdown-item small text-default" href="#">13:30</a>
                                                        <a class="dropdown-item small text-default" href="#">13:45</a>
                                                        <a class="dropdown-item small text-default" href="#">14:00</a>
                                                        <a class="dropdown-item small text-default" href="#">14:15</a>
                                                        <a class="dropdown-item small text-default" href="#">14:30</a>
                                                        <a class="dropdown-item small text-default" href="#">14:45</a>
                                                        <a class="dropdown-item small text-default" href="#">15:00</a>
                                                        <a class="dropdown-item small text-default" href="#">15:15</a>
                                                        <a class="dropdown-item small text-default" href="#">15:30</a>
                                                        <a class="dropdown-item small text-default" href="#">15:45</a>
                                                        <a class="dropdown-item small text-default" href="#">16:00</a>
                                                        <a class="dropdown-item small text-default" href="#">16:15</a>
                                                        <a class="dropdown-item small text-default" href="#">16:30</a>
                                                        <a class="dropdown-item small text-default" href="#">16:45</a>
                                                        <a class="dropdown-item small text-default" href="#">17:00</a>
                                                        <a class="dropdown-item small text-default" href="#">17:15</a>
                                                        <a class="dropdown-item small text-default" href="#">17:30</a>
                                                        <a class="dropdown-item small text-default" href="#">17:45</a>
                                                        <a class="dropdown-item small text-default" href="#">18:00</a>
                                                        <a class="dropdown-item small text-default" href="#">18:15</a>
                                                        <a class="dropdown-item small text-default" href="#">18:30</a>
                                                        <a class="dropdown-item small text-default" href="#">18:45</a>
                                                        <a class="dropdown-item small text-default" href="#">19:00</a>
                                                        <a class="dropdown-item small text-default" href="#">19:15</a>
                                                        <a class="dropdown-item small text-default" href="#">19:30</a>
                                                        <a class="dropdown-item small text-default" href="#">19:45</a>
                                                        <a class="dropdown-item small text-default" href="#">20:00</a>
                                                        <a class="dropdown-item small text-default" href="#">20:15</a>
                                                        <a class="dropdown-item small text-default" href="#">20:30</a>
                                                        <a class="dropdown-item small text-default" href="#">20:45</a>
                                                        <a class="dropdown-item small text-default" href="#">21:00</a>
                                                        <a class="dropdown-item small text-default" href="#">21:15</a>
                                                        <a class="dropdown-item small text-default" href="#">21:30</a>
                                                        <a class="dropdown-item small text-default" href="#">21:45</a>
                                                        <a class="dropdown-item small text-default" href="#">22:00</a>
                                                        <a class="dropdown-item small text-default" href="#">22:15</a>
                                                        <a class="dropdown-item small text-default" href="#">22:30</a>
                                                        <a class="dropdown-item small text-default" href="#">22:45</a>
                                                        <a class="dropdown-item small text-default" href="#">23:00</a>
                                                        <a class="dropdown-item small text-default" href="#">23:15</a>
                                                        <a class="dropdown-item small text-default" href="#">23:30</a>
                                                        <a class="dropdown-item small text-default" href="#">23:45</a>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-2">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <textarea id="textarea-meeting-create" placeholder="Notes..." class="form-control border-0 pt-1 text-default content-textarea meetings-fusion"></textarea>

                                            <!--Textarea minimenu not required by now-->

                                            <div class="px-2 mx-1 my-2 note-options">
                                                <span class="ion text-default mr-3 font-weight-bold">B</span>
                                                <span class="ion text-default mr-3 font-italic">I</span>
                                                <span class="ion text-default mr-3"><u>U</u></span>
                                                <span class="ion flaticon-rubber text-default mr-3"></span>
                                                <span class="ion ion-paperclip text-default mr-3"></span>
                                            </div>
                                            <hr class="mb-2">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <p class="text-left text-default small my-2">Duration</p>
                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                        1 Hour
                                                    </button>
                                                    <div class="dropdown-menu">

                                                        <!--Note: again i dont know if this is the best format (it will need a search box)-->

                                                        <a class="dropdown-item small text-default" href="#">15
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">30
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">45
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">1 Hour</a>
                                                        <a class="dropdown-item small text-default" href="#">1 Hour 15
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">1 Hour 30
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">1 Hour 45
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">2 Hours</a>
                                                        <a class="dropdown-item small text-default" href="#">2 Hours 15
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">2 Hours 30
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">2 Hours 45
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">3 Hours</a>
                                                        <a class="dropdown-item small text-default" href="#">3 Hours 15
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">3 Hours 30
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">3 Hours 45
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">4 Hours</a>
                                                        <a class="dropdown-item small text-default" href="#">4 Hours 15
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">4 Hours 30
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">4 Hours 45
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">5 Hours</a>
                                                        <a class="dropdown-item small text-default" href="#">5 Hours 15
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">5 Hours 30
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">5 Hours 45
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">6 Hours</a>
                                                        <a class="dropdown-item small text-default" href="#">6 Hours 15
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">6 Hours 30
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">6 Hours 45
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">7 Hours</a>
                                                        <a class="dropdown-item small text-default" href="#">7 Hours 15
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">7 Hours 30
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">7 Hours 45
                                                            minutes</a>
                                                        <a class="dropdown-item small text-default" href="#">8 Hours</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 border-left">
                                            <p class="text-default small pt-1 mb-2">Add an assistant</p>
                                            <div class="alert alert-secondary small col-7 p-1 border-secondary rounded-0 mb-2" role="alert">
                                                <img src="../img/lead_profile.jpg" class="rounded-circle m-0 mr-2" style="width: 30px;">
                                                Chloe Moretz
                                            </div>
                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                <span class="ion ion-plus"></span>Add a contact
                                            </button>
                                            <p class="text-default small pt-1 mb-2 mt-3">Associated with</p>
                                            <div class="alert alert-secondary small col-7 p-1 border-secondary rounded-0 mb-2" role="alert">

                                                Kick ass corp
                                            </div>
                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                <span class="ion ion-plus"></span>Add a business
                                            </button>
                                        </div>
                                    </div>
                                    <div id="buttons-meeting-create" class="col-12 clearfix mb-3 pt-3 border-top">
                                        <button class="btn btn-primary btn-sm mr-2 disabled">Save</button>
                                        <button class="btn btn-outline-primary btn-sm">Cancel</button>
                                    </div>
                                </div>

                                <!-- End For Create meeting-->
                            </div>
                        </div>
                    </div>

                    <!-- Note: Here starts the timeline tabs, which shiw a view of the elements created (tasks, emails etc..) -->

                    <div class="col-12 bg-white border mb-4 border-bottom-3">
                        <div>
                            <div id="nav-1" role="tabpanel" class="tab-pane fade active show border-bottom mb-5 activity-tabs">
                                <ul role="tablist " class="nav nav-tabs border-0  d-flex mx-auto row">
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#activities" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2 active show">
                                            <span data-pack="android" data-tags="" class="ion ion-android-contract"></span>Activity
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#notes" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-photos-outline"></span>Notes
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#tasks" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-list-outline"></span>Tasks
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#emails" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-email-outline"></span>Emails
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#calls" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-telephone-outline"></span>Registered
                                            Calls </a>
                                    </li>
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#meetings" role="tab" class="nav-link small py-md-4 py-sm-2 py-1 border-0 mx-2">
                                            <span data-pack="android" data-tags="" class="ion ion-ios-people-outline"></span>Meetings
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            <div id="nav-tabContent" class="tab-content">

                                <!-- Note: This is the tab For view activities-->

                                <div id="activities" role="tabpanel" class="tab-pane fade active show">

                                    <!--example of view note-->

                                    <div class="row">

                                        <!--Date-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>
                                        <div class="col-11">
                                            <h4 class="font-weight-light text-default mb-3">Just Now</h4>
                                        </div>

                                        <!--Icon for the timeline-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border-min"></div>
                                            <div class="d-flex">
                                                <span class="ion ion-ios-photos bg-primary text-white p-2 full_rounded text-center mx-auto"></span>
                                            </div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>

                                        <div class="mb-4 col-11 activities pl-0 pr-3">
                                            <div class="border-bottom mb-4 mx-3">
                                                <div class="row px-3 align-items-center mt-3">
                                                    <div class="text-default border-0 col-sm-9 align-items-center">
                                                        <div class="float-left">
                                                            <img class="img-thumbnail rounded-circle m-0 mr-2 activity-img" src="/img/profile.jpg">
                                                        </div>
                                                        <div class="float-left mt-1">
                                                            <p class="small mb-0 ">
                                                                <strong>You</strong> left a note about <strong>Chloe
                                                                    Moretz</strong>
                                                            </p>
                                                            <p class="small mb-0">mar. 23 at 16:50 GMT-5</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">

                                                            <div class="col-4 small text-primary">
                                                                <button class="click-edit btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-compose-outline"></span>Edit
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion flaticon-boat-anchor"></span>Anchor
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-trash-outline"></span>Delete
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-3">
                                                <div class="note-editor">
                                                    <textarea placeholder="Start writing to leave a note..." class="form-control border-0 pt-4 text-default content-textarea val-edit">This is a save note that can be edited, just not for now</textarea>
                                                    <div class="px-2 mx-1 my-2 note-options">
                                                        <span class="ion text-default mr-3">T</span>
                                                        <span class="ion ion-link text-default mr-3"></span>
                                                        <span class="ion ion-paperclip text-default mr-2"></span>
                                                    </div>
                                                    <div class="col-12 clearfix mb-3 pt-3 border-top">
                                                        <button class="btn btn-primary btn-sm mr-2 button-validate">Save
                                                            Note
                                                        </button>
                                                        <button class=" not-edit btn btn-outline-primary btn-sm">
                                                            Discard
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row px-4 view-note">
                                                    <p class="text-default small"> This is a save note that can be
                                                        edited, just not for now</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <!--End example of view note-->

                                    <!--example of view task-->

                                    <div class="row">

                                        <!--Date-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>
                                        <div class="col-11">
                                            <h4 class="font-weight-light text-default mb-3">March 2018</h4>
                                        </div>

                                        <!--Icon for the timeline-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min"></div>
                                            <div class="d-flex">
                                                <span class="ion ion-ios-list bg-primary text-white p-2 full_rounded text-center mx-auto"></span>
                                            </div>
                                            <div class="d-flex timeline-border"></div>

                                        </div>

                                        <div class="mb-4 col-11 activities pl-0 pr-3">
                                            <div class="border-bottom mb-4 mx-3">
                                                <div class="row px-3 align-items-center mt-3">
                                                    <div class="text-default border-0 col-sm-9">
                                                        <div class="float-left">
                                                            <img class="img-thumbnail rounded-circle m-0 mr-2 activity-img" src="/img/profile.jpg">
                                                        </div>
                                                        <div class="float-left mt-1"><p class="small mb-0">
                                                                <strong>You</strong> create a task for
                                                                <strong>Yourself</strong></p>
                                                            <p class="small mb-0">mar. 23 at 16:50 GMT-5</p></div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">

                                                            <div class="col-4 small text-primary">
                                                                <button class="click-edit btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-compose-outline"></span>Edit
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion flaticon-boat-anchor"></span>Anchor
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-trash-outline"></span>Delete
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-3 mb-2">

                                                <!--Edit task inside the activity-->

                                                <div class="note-editor">
                                                    <div class="row px-3">
                                                        <input type="text" value="This is a task" placeholder="Enter your task" class="form-control text-default border-0 pt-3 col-sm-9 content-input val-edit">
                                                        <div class="col-sm-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p class="text-left text-default small my-2">Due
                                                                        Date</p></div>
                                                                <div class="col-6 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-calendar-outline"></span>23/03/2018
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">Today</a>
                                                                        <a href="#" class="dropdown-item small text-default">Tomorrow</a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            2 days ($day)</a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            3 days ($day)</a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            4 days ($day)</a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            5 days ($day)</a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            a week </a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            2 weeks </a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            a Month </a>
                                                                        <a href="#" class="dropdown-item small text-default">Custom
                                                                            date</a></div>
                                                                </div>
                                                                <div class="col-6 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-time-outline"></span>7:30
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">0:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:45</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-2">
                                                    <textarea placeholder="" class="form-control border-0 pt-1 text-default content-textarea">This is an important note about a task.</textarea>
                                                    <div class="px-2 mx-1 my-2 note-options">
                                                        <span class="ion text-default mr-3 font-weight-bold">B</span>
                                                        <span class="ion text-default mr-3 font-italic">I</span>
                                                        <span class="ion text-default mr-3"><u>U</u></span>
                                                        <span class="ion flaticon-rubber text-default mr-2"></span>
                                                    </div>
                                                    <hr class="mb-2">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <p class="text-left text-default small my-2">
                                                                Type</p>
                                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                                To do
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a href="#" class="dropdown-item small text-default">Call</a>
                                                                <a href="#" class="dropdown-item small text-default">Email</a>
                                                                <a href="#" class="dropdown-item small text-default">To
                                                                    do</a></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="text-left text-default small my-2">
                                                                Assigned to</p>
                                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                                Chloe Moretz
                                                            </button>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="text-left text-default small my-2">
                                                                Reminder by mail</p>
                                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                                No reminder
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a href="#" class="dropdown-item small text-default">The
                                                                    day of</a>
                                                                <a href="#" class="dropdown-item small text-default">The
                                                                    day before</a>
                                                                <a href="#" class="dropdown-item small text-default">The
                                                                    week before</a>
                                                                <a href="#" class="dropdown-item small text-default">Custom
                                                                    Date</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3"></div>
                                                    </div>
                                                    <div class="col-12 clearfix mb-3 pt-3 border-top">
                                                        <button class="btn btn-primary btn-sm mr-2 button-validate">Save
                                                            Task
                                                        </button>
                                                        <button class="btn btn-outline-primary btn-sm not-edit">Cancel
                                                        </button>
                                                    </div>

                                                </div>

                                                <div class="view-note">
                                                    <div class="row px-3">
                                                        <div class="col-9">
                                                            <h6 class="text-primary mt-2">
                                                                <span class="ion ion-ios-checkmark-outline"></span> This
                                                                is a task
                                                            </h6>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p class="small mb-0">Due date</p>
                                                                </div>
                                                                <div class="col-12">
                                                                    <p class="small mb-0">23/03/2018 at 7:30</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 px-0">
                                                            <hr class="my-2">
                                                        </div>
                                                        <p class="text-default small col-12 border-bottom pb-3 pt-2">
                                                            This is an important note about a task.</p>
                                                    </div>
                                                    <div class="row px-3">
                                                        <div class="col-md-3">
                                                            <p class="text-left text-primary small mb-2">Type</p>
                                                            <p class="text-default small mb-3">To do</p>

                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="text-left text-primary small mb-2">Assigned to</p>
                                                            <p class="text-default small mb-3">Chloe Moretz</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="text-left text-primary small mb-2">Reminder by
                                                                mail</p>
                                                            <p class="text-default small mb-3">No reminder</p>

                                                        </div>
                                                        <div class="col-md-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- End example of view task-->

                                    <!--example of view email-->

                                    <div class="row">

                                        <!--Icon for the timeline-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min"></div>
                                            <div class="d-flex">
                                                <span class="ion ion-ios-email bg-primary text-white p-2 full_rounded text-center mx-auto"></span>
                                            </div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>

                                        <!--Note: Content view email-->

                                        <div class="mb-4 col-11 activities pl-0 pr-3">
                                            <div class="border-bottom mb-4 mx-3">
                                                <div class="row px-3 align-items-center mt-3">
                                                    <div class="text-default border-0 col-sm-9">
                                                        <div class="float-left">
                                                            <img class="img-thumbnail rounded-circle m-0 mr-2 activity-img" src="/img/profile.jpg">
                                                        </div>
                                                        <div class="float-left mt-1">
                                                            <p class="small mb-0"><strong>You</strong> send an email
                                                                to<strong> Chloe Moretz</strong> (b.flash@mail.com)</p>
                                                            <p class="small mb-0">mar. 23 at 16:50 GMT-5</p></div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">
                                                            <div class="col-4 small text-primary"></div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion flaticon-boat-anchor"></span>Anchor
                                                                </button>
                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-trash-outline"></span>Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-3 mb-2">
                                                <div class="row mx-0 border-bottom">
                                                    <div class="col-md-3">
                                                        <p class="text-left text-default small mb-2">
                                                            <strong>Status:</strong> Error</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p class="text-left text-default small mb-2">
                                                            <strong>Openings:</strong> 0</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p class="text-left text-default small mb-2">
                                                            <strong>Clicks:</strong> 0</p>
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                </div>
                                                <div class="row px-3">
                                                    <p class="text-default small col-12 pt-4"><strong>This is the
                                                            Subject</strong></p>
                                                    <p class="text-default small col-12 border-bottom pb-3 mb-2">This is
                                                        the message</p>
                                                    <div class="text-default col-12 border-bottom py-2 mb-2">
                                                        <div class="alert alert-secondary small col-2 p-1 border-secondary rounded-0 mb-2" role="alert">
                                                            <div class="float-left">
                                                                <img src="../img/lead_profile.jpg" class="rounded-circle m-0 mr-2 mt-1" style="width: 30px;">
                                                            </div>
                                                            somefile.jpg<br> <strong>241Mb</strong>
                                                        </div>
                                                    </div>
                                                    <button class="btn-sm btn bg-white text-primary mb-2 click-edit view-note">
                                                        <span class="ion ion-ios-undo "></span> Reply
                                                    </button>

                                                    <!-- Note: Reply editor -->

                                                    <div class="col-12 note-editor">
                                                        <div class="row px-3 input-group-sm">
                                                            <div class="mr-3"><p class="small text-default pt-2 mt-2">
                                                                    <strong>To:</strong>
                                                                </p>
                                                            </div>
                                                            <input type="text" value="Chloe Moretz (b.flash@mail.com)" class="form-control text-default border-0 py-0 col-sm-10 content-input pl-0 mr-5">
                                                            <div class="col-sm-1">
                                                                <div class="row pt-2 mt-2">
                                                                    <div class="col-6 small text-primary show">
                                                                        <button class="btn bg-white text-primary btn-sm p-0">
                                                                            CC
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-6 small text-primary">
                                                                        <button class="btn bg-white text-primary btn-sm p-0">
                                                                            CCO
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-0">
                                                        <div class="row px-3 input-group-sm">
                                                            <div class="mr-3">
                                                                <p class="small text-default pt-2 mt-2">
                                                                    <strong>From:</strong></p>
                                                            </div>
                                                            <input type="text" value="Violeta Parra (vparra@gokapital.com)" class="form-control text-default border-0 col-sm-11 content-input p-0">
                                                        </div>
                                                        <hr class="my-0">
                                                        <div class="row px-3 input-group-sm">
                                                            <div class="mr-3"><p class="small text-default pt-2 mt-2">
                                                                    <strong>Subject:</strong></p>
                                                            </div>
                                                            <input type="text" placeholder="Add subject" value="Re: This is the Subject" class="form-control text-default border-0 col-sm-11 content-input p-0 val-edit">
                                                        </div>
                                                        <hr class="mt-0 mb-2">
                                                        <textarea placeholder="Write something..." class="form-control border-0 pt-1 text-default content-textarea val-edit"></textarea>
                                                        <div class="px-2 mx-1 my-2 note-options">
                                                            <span class="ion text-default mr-3">T</span><span class="ion ion-image text-default mr-3"></span>
                                                            <span class="ion ion-link text-default mr-3"></span>
                                                            <span class="ion ion-paperclip text-default mr-2"></span>
                                                        </div>
                                                        <div class="col-12 clearfix mb-3 pt-3 create-buttons border-top">
                                                            <button class="btn btn-primary btn-sm mr-2 disabled button-validate">
                                                                Send
                                                            </button>
                                                            <button class="btn btn-outline-primary btn-sm not-edit">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--End example of view email-->

                                    <!--example of view call-->

                                    <div class="row">

                                        <!--Date-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>
                                        <div class="col-11">
                                            <h4 class="font-weight-light text-default mb-3">February 2018</h4>
                                        </div>

                                        <!--Icon for the timeline-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min"></div>
                                            <div class="d-flex">
                                                <span class="ion ion-ios-telephone bg-primary text-white p-2 full_rounded text-center mx-auto"></span>
                                            </div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>

                                        <!--Content for view call-->

                                        <div class="mb-4 col-11 activities pl-0 pr-3">
                                            <div class="border-bottom mb-4 mx-3">
                                                <div class="row px-3 mt-3 align-items-center">
                                                    <div class="text-default border-0  col-sm-9">
                                                        <div class="float-left">
                                                            <img class="img-thumbnail rounded-circle m-0 mr-2 activity-img" src="/img/profile.jpg">
                                                        </div>
                                                        <div class="float-left mt-1">
                                                            <p class="small mb-0">
                                                                <strong>You</strong> registered a call with<strong>
                                                                    Chloe Moretz</strong></p>
                                                            <p class="small mb-0 view-note">mar. 23 at 17:00 GMT-5</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">

                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0 click-edit">
                                                                    <span class="ion ion-ios-compose-outline"></span>Edit
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion flaticon-boat-anchor"></span>Anchor
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-trash-outline"></span>Delete
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-3">

                                                <!---Note: edit calls activities-->

                                                <div class="note-editor">
                                                    <div class="row px-3">
                                                        <input type="text" placeholder="Contact Name" value="Chloe Moretz" class="form-control text-default border-0 pt-3 col-sm-4 content-input val-edit">
                                                        <input type="number" placeholder="Phone number" value="4582452145" class="form-control text-default border-0 pt-3 col-sm-4 content-input val-edit">
                                                        <div class="col-sm-4">
                                                            <div class="row mt-2 pt-2">
                                                                <div class="col-4 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        Leave voice mail
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">Unanswered</a>
                                                                        <a href="#" class="dropdown-item small text-default">Busy</a>
                                                                        <a href="#" class="dropdown-item small text-default">Wrong
                                                                            number</a>
                                                                        <a href="#" class="dropdown-item small text-default">Leave
                                                                            live message </a>
                                                                        <a href="#" class="dropdown-item small text-default">Leave
                                                                            voice mail</a>
                                                                        <a href="#" class="dropdown-item small text-default">Online</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-calendar-outline"></span>23
                                                                        - 03 -2018
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">This
                                                                            is suppose to be a calendar</a></div>
                                                                </div>
                                                                <div class="col-4 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-time-outline"></span>17:00
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">0:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:45</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-2">
                                                    <textarea placeholder="Describe the phonecall..." class="form-control border-0 pt-1 text-default content-textarea">This is a call message or note</textarea>
                                                    <div class="px-2 mx-1 my-2 note-options">
                                                        <span class="ion text-default mr-3">T</span>
                                                        <span class="ion ion-link text-default mr-3"></span>
                                                        <span class="ion ion-paperclip text-default mr-2"></span>
                                                    </div>
                                                    <div class="col-12 clearfix mb-3 pt-3 create-buttons border-top">
                                                        <button class="btn btn-primary btn-sm mr-2 button-validate">
                                                            Register Call
                                                        </button>
                                                        <button class="btn btn-outline-primary btn-sm not-edit">
                                                            Discard
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row px-4 view-note">
                                                    <p class="text-default col-12"><strong>Result of the call:</strong>
                                                        Leave voicemail</p>
                                                    <p class="text-default small col-12"> This is a call message or
                                                        note</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <!--example of view call-->

                                    <!--example of view meeting-->

                                    <div class="row">

                                        <!--Icon for the timeline-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn" style="">
                                            <div class="d-flex timeline-border-min"></div>
                                            <div class="d-flex">
                                                <span class="ion ion-ios-people bg-primary text-white p-2 full_rounded text-center mx-auto"></span>
                                            </div>
                                            <div class="d-none timeline-border"></div>
                                        </div>

                                        <!--Note: content meetings activities-->

                                        <div class="mb-4 col-11 activities pl-0 pr-3">
                                            <div class="border-bottom mb-4 mx-3">
                                                <div class="row px-3 mt-3 align-items-center">
                                                    <div class="text-default border-0 col-sm-9">
                                                        <div class="float-left">
                                                            <img class="img-thumbnail rounded-circle m-0 mr-2 activity-img" src="/img/profile.jpg">
                                                        </div>
                                                        <div class="float-left mt-1"><p class="small mb-0">
                                                                <strong>You</strong> had a meeting with <strong>Chloe
                                                                    Moretz</strong></p>
                                                            <p class="small mb-0">mar. 23 at 16:50 GMT-5</p></div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">

                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0 click-edit">
                                                                    <span class="ion ion-ios-compose-outline"></span>Edit
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion flaticon-boat-anchor"></span>Anchor
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-trash-outline"></span>Delete
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-3 mb-2">

                                                <!--Note edit meetings activities-->

                                                <div class="note-editor">
                                                    <div class="row px-3">
                                                        <input type="text" placeholder="What is the meeting about?" value="This is the meeting title" class="form-control text-default border-0 pt-3 col-sm-9 content-input val-edit">
                                                        <div class="col-sm-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p class="text-left text-default small my-2">
                                                                        Start Date</p></div>
                                                                <div class="col-6 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-calendar-outline"></span>23
                                                                        / 03 / 2018
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">This
                                                                            is suppose to be a calendar</a></div>
                                                                </div>
                                                                <div class="col-6 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-time-outline"></span>7:30
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">0:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:45</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-2">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <textarea placeholder="Notes..." class="form-control border-0 pt-1 text-default content-textarea">This is an important note about the meeting.</textarea>
                                                            <div class="px-2 mx-1 my-2 note-options">
                                                                <span class="ion text-default mr-3 font-weight-bold">B</span>
                                                                <span class="ion text-default mr-3 font-italic">I</span>
                                                                <span class="ion text-default mr-3"><u>U</u></span>
                                                                <span class="ion flaticon-rubber text-default mr-3"></span>
                                                                <span class="ion ion-paperclip text-default mr-3"></span>
                                                            </div>
                                                            <hr class="mb-2">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p class="text-left text-default small my-2">
                                                                        Duration</p>
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                                        1 Hour
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">15
                                                                            minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">30
                                                                            minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">45
                                                                            minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">1
                                                                            Hour</a>
                                                                        <a href="#" class="dropdown-item small text-default">1
                                                                            Hour 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">1
                                                                            Hour 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">1
                                                                            Hour 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">2
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">2
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">2
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">2
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">3
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">3
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">3
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">3
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">4
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">4
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">4
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">4
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">5
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">5
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">5
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">5
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">6
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">6
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">6
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">6
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">7
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">7
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">7
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">7
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">8
                                                                            Hours</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 border-left">
                                                            <p class="text-default small pt-1 mb-2">
                                                                Add an assistant</p>
                                                            <div role="alert" class="alert alert-secondary small col-7 p-1 border-secondary rounded-0 mb-2">
                                                                <img src="../img/lead_profile.jpg" class="rounded-circle m-0 mr-2" style="width: 30px;">
                                                                Chloe Moretz
                                                            </div>
                                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                <span class="ion ion-plus"></span>Add a contact
                                                            </button>
                                                            <p class="text-default small pt-1 mb-2 mt-3">Associated
                                                                with</p>
                                                            <div role="alert" class="alert alert-secondary small col-7 p-1 border-secondary rounded-0 mb-2">

                                                                Kick ass corp
                                                            </div>
                                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                <span class="ion ion-plus"></span>Add a business
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 clearfix mb-3 pt-3 border-top d-block">
                                                        <button class="btn btn-primary btn-sm mr-2 button-validate">
                                                            Save
                                                        </button>
                                                        <button class="btn btn-outline-primary btn-sm not-edit">Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="view-note">
                                                    <div class="row px-3">
                                                        <div class="col-9">
                                                            <h6 class="text-primary mt-2">
                                                                <span class="ion ion-ios-checkmark-outline"></span> This
                                                                is the meeting title
                                                            </h6>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p class="small mb-0">Start time</p>
                                                                </div>
                                                                <div class="col-12">
                                                                    <p class="small mb-0">23/03/2018 at 7:30</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 px-0">
                                                            <hr class="my-2">
                                                        </div>
                                                        <p class="text-default small col-12 border-bottom pb-3 pt-2">
                                                            This is an important note about the meeting.</p>
                                                    </div>
                                                    <div class="row px-4">
                                                        <div class="col-md-6">
                                                            <p class="text-left text-primary small mb-2">Duration</p>
                                                            <p class="text-default small mb-3">1 Hour</p>

                                                        </div>
                                                        <div class="col-md-6 border-left">
                                                            <p class="text-left text-default small mb-2">Assistants</p>
                                                            <div class="alert alert-secondary small col-4 p-1 border-secondary rounded-0 mb-2" role="alert">
                                                                <img src="../img/lead_profile.jpg" class="rounded-circle m-0 mr-2" style="width: 30px;">
                                                                Chloe Moretz
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <!--End example of view meeting-->

                                </div>

                                <!-- Note: This is the tab For view notes-->

                                <div id="notes" role="tabpanel" class="tab-pane fade">

                                    <div class="row">

                                        <!--Date-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>
                                        <div class="col-11">
                                            <h4 class="font-weight-light text-default mb-3">Just Now</h4>
                                        </div>

                                        <!--Icon for the timeline-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border-min"></div>
                                            <div class="d-flex">
                                                <span class="ion ion-ios-photos bg-primary text-white p-2 full_rounded text-center mx-auto"></span>
                                            </div>
                                            <div class="d-none timeline-border">


                                            </div>

                                        </div>

                                        <div class="mb-4 col-11 activities pl-0 pr-3">
                                            <div class="border-bottom mb-4 mx-3">
                                                <div class="row px-3 align-items-center mt-3">
                                                    <div class="text-default border-0 col-sm-9 align-items-center">
                                                        <div class="float-left">
                                                            <img class="img-thumbnail rounded-circle m-0 mr-2 activity-img" src="/img/profile.jpg">
                                                        </div>
                                                        <div class="float-left mt-1">
                                                            <p class="small mb-0 ">
                                                                <strong>You</strong> left a note about <strong>Chloe
                                                                    Moretz</strong>
                                                            </p>
                                                            <p class="small mb-0">mar. 23 at 16:50 GMT-5</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">

                                                            <div class="col-4 small text-primary">
                                                                <button class="click-edit btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-compose-outline"></span>Edit
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion flaticon-boat-anchor"></span>Anchor
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-trash-outline"></span>Delete
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-3">
                                                <div class="note-editor">
                                                    <textarea placeholder="Start writing to leave a note..." class="form-control border-0 pt-4 text-default content-textarea val-edit">This is a save note that can be edited, just not for now</textarea>
                                                    <div class="px-2 mx-1 my-2 note-options">
                                                        <span class="ion text-default mr-3">T</span>
                                                        <span class="ion ion-link text-default mr-3"></span>
                                                        <span class="ion ion-paperclip text-default mr-2"></span>
                                                    </div>
                                                    <div class="col-12 clearfix mb-3 pt-3 border-top">
                                                        <button class="btn btn-primary btn-sm mr-2 button-validate">Save
                                                            Note
                                                        </button>
                                                        <button class=" not-edit btn btn-outline-primary btn-sm">
                                                            Discard
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="row px-4 view-note">
                                                    <p class="text-default small"> This is a save note that can be
                                                        edited, just not for now</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                                <!-- End tab For view notes-->

                                <!-- Note: This is the tab For view tasks-->

                                <div id="tasks" role="tabpanel" class="tab-pane fade">
                                    <div class="row">

                                        <!--Date-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>
                                        <div class="col-11">
                                            <h4 class="font-weight-light text-default mb-3">March 2018</h4>
                                        </div>

                                        <!--Icon for the timeline-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn" style="">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border-min"></div>
                                            <div class="d-flex">
                                                <span class="ion ion-ios-list bg-primary text-white p-2 full_rounded text-center mx-auto"></span>
                                            </div>
                                            <div class="d-none timeline-border">


                                            </div>

                                        </div>

                                        <div class="mb-4 col-11 activities pl-0 pr-3">
                                            <div class="border-bottom mb-4 mx-3">
                                                <div class="row px-3 align-items-center mt-3">
                                                    <div class="text-default border-0 col-sm-9">
                                                        <div class="float-left">
                                                            <img class="img-thumbnail rounded-circle m-0 mr-2 activity-img" src="/img/profile.jpg">
                                                        </div>
                                                        <div class="float-left mt-1"><p class="small mb-0">
                                                                <strong>You</strong> create a task for
                                                                <strong>Yourself</strong></p>
                                                            <p class="small mb-0">mar. 23 at 16:50 GMT-5</p></div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">

                                                            <div class="col-4 small text-primary">
                                                                <button class="click-edit btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-compose-outline"></span>Edit
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion flaticon-boat-anchor"></span>Anchor
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-trash-outline"></span>Delete
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-3 mb-2">

                                                <!--Edit task inside the activity-->

                                                <div class="note-editor">
                                                    <div class="row px-3">
                                                        <input type="text" value="This is a task" placeholder="Enter your task" class="form-control text-default border-0 pt-3 col-sm-9 content-input val-edit">
                                                        <div class="col-sm-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p class="text-left text-default small my-2">Due
                                                                        Date</p></div>
                                                                <div class="col-6 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-calendar-outline"></span>23/03/2018
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">Today</a>
                                                                        <a href="#" class="dropdown-item small text-default">Tomorrow</a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            2 days ($day)</a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            3 days ($day)</a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            4 days ($day)</a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            5 days ($day)</a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            a week </a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            2 weeks </a>
                                                                        <a href="#" class="dropdown-item small text-default">In
                                                                            a Month </a>
                                                                        <a href="#" class="dropdown-item small text-default">Custom
                                                                            date</a></div>
                                                                </div>
                                                                <div class="col-6 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-time-outline"></span>7:30
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">0:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:45</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-2">
                                                    <textarea placeholder="" class="form-control border-0 pt-1 text-default content-textarea">This is an important note about a task.</textarea>
                                                    <div class="px-2 mx-1 my-2 note-options">
                                                        <span class="ion text-default mr-3 font-weight-bold">B</span>
                                                        <span class="ion text-default mr-3 font-italic">I</span>
                                                        <span class="ion text-default mr-3"><u>U</u></span>
                                                        <span class="ion flaticon-rubber text-default mr-2"></span>
                                                    </div>
                                                    <hr class="mb-2">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <p class="text-left text-default small my-2">
                                                                Type</p>
                                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                                To do
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a href="#" class="dropdown-item small text-default">Call</a>
                                                                <a href="#" class="dropdown-item small text-default">Email</a>
                                                                <a href="#" class="dropdown-item small text-default">To
                                                                    do</a></div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="text-left text-default small my-2">
                                                                Assigned to</p>
                                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                                Chloe Moretz
                                                            </button>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="text-left text-default small my-2">
                                                                Reminder by mail</p>
                                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                                No reminder
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a href="#" class="dropdown-item small text-default">The
                                                                    day of</a>
                                                                <a href="#" class="dropdown-item small text-default">The
                                                                    day before</a>
                                                                <a href="#" class="dropdown-item small text-default">The
                                                                    week before</a>
                                                                <a href="#" class="dropdown-item small text-default">Custom
                                                                    Date</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3"></div>
                                                    </div>
                                                    <div class="col-12 clearfix mb-3 pt-3 border-top">
                                                        <button class="btn btn-primary btn-sm mr-2 button-validate">Save
                                                            Task
                                                        </button>
                                                        <button class="btn btn-outline-primary btn-sm not-edit">Cancel
                                                        </button>
                                                    </div>

                                                </div>

                                                <div class="view-note">
                                                    <div class="row px-3">
                                                        <div class="col-9">
                                                            <h6 class="text-primary mt-2">
                                                                <span class="ion ion-ios-checkmark-outline"></span> This
                                                                is a task
                                                            </h6>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p class="small mb-0">Due date</p>
                                                                </div>
                                                                <div class="col-12">
                                                                    <p class="small mb-0">23/03/2018 at 7:30</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 px-0">
                                                            <hr class="my-2">
                                                        </div>
                                                        <p class="text-default small col-12 border-bottom pb-3 pt-2">
                                                            This is an important note about a task.</p>
                                                    </div>
                                                    <div class="row px-4">
                                                        <div class="col-md-3">
                                                            <p class="text-left text-primary small mb-2">Type</p>
                                                            <p class="text-default small mb-3">To do</p>

                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="text-left text-primary small mb-2">Assigned to</p>
                                                            <p class="text-default small mb-3">Chloe Moretz</p>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <p class="text-left text-primary small mb-2">Reminder by
                                                                mail</p>
                                                            <p class="text-default small mb-3">No reminder</p>

                                                        </div>
                                                        <div class="col-md-3"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- End tab For view tasks-->

                                <!-- Note: This is the tab For view emails-->

                                <div id="emails" role="tabpanel" class="tab-pane fade">
                                    <div class="row">

                                        <!--Date-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>
                                        <div class="col-11">
                                            <h4 class="font-weight-light text-default mb-3">February 2018
                                            </h4>
                                        </div>

                                        <!--Icon for the timeline-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border-min"></div>
                                            <div class="d-flex">
                                                <span class="ion ion-ios-email bg-primary text-white p-2 full_rounded text-center mx-auto"></span>
                                            </div>
                                            <div class="d-none timeline-border"></div>
                                        </div>

                                        <!--Note: Content view email-->

                                        <div class="mb-4 col-11 activities pl-0 pr-3">
                                            <div class="border-bottom mb-4 mx-3">
                                                <div class="row px-3 align-items-center mt-3">
                                                    <div class="text-default border-0 col-sm-9">
                                                        <div class="float-left">
                                                            <img class="img-thumbnail rounded-circle m-0 mr-2 activity-img" src="/img/profile.jpg">
                                                        </div>
                                                        <div class="float-left mt-1">
                                                            <p class="small mb-0"><strong>You</strong> send an email
                                                                to<strong> Chloe Moretz</strong> (b.flash@mail.com)</p>
                                                            <p class="small mb-0">mar. 23 at 16:50 GMT-5</p></div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">
                                                            <div class="col-4 small text-primary"></div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion flaticon-boat-anchor"></span>Anchor
                                                                </button>
                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-trash-outline"></span>Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-3 mb-2">
                                                <div class="row mx-0 border-bottom">
                                                    <div class="col-md-3">
                                                        <p class="text-left text-default small mb-2">
                                                            <strong>Status:</strong> Error</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p class="text-left text-default small mb-2">
                                                            <strong>Openings:</strong> 0</p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <p class="text-left text-default small mb-2">
                                                            <strong>Clicks:</strong> 0</p>
                                                    </div>
                                                    <div class="col-md-3"></div>
                                                </div>
                                                <div class="row px-3">
                                                    <p class="text-default small col-12 pt-4"><strong>This is the
                                                            Subject</strong></p>
                                                    <p class="text-default small col-12 border-bottom pb-3 mb-2">This is
                                                        the message</p>
                                                    <div class="text-default col-12 border-bottom py-2 mb-2">
                                                        <div class="alert alert-secondary small col-2 p-1 border-secondary rounded-0 mb-2" role="alert">
                                                            <div class="float-left">
                                                                <img src="../img/lead_profile.jpg" class="rounded-circle m-0 mr-2 mt-1" style="width: 30px;">
                                                            </div>
                                                            somefile.jpg<br> <strong>241Mb</strong>
                                                        </div>
                                                    </div>
                                                    <button class="btn-sm btn bg-white text-primary mb-2 click-edit view-note">
                                                        <span class="ion ion-ios-undo "></span> Reply
                                                    </button>

                                                    <!-- Note: Reply editor -->

                                                    <div class="col-12 note-editor">
                                                        <div class="row px-3 input-group-sm">
                                                            <div class="mr-3"><p class="small text-default pt-2 mt-2">
                                                                    <strong>To:</strong>
                                                                </p>
                                                            </div>
                                                            <input type="text" value="Chloe Moretz (b.flash@mail.com)" class="form-control text-default border-0 py-0 col-sm-10 content-input pl-0 mr-5">
                                                            <div class="col-sm-1">
                                                                <div class="row pt-2 mt-2">
                                                                    <div class="col-6 small text-primary show">
                                                                        <button class="btn bg-white text-primary btn-sm p-0">
                                                                            CC
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-6 small text-primary">
                                                                        <button class="btn bg-white text-primary btn-sm p-0">
                                                                            CCO
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-0">
                                                        <div class="row px-3 input-group-sm">
                                                            <div class="mr-3">
                                                                <p class="small text-default pt-2 mt-2">
                                                                    <strong>From:</strong></p>
                                                            </div>
                                                            <input type="text" value="Violeta Parra (vparra@gokapital.com)" class="form-control text-default border-0 col-sm-11 content-input p-0">
                                                        </div>
                                                        <hr class="my-0">
                                                        <div class="row px-3 input-group-sm">
                                                            <div class="mr-3"><p class="small text-default pt-2 mt-2">
                                                                    <strong>Subject:</strong></p>
                                                            </div>
                                                            <input type="text" placeholder="Add subject" value="Re: This is the Subject" class="form-control text-default border-0 col-sm-11 content-input p-0 val-edit">
                                                        </div>
                                                        <hr class="mt-0 mb-2">
                                                        <textarea placeholder="Write something..." class="form-control border-0 pt-1 text-default content-textarea val-edit"></textarea>
                                                        <div class="px-2 mx-1 my-2 note-options">
                                                            <span class="ion text-default mr-3">T</span><span class="ion ion-image text-default mr-3"></span>
                                                            <span class="ion ion-link text-default mr-3"></span>
                                                            <span class="ion ion-paperclip text-default mr-2"></span>
                                                        </div>
                                                        <div class="col-12 clearfix mb-3 pt-3 create-buttons border-top">
                                                            <button class="btn btn-primary btn-sm mr-2 disabled button-validate">
                                                                Send
                                                            </button>
                                                            <button class="btn btn-outline-primary btn-sm not-edit">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- End tab For view emails-->

                                <!-- Note: This is the tab For view calls-->

                                <div id="calls" role="tabpanel" class="tab-pane fade">
                                    <div class="row">

                                        <!--Date-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>
                                        <div class="col-11">
                                            <h4 class="font-weight-light text-default mb-3">February 2018</h4>
                                        </div>

                                        <!--Icon for the timeline-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn" style="">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border-min"></div>
                                            <div class="d-flex">
                                                <span class="ion ion-ios-telephone bg-primary text-white p-2 full_rounded text-center mx-auto"></span>
                                            </div>
                                            <div class="d-none timeline-border"></div>
                                        </div>

                                        <!--Content for view call-->

                                        <div class="mb-4 col-11 activities pl-0 pr-3">
                                            <div class="border-bottom mb-4 mx-3">
                                                <div class="row px-3 mt-3 align-items-center">
                                                    <div class="text-default border-0  col-sm-9">
                                                        <div class="float-left">
                                                            <img class="img-thumbnail rounded-circle m-0 mr-2 activity-img" src="/img/profile.jpg">
                                                        </div>
                                                        <div class="float-left mt-1">
                                                            <p class="small mb-0">
                                                                <strong>You</strong> registered a call with<strong>
                                                                    Chloe Moretz</strong></p>
                                                            <p class="small mb-0 view-note">mar. 23 at 17:00 GMT-5</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">

                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0 click-edit">
                                                                    <span class="ion ion-ios-compose-outline"></span>Edit
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion flaticon-boat-anchor"></span>Anchor
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-trash-outline"></span>Delete
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-3">

                                                <!---Note: edit calls activities-->

                                                <div class="note-editor">
                                                    <div class="row px-3">
                                                        <input type="text" placeholder="Contact Name" value="Chloe Moretz" class="form-control text-default border-0 pt-3 col-sm-4 content-input val-edit">
                                                        <input type="number" placeholder="Phone number" value="4582452145" class="form-control text-default border-0 pt-3 col-sm-4 content-input val-edit">
                                                        <div class="col-sm-4">
                                                            <div class="row mt-2 pt-2">
                                                                <div class="col-4 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        Leave voice mail
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">Unanswered</a>
                                                                        <a href="#" class="dropdown-item small text-default">Busy</a>
                                                                        <a href="#" class="dropdown-item small text-default">Wrong
                                                                            number</a>
                                                                        <a href="#" class="dropdown-item small text-default">Leave
                                                                            live message </a>
                                                                        <a href="#" class="dropdown-item small text-default">Leave
                                                                            voice mail</a>
                                                                        <a href="#" class="dropdown-item small text-default">Online</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-4 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-calendar-outline"></span>23
                                                                        - 03 -2018
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">This
                                                                            is suppose to be a calendar</a></div>
                                                                </div>
                                                                <div class="col-4 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-time-outline"></span>17:00
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">0:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:45</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-2">
                                                    <textarea placeholder="Describe the phonecall..." class="form-control border-0 pt-1 text-default content-textarea">This is a call message or note</textarea>
                                                    <div class="px-2 mx-1 my-2 note-options">
                                                        <span class="ion text-default mr-3">T</span>
                                                        <span class="ion ion-link text-default mr-3"></span>
                                                        <span class="ion ion-paperclip text-default mr-2"></span>
                                                    </div>
                                                    <div class="col-12 clearfix mb-3 pt-3 create-buttons border-top">
                                                        <button class="btn btn-primary btn-sm mr-2 button-validate">
                                                            Register Call
                                                        </button>
                                                        <button class="btn btn-outline-primary btn-sm not-edit">
                                                            Discard
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="row px-4 view-note">
                                                    <p class="text-default col-12"><strong>Result of the call:</strong>
                                                        Leave voicemail</p>
                                                    <p class="text-default small col-12"> This is a call message or
                                                        note</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <!-- End tab For view calls-->

                                <!-- Note: This is the tab For view meetings-->

                                <div id="meetings" role="tabpanel" class="tab-pane fade">
                                    <div class="row">

                                        <!--Date-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border"></div>
                                        </div>
                                        <div class="col-11">
                                            <h4 class="font-weight-light text-default mb-3">February 2018</h4>
                                        </div>

                                        <!--Icon for the timeline-->

                                        <div class="col-1 d-flex mx-auto timeline-icon flex-columnn" style="">
                                            <div class="d-flex timeline-border-min timeline-start position-absolute"></div>
                                            <div class="d-flex timeline-border-min"></div>
                                            <div class="d-flex">
                                                <span class="ion ion-ios-people bg-primary text-white p-2 full_rounded text-center mx-auto"></span>
                                            </div>
                                            <div class="d-none timeline-border"></div>
                                        </div>

                                        <!--Note: content meetings activities-->

                                        <div class="mb-4 col-11 activities pl-0 pr-3">
                                            <div class="border-bottom mb-4 mx-3">
                                                <div class="row px-3 mt-3 align-items-center">
                                                    <div class="text-default border-0 col-sm-9">
                                                        <div class="float-left">
                                                            <img class="img-thumbnail rounded-circle m-0 mr-2 activity-img" src="/img/profile.jpg">
                                                        </div>
                                                        <div class="float-left mt-1"><p class="small mb-0">
                                                                <strong>You</strong> had a meeting with <strong>Chloe
                                                                    Moretz</strong></p>
                                                            <p class="small mb-0">mar. 23 at 16:50 GMT-5</p></div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="row">

                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0 click-edit">
                                                                    <span class="ion ion-ios-compose-outline"></span>Edit
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion flaticon-boat-anchor"></span>Anchor
                                                                </button>

                                                            </div>
                                                            <div class="col-4 small text-primary">
                                                                <button class="btn bg-white text-primary btn-sm p-0">
                                                                    <span class="ion ion-ios-trash-outline"></span>Delete
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="mt-3 mb-2">

                                                <!--Note edit meetings activities-->

                                                <div class="note-editor">
                                                    <div class="row px-3">
                                                        <input type="text" placeholder="What is the meeting about?" value="This is the meeting title" class="form-control text-default border-0 pt-3 col-sm-9 content-input val-edit">
                                                        <div class="col-sm-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p class="text-left text-default small my-2">
                                                                        Start Date</p></div>
                                                                <div class="col-6 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-calendar-outline"></span>23
                                                                        / 03 / 2018
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">This
                                                                            is suppose to be a calendar</a></div>
                                                                </div>
                                                                <div class="col-6 small text-primary">
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                        <span class="ion ion-ios-time-outline"></span>7:30
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">0:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">0:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">1:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">2:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">3:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">4:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">5:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">6:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">7:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">8:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">9:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">10:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">11:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">12:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">13:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">14:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">15:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">16:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">17:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">18:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">19:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">20:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">21:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">22:45</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:00</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:15</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:30</a>
                                                                        <a href="#" class="dropdown-item small text-default">23:45</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr class="mt-2">
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <textarea placeholder="Notes..." class="form-control border-0 pt-1 text-default content-textarea">This is an important note about the meeting.</textarea>
                                                            <div class="px-2 mx-1 my-2 note-options">
                                                                <span class="ion text-default mr-3 font-weight-bold">B</span>
                                                                <span class="ion text-default mr-3 font-italic">I</span>
                                                                <span class="ion text-default mr-3"><u>U</u></span>
                                                                <span class="ion flaticon-rubber text-default mr-3"></span>
                                                                <span class="ion ion-paperclip text-default mr-3"></span>
                                                            </div>
                                                            <hr class="mb-2">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p class="text-left text-default small my-2">
                                                                        Duration</p>
                                                                    <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0 mb-3">
                                                                        1 Hour
                                                                    </button>
                                                                    <div class="dropdown-menu">
                                                                        <a href="#" class="dropdown-item small text-default">15
                                                                            minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">30
                                                                            minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">45
                                                                            minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">1
                                                                            Hour</a>
                                                                        <a href="#" class="dropdown-item small text-default">1
                                                                            Hour 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">1
                                                                            Hour 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">1
                                                                            Hour 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">2
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">2
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">2
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">2
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">3
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">3
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">3
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">3
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">4
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">4
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">4
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">4
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">5
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">5
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">5
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">5
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">6
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">6
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">6
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">6
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">7
                                                                            Hours</a>
                                                                        <a href="#" class="dropdown-item small text-default">7
                                                                            Hours 15 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">7
                                                                            Hours 30 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">7
                                                                            Hours 45 minutes</a>
                                                                        <a href="#" class="dropdown-item small text-default">8
                                                                            Hours</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 border-left">
                                                            <p class="text-default small pt-1 mb-2">
                                                                Add an assistant</p>
                                                            <div role="alert" class="alert alert-secondary small col-7 p-1 border-secondary rounded-0 mb-2">
                                                                <img src="../img/lead_profile.jpg" class="rounded-circle m-0 mr-2" style="width: 30px;">
                                                                Chloe Moretz
                                                            </div>
                                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                <span class="ion ion-plus"></span>Add a contact
                                                            </button>
                                                            <p class="text-default small pt-1 mb-2 mt-3">Associated
                                                                with</p>
                                                            <div role="alert" class="alert alert-secondary small col-7 p-1 border-secondary rounded-0 mb-2">

                                                                Kick ass corp
                                                            </div>
                                                            <button data-toggle="dropdown" class="btn bg-white dropdown-toggle text-primary btn-sm p-0">
                                                                <span class="ion ion-plus"></span>Add a business
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 clearfix mb-3 pt-3 border-top d-block">
                                                        <button class="btn btn-primary btn-sm mr-2 button-validate">
                                                            Save
                                                        </button>
                                                        <button class="btn btn-outline-primary btn-sm not-edit">Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="view-note">
                                                    <div class="row px-3">
                                                        <div class="col-9">
                                                            <h6 class="text-primary mt-2">
                                                                <span class="ion ion-ios-checkmark-outline"></span> This
                                                                is the meeting title
                                                            </h6>
                                                        </div>
                                                        <div class="col-3">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <p class="small mb-0">Start time</p>
                                                                </div>
                                                                <div class="col-12">
                                                                    <p class="small mb-0">23/03/2018 at 7:30</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 px-0">
                                                            <hr class="my-2">
                                                        </div>
                                                        <p class="text-default small col-12 border-bottom pb-3 pt-2">
                                                            This is an important note about the meeting.</p>
                                                    </div>
                                                    <div class="row px-4">
                                                        <div class="col-md-6">
                                                            <p class="text-left text-primary small mb-2">Duration</p>
                                                            <p class="text-default small mb-3">1 Hour</p>

                                                        </div>
                                                        <div class="col-md-6 border-left">
                                                            <p class="text-left text-default small mb-2">Assistants</p>
                                                            <div class="alert alert-secondary small col-4 p-1 border-secondary rounded-0 mb-2" role="alert">
                                                                <img src="../img/lead_profile.jpg" class="rounded-circle m-0 mr-2" style="width: 30px;">
                                                                Chloe Moretz
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <!-- End tab For view meetings-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Provitional cdn for sweet alerts cause its gonnab e implemented with vue.js -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--Scripts in jquery that need to be changed into vue.js good luck with that Mauricio (You will need it) -->
    <script>
        $(document).ready(function () {

            //Validate buttons according to content in fields that are required

            $('.note-editor').hover(function () {
                var validation = $(this);
                var fields = $(this).find('.val-edit')

                fields.bind('keyup change', function () {

                    var contador = 0
                    for (var i = 0; i < fields.length; i++) {
                        if ($(fields[i]).val() == '') {
                            contador++
                        }
                    }
                    if (contador > 0) {
                        validation.find('.button-validate').addClass('disabled')
                    }
                    else {
                        validation.find('.button-validate').removeClass('disabled')
                    }
                });
            });

            //actions for create notes

            $("#textarea-note-create").keyup(function () {
                if ($('#textarea-note-create').val() == "") {
                    $('#buttons-note-create').slideUp();
                }
                else {
                    $('#buttons-note-create').slideDown();
                }
            });

            // action for create tasks
            $('.tasks-fusion').keyup(function () {
                if ($('#input-task-create').val() == "" && $('#textarea-task-create').val() == "") {
                    $('#buttons-task-create').slideUp();
                }
                else {
                    $('#buttons-task-create').slideDown();
                }

                if ($('#input-task-create').val() == "" && $('#textarea-task-create').val() != "") {
                    $('#buttons-task-create .btn-primary').addClass('disabled');
                }
                else {
                    $('#buttons-task-create .btn-primary').removeClass('disabled');
                }

            });

            // action for create meeting
            $('.meetings-fusion').keyup(function () {
                if ($('#input-meeting-create').val() == "" && $('#textarea-meeting-create').val() == "") {
                    $('#buttons-meeting-create').slideUp();
                }
                else {
                    $('#buttons-meeting-create').slideDown();
                }

                if ($('#input-meeting-create').val() == "" && $('#textarea-meeting-create').val() != "") {
                    $('#buttons-meeting-create .btn-primary').addClass('disabled');
                }
                else {
                    $('#buttons-meeting-create .btn-primary').removeClass('disabled');
                }
            });

            // action for create email
            $('.emails-fusion').keyup(function () {
                if ($('#input-email-create').val() == "" && $('#textarea-email-create').val() == "") {
                    $('#buttons-email-create').slideUp();
                }
                else {
                    $('#buttons-email-create').slideDown();
                }

                if ($('#input-email-create').val() != "" && $('#textarea-email-create').val() != "") {
                    $('#buttons-email-create .btn-primary').removeClass('disabled');
                }
                else {
                    $('#buttons-email-create .btn-primary').addClass('disabled');
                }
            });

            // action for create call
            $('.calls-fusion').keyup(function () {
                if ($('#input1-call-create').val() == "" && $('#input2-call-create').val() == "" && $('#textarea-call-create').val() == "") {
                    $('#buttons-call-create').slideUp();
                }
                else {
                    $('#buttons-call-create').slideDown();
                }

                if ($('#input1-call-create').val() != "" && $('#input2-call-create').val() != "") {
                    $('#buttons-call-create .btn-primary').removeClass('disabled');
                }
                else {
                    $('#buttons-call-create .btn-primary').addClass('disabled');
                }
            });

            //HERE STARTS DE SCRPITS FOR EDIT ACTIVITIES

            //Edit notes
            var helper = 0;
            $('.click-edit').click(function () {
                helper = $(this);
                $(this).closest('.activities').toggleClass('edit');
                $(this).toggleClass('font-weight-bold');
            });
            $('.not-edit').click(function () {
                $(this).closest('.activities').removeClass('edit');
                helper.removeClass('font-weight-bold');
            });

            //SCRIPTS PARA COLLAPSE INFO

            // arrow animation

            $('.link-collapse').click(function () {
                $(this).find('.arrow-collapse').toggleClass('rotated');
            });

            //STATUS SCRIPTS

            $('#deal-status-new-application').click(function () {

                $('#deal-status-documentation,#deal-status-lender,#deal-status-approved,#deal-status-funded').removeClass('bg-danger border-danger bg-warning border-warning bg-success border-success hovered2 hovered3 hovered4').addClass('bg-light border-light');
                $('#deal-status-new-application').addClass('bg-success border-success').removeClass('bg-danger border-danger bg-warning border-warning hovered2 hovered3 hovered4');
                $("#deal-status-documentation span").text('Documentation complete');
                $("#deal-status-documentation span").text('Documentation complete');
            });
            $('#choose-doc-complete').click(function () {
                $('#deal-status-documentation, #deal-status-new-application').addClass('bg-success border-success').removeClass('bg-light border-light bg-danger border-danger bg-warning border-warning hovered2 hovered3 hovered4');
                $('#deal-status-lender,#deal-status-approved,#deal-status-funded').addClass('bg-light border-light').removeClass('bg-danger border-danger bg-warning border-warning bg-success border-success hovered2 hovered3 hovered4');
                $("#deal-status-documentation span").text('Documentation complete');
                $("#deal-status-lender span").text('Lender approved');
            });
            $('#choose-doc-pending').click(function () {
                $('#deal-status-documentation, #deal-status-new-application').addClass('bg-warning border-warning').removeClass('bg-light border-light bg-success border-success bg-danger border-danger hovered2 hovered3 hovered4');
                $('#lead-status-complete,#deal-status-lender,#deal-status-approved,#deal-status-funded').addClass('bg-light border-light').removeClass('bg-danger  border-danger bg-warning border-warning bg-success border-success hovered2 hovered3 hovered4');
                $("#deal-status-documentation span").text('Documentation pending');
                $("#deal-status-lender span").text('Lender approved');
            });

            $('#choose-l-approved').click(function () {
                $('#deal-status-new-application, #deal-status-documentation, #deal-status-lender').addClass('bg-success border-success').removeClass('bg-light border-light bg-danger border-danger bg-warning border-warning hovered2 hovered3 hovered4');
                $('#deal-status-approved,#deal-status-funded').addClass('bg-light border-light').removeClass('bg-danger border-danger bg-success border-success bg-warning border-warning hovered2 hovered3 hovered4');
                $("#deal-status-documentation span").text('Documentation complete');
                $("#deal-status-lender span").text('Lender approved');
            });
            $('#choose-l-not-approved').click(function () {
                $('#deal-status-new-application, #deal-status-documentation, #deal-status-lender').addClass('bg-danger border-danger').removeClass('bg-light border-light bg-success border-success bg-warning border-warning hovered2 hovered3 hovered4');
                $('#deal-status-approved,#deal-status-funded').addClass('bg-light border-light').removeClass('bg-danger border-danger bg-success border-success bg-warning border-warning hovered2 hovered3 hovered4');
                $("#deal-status-documentation span").text('Documentation complete');
                $("#deal-status-lender span").text('Not approved');
            });
            $('#choose-c-sent').click(function () {
                $('#deal-status-new-application, #deal-status-documentation, #deal-status-lender,#deal-status-approved').addClass('bg-warning border-warning').removeClass('bg-light border-light bg-danger border-danger bg-succes border-success hovered2 hovered3 hovered4');
                $('#deal-status-funded').addClass('bg-light border-light').removeClass('bg-danger border-danger bg-success border-success hovered2 hovered3 hovered4');
                $("#deal-status-documentation span").text('Documentation complete');
                $("#deal-status-approved span").text('Contract sent');
            });
            $('#choose-c-signed').click(function () {
                $('#deal-status-new-application, #deal-status-documentation, #deal-status-lender,#deal-status-approved').addClass('bg-success border-success').removeClass('bg-light border-light bg-danger border-danger bg-warning border-warning hovered2 hovered3 hovered4');
                $('#deal-status-funded').addClass('bg-light border-light').removeClass('bg-danger border-danger bg-success border-success hovered2 hovered3 hovered4');
                $("#deal-status-documentation span").text('Documentation complete');
                $("#deal-status-approved span").text('Contract signed');
            });


            $('#choose-funded').click(function () {
                $('#deal-status-new-application, #deal-status-documentation, #deal-status-lender,#deal-status-approved,#deal-status-funded').addClass('bg-success border-success').removeClass('bg-light border-light bg-danger border-danger bg-warning border-warning  hovered2 hovered3 hovered4');
                $("#deal-status-documentation span").text('Documentation complete');
                $("#deal-status-lender span").text('Lender Approved');
                $("#deal-status-funded span").text('Funded');
            });
            $('#choose-declined').click(function () {
                $('#deal-status-new-application, #deal-status-documentation, #deal-status-lender,#deal-status-approved,#deal-status-funded').addClass('bg-danger border-danger').removeClass('bg-light border-light bg-success border-success bg-warning border-warning  hovered2 hovered3 hovered4');
                $("#deal-status-documentation span").text('Documentation complete');
                $("#deal-status-lender span").text('Lender Approved');
                $("#deal-status-funded span").text('Declined');
            });


            $('#deal-status-lender').hover(function () {
                $('#deal-status-documentation').toggleClass('hovered');
                $('#deal-status-funded.bg-success, #deal-status-approved.bg-success').toggleClass('hovered2');
                $('#deal-status-funded.bg-danger, #deal-status-approved.bg-danger').toggleClass('hovered3');
                $('#deal-status-approved.bg-warning').toggleClass('hovered4');
            });
            $('#deal-status-approved').hover(function () {
                $('#deal-status-documentation, #deal-status-lender').toggleClass('hovered');
                $('#deal-status-funded.bg-success').toggleClass('hovered2');
                $('#deal-status-funded.bg-danger').toggleClass('hovered3');
            });
            $('#deal-status-funded').hover(function () {
                $('#deal-status-documentation, #deal-status-lender, #deal-status-approved').toggleClass('hovered')
            });
            $('#deal-status-documentation').hover(function () {
                $('#deal-status-funded.bg-success, #deal-status-approved.bg-success, #deal-status-lender.bg-success').toggleClass('hovered2');
                $('#deal-status-funded.bg-danger, #deal-status-approved.bg-danger, #deal-status-lender.bg-danger').toggleClass('hovered3');
                $('#deal-status-lender.bg-warning,#deal-status-approved.bg-warning').toggleClass('hovered4');
            });
            $('#deal-status-new-application').hover(function () {
                $('#deal-status-funded.bg-success, #deal-status-approved.bg-success, #deal-status-lender.bg-success, #deal-status-documentation.bg-success').toggleClass('hovered2');
                $('#deal-status-funded.bg-danger, #deal-status-approved.bg-danger, #deal-status-lender.bg-danger, #deal-status-documentation.bg-danger').toggleClass('hovered3');
                $('#deal-status-lender.bg-warning, #deal-status-documentation.bg-warning, #deal-status-approved.bg-warning').toggleClass('hovered4');
            });


            //Edit info scripts

            $('.field').hover(function () {
                $(this).find('.ion-edit').toggleClass('text-secondary');
            });
            $('.field').click(function () {
                $(this).find('textarea, input').attr('readonly', false);
            });

            //Documentation table list scripts


            $('table').click(function () {

                if ($(this).find('input').is(':checked')) {
                    $(this).find('.table-edit').removeClass('d-none');
                    $(this).find('.table-header').addClass('d-none');


                    var lista = '';
                    var tr = $(this).find('tbody tr');
                    tr.each(function () {

                        var cheked = $(this).find('input').is(':checked');
                        if (cheked) {
                            lista += $(this).find('a').text() + '<br>';

                        }
                    });


                    $('.delete-checked-file').click(function () {
                        var span = document.createElement("span");
                        span.innerHTML = lista;
                        swal({
                            html: true,
                            icon: 'warning',
                            title: 'Delete These Files:',
                            content: span,
                            buttons: ["Cancel", "Delete"],
                        });
                    });

                    $('.delete-checked-row').click(function () {
                        swal({
                            html: true,
                            icon: 'warning',
                            title: 'Are you sure?',
                            buttons: ["Cancel", "Delete"],
                        });
                    });
                    $('.edit-checked-file').click(function () {

                        var listaedit = '';
                        tr.each(function () {
                            var cheked = $(this).find('input').is(':checked');
                            if (cheked) {
                                listaedit += '<span class="text-primary">File name: </span> <span class="text-default">' + $(this).find('a').text() + '</span><div class="custom-file my-2">\n' +
                                    '    <input type="file" class="custom-file-input" id="inputGroupFile01">\n' +
                                    '    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>\n' +
                                    '  </div>';

                            }
                        });

                        var span = document.createElement("span");
                        span.innerHTML = listaedit;
                        swal({
                            html: true,
                            icon: 'info',
                            title: 'Replace files:',
                            content: span,
                            buttons: ["Cancel", "Save"],
                        });
                    });
                    $('.rename-checked-file').click(function () {

                        var listarename = '';
                        tr.each(function () {
                            var cheked = $(this).find('input').is(':checked');
                            if (cheked) {
                                listarename += '<span class="text-primary">File name: </span> <span class="text-default">' + $(this).find('a').text() + '</span>' +
                                    '    <input type="text" class="form-control form-control-sm mb-3" placeholder="Rename file" >\n';
                            }
                        });

                        var span = document.createElement("span");
                        span.innerHTML = listarename;
                        swal({
                            html: true,
                            icon: 'info',
                            title: 'Rename files:',
                            content: span,
                            buttons: ["Cancel", "Save"],
                        });
                    });

                }
                else {
                    $(this).find('.table-edit').addClass('d-none');
                    $(this).find('.table-header').removeClass('d-none');
                }

            });

            //Modal validations scripts

            $('.modal-content textarea').keyup(function () {
                if ($(this).val() != "") {
                    $('.save-note').removeClass('disabled');
                }
                else {
                    $('.save-note').addClass('disabled');
                }
            });

            $('.close, .discard').click(function () {

                $('.modal-content textarea').val('');
            });


            // progress circle

            $('#doc-bankstatement-4').click(function () {


                $('#circle').circleProgress({
                    value: 0,
                    fill: {gradient: [['#0681c4', .5], ['#4ac5f8', .5]], gradientAngle: Math.PI / 4}
                }).on('circle-animation-progress', function (event, progress, stepValue) {
                    $(this).find('strong').html(Math.round(100 * (stepValue.toFixed(3))) + '<i>%</i>');

                });

            });

            // INPUT MULTIPLE FILES

            $('#upload-files').change(function () {
                if (this.files.length > 4) {
                    alert('YOU CAN ONLY UPLOAD A MAXIMUM OF 4 FILES');
                }
                var numberfiles = ($('#upload-files').get(0).files.length);

                if (this.files.length > 0 && this.files.length < 5) {
                    $('#circle').circleProgress({
                        value: 0.25 * (numberfiles),
                    })
                }

            });


            //SCROLL TO ESPECIFIC ID

            $("#watch-advances").click(function () {
                $('html, body').animate({
                    scrollTop: $("#advances-table").offset().top
                }, 800);
            });

            //checkbox validators

            $('input [type="checkbox"]').click(function () {
                if ($(this).is(':checked')) {
                    $(this).val('on');
                }
                else {
                    $(this).val('');
                }
            })

            //Doc preview scripts
            var linkprev = 0;

            $('.doc-prev-link').click(function () {
                // Put the folder or directory whre files are gonna be
                linkprev = '/documents/' + $(this).text();

                $('.preview-iframe').attr('src', linkprev);
                $('.download-prev').attr('href', linkprev);
            });

        });
    </script>
@endsection
