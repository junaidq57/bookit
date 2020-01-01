<!-- Order Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('order_id', 'Order Id:') !!}
    {!! Form::text('order_id', null, ['class' => 'form-control', 'placeholder'=>'Enter order_id']) !!}
</div>

<!-- Item Field -->
<div class="form-group col-sm-6">
    {!! Form::label('item', 'Item:') !!}
    {!! Form::text('item', null, ['class' => 'form-control', 'placeholder'=>'Enter item']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Quantity:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control', 'placeholder'=>'Enter quantity']) !!}
</div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control', 'placeholder'=>'Enter category']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    {!! Form::text('created_at', null, ['class' => 'form-control', 'placeholder'=>'Enter created_at']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    {!! Form::text('updated_at', null, ['class' => 'form-control', 'placeholder'=>'Enter updated_at']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    @if(!isset($orderitem))
        {!! Form::submit(__('Save And Add Translations'), ['class' => 'btn btn-primary', 'name'=>'translation']) !!}
    @endif
    {!! Form::submit(__('Save And Add More'), ['class' => 'btn btn-primary', 'name'=>'continue']) !!}
    <a href="{!! route('admin.orderitems.index') !!}" class="btn btn-default">Cancel</a>
</div>