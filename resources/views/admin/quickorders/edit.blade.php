@extends('admin.layouts.app')

@section('title')
    {{ $quickorder->name }} <small>{{ $title }}</small>
@endsection

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($quickorder, ['route' => ['admin.quickorders.update', $quickorder->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.quickorders.fields')

                   {!! Form::close() !!}
               </div>
               <div class="row">
                  @include('admin.quickorderitems.table')
               </div>
           </div>
       </div>
   </div>
@endsection