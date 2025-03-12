

<div>
    <button class="btn btn-primary pull-right" wire:click="show_form_add" type="button">إضافة شحنة</button><br><br>
    <table class="table" id="shipmentsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>رقم الشحنة</th>
                <th>اسم المرسل</th>
                <th>اسم المستلم</th>
                <th>اسم السائق</th>
                <th>الملاحظات</th>
                <th>الحالة</th>
                <th>العمليات</th>

            </tr>
        </thead>
        <tbody>
            @foreach($shipments as $shipment)
                <tr>
                    <td>{{ $shipment->id }}</td>
                    <td>{{ $shipment->tracking_number }}</td>
                    <td>{{ $shipment->sender->name }}</td>
                    <td>{{ $shipment->receiver->name }}</td>
                    <td>{{ $shipment->Driver->name }}</td>
                    <td>{{ $shipment->notes }}</td>
                    <td>{{ $shipment->status }}</td>

                    <td>
                        {{-- <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-warning">تعديل</a> --}}
                        <button wire:click="edit({{ $shipment->id }})" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                        <button class='btn btn-danger delete-item' data-id="{{ $shipment->id }}">حذف</button>


                    

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>



    <script>
        document.addEventListener('livewire:load', function () {
            $('#shipmentsTable').DataTable();
        });

        window.livewire.on('shipmentUpdated', () => {
            $('#shipmentsTable').DataTable().destroy();
            $('#shipmentsTable').DataTable();
        });
    </script>

    {{-- {{ $shipments->links() }} --}}
</div>






