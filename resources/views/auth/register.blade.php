@extends('layouts.simple')

@section('content')
    <!-- Hero -->
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="hero-static">
                <div class="content">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-4">
                            <!-- Sign Up Block -->
                            <div class="block block-rounded block-themed mb-0">
                                <div class="block-header bg-primary-dark">
                                    <h3 class="block-title">Create Account</h3>

                                </div>
                                <div class="block-content">
                                    <div class="p-sm-3 px-lg-4 py-lg-5">
                                        <h1 class="h2 mb-1">Admin</h1>
                                        <p class="text-muted">
                                            Please fill the following details to create a new account.
                                        </p>

                                        <!-- Sign Up Form -->
                                        <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        <form class="js-validation-signup" method="POST">
                                            @csrf
                                            @include('errors')
                                            <div class="py-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-lg form-control-alt"
                                                        id="name" name="name" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email"
                                                        class="form-control form-control-lg form-control-alt" id="email"
                                                        name="email" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-alt" id="password"
                                                        name="password" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password"
                                                        class="form-control form-control-lg form-control-alt"
                                                        id="password_confirmation" name="password_confirmation"
                                                        placeholder="Confirm Password">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-xl-5">
                                                    <button type="submit" class="btn btn-block btn-alt-success">
                                                        <i class="fa fa-fw fa-plus mr-1"></i> Sign Up
                                                    </button>
                                                </div>
                                            </div>


                                        </form>
                                        <!-- END Sign Up Form -->
                                    </div>
                                </div>
                            </div>
                            <!-- END Sign Up Block -->
                        </div>
                    </div>
                </div>

            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Content -->
@endsection
