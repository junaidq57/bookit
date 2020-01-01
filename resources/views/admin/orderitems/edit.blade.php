@extends('admin.layouts.app')

@section('title')
    {{ $orderitem->name }} <small>{{ $title }}</small>
@endsection

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orderitem, ['route' => ['admin.orderitems.update', $orderitem->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.orderitems.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection