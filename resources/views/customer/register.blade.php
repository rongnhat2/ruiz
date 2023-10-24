@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> register</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb lagin-and-register-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 m-auto">
                    <div class="login-register-wrapper">
                        <!-- login-register-tab-list start -->
                        <div class="login-register-tab-list nav"> 
                            <a class="active" >
                                <h4> register </h4>
                            </a>
                        </div>
                        <!-- login-register-tab-list end -->
                        <div class="tab-content"> 
                            <div  class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <div  >
                                            <div class="login-input-box">
                                                <input type="text" name="user-name" placeholder="User Name">
                                                <input type="password" name="user-password" placeholder="Password">
                                                <input name="user-email" placeholder="Email" type="email">
                                            </div>
                                            <div class="button-box">
                                                <button class="register-btn btn" type="submit"><span>Register</span></button>
                                            </div>
                                            <div class=" mt-3"> 
                                                <label>Have a account ?</label>
                                                <a href="/login"><b>Login now</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection()

@section('sub_layout')

@endsection()


@section('js')

@endsection()
        