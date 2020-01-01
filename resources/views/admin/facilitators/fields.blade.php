<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control', 'placeholder'=>'Enter user_id']) !!}
</div>

<!-- Is Engaged Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_engaged', 'Is Engaged:') !!}
    {!! Form::text('is_engaged', null, ['class' => 'form-control', 'placeholder'=>'Enter is_engaged']) !!}
</div>

<!-- Available Field -->
<div class="form-group col-sm-6">
    {!! Form::label('available', 'Available:') !!}
    {!! Form::text('available', null, ['class' => 'form-control', 'placeholder'=>'Enter available']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    @if(!isset($facilitator))
        {!! Form::submit(__('Save And Add Translations'), ['class' => 'btn btn-primary', 'name'=>'translation']) !!}
    @endif
    {!! Form::submit(__('Save And Add More'), ['class' => 'btn btn-primary', 'name'=>'continue']) !!}
    <a href="{!! route('admin.facilitators.index') !!}" class="btn btn-default">Cancel</a>
</div>