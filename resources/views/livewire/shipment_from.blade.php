@if ($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif


@if (session()->has('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif


<div class="container col-md-12">
    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="from_country_id">الدولة (من)</label>
                <select id="from_country_id" wire:model.change="from_country_id" class="form-control">
                    <option value="">اختر دولة</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('from_country_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="from_city_id">المدينة (من)</label>
                <select id="from_city_id" wire:model="from_city_id" class="form-control">
                    <option value="">اختر مدينة</option>
                    @foreach ($cities_from as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('from_city_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="from_address">العنوان المرسل منه :</label>
                <input type="text" wire:model="from_address" class="form-control" id="from_address">
                @error('from_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

    </div>

    <br><br>

    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="to_country_id">الدولة (إلى)</label>
                <select id="to_country_id" wire:model.change="to_country_id" class="form-control">
                    <option value="">اختر دولة</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                @error('to_country_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>




        <div class="col-md-4">
            <div class="form-group">
                <div>
                    <label for="to_city_id">المدينة (إلى)</label>
                    <select id="to_city_id" wire:model="to_city_id" class="form-control">
                        <option value="">اختر مدينة</option>
                        @foreach ($cities_to as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                @error('to_city_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="to_address">العنوان المستلم فيه</label>
                <input type="text" wire:model="to_address" class="form-control" id="to_address">
                @error('to_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <br><br><br>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>وزن الشحنة تقريبا :</label>
                <input type="number" wire:model="weight" class="form-control" id="weight">
                @error('weight')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>ملاحظات :</label>
                <textarea wire:model="notes" class="form-control" id="notes"></textarea>
                @error('notes')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <br><br>

    <div class="row">
        <div class="col-md-12 text-right">

            <button class="btn btn-danger mt-4" type="button" wire:click="back(1)">السابق </button>

            <button class="btn btn-primary mt-4" type="button" wire:click="secondStepSubmit">التالي </button>

        </div>
    </div>



</div>
