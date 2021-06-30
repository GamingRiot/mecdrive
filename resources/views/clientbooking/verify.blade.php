@extends('layouts.preBookbackend')

@section('content')
    <!-- Hero -->
    <div class="form-prebooking">
        <div class="content content-full">
            <form class="mb-5" method="POST">
                @csrf
                @include('errors')
                <div class="form-group">
                    <label class="label-prebooking"for="code">Enter the code</label>
                    <input type="number" class="form-control form-prebooking" id="code" name="code" placeholder="Your code">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-prebooking">Verify number</button>
                </div>
            </form>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->

    <!-- END Page Content -->
@endsection
