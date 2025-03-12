<?php

namespace App\DataTables;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShipmentDataTable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('status', function ($query) {
                $statusColors = [
                    'جديدة' => 'limegreen',
                    'قيد التوصيل' => 'orange',
                    'مكتملة' => 'blue',
                ];
                
                $statusText = [
                    'جديدة' => 'جديدة',
                    'قيد التوصيل' => 'قيد التوصيل',
                    'مكتملة' => 'مكتملة',
                ];

                $color = $statusColors[$query->status] ?? 'black';
                $text = $statusText[$query->status] ?? $query->status;

                return '<span style="background-color: ' . $color . '; color: white; padding: 5px; border-radius: 3px;">' . $text . '</span>';
            })
            ->addColumn('actions', function ($query) {
                $editBtn = "<a href='".route('shipments.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('shipments.destroy', $query->id)."' class='btn btn-danger delete-item'><i class='far fa-trash-alt'></i></a>";
                return $editBtn.$deleteBtn;
            })
            ->rawColumns(['status', 'actions']) // اجعل الأعمدة قابلة لعرض HTML
            ->setRowId('id');
    }

    public function query(Shipment $model): QueryBuilder
    {
        return $model->newQuery();
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('shipment-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"d-flex justify-content-between align-items-center mb-3"<"length-container"l><"btn-container"B><"search-container"f>>rtip')
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')->title('ID')->addClass('text-center'),
            Column::make('status')->title('الحالة')->addClass('text-center'),
            Column::make('driver_id')->title('رقم السائق')->addClass('text-center'),
            Column::make('created_at')->title('تاريخ الإنشاء')->addClass('text-center'),
            Column::computed('actions')->title('العمليات')->addClass('text-center')
                ->exportable(false) // لا يتم تصديره
                ->printable(false) // لا يتم طباعته
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Shipment_' . date('YmdHis');
    }
}




