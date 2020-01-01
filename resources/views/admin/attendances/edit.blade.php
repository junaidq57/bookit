@extends('admin.layouts.app')

@section('title')
    {{ $attendance->name }} <small>{{ $title }}</small>
@endsection

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($attendance, ['route' => ['admin.attendances.update', $attendance->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.attendances.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection