@extends('layouts.app')

@section('content')
<div class="order-page">
    <div class="container">
        <form method="POST" action="{{route('book.book.order')}}" enctype="multipart/form-data">
            @csrf
    
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
    
            <div class="form-group">
                <label for="game_center">Game center</label>
                <select id="game_center"
                        class="form-control"
                        name="game_center"
                        readonly="readonly">
                    <option value="{{$game_center->id}}">{{$game_center->name}}</option>
                </select>
            </div>
    
            <div class="form-group row">
                <label for="person_quantity" class="col-2 col-form-label">Тоглох хүний тоо</label>
                <div class="col-10">
                    <input class="form-control"
                           type="number"
                           required
                           value="{{old('person_quantity')}}"
                           name="person_quantity"
                           id="person_quantity"/>
                </div>
            </div>
    
            <div class="form-group">
                <label for="room_type">Ямар төрлийн суудлыг авах вэ?</label>
                <select name="room_type" class="form-control" id="room_type">
                    @if($game_center->vipRoom)
                        <option value="VIP" data-price="{{$game_center->vipRoom->price}}">VIP суудлын
                            үнэ: {{$game_center->vipRoom->price}}
                        </option>
                    @endif
    
                    @if($game_center->vipRoom)
                        <option value="ORDINARY" data-price="{{$game_center->ordinaryRoom->price}}">Энгийн суудлын
                            үнэ: {{$game_center->ordinaryRoom->price}}
                        </option>
                    @endif
                </select>
            </div>
    
            <div class="form-group row">
                <label for="start_date_time" class="col-2 col-form-label">Тоглож эхлэх өдөр болон цаг</label>
                <div class="col-10">
                    <input class="form-control"
                           type="datetime-local"
                           name="start_date_time"
                           required
                           value="{{ old('start_date_time') }}"
                           id="start_date_time"
                    />
                </div>
            </div>
    
            <div class="form-group row">
                <label for="end_date_time" class="col-2 col-form-label">Тоглож дуусах өдөр болон цаг</label>
                <div class="col-10">
                    <input class="form-control"
                           type="datetime-local"
                           required
                           name="end_date_time"
                           value="{{ old('end_date_time') }}"
                           id="end_date_time"
                    />
                </div>
            </div>
    
            <div class="form-group row">
                <label for="total_play_time" class="col-2 col-form-label">Нийт тоглох цаг</label>
                <div class="col-10">
                    <input class="form-control"
                           type="number"
                           name="total_play_time"
                           readonly
                           value="{{old('total_play_time')}}"
                           id="total_play_time"
                    />
                </div>
            </div>
    
            <div class="form-group row">
                <label for="total_payment_amount" class="col-2 col-form-label">Төлөх нийт дүн</label>
                <div class="col-10">
                    <input class="form-control" type="number"
                           readonly
                           name="total_payment_amount"
                           id="total_payment_amount"
                           value="{{old('total_payment_amount')}}"
                    />
                </div>
            </div>
    
            <button type="submit">Захиалах</button>
    
        </form>
    </div>
</div>
    
@endsection


@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var startDateInput = document.getElementById('start_date_time');
            var endDateInput = document.getElementById('end_date_time');
            var roomTypeSelect = document.getElementById('room_type');
            var personQuantityInput = document.getElementById('person_quantity');
            var totalTimeInput = document.getElementById('total_play_time');
            var totalPriceInput = document.getElementById('total_payment_amount');

            function setMinStartDate() {
                var now = new Date();
                var minDate = now.toISOString().slice(0, 16);
                startDateInput.min = minDate;
            }

            setMinStartDate();

            startDateInput.addEventListener('change', function () {
                if (startDateInput.value) endDateInput.min = startDateInput.value;
            });

            startDateInput.addEventListener('change', updateValues);
            endDateInput.addEventListener('change', updateValues);
            roomTypeSelect.addEventListener('change', updateValues);
            personQuantityInput.addEventListener('change', updateValues);

            function updateValues() {
                var startTime = new Date(startDateInput.value);
                var endTime = new Date(endDateInput.value);

                if (startTime >= endTime) {
                    endDateInput.value = '';
                    alert('Эхлэх цаг дуусах цагаас их байх ёстой.');
                    return;
                }

                if (!isNaN(startTime.getTime()) && !isNaN(endTime.getTime())) {
                    var totalTime = (endTime - startTime) / 1000 / 60 / 60;
                    totalTimeInput.value = totalTime.toFixed(2);

                    var selectedRoomOption = roomTypeSelect.options[roomTypeSelect.selectedIndex];
                    var roomPrice = parseFloat(selectedRoomOption.getAttribute('data-price'));

                    var personQuantity = parseInt(personQuantityInput.value, 10);
                    personQuantity = isNaN(personQuantity) ? 0 : personQuantity;

                    if (!isNaN(roomPrice) && personQuantity > 0) {
                        var totalPrice = totalTime * roomPrice * personQuantity;
                        totalPriceInput.value = totalPrice.toFixed(2);
                    } else {
                        totalPriceInput.value = '';
                    }
                }
            }
        });
    </script>
@endsection