@extends('index.blade.php')

@section('content')
<div class="container bg-white double_rounded align-middle login_a">
     <div class="row pb-5">
         <div class="col-lg-6 mt-lg-5 mt-4">
             <form align="center" class="mt-lg-2 mt-0">
                 <img class="logo mx-auto d-block" src="{{asset('img/logo.png')}}" alt="logo">
                 <div>
                     <label class="float-left text-muted mb-0 ml-3 font-weight-heavy">Username</label>
                     <div class="input-group mb-4">
                         <input  class="form-control input-border" type="email" placeholder="example@softfusion.com" required >
                         <div class="input-group-prepend">
                             <div class="input-group-text text-primary"><i class="os-icon os-icon-user"></i></div>
                         </div>
                     </div>
                 </div>
                 <div>
                     <label class="float-left text-muted mb-0 ml-3 font-weight-heavy">Password</label>
                     <div class="input-group mb-4">
                         <input  class="form-control input-border" type="password" placeholder="●●●●●●●●●●●●" required>
                         <div class="input-group-prepend">
                             <div class="input-group-text text-primary"><i class="os-icon os-icon-lock"></i></div>
                         </div>
                     </div>
                 </div>
                 <div>
                     <label class="float-left text-muted mb-0 ml-3 font-weight-heavy">Confirm password</label>
                     <div class="input-group">
                         <input  class="form-control input-border" type="password" placeholder="●●●●●●●●●●●●" required>
                         <div class="input-group-prepend">
                             <div class="input-group-text text-primary"><i class="os-icon os-icon-lock"></i></div>
                         </div>
                     </div>

                 </div>
                 <button type="submit" class="btn btn-primary btn-lg btn-block full_rounded font-weight-heavy mt-5">Reset Password</button>
             </form>
         </div>
         <div class="col-lg-6 mt-5 tutorials border-left border-light disappear">
             <h2 class="mt-2 text-primary mb-5 text-uppercase">Reset Password</h2>
             <div class="row pt-5">
                 <div class="col-1 p-0"><p class="big_number">1</p></div>
                 <div class="col-11">
                     <h5 class="text-primary font-weight-normal">You just have to..</h5>
                     <p class="color_login_a">Write your email, put a secure password and confirm the password thats it.</p>
                 </div>
             </div>

             <div class="row border-top border-light mt-5 pt-5">
                 <div class="col-12">
                     <h2 class="text-center text-muted mt-5">Need Help?</h2>
                 </div>
                 <div class="col-12">
                     <h2 class="text-center text-primary mt-2 font-weight-normal"><i class="os-icon os-icon-phone"></i> 1-866-257-2973</h2>
                     <p  class="text-center text-primary mt-3"><i class="os-icon os-icon-email-2-at2"></i> info@softfusion.com  | <i class="os-icon os-icon-help-circle"></i> FAQ</p>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="row mx-auto mt-4 appear container">
     <div class="col-12">
         <h2 class="small-title text-center text-white mt-md-5 mt-4">Need Help?</h2>
     </div>
     <div class="col-12">
         <h2 class="small-title text-center text-white mt-2 font-weight-normal"><i class="os-icon os-icon-phone"></i> 1-866-257-2973</h2>
         <p  class="text-center text-white mt-3"><i class="os-icon os-icon-email-2-at2"></i> info@softfusion.com  | <i class="os-icon os-icon-help-circle"></i> FAQ</p>
     </div>
 </div>

@endsection
