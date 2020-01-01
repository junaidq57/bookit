<!-- Parent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_task_id', 'Task Category:') !!}
    {!! Form::select('parent_task_id', $parent_categories, null, [ 'id' => 'parent_task', 'class' => 'form-control select2']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Task Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder'=>'Category title']) !!}
</div>

<!-- Roles Field -->
<div class="form-group col-sm-6">
    {!! Form::label('roles', 'Roles:') !!}
    {!! Form::select('roles[]', $roles, null, ['class' => 'form-control select2', 'id' =>'role']) !!}
</div>

<!-- Earned Point Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('earn_point', 'Point Value:') !!}
    {!! Form::number('earn_point', null, [
    'class' => 'form-control required',
    'step'  => 'any',
     //'id' => 'earn_point',
      'placeholder'=>'Enter Point Value']) !!}
</div>

<!-- Cash Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cash_value', 'Cash Value:') !!}
    {!! Form::number('cash_value', null, [
    'class' => 'form-control required',
    'step'  => 'any',
    'placeholder'=>'Enter Cash Value']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.task-categories.index') !!}" class="btn btn-default">Cancel</a>
</div>