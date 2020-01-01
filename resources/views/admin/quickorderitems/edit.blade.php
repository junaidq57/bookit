@extends('admin.layouts.app')

@section('title')
    {{ $quickorderitem->name }} <small>{{ $title }}</small>
@endsection

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($quickorderitem, ['route' => ['admin.quickorderitems.update', $quickorderitem->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.quickorderitems.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection