<!-- Parent Task Id Field -->
<dt>{!! Form::label('parent_task', 'Parent Task:') !!}</dt>
<dd>{!! $taskCategory->ParentTask->title !!}</dd>

<!-- Title Field -->
<dt>{!! Form::label('title', 'Title:') !!}</dt>
<dd>{!! $taskCategory->title !!}</dd>

<!-- Role Field -->
{{--<dt>{!! Form::label('roles', 'Applied for Role:') !!}</dt>--}}
{{--<dd>{!! $taskCategory->userRoles->name !!}</dd>--}}

@if(!empty($taskCategory->earn_point))
        <!-- Earn Point Field -->
<dt>{!! Form::label('earn_point', 'Point Value:') !!}</dt>
<dd>{!! $taskCategory->earn_point !!}</dd>
@endif

@if(!empty($taskCategory->cash_value))
        <!-- Earn Point Field -->
<dt>{!! Form::label('cash_value', 'Cash Value:') !!}</dt>
<dd>{!! $taskCategory->cash_value !!}</dd>
@endif
