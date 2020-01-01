<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::select('user_id', [], null, ['class' => 'form-control select2']) !!}
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
    @if(!isset($order))
        {!! Form::submit(__('Save And Add Translations'), ['class' => 'btn btn-primary', 'name'=>'translation']) !!}
    @endif
    {!! Form::submit(__('Save And Add More'), ['class' => 'btn btn-primary', 'name'=>'continue']) !!}
    <a href="{!! route('admin.orders.index') !!}" class="btn btn-default">Cancel</a>
</div>