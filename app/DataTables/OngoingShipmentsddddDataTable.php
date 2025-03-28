<?php

namespace App\DataTables;

use App\Models\OngoingShipment;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OngoingShipmentsDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('sender_name', function ($query) {
                // تحويل sender_data من JSON إلى مصفوفة
                $senderData = json_decode($query->sender_data, true);
                return $senderData['name'] ?? 'غير محدد'; // عرض اسم المرسل
            })
            ->addColumn('receiver_name', function ($query) {
                // تحويل receiver_data من JSON إلى مصفوفة
                $receiverData = json_decode($query->receiver_data, true);
                return $receiverData['name'] ?? 'غير محدد'; // عرض اسم المستلم
            })
            ->addColumn('status', function ($query) {
                return '<span class="badge badge-warning"><i class="fas fa-truck"></i> قيد التوصيل</span>';
            })
            ->addColumn('actions', function ($query) {
                return $showBtn = "<a href='".route('admin.shipment.show', $query->id)."' class='btn btn-primary'><i class='far fa-eye'></i></a>";
            })
            ->rawColumns(['status', 'actions', 'receiver_name', 'sender_name'])
            ->setRowId('id');
    }

    public function query(Shipment $model): QueryBuilder
    {
        return $model->newQuery()
            ->where('status', 'قيد التوصيل') // تصفية الشحنات قيد التوصيل
            ->with(['Sender', 'Receiver']); // تحميل العلاقات
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ongoingShipmentsTable')
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
            Column::make('id')->title('#')->addClass('text-center'),
            Column::make('sender_name')->title('اسم المرسل')->addClass('text-center'),
            Column::make('receiver_name')->title('اسم المستلم')->addClass('text-center'),
            Column::make('tracking_number')->title('رقم الشحنة')->addClass('text-center'),
            Column::computed('status')->title('الحالة')->addClass('text-center'),
            Column::computed('actions')->title('العمليات')->addClass('text-center')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'OngoingShipments_' . date('YmdHis');
    }
}



