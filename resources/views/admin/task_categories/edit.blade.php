@extends('admin.layouts.app')

@section('title')
    {{ $taskCategory->name }} <small>{{ $title }}</small>
@endsection

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($taskCategory, ['route' => ['admin.task-categories.update', $taskCategory->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.task_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
//        var id = $('#parent_task').val();
//        if(id == 1){
//            $('#earn_point').show();
//            $('.required').attr("required", "required");
//        }else{
//            $('#earn_point').hide();
//            $('.required').removeAttr("required");
//        }
//        $('#parent_task').on('change', function(){
//            id = this.value;
////            alert(id);
//            if(id == 2){
//                $('#earn_point').hide();
//                $('.required').removeAttr("required");
//            }else{
//                $('#earn_point').show();
//                $('.required').attr("required", "required");
//            }
//        });
    });
</script>
@endpush