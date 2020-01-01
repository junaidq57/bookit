<?php

namespace App\DataTables\Admin;

use App\Models\TaskComment;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

/**
 * Class TaskCommentDataTable
 * @package App\DataTables\Admin
 */
class TaskCommentDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'admin.task_comments.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\TaskComment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(TaskComment $model)
    {
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
        if (\Entrust::can('task-comments.create') || \Entrust::hasRole('super-admin')) {
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
            'task_id',
            'user_id',
            'carried_out',
            'quantity',
            'comment'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'task_commentsdatatable_' . time();
    }
}