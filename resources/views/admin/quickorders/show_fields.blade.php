<div class="container">
  <div class="row">
    <div class="col-sm-6">
    	<h2>Order Data :</h2>
    	<!-- Id Field -->

		<dt>{!! Form::label('id', 'Id:') !!}</dt>
		<dd>{!! $quickorder->id !!}</dd>

		<dt>{!! Form::label('status', 'status:') !!}</dt>
		<dd>{!! $status !!}</dd>

		<!-- User Id Field -->
		<dt>{!! Form::label('user_id', 'User Id:') !!}</dt>
		<dd>{!! $quickorder->user_id !!}</dd>

		<!-- Destination Current Address Field -->
		<dt>{!! Form::label('destination_current_address', 'Destination Current Address:') !!}</dt>
		<dd>{!! $quickorder->destination_current_address !!}</dd>

		<!-- Destination Other Address Field -->
		<dt>{!! Form::label('destination_other_address', 'Destination Other Address:') !!}</dt>
		<dd>{!! $quickorder->destination_other_address !!}</dd>

		<!-- Totals Field -->
		<dt>{!! Form::label('totals', 'Totals:') !!}</dt>
		<dd>{!! $quickorder->totals !!}</dd>

		<!-- Created At Field -->
		<dt>{!! Form::label('created_at', 'Created At:') !!}</dt>
		<dd>{!! $quickorder->created_at !!}</dd>

		<!-- Updated At Field -->
		<dt>{!! Form::label('updated_at', 'Updated At:') !!}</dt>
		<dd>{!! $quickorder->updated_at !!}</dd>
    </div>
    <div class="col-sm-6">
    	<h2>Customer Data:</h2>
    	<!-- Id Field -->
		<dt>{!! Form::label('customer_username', 'Username:') !!}</dt>
		<dd>{!! $quickorder->customer_username !!}</dd>

		<!-- User Id Field -->
		<dt>{!! Form::label('customer_email', 'Email:') !!}</dt>
		<dd>{!! $quickorder->customer_email !!}</dd>

		<!-- Destination Current Address Field -->
		<dt>{!! Form::label('customer_firstname', 'First Name:') !!}</dt>
		<dd>{!! $quickorder->customer_firstname !!}</dd>

		<!-- Destination Other Address Field -->
		<dt>{!! Form::label('customer_lastname', 'Last Name:') !!}</dt>
		<dd>{!! $quickorder->customer_lastname !!}</dd>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12">
    	<h2>Shipping:</h2>
    	<!-- Id Field -->
		<dt>{!! Form::label('shipping_amount', 'Shipping amount:') !!}</dt>
		<dd>{!! $quickorder->shipping_amount !!}</dd>

		<!-- User Id Field -->
		<dt>{!! Form::label('shipping_description', 'Shipping Description:') !!}</dt>
		<dd>{!! $quickorder->shipping_description !!}</dd>
    </div>
   </div>
   <div class="row">
    <div class="col-sm-4">
    	<h2>totals:</h2>
    	<!-- Id Field -->
		<dt>{!! Form::label('totals', 'Totals:') !!}</dt>
		<dd>{!! $quickorder->totals !!}</dd>

		<!-- User Id Field -->
		<dt>{!! Form::label('grand_total', 'Grand Total:') !!}</dt>
		<dd>{!! $quickorder->grand_total !!}</dd>

		<!-- User Id Field -->
		<dt>{!! Form::label('subtotal', 'Subtotals:') !!}</dt>
		<dd>{!! $quickorder->subtotal !!}</dd>
    </div>
   </div>
   <div class="row">
   		
   </div>
</div>



