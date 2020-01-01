<!-- Facilitator Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('facilitator_id', 'Facilitator Id:') !!}
    {!! Form::text('facilitator_id', null, ['class' => 'form-control', 'placeholder'=>'Enter facilitator_id']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', 'Longitude:') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control', 'placeholder'=>'Enter longitude']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', 'Latitude:') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control', 'placeholder'=>'Enter latitude']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    @if(!isset($facilitatorTrack))
        {!! Form::submit(__('Save And Add Translations'), ['class' => 'btn btn-primary', 'name'=>'translation']) !!}
    @endif
    {!! Form::submit(__('Save And Add More'), ['class' => 'btn btn-primary', 'name'=>'continue']) !!}
    <a href="{!! route('admin.facilitator-tracks.index') !!}" class="btn btn-default">Cancel</a>
</div>