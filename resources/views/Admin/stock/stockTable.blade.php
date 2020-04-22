              <table id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                  <tr>
                    <th>Sl No.</th>
                    <th class="sorting @if($sorting==1){{'sorting_'.$sortingClick}} @endif" sorting="1">Company Name</th>
                    <th class="sorting @if($sorting==2){{'sorting_'.$sortingClick}} @endif" sorting="2">Medicine Name</th>
                    <th class="sorting_asc">Total Stock</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($medicine_data as $value)
                  @php

                  $stock = collect($stock_data)->where('medicine_code',$value->medicine_code)->where('stock_status', 'Active')->count();
                  @endphp
                  <tr> 
                    <td>{{$sl++}}</td>
                    <td>{{$value->company_name}}</td>
                    <td>{{$value->medicine_name}}</td>
                    <td>
                      @if($stock>10)
                        <span style="color: green">{{$stock}}</span>
                      @else
                         <span style="color: red">{{$stock}}</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                  <td colspan="4" class="text-center" style="font-size: 30px;color: green;">
                        Total Stock : {{$stock_data ? collect($stock_data)->where('stock_status', 'Active')->count('batch_id') :'NOT PURCASE YET'}}
                  </td>
              </table>
              {{$medicine_data->links()}}