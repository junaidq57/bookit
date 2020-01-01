<!-- Subject Field -->
<dt>{!! Form::label('subject', 'Subject:') !!}</dt>
<dd>{!! $contactUs->subject !!}</dd>

<!-- From Field -->
<dt>{!! Form::label('send_from', 'From:') !!}</dt>
<dd>
    @if($contactUs->send_from == $auth_id)
        You
        @else
        {!! $contactUs->userFrom->name !!}
    @endif

</dd>

<!-- To Field -->
<dt>{!! Form::label('send_to', 'To:') !!}</dt>
    @if($contactUs->send_to == 0)
        <dd>All</dd>
        @else
        <dd>{!! $contactUs->user->name !!}</dd>
    @endif

<!-- Message Field -->
<dt>{!! Form::label('message', 'Message:') !!}</dt>
<dd>{!! $contactUs->message !!}</dd>

<!-- Status Field -->
<dt>{!! Form::label('status', 'Status:') !!}</dt>
<dd>
    @if($contactUs->status == 0)
        <span class="label label-warning">Pending</span>
        @else
        <span class="label label-success">Send</span>
    @endif
</dd>

<!-- Created At Field -->
<dt>{!! Form::label('created_at', 'Created At:') !!}</dt>
<dd>{!! $contactUs->created_at !!}</dd>