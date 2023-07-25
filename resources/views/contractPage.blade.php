<form action="/contract/{{$contract->id}}" method="post">
    @method('patch')
    @csrf
    <input type="text" name="client_name" placeholder="client name" value="{{$contract->client_name}}" required>
    @error('client_name')
    <p>{{$message}}</p>
    @enderror
    <input type="text" name="client_cin" id="" placeholder="client cin" value="{{$contract->client_cin}}" required>
    @error('client_cin')
    <p>{{$message}}</p>
    @enderror
    <input type="datetime-local" name="rent_start_date" id="rent_start_date" value="{{$contract->rent_start_date}}" required>
    <label for="rent_start_date">day of rent start</label>
    <select name="car_id" >
        @foreach($cars as $car)
            <option value="{{$car->id}}" @if($car->id == $contract->car_id) selected @endif>{{$car->name}} plate number : {{$car->platenumber}}</option>
        @endforeach
    </select>
    @error('rent_start_date')
    <p>{{$message}}</p>
    @enderror
    <input type="number" name="number_of_days" placeholder="number of days" value="{{$contract->number_of_days}}" required>
    @error('number_of_days')
    <p>{{$message}}</p>
    @enderror
    <input type="radio" id="radio_no" name="payment_status" value=0 @if(! $contract->payment_status) checked @endif>
    <label for="radio_no">not paid</label>
    <input type="radio" id="radio_yes" name="payment_status" value=1 @if($contract->payment_status) checked @endif>
    <label for="radio_yes">paid</label>
    @error('payment_status')
    <p>{{$message}}</p>
    @enderror
    <button type="submit">submit</button>
    <button type="reset">reset</button>
</form>
<form method="post" action="/contract/{{$contract->id}}">
    @method('delete')
    @csrf
    <button type="submit">delete</button>
</form>
<form action="/contract/{{$contract->id}}" method="get">
    <input type="hidden" name="contract_request">
    <button type="submit">contract</button>
</form>
