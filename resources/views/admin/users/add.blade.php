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
                    {!! Form::open(['route' => 'admin.users.storeWorker']) !!}

                    {{--<div class="form-group col-sm-6">--}}
                        {{--{!! Form::label('workers', 'Add Workers:') !!}--}}
{{--                        {!! Form::select('roles[]', $workers, $worker2, ['class' => 'form-control select2', 'id' =>'role', 'multiple' =>'multiple']) !!}--}}
                    {{--</div>--}}

                        <!-- Assign Company Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('workers', 'Add Workers:') !!}
                        <select multiple="multiple" name="roles[]" id="role" class="form-control select2">
                            @foreach($workers as $key => $value)
                                <option value="{{$key}}" @if(in_array($value, $worker2))selected="selected"@endif>
                                    {{$value}}
                                </option>
                            @endforeach
                        </select>
                        </div>

                    <input type="hidden" value="<?=$id?>" name="company_id">
                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('admin.users.index') !!}" class="btn btn-default">Cancel</a>
                    </div>
                    {{--@include('admin.users.fields')--}}

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