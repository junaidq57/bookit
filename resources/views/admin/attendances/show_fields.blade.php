<!-- User Id Field -->
<dt>{!! Form::label('user', 'Username:') !!}</dt>
<dd>{!! $attendance->user->name !!}</dd>

<!-- Time In Field -->
<dt>{!! Form::label('time_in', 'Clock In:') !!}</dt>
<dd>{!! $attendance->time_in !!}</dd>

<!-- Time Out Field -->
<dt>{!! Form::label('time_out', 'Clock Out:') !!}</dt>
<dd>{!! $attendance->time_out !!}</dd>

<!-- Job Date Field -->
<dt>{!! Form::label('job_date', 'Job Date:') !!}</dt>
<dd>{!! $attendance->job_date !!}</dd>

