@extends('admin.layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <dl class="dl-horizontal">
                        @include('admin.quickorders.show_fields')
                    </dl>
                    {!! Form::open(['route' => ['admin.quickorders.destroy', $quickorder->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @ability('super-admin' ,'quickorders.show')
                        <a href="{!! route('admin.quickorders.index') !!}" class="btn btn-default">
                            <i class="glyphicon glyphicon-arrow-left"></i> Back
                        </a>
                        @endability
                    </div>
                    <div class='btn-group'>
                        @ability('super-admin' ,'quickorders.edit')
                        <a href="{{ route('admin.quickorders.edit', $quickorder->id) }}" class='btn btn-default'>
                            <i class="glyphicon glyphicon-edit"></i> Edit
                        </a>
                        @endability
                    </div>
                    <div class='btn-group'>
                        @ability('super-admin' ,'quickorders.destroy')
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', [
                            'type' => 'submit',
                            'class' => 'btn btn-danger',
                            'onclick' => "confirmDelete($(this).parents('form')[0]); return false;"
                        ]) !!}
                        @endability
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="box-body">
                <div class="row" style="padding-left: 20px; padding-right: 20px; ">
                  <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Item</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Category</th>
                          <th scope="col">Price</th>
                          <th scope="col">Description</th>
                          <th scope="col">Items Options</th>
                          <th scope="col">Weight</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($orderItems as $key => $value) { ?>
                            <tr>
                              <th scope="row">{{ $value['id'] }}</th>
                              <td>{{ $value['item'] }}</td>
                              <td>{{ $value['quantity'] }}</td>
                              <td>{{ $value['category'] }}</td>
                              <td><input type="number" step="0.01" required class="price" data-id="{{$value['id']}}" name="price[{{$value['id']}}]" value="{{ $value['price'] }}"/></td>
                              <td>{{ $value['item_description'] }}</td>
                              <td>{{ $value['item_options'] }}</td>
                              <td>{{ $value['weight'] }}</td>
                            </tr>
                        <?php } ?>
                      </tbody>
                  </table>
                  <div class='btn-group'>
                        @ability('dispatcher' ,'quickorders.edit')
                        <button id="calculatetotals" class='btn btn-default'>
                            <i class="glyphicon glyphicon-edit"></i> Calculate Totals
                        </button>
                        <button id="invoice" class='btn btn-default'>
                          <i class="glyphicon glyphicon-edit"></i> Invoice To User
                        </button>
                        @endability
                    </div>
               </div>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <script>
         jQuery(document).ready(function(){
            jQuery('#calculatetotals').click(function(e){
                var itemsTotal= 0;
                var itemsData = new Array();
                $('.price').each(function(index){
                   itemsData[index] = {};
                   itemsData[index]['id'] = $(this).attr('data-id');
                   value = $(this).val();
                   if(!value){
                    alert("Please Fill Items Price before Calculating!!!");
                    return false;
                   }
                   itemsData[index]['price'] = $(this).val();
                   itemsTotal += parseFloat($(this).val()) ;
                });


               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/admin/quickorders/itemstotal') }}",
                  method: 'post',
                  dataType: 'JSON',
                  data: {
                     items: itemsData,
                     totals : itemsTotal,
                     order_id : "{{$orderItems[0]['order_id']}}"
                  },
                  success: function(result){
                    console.log(result);
                     location.reload();
                  }});
               });
            jQuery('#invoice').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ url('/admin/quickorders/invoice') }}",
                  method: 'post',
                  dataType: 'JSON',
                  data: {
                     order_id : "{{$orderItems[0]['order_id']}}",
                     status : ""
                  },
                  success: function(result){
                    console.log(result);
                     location.reload();
                  }});
               });
            });
      </script>
@endsection