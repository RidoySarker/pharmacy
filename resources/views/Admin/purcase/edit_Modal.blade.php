<style type="text/css">
  .title{
    height: 45px;
    width: 145px;
    text-align: center;
    background-color: #343a40;
    color: white;
    padding: 5px;
    margin-left: 15px;
  }
  .title:hover{
    background-color: white;
    color: black;
  }
</style>
<form id="edit_form" enctype="multipart/form-data" method="post">
  <input type="hidden" name="purcase_id" value="{{ $purcase->purcase_id }}">
  <table class="view">
    <tr>
      <td class="title">Medicine Code</td>
      <td>
        <input type="text" style="height: 50px; width: 350px;" name="medicine_code" class="form-control m_code" value="{{ $purcase->medicine_code }}" readonly>
      </td>
    </tr>
    <tr>
      <td class="title">Quantity</td>
      <td>
        <input type="text" style="height: 50px; width: 350px;" name="quantity" class="form-control qty" value="{{ $purcase->quantity }}" readonly>
      </td>
    </tr>
    <tr>
      <td class="title">Subtotal</td>
      <td>
        <input type="text" style="height: 50px; width: 350px;" name="sub_total" class="form-control subtotal" value="{{ $purcase->sub_total }}" readonly>
      </td>
    </tr>
    <tr>
      <td class="title">Grand Total</td>
      <td>
        <input type="text" style="height: 50px; width: 350px;" name="grand_total" class="form-control grandTotal" value="{{ $purcase->grand_total }}" readonly>
      </td>
    </tr>
    <tr>
      <td class="title">Pay</td>
      <td>
        <input type="text" style="height: 50px; width: 350px;" name="pay" class="form-control pay" value="{{ $purcase->pay }}" readonly>
      </td>
    </tr>
    <tr>
      <td class="title">The Rest</td>
      <td>
        <input type="text" style="height: 50px; width: 350px;" name="rest" class="form-control rest" value="{{ $purcase->rest }}" readonly>
      </td>
    </tr>
    <tr>
      <td class="title">Now Pay</td>
      <td>
        <input type="text" style="height: 50px; width: 350px;" name="now_pay" class="form-control now_pay">
      </td>
    </tr>
  </table>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary submit">Save</button>
    </div>
</form>
