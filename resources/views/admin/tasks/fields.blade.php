<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Task Title:') !!}
    {{--{!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Task Title']) !!}--}}
    {!! Form::select('task_id', $tasks, null, ['class' => 'form-control select2']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control', 'placeholder'=>'Start Date', 'id' => 'from']) !!}
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::text('end_date', null, ['class' => 'form-control', 'placeholder'=>'Deadline', 'id' => 'to']) !!}
</div>

<!-- Priority Field -->
<div class="form-group col-sm-6">
    {!! Form::label('priority', 'Priority:') !!}
    {!! Form::select('priority', $priority, null, ['class' => 'form-control select2']) !!}
</div>


<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', $status, null, ['class' => 'form-control select2']) !!}
</div>

<!-- Users Field -->
<div class="form-group col-sm-6">
    {!! Form::label('workers', 'Assign to:') !!}

    @if(empty($task))
        {!! Form::select('roles[]', $workers, null, ['class' => 'form-control select2', 'id' =>'role', 'multiple' =>'multiple']) !!}

    @else
        <select multiple="multiple" name="roles[]" id="role" class="form-control select2">
            @foreach($workers as $key => $value)
                <option value="{{$key}}" @if(in_array($value, $worker2))selected="selected"@endif>
                    {{$value}}
                </option>
            @endforeach
        </select>
    @endif
</div>

<!-- Detail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('detail', 'Detail:') !!}
    {!! Form::textarea('detail', null, ['class' => 'form-control', 'placeholder'=>'Enter complete description about task']) !!}

    {!! Form::hidden('created_by', $user_id) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.tasks.index') !!}" class="btn btn-default">Cancel</a>
</div>