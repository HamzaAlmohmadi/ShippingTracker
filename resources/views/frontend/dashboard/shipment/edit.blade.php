{{-- 
@php
    // فك تشفير receiver_location مع التحقق من صحة البيانات
    $receiverLocation = [];
    if (is_string($shipment->receiver_location)) {
        $receiverLocation = json_decode($shipment->receiver_location, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $receiverLocation = [
                'district' => '',
                'street' => '',
                'building' => '',
                'floor' => '',
                'additional_info' => '',
            ];
        }
    } else {
        $receiverLocation = [
            'district' => '',
            'street' => '',
            'building' => '',
            'floor' => '',
            'additional_info' => '',
        ];
    }

    // فك تشفير current_location مع التحقق من صحة البيانات
    $currentLocation = [];
    if (is_string($shipment->current_location)) {
        $currentLocation = json_decode($shipment->current_location, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $currentLocation = [
                'district' => '',
                'street' => '',
                'building' => '',
                'floor' => '',
                'additional_info' => '',
            ];
        }
    } else {
        $currentLocation = [
            'district' => '',
            'street' => '',
            'building' => '',
            'floor' => '',
            'additional_info' => '',
        ];
    }

    // فك تشفير dimensions مع التحقق من صحة البيانات
    $dimensions = [];
    if (is_string($shipment->dimensions)) {
        $dimensions = json_decode($shipment->dimensions, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $dimensions = [
                'length' => 0,
                'width' => 0,
                'price' => 0,
            ];
        }
    } else {
        // إذا كانت dimensions مصفوفة بالفعل، استخدمها مباشرة
        $dimensions = $shipment->dimensions;
    }
@endphp

@extends('admin.layouts.master')

@push('css')
    <style>
        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .stepwizard-step {
            text-align: center;
        }

        .btn-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 16px;
            line-height: 40px;
            padding: 0;
        }

        .setup-content {
            display: none;
        }

        .setup-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px;
        }

        .form-row .col-md-6 {
            padding-right: 5px;
            padding-left: 5px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .hidden {
            display: none;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-circle btn-success">1</a>
                    <p>معلومات المرسل والمستلم</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-circle btn-default">2</a>
                    <p>معلومات الشحنة</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-circle btn-default">3</a>
                    <p>تأكيد المعلومات</p>
                </div>
            </div>
        </div>

        <!-- Step 1: معلومات المرسل والمستلم -->
        <div class="row setup-content active" id="step-1">
            <div class="col-md-12">
                <h3>معلومات المرسل والمستلم</h3>
                <form id="form-step-1">
                    <!-- معلومات المرسل -->
                    <div class="section-title">معلومات المرسل</div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sender_name">الاسم</label>
                                <input type="text" class="form-control" id="sender_name" name="sender_name" required
                                    value="{{ $shipment->sender->name }}">
                                <div class="error-message" id="sender_name_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="sender_phone">الهاتف</label>
                                <input type="text" class="form-control" id="sender_phone" name="sender_phone" required
                                    value="{{ $shipment->sender->phone }}">
                                <div class="error-message" id="sender_phone_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="sender_email">البريد الإلكتروني</label>
                                <input type="email" class="form-control" id="sender_email" name="sender_email"
                                    value="{{ $shipment->sender->email }}">
                                <div class="error-message" id="sender_email_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sender_district">الحي</label>
                                <input type="text" class="form-control" id="sender_district" name="sender_district"
                                    required value="{{ $currentLocation['district'] ?? '' }}">
                                <div class="error-message" id="sender_district_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="sender_street">الشارع</label>
                                <input type="text" class="form-control" id="sender_street" name="sender_street" required
                                    value="{{ $currentLocation['street'] ?? '' }}">
                                <div class="error-message" id="sender_street_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="sender_building">المبنى</label>
                                <input type="text" class="form-control" id="sender_building" name="sender_building"
                                    required value="{{ $currentLocation['building'] ?? '' }}">
                                <div class="error-message" id="sender_building_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sender_floor">الطابق</label>
                                <input type="text" class="form-control" id="sender_floor" name="sender_floor"
                                    value="{{ $currentLocation['floor'] ?? '' }}">
                                <div class="error-message" id="sender_floor_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="sender_additional_info">معلومات إضافية</label>
                                <input type="text" class="form-control" id="sender_additional_info"
                                    name="sender_additional_info" value="{{ $currentLocation['additional_info'] ?? '' }}">
                                <div class="error-message" id="sender_additional_info_error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- معلومات المستلم -->
                    <div class="section-title">معلومات المستلم</div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver_name">الاسم</label>
                                <input type="text" class="form-control" id="receiver_name" name="receiver_name"
                                    required value="{{ $shipment->receiver->name }}">
                                <div class="error-message" id="receiver_name_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="receiver_phone">الهاتف</label>
                                <input type="text" class="form-control" id="receiver_phone" name="receiver_phone"
                                    required value="{{ $shipment->receiver->phone }}">
                                <div class="error-message" id="receiver_phone_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver_district">الحي</label>
                                <input type="text" class="form-control" id="receiver_district"
                                    name="receiver_district" required value="{{ $receiverLocation['district'] ?? '' }}">
                                <div class="error-message" id="receiver_district_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="receiver_street">الشارع</label>
                                <input type="text" class="form-control" id="receiver_street" name="receiver_street"
                                    required value="{{ $receiverLocation['street'] ?? '' }}">
                                <div class="error-message" id="receiver_street_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver_building">المبنى</label>
                                <input type="text" class="form-control" id="receiver_building"
                                    name="receiver_building" required value="{{ $receiverLocation['building'] ?? '' }}">
                                <div class="error-message" id="receiver_building_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="receiver_floor">الطابق</label>
                                <input type="text" class="form-control" id="receiver_floor" name="receiver_floor"
                                    value="{{ $receiverLocation['floor'] ?? '' }}">
                                <div class="error-message" id="receiver_floor_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver_additional_info">معلومات إضافية</label>
                                <input type="text" class="form-control" id="receiver_additional_info"
                                    name="receiver_additional_info"
                                    value="{{ $receiverLocation['additional_info'] ?? '' }}">
                                <div class="error-message" id="receiver_additional_info_error"></div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary nextBtn" data-next="step-2"
                        onclick="validateStep1()">التالي</button>
                </form>
            </div>
        </div>

        <!-- Step 2: معلومات الشحنة -->
        <div class="row setup-content" id="step-2">
            <div class="col-md-12">
                <h3>معلومات الشحنة</h3>
                <form id="form-step-2">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_country_id">البلد المرسل</label>
                                <select class="form-control" id="from_country_id" name="from_country_id" required>
                                    <option value="">اختر البلد</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $shipment->from_country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="error-message" id="from_country_id_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="from_city_id">المدينة المرسلة</label>
                                <select class="form-control" id="from_city_id" name="from_city_id" required>
                                    <option value="">اختر المدينة</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ $shipment->from_city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="error-message" id="from_city_id_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="to_country_id">البلد المستقبل</label>
                                <select class="form-control" id="to_country_id" name="to_country_id" required>
                                    <option value="">اختر البلد</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $shipment->to_country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="error-message" id="to_country_id_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="to_city_id">المدينة المستقبلة</label>
                                <select class="form-control" id="to_city_id" name="to_city_id" required>
                                    <option value="">اختر المدينة</option>
                                    @foreach ($toCities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ $shipment->to_city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="error-message" id="to_city_id_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="package_type">نوع الطرد</label>
                                <select class="form-control" id="package_type" name="package_type"
                                    onchange="togglePackageFields()">
                                    <option value="">اختر نوع الطرد</option>
                                    <option value="صندوق" {{ $shipment->package_type == 'صندوق' ? 'selected' : '' }}>
                                        صندوق</option>
                                    <option value="ظرف" {{ $shipment->package_type == 'ظرف' ? 'selected' : '' }}>ظرف
                                    </option>
                                </select>
                                <div class="error-message" id="package_type_error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- حقول الصندوق -->
                    <div id="box_fields" class="{{ $shipment->package_type == 'صندوق' ? '' : 'hidden' }}">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="length">الطول (متر)</label>
                                    <input type="number" class="form-control" id="length" name="length"
                                        oninput="calculatePrice()" value="{{ $dimensions['length'] ?? 0 }}">
                                    <div class="error-message" id="length_error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="width">العرض (متر)</label>
                                    <input type="number" class="form-control" id="width" name="width"
                                        oninput="calculatePrice()" value="{{ $dimensions['width'] ?? 0 }}">
                                    <div class="error-message" id="width_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">السعر التلقائي (ريال)</label>
                                    <input type="number" class="form-control" id="price" name="price" readonly
                                        value="{{ $dimensions['price'] ?? 0 }}">
                                    <div class="error-message" id="price_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- حقول الظرف -->
                    <div id="envelope_fields" class="{{ $shipment->package_type == 'ظرف' ? '' : 'hidden' }}">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="weight">الوزن (كجم)</label>
                                    <input type="number" class="form-control" id="weight" name="weight"
                                        oninput="calculateEnvelopePrice()" value="{{ $dimensions['weight'] ?? 0 }}">
                                    <div class="error-message" id="weight_error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thickness">السُمك (مم)</label>
                                    <input type="number" class="form-control" id="thickness" name="thickness"
                                        oninput="calculateEnvelopePrice()" value="{{ $dimensions['thickness'] ?? 0 }}">
                                    <div class="error-message" id="thickness_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">السعر التلقائي (ريال)</label>
                                    <input type="number" class="form-control" id="price" name="price" readonly
                                        value="{{ $dimensions['price'] ?? 0 }}">
                                    <div class="error-message" id="price_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- باقي الحقول -->
                    <div class="form-group">
                        <label for="payment_status">حالة الدفع</label>
                        <select class="form-control" id="payment_status" name="payment_status">
                            <option value="مدفوع" {{ $shipment->payment_status == 'مدفوع' ? 'selected' : '' }}>مدفوع
                            </option>
                            <option value="غير مدفوع" {{ $shipment->payment_status == 'غير مدفوع' ? 'selected' : '' }}>غير
                                مدفوع</option>
                        </select>
                        <div class="error-message" id="payment_status_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">طريقة الدفع</label>
                        <select class="form-control" id="payment_method" name="payment_method">
                            <option value="بطاقة ائتمان"
                                {{ $shipment->payment_method == 'بطاقة ائتمان' ? 'selected' : '' }}>بطاقة ائتمان</option>
                            <option value="تحويل بنكي" {{ $shipment->payment_method == 'تحويل بنكي' ? 'selected' : '' }}>
                                تحويل بنكي</option>
                            <option value="نقدي" {{ $shipment->payment_method == 'نقدي' ? 'selected' : '' }}>نقدي
                            </option>
                        </select>
                        <div class="error-message" id="payment_method_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="special_instructions">تعليمات خاصة</label>
                        <textarea class="form-control" id="special_instructions" name="special_instructions">{{ $shipment->special_instructions }}</textarea>
                        <div class="error-message" id="special_instructions_error"></div>
                    </div>

                    <div class="form-group">
                        <label for="notes">ملاحظات</label>
                        <textarea class="form-control" id="notes" name="notes">{{ $shipment->notes }}</textarea>
                        <div class="error-message" id="notes_error"></div>
                    </div>

                    <button type="button" class="btn btn-primary nextBtn" data-next="step-3"
                        onclick="validateStep2()">التالي</button>
                    <button type="button" class="btn btn-secondary prevBtn" data-prev="step-1">السابق</button>
                </form>
            </div>
        </div>

        <!-- Step 3: تأكيد المعلومات -->
        <div class="row setup-content" id="step-3">
            <div class="col-md-12">
                <h3>تأكيد المعلومات</h3>
                <div id="confirmation-details">
                    <!-- سيتم تعبئة التفاصيل هنا عبر JavaScript -->
                </div>
                <button type="button" class="btn btn-success" id="submit-form">تحديث</button>
                <button type="button" class="btn btn-secondary prevBtn" data-prev="step-2">السابق</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // دالة لتحديث حالة الخطوات
        function updateStepWizard(stepId) {
            const stepNumber = stepId.split('-')[1];
            const stepWizardSteps = document.querySelectorAll('.stepwizard-step');

            stepWizardSteps.forEach((step, index) => {
                const btn = step.querySelector('a');
                if (index + 1 == stepNumber) {
                    btn.classList.remove('btn-default');
                    btn.classList.add('btn-success');
                } else {
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-default');
                }
            });
        }

        // دالة لإظهار/إخفاء حقول الصندوق والظرف
        function togglePackageFields() {
            const packageType = document.getElementById('package_type').value;
            const boxFields = document.getElementById('box_fields');
            const envelopeFields = document.getElementById('envelope_fields');

            if (packageType === 'صندوق') {
                boxFields.classList.remove('hidden');
                envelopeFields.classList.add('hidden');
            } else if (packageType === 'ظرف') {
                boxFields.classList.add('hidden');
                envelopeFields.classList.remove('hidden');
            } else {
                boxFields.classList.add('hidden');
                envelopeFields.classList.add('hidden');
            }
        }

        // دالة لحساب السعر التلقائي للصندوق
        function calculatePrice() {
            const length = parseFloat(document.getElementById('length').value) || 0;
            const width = parseFloat(document.getElementById('width').value) || 0;
            const pricePerMeter = 100; // سعر المتر المربع

            const totalPrice = length * width * pricePerMeter;
            document.getElementById('price').value = totalPrice.toFixed(2);
        }

        // دالة لحساب السعر التلقائي للظرف
        function calculateEnvelopePrice() {
            const weight = parseFloat(document.getElementById('weight').value) || 0;
            const thickness = parseFloat(document.getElementById('thickness').value) || 0;
            const pricePerUnit = 10; // سعر الوحدة

            const totalPrice = weight * thickness * pricePerUnit;
            document.getElementById('price').value = totalPrice.toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const nextButtons = document.querySelectorAll('.nextBtn');
            const prevButtons = document.querySelectorAll('.prevBtn');
            const submitButton = document.getElementById('submit-form');
            const fromCountrySelect = document.getElementById('from_country_id');
            const fromCitySelect = document.getElementById('from_city_id');
            const toCountrySelect = document.getElementById('to_country_id');
            const toCitySelect = document.getElementById('to_city_id');

            // عند تغيير البلد المرسل
            fromCountrySelect.addEventListener('change', function() {
                loadCities(this.value, fromCitySelect);
            });

            // عند تغيير البلد المستقبل
            toCountrySelect.addEventListener('change', function() {
                loadCities(this.value, toCitySelect);
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = this.closest('.setup-content');
                    const prevStepId = this.getAttribute('data-prev');
                    const prevStep = document.getElementById(prevStepId);

                    currentStep.classList.remove('active');
                    prevStep.classList.add('active');
                    updateStepWizard(prevStepId);
                });
            });

            submitButton.addEventListener('click', function() {
                updateAllData();
            });

            // دالة لتحميل المدن بناءً على البلد
            function loadCities(countryId, citySelect) {
                citySelect.innerHTML = '<option value="">اختر المدينة</option>';
                if (!countryId) return;

                $.ajax({
                    url: `/api/cities?country_id=${countryId}`,
                    method: 'GET',
                    success: function(response) {
                        response.forEach(city => {
                            citySelect.innerHTML +=
                                `<option value="${city.id}">${city.name}</option>`;
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function updateAllData() {
                const formData = new FormData();

                // جمع بيانات المرسل
                formData.append('sender_name', document.getElementById('sender_name').value);
                formData.append('sender_phone', document.getElementById('sender_phone').value);
                formData.append('sender_email', document.getElementById('sender_email').value);
                formData.append('sender_district', document.getElementById('sender_district').value);
                formData.append('sender_street', document.getElementById('sender_street').value);
                formData.append('sender_building', document.getElementById('sender_building').value);
                formData.append('sender_floor', document.getElementById('sender_floor').value);
                formData.append('sender_additional_info', document.getElementById('sender_additional_info').value);

                // جمع بيانات المستقبل
                formData.append('receiver_name', document.getElementById('receiver_name').value);
                formData.append('receiver_phone', document.getElementById('receiver_phone').value);
                formData.append('receiver_district', document.getElementById('receiver_district').value);
                formData.append('receiver_street', document.getElementById('receiver_street').value);
                formData.append('receiver_building', document.getElementById('receiver_building').value);
                formData.append('receiver_floor', document.getElementById('receiver_floor').value);
                formData.append('receiver_additional_info', document.getElementById('receiver_additional_info')
                    .value);

                // جمع بيانات الشحنة
                formData.append('from_country_id', document.getElementById('from_country_id').value);
                formData.append('from_city_id', document.getElementById('from_city_id').value);
                formData.append('to_country_id', document.getElementById('to_country_id').value);
                formData.append('to_city_id', document.getElementById('to_city_id').value);
                formData.append('package_type', document.getElementById('package_type').value);

                // جمع بيانات الصندوق أو الظرف
                if (document.getElementById('package_type').value === 'صندوق') {
                    formData.append('length', document.getElementById('length').value);
                    formData.append('width', document.getElementById('width').value);
                    formData.append('price', document.getElementById('price').value);
                } else if (document.getElementById('package_type').value === 'ظرف') {
                    formData.append('weight', document.getElementById('weight').value);
                    formData.append('thickness', document.getElementById('thickness').value);
                    formData.append('price', document.getElementById('price').value);
                }

                // جمع باقي البيانات
                formData.append('payment_status', document.getElementById('payment_status').value);
                formData.append('payment_method', document.getElementById('payment_method').value);
                formData.append('special_instructions', document.getElementById('special_instructions').value);

                // إرسال البيانات عبر AJAX
                $.ajax({
                    url: '/shipment/update/{{ $shipment->id }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // عرض رسالة نجاح
                            toastr.success(response.message);

                            // إعادة توجيه المستخدم بعد 3 ثواني
                            setTimeout(function() {
                                window.location.href =
                                    '/admin/shipment'; // تغيير الرابط حسب الحاجة
                            }, 1000);
                        } else {
                            // عرض رسالة خطأ
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        toastr.error('حدث خطأ أثناء تحديث البيانات.');
                    }
                });
            }
        });

        // دالة للتحقق من صحة البيانات في الخطوة الأولى
        function validateStep1() {
            let isValid = true;

            // التحقق من الحقول المطلوبة
            const fields = [{
                    id: 'sender_name',
                    errorId: 'sender_name_error'
                },
                {
                    id: 'sender_phone',
                    errorId: 'sender_phone_error'
                },
                {
                    id: 'sender_district',
                    errorId: 'sender_district_error'
                },
                {
                    id: 'sender_street',
                    errorId: 'sender_street_error'
                },
                {
                    id: 'sender_building',
                    errorId: 'sender_building_error'
                },
                {
                    id: 'receiver_name',
                    errorId: 'receiver_name_error'
                },
                {
                    id: 'receiver_phone',
                    errorId: 'receiver_phone_error'
                },
                {
                    id: 'receiver_district',
                    errorId: 'receiver_district_error'
                },
                {
                    id: 'receiver_street',
                    errorId: 'receiver_street_error'
                },
                {
                    id: 'receiver_building',
                    errorId: 'receiver_building_error'
                }
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const error = document.getElementById(field.errorId);

                if (!input.value.trim()) {
                    error.textContent = 'هذا الحقل مطلوب';
                    isValid = false;
                } else {
                    error.textContent = '';
                }
            });

            // إذا كانت البيانات صحيحة، انتقل إلى الخطوة الثانية
            if (isValid) {
                const currentStep = document.getElementById('step-1');
                const nextStep = document.getElementById('step-2');

                currentStep.classList.remove('active');
                nextStep.classList.add('active');
                updateStepWizard('step-2');
            }
        }

        // دالة للتحقق من صحة البيانات في الخطوة الثانية
        function validateStep2() {
            let isValid = true;

            // التحقق من الحقول المطلوبة
            const fields = [{
                    id: 'from_country_id',
                    errorId: 'from_country_id_error'
                },
                {
                    id: 'from_city_id',
                    errorId: 'from_city_id_error'
                },
                {
                    id: 'to_country_id',
                    errorId: 'to_country_id_error'
                },
                {
                    id: 'to_city_id',
                    errorId: 'to_city_id_error'
                },
                {
                    id: 'package_type',
                    errorId: 'package_type_error'
                }
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const error = document.getElementById(field.errorId);

                if (!input.value.trim()) {
                    error.textContent = 'هذا الحقل مطلوب';
                    isValid = false;
                } else {
                    error.textContent = '';
                }
            });

            // إذا كانت البيانات صحيحة، انتقل إلى الخطوة الثالثة
            if (isValid) {
                const currentStep = document.getElementById('step-2');
                const nextStep = document.getElementById('step-3');

                currentStep.classList.remove('active');
                nextStep.classList.add('active');
                updateStepWizard('step-3');
            }
        }
    </script>
@endpush --}}



@extends('admin.layouts.master')

@push('css')
    <style>
        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .stepwizard-step {
            text-align: center;
        }

        .btn-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 16px;
            line-height: 40px;
            padding: 0;
        }

        .setup-content {
            display: none;
        }

        .setup-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px;
        }

        .form-row .col-md-6 {
            padding-right: 5px;
            padding-left: 5px;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .hidden {
            display: none;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
    </style>
@endpush

@section('content')
    <div class="container mt-5">
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-circle btn-success">1</a>
                    <p>معلومات المرسل والمستلم</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-circle btn-default">2</a>
                    <p>معلومات الشحنة</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-circle btn-default">3</a>
                    <p>تأكيد المعلومات</p>
                </div>
            </div>
        </div>

        <!-- Step 1: معلومات المرسل والمستلم -->
        <div class="row setup-content active" id="step-1">
            <div class="col-md-12">
                <h3>معلومات المرسل والمستلم</h3>
                <form id="form-step-1">
                    <!-- معلومات المرسل -->
                    <div class="section-title">معلومات المرسل</div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sender_name">الاسم</label>
                                <input type="text" class="form-control" id="sender_name" name="sender_name"
                                    value="{{ $shipment->sender_data['name'] ?? '' }}" required>
                                <div class="error-message" id="sender_name_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="sender_phone">الهاتف</label>
                                <input type="text" class="form-control" id="sender_phone" name="sender_phone"
                                    value="{{ $shipment->sender_data['phone'] ?? '' }}" required>
                                <div class="error-message" id="sender_phone_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="sender_email">البريد الإلكتروني</label>
                                <input type="email" class="form-control" id="sender_email" name="sender_email"
                                    value="{{ $shipment->sender_data['email'] ?? '' }}">
                                <div class="error-message" id="sender_email_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sender_district">الحي</label>
                                <input type="text" class="form-control" id="sender_district" name="sender_district"
                                    value="{{ $shipment->sender_data['district'] ?? '' }}" required>
                                <div class="error-message" id="sender_district_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="sender_street">الشارع</label>
                                <input type="text" class="form-control" id="sender_street" name="sender_street"
                                    value="{{ $shipment->sender_data['street'] ?? '' }}" required>
                                <div class="error-message" id="sender_street_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="sender_building">المبنى</label>
                                <input type="text" class="form-control" id="sender_building" name="sender_building"
                                    value="{{ $shipment->sender_data['building'] ?? '' }}" required>
                                <div class="error-message" id="sender_building_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sender_floor">الطابق</label>
                                <input type="text" class="form-control" id="sender_floor" name="sender_floor"
                                    value="{{ $shipment->sender_data['floor'] ?? '' }}">
                                <div class="error-message" id="sender_floor_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="sender_additional_info">معلومات إضافية</label>
                                <input type="text" class="form-control" id="sender_additional_info"
                                    name="sender_additional_info"
                                    value="{{ $shipment->sender_data['additional_info'] ?? '' }}">
                                <div class="error-message" id="sender_additional_info_error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- معلومات المستلم -->
                    <div class="section-title">معلومات المستلم</div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver_name">الاسم</label>
                                <input type="text" class="form-control" id="receiver_name" name="receiver_name"
                                    value="{{ $shipment->receiver_data['name'] ?? '' }}" required>
                                <div class="error-message" id="receiver_name_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="receiver_phone">الهاتف</label>
                                <input type="text" class="form-control" id="receiver_phone" name="receiver_phone"
                                    value="{{ $shipment->receiver_data['phone'] ?? '' }}" required>
                                <div class="error-message" id="receiver_phone_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver_district">الحي</label>
                                <input type="text" class="form-control" id="receiver_district"
                                    name="receiver_district" value="{{ $shipment->receiver_data['district'] ?? '' }}"
                                    required>
                                <div class="error-message" id="receiver_district_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="receiver_street">الشارع</label>
                                <input type="text" class="form-control" id="receiver_street" name="receiver_street"
                                    value="{{ $shipment->receiver_data['street'] ?? '' }}" required>
                                <div class="error-message" id="receiver_street_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver_building">المبنى</label>
                                <input type="text" class="form-control" id="receiver_building"
                                    name="receiver_building" value="{{ $shipment->receiver_data['building'] ?? '' }}"
                                    required>
                                <div class="error-message" id="receiver_building_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="receiver_floor">الطابق</label>
                                <input type="text" class="form-control" id="receiver_floor" name="receiver_floor"
                                    value="{{ $shipment->receiver_data['floor'] ?? '' }}">
                                <div class="error-message" id="receiver_floor_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="receiver_additional_info">معلومات إضافية</label>
                                <input type="text" class="form-control" id="receiver_additional_info"
                                    name="receiver_additional_info"
                                    value="{{ $shipment->receiver_data['additional_info'] ?? '' }}">
                                <div class="error-message" id="receiver_additional_info_error"></div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary nextBtn" data-next="step-2"
                        onclick="validateStep1()">التالي</button>
                </form>
            </div>
        </div>

        <!-- Step 2: معلومات الشحنة -->
        <div class="row setup-content" id="step-2">
            <div class="col-md-12">
                <h3>معلومات الشحنة</h3>
                <form id="form-step-2">
                    <input type="hidden" name="shipment_id" value="{{ $shipment->id }}">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_country_id">البلد المرسل</label>
                                <select class="form-control" id="from_country_id" name="from_country_id" required>
                                    <option value="">اختر البلد</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $shipment->from_country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <div class="error-message" id="from_country_id_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="from_city_id">المدينة المرسلة</label>
                                <select class="form-control" id="from_city_id" name="from_city_id" required>
                                    <option value="">اختر المدينة</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ $shipment->from_city_id == $city->id ? 'selected' : '' }}>
                                            {{ $city->name }}</option>
                                    @endforeach
                                </select>
                                <div class="error-message" id="from_city_id_error"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="to_country_id">البلد المستقبل</label>
                                <select class="form-control" id="to_country_id" name="to_country_id" required>
                                    <option value="">اختر البلد</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            {{ $shipment->to_country_id == $country->id ? 'selected' : '' }}>
                                            {{ $country->name }}</option>
                                    @endforeach
                                </select>
                                <div class="error-message" id="to_country_id_error"></div>
                            </div>
                            <div class="form-group">
                                <label for="to_city_id">المدينة المستقبلة</label>
                                <select class="form-control" id="to_city_id" name="to_city_id" required>
                                    <option value="">اختر المدينة</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ $shipment->to_city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="error-message" id="to_city_id_error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="package_type">نوع الطرد</label>
                                <select class="form-control" id="package_type" name="package_type"
                                    onchange="togglePackageFields()">
                                    <option value="">اختر نوع الطرد</option>
                                    <option value="صندوق" {{ $shipment->package_type == 'صندوق' ? 'selected' : '' }}>
                                        صندوق</option>
                                    <option value="ظرف" {{ $shipment->package_type == 'ظرف' ? 'selected' : '' }}>ظرف
                                    </option>
                                </select>
                                <div class="error-message" id="package_type_error"></div>
                            </div>
                        </div>
                    </div>

                    <!-- حقول الصندوق -->
                    <div id="box_fields" class="{{ $shipment->package_type == 'صندوق' ? '' : 'hidden' }}">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="length">الطول (متر)</label>
                                    <input type="number" class="form-control" id="length" name="length"
                                        value="{{ $shipment->dimensions['length'] ?? '' }}" oninput="calculatePrice()">
                                    <div class="error-message" id="length_error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="width">العرض (متر)</label>
                                    <input type="number" class="form-control" id="width" name="width"
                                        value="{{ $shipment->dimensions['width'] ?? '' }}" oninput="calculatePrice()">
                                    <div class="error-message" id="width_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">السعر التلقائي (ريال)</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ $shipment->dimensions['price'] ?? '' }}" readonly>
                                    <div class="error-message" id="price_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- حقول الظرف -->
                    <div id="envelope_fields" class="{{ $shipment->package_type == 'ظرف' ? '' : 'hidden' }}">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="weight">الوزن (كجم)</label>
                                    <input type="number" class="form-control" id="weight" name="weight"
                                        value="{{ $shipment->dimensions['weight'] ?? '' }}"
                                        oninput="calculateEnvelopePrice()">
                                    <div class="error-message" id="weight_error"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="thickness">السُمك (مم)</label>
                                    <input type="number" class="form-control" id="thickness" name="thickness"
                                        value="{{ $shipment->dimensions['thickness'] ?? '' }}"
                                        oninput="calculateEnvelopePrice()">
                                    <div class="error-message" id="thickness_error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">السعر التلقائي (ريال)</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ $shipment->dimensions['price'] ?? '' }}" readonly>
                                    <div class="error-message" id="price_error"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- باقي الحقول -->
                    <div class="form-group">
                        <label for="payment_status">حالة الدفع</label>
                        <select class="form-control" id="payment_status" name="payment_status">
                            <option value="مدفوع" {{ $shipment->payment_status == 'مدفوع' ? 'selected' : '' }}>مدفوع
                            </option>
                            <option value="غير مدفوع" {{ $shipment->payment_status == 'غير مدفوع' ? 'selected' : '' }}>غير
                                مدفوع</option>
                        </select>
                        <div class="error-message" id="payment_status_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">طريقة الدفع</label>
                        <select class="form-control" id="payment_method" name="payment_method">
                            <option value="بطاقة ائتمان"
                                {{ $shipment->payment_method == 'بطاقة ائتمان' ? 'selected' : '' }}>بطاقة ائتمان</option>
                            <option value="تحويل بنكي" {{ $shipment->payment_method == 'تحويل بنكي' ? 'selected' : '' }}>
                                تحويل بنكي</option>
                            <option value="نقدي" {{ $shipment->payment_method == 'نقدي' ? 'selected' : '' }}>نقدي
                            </option>
                        </select>
                        <div class="error-message" id="payment_method_error"></div>
                    </div>

                    <div class="form-group">
                        <label for="notes">ملاحظات</label>
                        <textarea class="form-control" id="notes" name="notes">{{ $shipment->notes }}</textarea>
                        <div class="error-message" id="notes_error"></div>
                    </div>

                    <button type="button" class="btn btn-primary nextBtn" data-next="step-3"
                        onclick="validateStep2()">التالي</button>
                    <button type="button" class="btn btn-secondary prevBtn" data-prev="step-1">السابق</button>
                </form>
            </div>
        </div>

        <!-- Step 3: تأكيد المعلومات -->
        <div class="row setup-content" id="step-3">
            <div class="col-md-12">
                <h3>تأكيد المعلومات</h3>
                <div id="confirmation-details">
                    <!-- سيتم تعبئة التفاصيل هنا عبر JavaScript -->
                </div>
                <button type="button" class="btn btn-success" id="submit-form">تأكيد</button>
                <button type="button" class="btn btn-secondary prevBtn" data-prev="step-2">السابق</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // دالة لتحديث حالة الخطوات
        function updateStepWizard(stepId) {
            const stepNumber = stepId.split('-')[1];
            const stepWizardSteps = document.querySelectorAll('.stepwizard-step');

            stepWizardSteps.forEach((step, index) => {
                const btn = step.querySelector('a');
                if (index + 1 == stepNumber) {
                    btn.classList.remove('btn-default');
                    btn.classList.add('btn-success');
                } else {
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-default');
                }
            });
        }

        // دالة لإظهار/إخفاء حقول الصندوق والظرف
        function togglePackageFields() {
            const packageType = document.getElementById('package_type').value;
            const boxFields = document.getElementById('box_fields');
            const envelopeFields = document.getElementById('envelope_fields');

            if (packageType === 'صندوق') {
                boxFields.classList.remove('hidden');
                envelopeFields.classList.add('hidden');
            } else if (packageType === 'ظرف') {
                boxFields.classList.add('hidden');
                envelopeFields.classList.remove('hidden');
            } else {
                boxFields.classList.add('hidden');
                envelopeFields.classList.add('hidden');
            }
        }

        // دالة لحساب السعر التلقائي للصندوق
        function calculatePrice() {
            const length = parseFloat(document.getElementById('length').value) || 0;
            const width = parseFloat(document.getElementById('width').value) || 0;
            const pricePerMeter = 100; // سعر المتر المربع

            const totalPrice = length * width * pricePerMeter;
            document.getElementById('price').value = totalPrice.toFixed(2);
        }

        // دالة لحساب السعر التلقائي للظرف
        function calculateEnvelopePrice() {
            const weight = parseFloat(document.getElementById('weight').value) || 0;
            const thickness = parseFloat(document.getElementById('thickness').value) || 0;
            const pricePerUnit = 10; // سعر الوحدة

            const totalPrice = weight * thickness * pricePerUnit;
            document.getElementById('price').value = totalPrice.toFixed(2);
        }

        document.addEventListener('DOMContentLoaded', function() {
            const nextButtons = document.querySelectorAll('.nextBtn');
            const prevButtons = document.querySelectorAll('.prevBtn');
            const submitButton = document.getElementById('submit-form');
            const fromCountrySelect = document.getElementById('from_country_id');
            const fromCitySelect = document.getElementById('from_city_id');
            const toCountrySelect = document.getElementById('to_country_id');
            const toCitySelect = document.getElementById('to_city_id');

            // عند تغيير البلد المرسل
            fromCountrySelect.addEventListener('change', function() {
                loadCities(this.value, fromCitySelect);
            });

            // عند تغيير البلد المستقبل
            toCountrySelect.addEventListener('change', function() {
                loadCities(this.value, toCitySelect);
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const currentStep = this.closest('.setup-content');
                    const prevStepId = this.getAttribute('data-prev');
                    const prevStep = document.getElementById(prevStepId);

                    currentStep.classList.remove('active');
                    prevStep.classList.add('active');
                    updateStepWizard(prevStepId);
                });
            });

            submitButton.addEventListener('click', function() {
                updateShipment();
            });

            // دالة لتحميل المدن بناءً على البلد
            function loadCities(countryId, citySelect) {
                citySelect.innerHTML = '<option value="">اختر المدينة</option>';
                if (!countryId) return;

                $.ajax({
                    url: `/api/cities?country_id=${countryId}`,
                    method: 'GET',
                    success: function(response) {
                        response.forEach(city => {
                            citySelect.innerHTML +=
                                `<option value="${city.id}">${city.name}</option>`;
                        });
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }

            function updateShipment() {
                const formData = new FormData();

                // جمع بيانات المرسل
                formData.append('sender_name', document.getElementById('sender_name').value);
                formData.append('sender_phone', document.getElementById('sender_phone').value);
                formData.append('sender_email', document.getElementById('sender_email').value);
                formData.append('sender_district', document.getElementById('sender_district').value);
                formData.append('sender_street', document.getElementById('sender_street').value);
                formData.append('sender_building', document.getElementById('sender_building').value);
                formData.append('sender_floor', document.getElementById('sender_floor').value);
                formData.append('sender_additional_info', document.getElementById('sender_additional_info').value);

                // جمع بيانات المستقبل
                formData.append('receiver_name', document.getElementById('receiver_name').value);
                formData.append('receiver_phone', document.getElementById('receiver_phone').value);
                formData.append('receiver_district', document.getElementById('receiver_district').value);
                formData.append('receiver_street', document.getElementById('receiver_street').value);
                formData.append('receiver_building', document.getElementById('receiver_building').value);
                formData.append('receiver_floor', document.getElementById('receiver_floor').value);
                formData.append('receiver_additional_info', document.getElementById('receiver_additional_info')
                    .value);

                // جمع بيانات الشحنة
                formData.append('from_country_id', document.getElementById('from_country_id').value);
                formData.append('from_city_id', document.getElementById('from_city_id').value);
                formData.append('to_country_id', document.getElementById('to_country_id').value);
                formData.append('to_city_id', document.getElementById('to_city_id').value);
                formData.append('package_type', document.getElementById('package_type').value);

                // جمع بيانات الصندوق أو الظرف
                if (document.getElementById('package_type').value === 'صندوق') {
                    formData.append('length', document.getElementById('length').value);
                    formData.append('width', document.getElementById('width').value);
                    formData.append('price', document.getElementById('price').value);
                } else if (document.getElementById('package_type').value === 'ظرف') {
                    formData.append('weight', document.getElementById('weight').value);
                    formData.append('thickness', document.getElementById('thickness').value);
                    formData.append('price', document.getElementById('price').value);
                }

                // جمع باقي البيانات
                formData.append('payment_status', document.getElementById('payment_status').value);
                formData.append('payment_method', document.getElementById('payment_method').value);
                formData.append('notes', document.getElementById('notes').value);

                // إرسال البيانات عبر AJAX
                $.ajax({
                    url: '/shipment/update/{{ $shipment->id }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // عرض رسالة نجاح
                            toastr.success(response.message);

                            // إعادة توجيه المستخدم بعد 3 ثواني
                            setTimeout(function() {
                                window.location.href =
                                '/admin/shipment'; // تغيير الرابط حسب الحاجة
                            }, 1000);
                        } else {
                            // عرض رسالة خطأ
                            toastr.error(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        toastr.error('حدث خطأ أثناء تحديث البيانات.');
                    }
                });
            }
        });

        // دالة للتحقق من صحة البيانات في الخطوة الأولى
        function validateStep1() {
            let isValid = true;

            // التحقق من الحقول المطلوبة
            const fields = [{
                    id: 'sender_name',
                    errorId: 'sender_name_error'
                },
                {
                    id: 'sender_phone',
                    errorId: 'sender_phone_error'
                },
                {
                    id: 'sender_district',
                    errorId: 'sender_district_error'
                },
                {
                    id: 'sender_street',
                    errorId: 'sender_street_error'
                },
                {
                    id: 'sender_building',
                    errorId: 'sender_building_error'
                },
                {
                    id: 'receiver_name',
                    errorId: 'receiver_name_error'
                },
                {
                    id: 'receiver_phone',
                    errorId: 'receiver_phone_error'
                },
                {
                    id: 'receiver_district',
                    errorId: 'receiver_district_error'
                },
                {
                    id: 'receiver_street',
                    errorId: 'receiver_street_error'
                },
                {
                    id: 'receiver_building',
                    errorId: 'receiver_building_error'
                }
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const error = document.getElementById(field.errorId);

                if (!input.value.trim()) {
                    error.textContent = 'هذا الحقل مطلوب';
                    isValid = false;
                } else {
                    error.textContent = '';
                }
            });

            // إذا كانت البيانات صحيحة، انتقل إلى الخطوة الثانية
            if (isValid) {
                const currentStep = document.getElementById('step-1');
                const nextStep = document.getElementById('step-2');

                currentStep.classList.remove('active');
                nextStep.classList.add('active');
                updateStepWizard('step-2');
            }
        }

        // دالة للتحقق من صحة البيانات في الخطوة الثانية
        function validateStep2() {
            let isValid = true;

            // التحقق من الحقول المطلوبة
            const fields = [{
                    id: 'from_country_id',
                    errorId: 'from_country_id_error'
                },
                {
                    id: 'from_city_id',
                    errorId: 'from_city_id_error'
                },
                {
                    id: 'to_country_id',
                    errorId: 'to_country_id_error'
                },
                {
                    id: 'to_city_id',
                    errorId: 'to_city_id_error'
                },
                {
                    id: 'package_type',
                    errorId: 'package_type_error'
                }
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const error = document.getElementById(field.errorId);

                if (!input.value.trim()) {
                    error.textContent = 'هذا الحقل مطلوب';
                    isValid = false;
                } else {
                    error.textContent = '';
                }
            });

            // إذا كانت البيانات صحيحة، انتقل إلى الخطوة الثالثة
            if (isValid) {
                const currentStep = document.getElementById('step-2');
                const nextStep = document.getElementById('step-3');

                currentStep.classList.remove('active');
                nextStep.classList.add('active');
                updateStepWizard('step-3');
            }
        }
    </script>
@endpush
