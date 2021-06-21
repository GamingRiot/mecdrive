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
                            <!-- Sign In Block -->
                            <div class="block block-rounded block-themed mb-0">
                                <div class="block-header bg-primary-dark">
                                    <h3 class="block-title">Sign In</h3>

                                </div>
                                <div class="block-content">
                                    <div class="p-sm-3 px-lg-4 py-lg-5">
                                        <h1 class="h2 mb-1">Admin</h1>
                                        <p class="text-muted">
                                            Welcome, please login.
                                        </p>

                                        <!-- Sign In Form -->
                                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                        <form class="js-validation-signin" method="POST">
                                            @csrf
                                            @include('errors')
                                            <div class="py-3">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-alt form-control-lg"
                                                        id="email" name="email" placeholder="Email">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password"
                                                        class="form-control form-control-alt form-control-lg" id="password"
                                                        name="password" placeholder="Password">
                                                </div>
                                                <div class="form-group">

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 col-xl-5">
                                                    <button type="submit" class="btn btn-block btn-alt-primary">
                                                        <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                                    </button>
                                                </div>
                                            </div>
                                            @if (session()->has('success'))
                                                <div class="alert alert-success mt-3">
                                                    {{ session()->get('success') }}
                                                </div>
                                            @endif
                                        </form>
                                        <!-- END Sign In Form -->
                                    </div>
                                </div>
                            </div>
                            <!-- END Sign In Block -->
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
