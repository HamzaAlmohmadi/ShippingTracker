
<div>
    <table class="table" id="shipmentsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>حالة الشحنة</th>
                <th>وزن الشحنة</th>
                <th>ملاحظات</th>
                <th>من دولة</th>
                <th>من مدينة</th>
                <th>إلى دولة</th>
                <th>إلى مدينة</th>
                <th>السائق</th>
                <th>المرسل</th>
                <th>المستلم</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($shipments as $shipment)
                <tr>
                    <td>{{ $shipment->id }}</td>
                    <td>{{ $shipment->status }}</td>
                    <td>{{ $shipment->weight }}</td>
                    <td>{{ $shipment->notes }}</td>
                    <td>{{ $shipment->fromCountry->name }}</td>
                    <td>{{ $shipment->fromCity->name }}</td>
                    <td>{{ $shipment->toCountry->name }}</td>
                    <td>{{ $shipment->toCity->name }}</td>
                    <td>{{ $shipment->driver->name }}</td>
                    <td>{{ $shipment->sender->name }}</td>
                    <td>{{ $shipment->receiver->name }}</td>
                    <td>
                        <a href="{{ route('shipments.edit', $shipment->id) }}" class="btn btn-warning">تعديل</a>
                        {{-- <button wire:click="deleteShipment({{ $shipment->id }})" class='btn btn-danger delete-item'>حذف</button>  --}}

                        {{-- <button wire:click="deleteShipment({{ $shipment->id }})" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                            حذف
                        </button> --}}
                        
                        
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

    {{ $shipments->links() }}
</div>