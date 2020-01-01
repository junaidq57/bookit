@extends('admin.layouts.app')

@section('title')
    {{ $facilitatorTrack->name }} <small>{{ $title }}</small>
@endsection

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($facilitatorTrack, ['route' => ['admin.facilitator-tracks.update', $facilitatorTrack->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.facilitator_tracks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection