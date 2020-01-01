<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::text('user_id', null, ['class' => 'form-control', 'placeholder'=>'Enter user_id']) !!}
</div>

<!-- Time In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_in', 'Time In:') !!}
    {!! Form::text('time_in', null, ['class' => 'form-control', 'placeholder'=>'Enter time_in']) !!}
</div>

<!-- Time Out Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time_out', 'Time Out:') !!}
    {!! Form::text('time_out', null, ['class' => 'form-control', 'placeholder'=>'Enter time_out']) !!}
</div>

<!-- Job Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('job_date', 'Job Date:') !!}
    {!! Form::text('job_date', null, ['class' => 'form-control', 'placeholder'=>'Enter job_date']) !!}
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

<!-- Deleted At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    {!! Form::text('deleted_at', null, ['class' => 'form-control', 'placeholder'=>'Enter deleted_at']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    @if(!isset($attendance))
        {!! Form::submit(__('Save And Add Translations'), ['class' => 'btn btn-primary', 'name'=>'translation']) !!}
    @endif
    {!! Form::submit(__('Save And Add More'), ['class' => 'btn btn-primary', 'name'=>'continue']) !!}
    <a href="{!! route('admin.attendances.index') !!}" class="btn btn-default">Cancel</a>
</div>