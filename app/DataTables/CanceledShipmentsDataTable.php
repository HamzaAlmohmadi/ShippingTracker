<?php

namespace App\DataTables;

use App\Models\CanceledShipment;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CanceledShipmentsDataTable extends DataTable
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
                $statusDetails = $this->getStatusDetails($status); // الحصول على تفاصيل الحالة

                $badgeColor = $this->getStatusColor($status); // الحصول على اللون المناسب للحالة

                return "<span class='badge $badgeColor' title='{$statusDetails['details']}'>{$statusDetails['status']}</span>";
            })
            ->addColumn('canceled_date', function ($query) {
                // عرض تاريخ الإلغاء
                if ($query->updated_at) {
                    return date('d-M-Y', strtotime($query->updated_at));
                } else {
                    return "<span class='text-muted'>غير محدد</span>";
                }
            })
            ->rawColumns(['action', 'status', 'canceled_date'])
            ->setRowId('id');
    }

    /**
     * الحصول على تفاصيل الحالة بناءً على الكود.
     */
    protected function getStatusDetails(string $status): array
    {
        $statuses = [
            'pending' => [
                'status' => 'قيد الانتظار',
                'details' => 'تم استلام طلب الشحنة وجاري التحضير'
            ],
            'received' => [
                'status' => 'تم الاستلام',
                'details' => 'تم استلام الشحنة في مستودع الشركة'
            ],
            'in_transit' => [
                'status' => 'في الطريق',
                'details' => 'الشحنة في طريقها إلى الوجهة التالية'
            ],
            'customs_clearance' => [
                'status' => 'جاري التخليص الجمركي',
                'details' => 'الشحنة قيد التخليص الجمركي'
            ],
            'customs_held' => [
                'status' => 'محتجزة في الجمارك',
                'details' => 'الشحنة محتجزة في الجمارك لمراجعة إضافية'
            ],
            'out_for_delivery' => [
                'status' => 'في الطريق للتوصيل',
                'details' => 'الشحنة في طريقها للتوصيل إلى المستلم'
            ],
            'at_distribution_center' => [
                'status' => 'في مراكز التوزيع',
                'details' => 'الشحنة في مراكز التوزيع'
            ],
            'delivered' => [
                'status' => 'تم التوصيل',
                'details' => 'تم تسليم الشحنة بنجاح'
            ],
            'canceled' => [
                'status' => 'ملغية',
                'details' => 'تم إلغاء الشحنة'
            ]
        ];

        return $statuses[$status] ?? [
            'status' => $status,
            'details' => 'لا توجد تفاصيل متاحة'
        ];
    }

    /**
     * الحصول على اللون المناسب للحالة.
     */
    protected function getStatusColor(string $status): string
    {
        switch ($status) {
            case 'pending':
                return 'bg-warning'; // لون الحالة المعلقة
            case 'received':
                return 'bg-info'; // لون الحالة المستلمة
            case 'in_transit':
                return 'bg-primary'; // لون الحالة قيد النقل
            case 'customs_clearance':
                return 'bg-secondary'; // لون الحالة قيد التخليص الجمركي
            case 'customs_held':
                return 'bg-danger'; // لون الحالة محتجزة في الجمارك
            case 'out_for_delivery':
                return 'bg-success'; // لون الحالة في الطريق للتوصيل
            case 'at_distribution_center':
                return 'bg-secondary'; // لون الحالة في مركز التوزيع
            case 'delivered':
                return 'bg-success'; // لون الحالة المسلمة
            case 'delayed':
                return 'bg-warning'; // لون الحالة المتأخرة
            case 'returned':
                return 'bg-danger'; // لون الحالة المرتجعة
            case 'canceled':
                return 'bg-danger'; // لون الحالة الملغاة
            default:
                return 'bg-secondary'; // لون افتراضي
        }
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Shipment $model): QueryBuilder
    {
        return $model->where('status', 'canceled')->newQuery(); // عرض الشحنات الملغاة فقط
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('canceledshipments-table')
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
            Column::make('date')->title('تاريخ الإنشاء')->addClass('text-center'),
            Column::make('canceled_date')->title('تاريخ الإلغاء')->addClass('text-center'),
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
        return 'CanceledShipments_' . date('YmdHis');
    }
}





