
<!-- Title Field -->
<dt>{!! Form::label('title', 'Task Title:') !!}</dt>
<dd>{!! $task->taskCategory->title !!}</dd>

<!-- Detail Field -->
<dt>{!! Form::label('detail', 'Detail:') !!}</dt>
<dd>{!! $task->detail !!}</dd>

<!-- Priority Field -->
<dt>{!! Form::label('priority', 'Priority:') !!}</dt>
<dd><label class="label label-{!! $task->priority_css !!}">{!! $task->priority_name !!}</label></dd>

<!-- Status Field -->
<dt>{!! Form::label('priority', 'Status:') !!}</dt>
<dd><label class="label label-{!! $task->status_css !!}">{!! $task->status_name !!}</label></dd>

<!-- Users Field -->
<dt>{!! Form::label('assign_to', 'Assign To:') !!}</dt>
@foreach($users as $user)
<dd><label class="label label-primary">{!! $user !!}</label></dd>
@endforeach

<!-- Start Date Field -->
<dt>{!! Form::label('start_date', 'Task Start From:') !!}</dt>
<dd>{!! $task->start_date !!}</dd>

<!-- End Date Field -->
<dt>{!! Form::label('end_date', 'Task Deadline:') !!}</dt>
<dd>{!! $task->end_date !!}</dd>

<!-- Created At Field -->
<dt>{!! Form::label('created_at', 'Task Created At:') !!}</dt>
<dd>{!! $task->created_at !!}</dd>



