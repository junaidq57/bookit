@extends('admin.layouts.app')
@section('title')
    User: {{ $user->name }}
@endsection
@section('content')
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <dl class="dl-horizontal">
                        @include('admin.users.show_fields')
                    </dl>
                    {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @ability('super-admin' ,'users.show')
                        <a href="{!! route('admin.users.index') !!}" class="btn btn-default">
                            <i class="glyphicon glyphicon-arrow-left"></i> Back
                        </a>
                        @endability
                        @ability('super-admin' ,'users.edit')

                        @if($user->hasRole('Supervisor'))
                            <a title="Worker" href="{{ route('admin.users.add', $user->id) }}" class='btn btn-primary'>
                                <i class="fa fa-address-book"></i> Add Worker(s)
                            </a>
                        @endif
                        <a title="Edit" href="{{ route('admin.users.edit', $user->id) }}" class='btn btn-default'>
                            <i class="glyphicon glyphicon-edit"></i> Edit
                        </a>
                        @endability
                        @ability('super-admin' ,'users.destroy')
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', [
                            'type' => 'submit',
                            'class' => 'btn btn-danger',
                            'onclick' => "confirmDelete($(this).parents('form')[0]); return false;"
                        ]) !!}
                        @endability
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    {{--@if(!empty($user->details->salary) && !empty($user->roles[0]->tax) && !empty($total_perf))--}}
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <dl class="dl-horizontal">
                            <h3>Employee Salary Report <small>Current Month <?php echo date('M Y'); ?></small></h3>
                        </dl>
                        <table class="table table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>Current Salary</th>
                                <td>{{ $user->details->salary }}</td>
                            </tr>
                            <tr>
                                <th>Tax Deduction</th>
                                <td>-{{ $user->roles[0]->tax }}</td>
                            </tr>
                            <tr>
                                <th>Total jobs/month (Duties by Performance)</th>
                                <td>{{ !empty($job_count_perf) ? $job_count_perf:'0' }}</td>
                            </tr>
                            <tr>
                                <th>Total jobs/month (Duties by Conformance)</th>
                                <td>{{ !empty($job_count_conf) ? $job_count_conf:'0' }}</td>
                            </tr>
                            <tr>
                                <th>Earn (Duties by Performance)</th>
                                <td>{{ !empty($total_perf) ? $total_perf:'0' }}</td>
                            </tr>
                            <tr>
                                <th>Earn (Duties by Conformance)</th>
                                <td>{{ !empty($total_conf) ? $total_conf:'0' }}</td>
                            </tr>
                            <tr>
                                <th>Total Amount</th>
                                {{--<td>{{ $user->details->salary - $user->roles[0]->tax + $total_perf + $total_conf }}</td>--}}
                                <td><?php $sum = 0;
                                    if(!empty($user->details->salary)){
                                        $sum+=$user->details->salary;
                                    }
                                    if(!empty($total_perf)){
                                        $sum+=$total_perf;
                                    }
                                    if(!empty($total_conf)){
                                        $sum+=$total_conf;
                                    }
                                    if(!empty($user->roles[0]->tax)){
                                        $sum-=$user->roles[0]->tax;
                                    }
                                    echo $sum;
                                    ?>

{{--                                    echo isset($user->details->salary)?$user->details->salary:0 - isset($user->roles[0]->tax)?$user->roles[0]->tax:0 + isset($total_perf)?$total_perf:0 + isset($total_conf)?$total_conf:0 ?>--}}
                                </td>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--@endif--}}

@if($attendance->count() > 0)
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <dl class="dl-horizontal">
                            <h3>Attendance</h3>
                        </dl>
                        <table class="table table-striped table-hover ">
                            <thead>
                            <tr>
                                <th>Working Date</th>
                                <th>Clock In/Clock Out</th>
                                <th>Working hours</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($attendance as $server => $disks) {
                                print '<tr>';
                                print '<td>'.$server .'</td>';
                                print '<td>';
                                foreach ($disks as $disk => $available_space) {
                                    print '<span style="margin-left: 10px;" class="label label-info">'.$available_space->time_in.'</span>';
                                    print '<span style="margin-left: 10px;" class="label label-danger">'.$available_space->time_out.'</span><br>';
                                }
                                print '</td>';
                                $hour = 0;
                                $min = 0;
                                foreach ($disks as $disk => $available_space) {
                                    $start_date = new DateTime($available_space->time_in);
                                    if(!empty($available_space->time_out)){
                                        $since_start = $start_date->diff(new DateTime($available_space->time_out));
                                        $hour+=$since_start->h;
                                        $min+=$since_start->i;
                                    }
                                }
                                echo '<td>'.$hour.' hours '.$min.' mins</td>';
                                print '<td>';
                                foreach ($disks as $disk => $available_space) {

                                    $clockIn  = strtotime($available_space->time_in);
                                    $clockOut = strtotime($available_space->time_out);
                                    $job_date = $server;
                                    $current_date = date('Y-m-d');
                                    $diff = $clockIn - $clockOut;
                                }
                                if(abs($diff) >= 28800){
                                    echo 'Standard';
                                }else{
                                    echo 'Not Standard';
                                }
                                print '</td>';
                                print '</tr>';
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection