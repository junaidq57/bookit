<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<!-- User Field -->
<div class="form-group col-sm-6">
    {!! Form::label('send_to', 'Send To:') !!}
    {!! Form::select('send_to[]', $users, null, ['class' => 'form-control select2', 'id' =>'role']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.contactus.index') !!}" class="btn btn-default">Cancel</a>
</div>
