<?php

namespace App\DataTables;

use App\Models\ReceivedShipment;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReceivedShipmentsDataTable extends DataTable
{

        /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $showBtn = "<a href='" . route('admin.shipment.show', $query->id) . "' class='btn btn-primary'><i class='far fa-eye'></i></a>";
                return $showBtn;
            })
            ->addColumn('sender', function ($query) {
                // تحويل sender_data من JSON إلى مصفوفة
                $senderData = json_decode($query->sender_data, true);
                return $senderData['name'] ?? 'غير محدد'; // عرض اسم المرسل
            })
            ->addColumn('receiver', function ($query) {
                // تحويل receiver_data من JSON إلى مصفوفة
                $receiverData = json_decode($query->receiver_data, true);
                return $receiverData['name'] ?? 'غير محدد'; // عرض اسم المستلم
            })
            ->addColumn('date', function ($query) {
                return date('d-M-Y', strtotime($query->created_at)); // تاريخ الإنشاء
            })
            ->addColumn('status', function ($query) {
                $status = $query->status;
                $badgeColor = '';

                switch ($status) {
                    case 'received':
                        $badgeColor = 'bg-success';
                        break;
                    case 'pending':
                        $badgeColor = 'bg-warning';
                        break;
                    case 'canceled':
                        $badgeColor = 'bg-danger';
                        break;
                    default:
                        $badgeColor = 'bg-secondary';
                        break;
                }

                return "<span class='badge $badgeColor'>$status</span>";
            })
            ->rawColumns(['action', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Shipment $model): QueryBuilder
    {
        return $model->newQuery()->where('status', 'received'); // عرض الشحنات المستلمة فقط
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('receivedshipments-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('<"d-flex justify-content-between align-items-center mb-3"<"length-container"l><"btn-container"B><"search-container"f>>rtip')
            ->orderBy(0)
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

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('#')->addClass('text-center'),
            Column::make('tracking_number')->title('رقم التتبع')->addClass('text-center'),
            Column::make('sender')->title('المرسل')->addClass('text-center'),
            Column::make('receiver')->title('المستلم')->addClass('text-center'),
            Column::make('date')->title('تاريخ الاستلام')->addClass('text-center'),
            Column::make('status')->title('الحالة')->addClass('text-center'),
            Column::computed('action')->title('العمليات')->addClass('text-center')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ReceivedShipments_' . date('YmdHis');
    }
}






