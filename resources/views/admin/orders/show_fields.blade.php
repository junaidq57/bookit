<!-- Id Field -->
<dt>{!! Form::label('id', 'Id:') !!}</dt>
<dd>{!! $order->id !!}</dd>

<!-- User Id Field -->
<dt>{!! Form::label('user_id', 'User Id:') !!}</dt>
<dd>{!! $order->user_id !!}</dd>

<!-- Destination Current Address Field -->
<dt>{!! Form::label('destination_current_address', 'Destination Current Address:') !!}</dt>
<dd>{!! $order->destination_current_address !!}</dd>

<!-- Destination Other Address Field -->
<dt>{!! Form::label('destination_other_address', 'Destination Other Address:') !!}</dt>
<dd>{!! $order->destination_other_address !!}</dd>

<!-- Created At Field -->
<dt>{!! Form::label('created_at', 'Created At:') !!}</dt>
<dd>{!! $order->created_at !!}</dd>

<!-- Updated At Field -->
<dt>{!! Form::label('updated_at', 'Updated At:') !!}</dt>
<dd>{!! $order->updated_at !!}</dd>

