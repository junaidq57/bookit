<?php

namespace App\DataTables\Admin;

use App\Models\ContactUs;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

/**
 * Class ContactUsDataTable
 * @package App\DataTables\Admin
 */
class ContactUsDataTable extends DataTable
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
        $dataTable->addColumn('status', function ($row) {
            if($row->status == 0){
                return '<span class="label label-warning">Pending</span>';
            }else{
                return '<span class="label label-success">Sent</span>';
            }
        });
        $dataTable->addColumn('send_to', function ($row) {
            if($row->send_to == 0){
                return 'All';
            }else{
                return $row->user->name;
            }
        });
        $dataTable->addColumn('send_from', function ($row) {
            if($row->send_from == Auth::id()){
                return 'You';
            }else{
                return $row->userFrom->name;
            }
        });
        $dataTable->rawColumns(['status', 'action']);
        return $dataTable->addColumn('action', 'admin.contactus.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ContactUs $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ContactUs $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        $buttons = [];
        if (\Entrust::can('contactus.create') || \Entrust::hasRole('super-admin')) {
            $buttons = ['create'];
        }
        $buttons = array_merge($buttons, [
//            'export',
            'excel',
            'csv',
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
            'id' => ['visible' => false],
            'subject',
            'send_from' => [
                'searchable' => true,
                'title'      => 'Send From'
            ],
            'send_to'=> [
                'searchable' => true,
                'title'      => 'Send To'
            ],
            'message',
            'status',
            'created_at' => [
                'searchable' => true,
                'title'      => 'Send Date/Time'
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'contactusdatatable_' . time();
    }
}