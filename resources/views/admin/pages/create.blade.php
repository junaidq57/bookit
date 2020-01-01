@extends('admin.layouts.app')

@section('title')
    Page
@endsection

@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.pages.store', 'files' => true]) !!}

                        @include('admin.pages.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
