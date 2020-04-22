              <table id="example1" class="table table-bordered table-striped dataTable">
                <thead>
                  <tr>
                    <th >Sl No.</th>
                    <th class="sorting @if($sorting==1){{'sorting_'.$sortingClick}} @endif" sorting="1">Medicine Name</th>
                    <th class="sorting @if($sorting==2){{'sorting_'.$sortingClick}} @endif" sorting="2">Company Name</th>
                    <th class="sorting @if($sorting==3){{'sorting_'.$sortingClick}} @endif" sorting="3">Purcase Price</th>
                    <th class="sorting @if($sorting==4){{'sorting_'.$sortingClick}} @endif" sorting="4">Retail Price</th>
                    <th class="sorting @if($sorting==5){{'sorting_'.$sortingClick}} @endif" sorting="5">Whole Sale Price</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($medicine as $value)
                  <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ $value->medicine_name }}</td>
                    <td>{{ $value->company_name }}</td>
                    <td>{{ $value->purcase_price }}</td>
                    <td>{{ $value->retail_price }}</td>
                    <td>{{ $value->whole_sell_price }}</td>
                    <td>
                      @if($value->medicine_status=='Active')
                      <span style="color: green;">{{ $value->medicine_status }}</span>
                      @else
                      <span style="color: red;">{{ $value->medicine_status }}</span>
                      @endif 
                    </td>
                    <td>
                      <button class="show btn btn-outline-primary btn-xs" data="{{ $value->medicine_id }}"><i class="fa fa-eye"></i></button>
                      <button class="edit btn btn-outline-primary btn-xs" data="{{ $value->medicine_id }}"><i class="fa fa-edit"></i></button>
                      <button class="delete btn btn-outline-danger btn-xs" data="{{ $value->medicine_id }}"><i class="fa fa-trash-alt"></i></button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{$medicine->links()}}