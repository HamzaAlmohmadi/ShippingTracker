<?php

namespace App\DataTables;

use App\Models\Driver;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DriverDataTable extends DataTable
{
        public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('truck_name', function ($query) {
                return $query->truck ? $query->truck->name : '';
            })
            ->addColumn('actions', function ($query) {
                $editBtn = "<a href='".route('drivers.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('drivers.destroy', $query->id)."' class='btn btn-danger delete-item'><i class='far fa-trash-alt'></i></a>";
                return $editBtn.$deleteBtn;
            })
            ->rawColumns(['truck_name', 'actions']) 
            ->setRowId('id');      
    }
    
    public function query(Driver $model): QueryBuilder
    {
        return $model->newQuery();
    }
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('driver-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->dom('<"d-flex justify-content-between align-items-center mb-3"<"btn-container"B><"search-container"lf>>rtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
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
            Column::make('name')->title('الاسم')->addClass('text-center'),
            Column::make('license_number')->title('رقم الرخصة')->addClass('text-center'),
            Column::make('phone')->title('رقم الهاتف')->addClass('text-center'),
            Column::make('truck_name')->title('اسم الشاحنة')->addClass('text-center'),
            Column::computed('actions')->title('العمليات')->addClass('text-center')
                ->exportable(false) // لا يتم تصديره
                ->printable(false) // لا يتم طباعته
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Driver_' . date('YmdHis');
    }
}
