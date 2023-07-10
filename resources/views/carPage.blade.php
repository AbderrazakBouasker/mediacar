<div>
    <form action="/cars/{{$car->platenumber}}/edit" method="post">
        <input type="text" value="{{$car->name}}">
        <input type="text" value="{{$car->model}}">
        <input type="text" value="{{$car->platenumber}}">
        <input type="text" value="{{$car->status}}>">
        <input type="text" value="{{$car->availability}}">
        <input type="text" value="{{$car->description}}">
        <input type="text" value="{{$car->gearbox}}">
        <input type="text" value="{{$car->numberofseats}}">
        <input type="text" value="{{$car->fueltype}}">
        <input type="text" value="{{$car->horsepower}}">
        @csrf
        <input type="submit">
        <input type="reset">
    </form>
    <button>Delete</button>
</div>
