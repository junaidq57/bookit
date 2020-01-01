@extends('admin.layouts.app')

@section('title')
    {{ $user->name }}
    <small>Edit</small>
@endsection

@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">

                    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'patch', 'files' => true]) !!}
                    @include('admin.users.fields')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){

        var id = $('#role').val();
        if(id == 4){
            $('#company').show();
            $('.required').attr("required", "required");
        }
        $('#role').on('change', function(){
            id = this.value;
            if(id == 4){
                $('#company').show();
                $('.required').attr("required", "required");
            }else{
                $('#company').hide();
                $('.required').removeAttr("required");
            }
        });
    });
</script>
@endpush