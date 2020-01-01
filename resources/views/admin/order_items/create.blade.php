@extends('admin.layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.order-items.store', 'files' => true]) !!}

                        @include('admin.order_items.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
