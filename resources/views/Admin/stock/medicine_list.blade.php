@extends('layouts.app')
@section('title', 'Medicine Stock | Pharmacy')
@section('content')
<!DOCTYPE html>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Medicne Wise Stock</h1>
          </div>
        </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Medicne Wise Stock</h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th>Medicine Name</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($medicine_list as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>
                      <a  href="/medicine_report/{{$value->medicine_code}}" style="font-size: larger;">{{$value->medicine_name}}</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>

@stop