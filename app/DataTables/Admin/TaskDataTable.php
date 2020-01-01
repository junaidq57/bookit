<?php

namespace App\DataTables\Admin;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

/**
 * Class TaskDataTable
 * @package App\DataTables\Admin
 */
class TaskDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        $dataTable->addColumn('task_id', function ($task) {
            return $task->taskCategory->title;
        });
        $dataTable->addColumn('priority', function ($task) {
            return '<span class="label label-'.$task->priority_css.'">'.$task->priority_name.'</span>';
        });
        $dataTable->addColumn('status', function ($task) {
            return '<span class="label label-'.$task->status_css.'">'.$task->status_name.'</span>';
        });
        $dataTable->rawColumns(['task_id','priority', 'status', 'action']);
        return $dataTable->addColumn('action', 'admin.tasks.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Task $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Task $model)
    {
        $user = Auth::user();
        if ($user->hasRole('manager')) {
            $model = $model->whereIn('created_by', $user->id);
        }

        if ($user->hasRole('Worker')) {
            $model = $model->whereHas('user2', function ($row) use ($user) {
                return $row->where('user_id', $user->id);
            });

//            $model = $model->whereIn('created_by', $user->id);
        }

        return $model->newQuery()->orderBy('updated_at', SORT_DESC);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $buttons = [];
        if (\Entrust::can('tasks.create') || \Entrust::hasRole('super-admin')) {
            $buttons = ['create'];
        }
        $buttons = array_merge($buttons, [
            'export',
            'print',
            'reset',
            'reload',
        ]);
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '80px', 'printable' => false])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'buttons' => $buttons,
                "scrollX" => true,
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'task_id' => [
                'title' => 'Task'
            ],
            'priority',
            'start_date',
            'end_date',
            'status'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tasksdatatable_' . time();
    }
}