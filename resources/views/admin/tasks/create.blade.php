@extends('admin.layouts.app')

@push('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{--<link rel="stylesheet" href="/resources/demos/style.css">--}}
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
    $( function() {

        var dateFormat = "mm/dd/yy",
                from = $( "#from" )
                        .datepicker({
                            defaultDate: "+1w",
                            changeMonth: true,
                            numberOfMonths: 1
                        })
                        .on( "change", function() {
                            to.datepicker( "option", "minDate", getDate( this ) );
                        }),
                to = $( "#to" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                        .on( "change", function() {
                            from.datepicker( "option", "maxDate", getDate( this ) );
                        });

        function getDate( element ) {
            var date;
            try {
                date = $.datepicker.parseDate( dateFormat, element.value );
            } catch( error ) {
                date = null;
            }

            return date;
        }
    } );
</script>
@endpush

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.tasks.store', 'files' => true]) !!}

                        @include('admin.tasks.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
