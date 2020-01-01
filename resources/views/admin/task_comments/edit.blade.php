@extends('admin.layouts.app')

@section('title')
    {{ $taskComment->name }} <small>{{ $title }}</small>
@endsection

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($taskComment, ['route' => ['admin.task-comments.update', $taskComment->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.task_comments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection