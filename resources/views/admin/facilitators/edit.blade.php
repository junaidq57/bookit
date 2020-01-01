@extends('admin.layouts.app')

@section('title')
    {{ $facilitator->name }} <small>{{ $title }}</small>
@endsection

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($facilitator, ['route' => ['admin.facilitators.update', $facilitator->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.facilitators.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection