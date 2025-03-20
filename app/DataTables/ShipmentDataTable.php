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
            ->addColumn('sender_name', function ($query) {
                // تحويل sender_data من JSON إلى مصفوفة
                $senderData = json_decode($query->sender_data, true);
                return $senderData['name'] ?? 'غير محدد';
            })
            ->addColumn('receiver_name', function ($query) {
                // تحويل receiver_data من JSON إلى مصفوفة
                $receiverData = json_decode($query->receiver_data, true);
                return $receiverData['name'] ?? 'غير محدد';
            })
            ->addColumn('from_city', function ($query) {
                return $query->fromCity ? $query->fromCity->name : 'غير محدد';
            })
            ->addColumn('to_city', function ($query) {
                return $query->toCity ? $query->toCity->name : 'غير محدد';
            })
            ->addColumn('package_type', function ($query) {
                return $query->package_type ?? 'غير محدد';
            })
            ->addColumn('payment_status', function ($query) {
                return $query->payment_status ?? 'غير محدد';
            })
            ->addColumn('actions', function ($query) {
                $editBtn = "<a href='".route('admin.shipment.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('admin.shipment.destroy', $query->id)."' class='btn btn-danger delete-item'><i class='far fa-trash-alt'></i></a>";
                return $editBtn.$deleteBtn;
            })
            ->rawColumns(['sender_name', 'receiver_name', 'from_city', 'to_city', 'package_type', 'payment_status', 'actions'])
            ->setRowId('id');
    }

    public function query(Shipment $model): QueryBuilder
    {
        return $model->newQuery()->with(['driver', 'sender', 'receiver', 'fromCountry', 'fromCity', 'toCountry', 'toCity']);
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('shipment-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('<"d-flex justify-content-between align-items-center mb-3"<"length-container"l><"btn-container"B><"search-container"f>>rtip')
                    // ->orderBy(0)
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
            Column::make('tracking_number')->title('رقم الشحنة')->addClass('text-center'),
            Column::make('status')->title('حالة الشحنة')->addClass('text-center'),
            Column::make('weight')->title('الوزن')->addClass('text-center'),
            Column::make('sender_name')->title('اسم المرسل')->addClass('text-center'),
            Column::make('receiver_name')->title('اسم المستلم')->addClass('text-center'),
            Column::make('from_city')->title('المدينة المرسلة')->addClass('text-center'),
            Column::make('to_city')->title('المدينة المستقبلة')->addClass('text-center'),
            Column::make('package_type')->title('نوع الطرد')->addClass('text-center'),
            Column::make('payment_status')->title('حالة الدفع')->addClass('text-center'),
            Column::computed('actions')->title('العمليات')->addClass('text-center')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Shipment_' . date('YmdHis');
    }




 





}







