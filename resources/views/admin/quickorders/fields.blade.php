<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control', 'placeholder'=>'Enter user_id']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_username', 'Customer User Name:') !!}
    {!! Form::text('customer_username', null, ['class' => 'form-control', 'placeholder'=>'Enter customer_username']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_email', 'Customer User Email:') !!}
    {!! Form::email('customer_email', null, ['class' => 'form-control', 'placeholder'=>'Enter customer_email']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_firstname', 'Customer First Name:') !!}
    {!! Form::text('customer_firstname', null, ['class' => 'form-control', 'placeholder'=>'Enter customer_firstname']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('customer_lastname', 'Customer Last Name:') !!}
    {!! Form::text('customer_lastname', null, ['class' => 'form-control', 'placeholder'=>'Enter customer_lastname']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipping_amount', 'Shipping Amount:') !!}
    {!! Form::text('shipping_amount', null, ['class' => 'form-control', 'placeholder'=>'Enter shipping_amount']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shipping_description', 'Shipping Description:') !!}
    {!! Form::text('shipping_description', null, ['class' => 'form-control', 'placeholder'=>'Enter shipping_description']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grand_total', 'Grand Total:') !!}
    {!! Form::text('grand_total', null, ['class' => 'form-control', 'placeholder'=>'Enter grand_total']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subtotal', 'Subtotal:') !!}
    {!! Form::text('subtotal', null, ['class' => 'form-control', 'placeholder'=>'Enter subtotal']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control', 'placeholder'=>'Enter longitude']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control', 'placeholder'=>'Enter latitude']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_item_count', 'Total Items:') !!}
    {!! Form::number('total_item_count', null, ['class' => 'form-control', 'placeholder'=>'Enter total_item_count']) !!}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <!-- {!! Form::text('status', null, ['class' => 'form-control', 'placeholder'=>'Enter status']) !!} -->
    {{ Form::select('status', array('10' => 'pending', '20' => 'shipping', '30' => 'completed'),  null, ['class' => 'form-control select2']) }}
</div>

<!-- Destination Current Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination_current_address', 'Destination Current Address:') !!}
    {!! Form::text('destination_current_address', null, ['class' => 'form-control', 'placeholder'=>'Enter destination_current_address']) !!}
</div>

<!-- Destination Other Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('destination_other_address', 'Destination Other Address:') !!}
    {!! Form::text('destination_other_address', null, ['class' => 'form-control', 'placeholder'=>'Enter destination_other_address']) !!}
</div>

<!-- Totals Field -->
<div class="form-group col-sm-6">
    {!! Form::label('totals', 'Totals:') !!}
    {!! Form::text('totals', null, ['class' => 'form-control', 'placeholder'=>'Enter totals']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    @if(!isset($quickorder))
        {!! Form::submit(__('Save And Add Translations'), ['class' => 'btn btn-primary', 'name'=>'translation']) !!}
    @endif
    {!! Form::submit(__('Save And Add More'), ['class' => 'btn btn-primary', 'name'=>'continue']) !!}
    <a href="{!! route('admin.quickorders.index') !!}" class="btn btn-default">Cancel</a>
</div>