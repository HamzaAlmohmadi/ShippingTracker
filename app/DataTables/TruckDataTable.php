<?php

namespace App\DataTables;

use App\Models\Truck;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TruckDataTable extends DataTable
{


    // public function dataTable(QueryBuilder $query): EloquentDataTable
    // {
    //     return (new EloquentDataTable($query))
    //         ->addColumn('status', function ($query) {
    //             if ($query->status == 'active') {
    //                 $button = '<label class="custom-switch mt-2">
    //                     <input type="checkbox" checked name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-switch-input change-status" >
    //                     <span class="custom-switch-indicator"></span>
    //                 </label>';
    //             } else {
    //                 $button = '<label class="custom-switch mt-2">
    //                     <input type="checkbox" name="custom-switch-checkbox" data-id="' . $query->id . '" class="custom-switch-input change-status">
    //                     <span class="custom-switch-indicator"></span>
    //                 </label>';
    //             }
    //             return $button;
    //         })
    //         ->addColumn('actions', function ($query) {
                
                
    //             $editBtn = "<a href='".route('trucks.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
    //             $deleteBtn = "<a href='".route('trucks.destroy', $query->id)."' class='btn btn-danger delete-item' ><i class='far fa-trash-alt'></i></a>";
    //             return $editBtn.$deleteBtn;
    //         })
    //         ->rawColumns(['status', 'actions']) // اجعل الأعمدة قابلة لعرض HTML
    //         ->setRowId('id');
    // }

    // public function dataTable(QueryBuilder $query): EloquentDataTable
    // {
    //     return (new EloquentDataTable($query))
    //         ->addColumn('status', function ($query) {
    //             $statusColors = [
    //                 'active' => 'green',
    //                 'inactive' => 'red',
    //                 'maintenance' => 'orange',
    //             ];
                
    //             $statusText = [
    //                 'active' => 'نشط',
    //                 'inactive' => 'غير نشط',
    //                 'maintenance' => 'صيانة',
    //             ];

    //             $color = isset($statusColors[$query->status]) ? $statusColors[$query->status] : 'black';
    //             $text = isset($statusText[$query->status]) ? $statusText[$query->status] : $query->status;

    //             return '<span style="color: ' . $color . ';">' . $text . '</span>';
    //         })
    //         ->addColumn('actions', function ($query) {
    //             $editBtn = "<a href='".route('trucks.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
    //             $deleteBtn = "<a href='".route('trucks.destroy', $query->id)."' class='btn btn-danger delete-item'><i class='far fa-trash-alt'></i></a>";
    //             return $editBtn.$deleteBtn;
    //         })
    //         ->rawColumns(['status', 'actions']) // اجعل الأعمدة قابلة لعرض HTML
    //         ->setRowId('id');
    // }
    
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('status', function ($query) {
                $statusColors = [
                    'active' => 'limegreen',
                    'inactive' => 'red',
                    'maintenance' => 'orange',
                ];
                
                $statusText = [
                    'active' => 'نشط',
                    'inactive' => 'غير نشط',
                    'maintenance' => 'صيانة',
                ];
    
                $color = isset($statusColors[$query->status]) ? $statusColors[$query->status] : 'black';
                $text = isset($statusText[$query->status]) ? $statusText[$query->status] : $query->status;
    
                return '<span style="background-color: ' . $color . '; color: white; padding: 5px; border-radius: 3px;">' . $text . '</span>';
            })
            ->addColumn('actions', function ($query) {
                $editBtn = "<a href='".route('trucks.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('trucks.destroy', $query->id)."' class='btn btn-danger delete-item'><i class='far fa-trash-alt'></i></a>";
                return $editBtn.$deleteBtn;
            })
            ->rawColumns(['status', 'actions']) // اجعل الأعمدة قابلة لعرض HTML
            ->setRowId('id');
    }
    


    public function query(Truck $model): QueryBuilder
    {
        return $model->newQuery();
    }

    


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('truck-table')
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
            Column::make('name')->title('الاسم')->addClass('text-center'),
            Column::make('truck_number')->title('رقم لوحة الشاحنة')->addClass('text-center'),
            Column::make('capacity')->title('سعة الشاحنة')->addClass('text-center'),
            Column::make('status')->title('الحالة')->addClass('text-center'),
            Column::computed('actions')->title('العمليات')->addClass('text-center') 

                ->exportable(false) // لا يتم تصديره
                ->printable(false) // لا يتم طباعته
                ->width(120)
                ->addClass('text-center'),
        ];
    }
    

    protected function filename(): string
    {
        return 'Truck_' . date('YmdHis');
    }


}


// <?php

// namespace App\DataTables;

// use App\Models\Truck;
// use Illuminate\Database\Eloquent\Builder as QueryBuilder;
// use Yajra\DataTables\EloquentDataTable;
// use Yajra\DataTables\Html\Builder as HtmlBuilder;
// use Yajra\DataTables\Html\Button;
// use Yajra\DataTables\Html\Column;
// use Yajra\DataTables\Html\Editor\Editor;
// use Yajra\DataTables\Html\Editor\Fields;
// use Yajra\DataTables\Services\DataTable;

// class TruckDataTable extends DataTable
// {
//     public function dataTable(QueryBuilder $query): EloquentDataTable
//     {
//         return (new EloquentDataTable($query))
//             ->addColumn('status', function ($query) {
//                 $statusColors = [
//                     'active' => 'green',
//                     'inactive' => 'red',
//                     'maintenance' => 'orange',
//                 ];
                
//                 $statusText = [
//                     'active' => 'نشط',
//                     'inactive' => 'غير نشط',
//                     'maintenance' => 'صيانة',
//                 ];

//                 $color = isset($statusColors[$query->status]) ? $statusColors[$query->status] : 'black';
//                 $text = isset($statusText[$query->status]) ? $statusText[$query->status] : $query->status;

//                 return '<span style="color: ' . $color . ';">' . $text . '</span>';
//             })
//             ->addColumn('actions', function ($query) {
//                 $editBtn = "<a href='".route('trucks.edit', $query->id)."' class='btn btn-primary'><i class='far fa-edit'></i></a>";
//                 $deleteBtn = "<a href='".route('trucks.destroy', $query->id)."' class='btn btn-danger delete-item'><i class='far fa-trash-alt'></i></a>";
//                 return $editBtn.$deleteBtn;
//             })
//             ->rawColumns(['status', 'actions']) // اجعل الأعمدة قابلة لعرض HTML
//             ->setRowId('id');
//     }

//     public function query(Truck $model): QueryBuilder
//     {
//         return $model->newQuery();
//     }

//     public function html(): HtmlBuilder
//     {
//         return $this->builder()
//             ->setTableId('truck-table')
//             ->columns($this->getColumns())
//             ->minifiedAjax()
//             ->buttons([
//                 Button::make('excel'),
//                 Button::make('csv'),
//                 Button::make('pdf'),
//                 Button::make('print'),
//                 Button::make('reset'),
//                 Button::make('reload')
//             ]);
//     }

//     public function getColumns(): array
//     {
//         return [
//             Column::make('id')->title('ID'),
//             Column::make('name')->title('الاسم'),
//             Column::make('truck_number')->title('رقم لوحة الشاحنة'),
//             Column::make('capacity')->title('سعة الشاحنة'),
//             Column::make('status')->title('الحالة'),
//             Column::computed('actions') // هذا العمود يتم إضافته ديناميكيًا
//                 ->title('العمليات')
//                 ->exportable(false) // لا يتم تصديره
//                 ->printable(false) // لا يتم طباعته
//                 ->width(120)
//                 ->addClass('text-center'),
//         ];
//     }

//     protected function filename(): string
//     {
//         return 'Truck_' . date('YmdHis');
//     }
// }
