@if ($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-2">
@endif



        @if (session()->has('message'))
            <div class="alert alert-success mt-3">
                {{ session('message') }}
            </div>
        @endif



<div class="col-xs-12">


    <div class="col-md-12">
        <br>

        <h2>بيانات المرسل</h2>
        <div class="row">
            <div class="col-md-6">
                <label for="sender_name" class="form-label">الاسم:</label>
                <input type="text" class="form-control" id="sender_name" wire:model="sender_name" required>
                @error('sender_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="sender_phone" class="form-label">رقم الجوال:</label>
                <input type="text" class="form-control" id="sender_phone" wire:model="sender_phone" required>
                @error('sender_phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mt-3">
                <label for="sender_email" class="form-label">البريد الاكتروني:</label>
                <input type="email" class="form-control" id="sender_email" wire:model="sender_email">
                @error('sender_email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mt-3">
                <label for="sender_address" class="form-label">العنوان:</label>
                <input type="text" class="form-control" id="sender_address" wire:model="sender_address" required>
                @error('sender_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <h2 class="mt-5">بيانات المستلم</h2>
        <div class="row">
            <div class="col-md-6">
                <label for="receiver_name" class="form-label">الاسم:</label>
                <input type="text" class="form-control" id="receiver_name" wire:model="receiver_name" required>
                @error('receiver_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="receiver_phone" class="form-label">رقم الجوال:</label>
                <input type="text" class="form-control" id="receiver_phone" wire:model="receiver_phone" required>
                @error('receiver_phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 mt-3">
                <label for="receiver_address" class="form-label">العنوان:</label>
                <input type="text" class="form-control" id="receiver_address" wire:model="receiver_address" required>
                @error('receiver_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <button class="btn btn-primary mt-4" type="button" wire:click="firstStepSubmit">التالي</button>


    </div>

</div>

</div>
