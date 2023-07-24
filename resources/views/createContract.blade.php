<form action="/contract/create" method="post">
    @csrf
    <input type="text" name="client_name" placeholder="client name" required>
    @error('client_name')
    <p>{{$message}}</p>
    @enderror
    <input type="text" name="client_cin" id="" placeholder="client cin" required>
    @error('client_cin')
    <p>{{$message}}</p>
    @enderror
    <input type="datetime-local" name="rent_start_date" id="rent_start_date" required>
        <label for="rent_start_date">day of rent start</label>
            <select name="car_id" >
                @foreach($cars as $car)
                    <option value="{{$car->id}}">{{$car->name}} plate number : {{$car->platenumber}}</option>
                @endforeach
            </select>
    @error('rent_start_date')
    <p>{{$message}}</p>
    @enderror
    <input type="number" name="number_of_days" placeholder="number of days" required>
    @error('number_of_days')
    <p>{{$message}}</p>
    @enderror
        <button type="submit">submit</button>
        <button type="reset">reset</button>
</form>
