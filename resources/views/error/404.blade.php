<!DOCTYPE html>
<html>
<head>
  <title>404 Page Not Found</title>
  @include('layouts.app_css')
</head>
<body>


<style type="text/css">
  
body {
    background: #dedede;
}
.page-wrap {
    min-height: 100vh;
}

</style>


<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead">The page you are looking for was not found.</div>
                <a href="{{url('admin')}}" class="btn btn-link">Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>