<?php

namespace App\DataTables\Admin;

use App\Models\Quickorder;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

/**
 * Class QuickorderDataTable
 * @package App\DataTables\Admin
 */
class QuickorderDataTable extends DataTable
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


        $dataTable->addColumn('user_name', function ($user) {
            return $user->user->name;
        });

        $dataTable->rawColumns(['user_name','action']);

        return $dataTable->addColumn('action', 'admin.quickorders.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Quickorder $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Quickorder $model)
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
        if (\Entrust::can('quickorders.create') || \Entrust::hasRole('super-admin')) {
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
            'id',
            'user_id',
            'user_name' => [
                'title' => 'User Name'
            ],
            'customer_username',
            'customer_email',
            'customer_firstname',
            'customer_lastname',
            'total_item_count',
            'status',
            'shipping_amount',
            'shipping_description',
            'grand_total',
            'subtotal',
            'destination_current_address',
            'destination_other_address',
            'totals'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'quickordersdatatable_' . time();
    }
}