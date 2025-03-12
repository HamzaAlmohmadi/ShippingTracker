<!-- Modal -->
<div class="modal fade" id="delete{{ $truck->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">حذف بيانات الشاحنة </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('trucks.destroy',$truck->id) }}" method="post">
                {{ method_field('delete') }}
                @csrf
            <div class="modal-body">
                <input type="hidden" name="id" value="{{ $truck->id }}">
                <h5>هل انت متاكد من حذف بيانات الشاحنة </h5>
            </div>
            <div >
                <button type="submit" class="btn btn-outline-danger m-2" >حذف </button>
                <button type="button" class="btn btn-outline-success m-2" data-dismiss="modal" >تراجع  </button>
            </div>
            </form>
        </div>
    </div>
</div>
