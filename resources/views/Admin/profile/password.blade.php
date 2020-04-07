@extends('layouts.app') @section('title') Change Password | Pharmacy @endsection @section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Change Password</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Password</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content ">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6" style="margin: auto;">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>

                    <form id="form" >
                      
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Current Password</label>
                                <input type="password" class="form-control" id="c_password" name="password" placeholder="Current Password">
                                <span class="icon"></span>
                            </div>
                            <div class="form-group">
                                <label for="name">New Password</label>
                                <input type="password" class="form-control" id="n_password" name="password" placeholder="New Password" disabled>
                            </div>
                            <div class="form-group">
                                <label for="name">Confirm Password</label>
                                <input type="password" class="form-control" id="r_password" name="password" placeholder="Confirm Password" disabled>
                                <span class="r-icon"></span>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection @section('script')
<script src="custom_js/password.js"></script>
@endsection