@extends('admin.layouts.app')

@section('title')
    Users
@endsection

@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.users.store', 'files' => true]) !!}

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
        $('#role').on('change', function(){
            var id = this.value;
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