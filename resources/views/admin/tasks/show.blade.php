@extends('admin.layouts.app')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <dl class="dl-horizontal">
                        @include('admin.tasks.show_fields')
                    </dl>
                    {!! Form::open(['route' => ['admin.tasks.destroy', $task->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @ability('super-admin' ,'tasks.show')
                        <a href="{!! route('admin.tasks.index') !!}" class="btn btn-default">
                            <i class="glyphicon glyphicon-arrow-left"></i> Back
                        </a>
                        @endability
                    </div>
                    <?php $uid = \Illuminate\Support\Facades\Auth::id();
                    use App\Models\User;
                    $userData = User::withRole('Worker')->where('id', $uid)->pluck('name', 'id')->first(); ?>

                    @if(!empty($userData))
                        @if($commentCount > 0)

                        @else
                            <div class='btn-group'>
                                <?php echo Form::button('<i class="glyphicon glyphicon-qrcode" aria-hidden="true"></i> Mark Complete', [
                                        'type' => 'button',
                                        'title' => 'Mark Complete',
                                        'id' => 'get_id',
                                        'class' => 'btn btn-primary',
                                        'data-value' => 1,
                                        'data-toggle' => 'modal',
                                        'data-target' => '#quoteModal'
                                ]); ?>

                            </div>
                        @endif
                    @endif

                    <div class='btn-group'>
                        @ability('super-admin' ,'tasks.edit')
                        <a href="{{ route('admin.tasks.edit', $task->id) }}" class='btn btn-default'>
                            <i class="glyphicon glyphicon-edit"></i> Edit
                        </a>
                        @endability
                    </div>
                    <div class='btn-group'>
                        @ability('super-admin' ,'tasks.destroy')
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

@if(!empty($task->taskComment))
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <dl class="dl-horizontal">
                        <h3>User Review</h3>
                    </dl>
                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Carried Out</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th>Earned points/Rating</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $task->taskComment->user->name }}</td>
                            <td>{{ $task->taskComment->carried_name }}</td>
                            <td>{{ $task->taskComment->quantity }}</td>
                            <td>{{ $task->taskComment->comment }}</td>
                            @if($task->taskCategory->ParentTask->id == 1)
                                <td>{{ $task->taskCategory->earn_point * $task->taskComment->quantity }}</td>
                            @else
                                <td>
                                    <button id="get_comment_id" data-value="{{ $task->taskComment->id }}" type="button" class="btn btn-success btn-xs" title="Give Rating" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </button>
                                </td>
                            @endif
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection

    <!-- Rate Complete Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="color: #0A0A0A">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Give Rating</h4>
                </div>
                <?php echo Form::open(['route' => 'admin.tasks.taskComplete','files' => true]); ?>

                <div class="modal-body">
                    <div class="form-group col-sm-6">
                        <?php echo Form::label('rating', 'Rating*:'); ?>
                            <select name="rating" id="rating" class="form-control">
                                <option value="1">1</option>
                                <option value="1.5">1.5</option>
                                <option value="2">2</option>
                                <option value="2.5">2.5</option>
                                <option value="3">3</option>
                                <option value="3.5">3.5</option>
                                <option value="4">4</option>
                                <option value="4.5">4.5</option>
                                <option value="5">5</option>
                            </select>
                    </div>
                    <input type="hidden" value="" name="comment_id" id="comment_id">
                </div>
                <div class="clearfix"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" value="Submit" class="btn btn-primary" name="submit">
                </div>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    <!-- End Quote Modal -->

    <!-- Mark Complete Modal -->
    <div class="modal fade" id="quoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true" style="color: #0A0A0A">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Task Complete</h4>
                </div>
                <?php echo Form::open(['route' => 'admin.tasks.taskComplete','files' => true]); ?>

                <div class="modal-body">
                    <!-- Carried Out Field -->
                    <div class="form-group col-sm-6">
                        <?php echo Form::label('carried', 'Carried Out*:'); ?>
                        <?php echo Form::select('carried_out', ['10' => 'Yes', '20' => 'No'], null ,['class' => 'form-control', 'required']); ?>
                    </div>

                    <!-- Message Field -->
                    <div class="form-group col-sm-6">
                        <?php echo Form::label('quantity', 'Quantity:'); ?>
                        <?php echo Form::number('quantity', null, ['class' => 'form-control', 'placeholder' => 'Enter quantity', 'min' => '1']); ?>
                    </div>

                    <!-- Upload File Field -->
                    <div class="form-group col-sm-6">
                        <?php echo Form::label('upload', 'Upload*:'); ?>
                            <input type="file" name="images[]" class="form-control" accept="image/x-png,image/gif,image/jpeg" multiple required>
                    </div>

                    <!-- Comment Field -->
                    <div class="form-group col-sm-6">
                        <?php echo Form::label('comment', 'Comment:'); ?>
                        <?php echo Form::textarea('comment', null, ['class' => 'form-control', 'placeholder' => 'Comment','required']); ?>
                    </div>
                    <?php $user = \Illuminate\Support\Facades\Auth::id(); ?>
                    <input type="hidden" name="user_id" value="{{$user}}">
                    <input type="hidden" name="task_id" value="{{ collect(request()->segments())->last() }}">
                    <div class="clearfix"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" value="Complete" class="btn btn-info" name="submit">
                </div>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
    <!-- End Quote Modal -->
