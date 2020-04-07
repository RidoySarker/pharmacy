@extends('layouts.app') @section('title') Profile | Pharmacy @endsection @section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
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
                        <h3 class="card-title">User Profile</h3>
                    </div>

                    <form role="form" method="post" action="{{route('profile.store')}}" enctype="multipart/form-data">
                      @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{Auth::user()->email}}" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Gender</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input gender" type="radio" id="male" name="gender" value="male" {{Auth::user()->gender=='male' ? 'checked' : '' }} required>
                                    <label for="male" class="custom-control-label">Male</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input gender" type="radio" id="female" name="gender" value="female" {{Auth::user()->gender=='female' ? 'checked' : '' }} required>
                                    <label for="female" class="custom-control-label">Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contact">Phone</label>
                                <input type="text" name="contact" class="form-control" id="contact" placeholder="Phone Number" value="{{Auth::user()->contact}}" required="">

                            </div>
                             
                            <div class="form-group">
                                <label>Image</label>
                                <div class="controls">
                                    <img id='previmage' style="height:140px;" src="{{Auth::user()->image==''? '/images/blankavatar.png' : '/'.Auth::user()->image}}" alt="your image" class='img-responsive img-circle'>
                                    <br>
                                    <input type="file" name="image" id="image" onchange="readURL(this);" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                            <input type="hidden" name="old_img" id="old_img" value="{{Auth::user()->image}}">
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div>
</section>
@endsection @section('script')
<script type="text/javascript">
    $("#email").click(function() {
        $("#email").prop("readonly", true);
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previmage')
                    .attr('src', e.target.result)
                    .width(140)
                    .height(140);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    function myFunction() {
        window.print();
    }
</script>
@endsection
