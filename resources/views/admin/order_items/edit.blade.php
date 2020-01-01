@extends('admin.layouts.app')

@section('title')
    {{ $orderItem->name }} <small>{{ $title }}</small>
@endsection

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($orderItem, ['route' => ['admin.order-items.update', $orderItem->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.order_items.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection