<main>
    <div class="row contacts">
        <div class="col invoice-to">
            <div class="text-gray-light">INVOICE TO:</div>
            <h2 class="to">{{Auth::user()->name}}</h2>
            <div class="address">{{Auth::user()->contact}}</div>
            <div class="email"><a href="mailto:{{Auth::user()->email}}">{{Auth::user()->email}}</a></div>
        </div>
        <div class="col invoice-details">
            <h3 class="invoice-id">INVOICE ID</h3>
            <h3 class="invoice-id">{{$invoice_data1->invoice_id}}</h3>
            <div class="date customer_name">Customer Name : {{$invoice_data1->customer_name}} </div>
            <div class="date">Date of Invoice: {{$invoice_data1->date}}</div>
        </div>
    </div>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>#</th>
                <th class="text-center">Medicine Name</th>
                <th class="text-center">Medicine Price</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $sl=1; @endphp 
            @foreach($invoice_data2 as $data) 
            @php $medicine_data=DB::table('medicines')->where('medicine_code',$data->medicine_code)->first(); @endphp
            <tr>
                <td class="unit">{{$sl++}}</td>
                <td class="text-center">{{$medicine_data->medicine_name}}</td>
                <td class="unit">{{$medicine_data->retail_price}}</td>
                <td class="text-center">{{$data->quantity}}</td>
                <td class="unit">{{$data->sub_total}}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"></td>
                <td colspan="2">TOTAL:</td>
                <td>{{$invoice_data1->grand_total}}</td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2">PAYMENT:</td>
                <td>{{$invoice_data1->payment}}</td>

            </tr>
        </tfoot>
    </table>

</main>