@foreach($cars as $car)
    <div>
        <a href="cars/{{$car->platenumber}}">
            <h2>{{$car->name}}</h2>
        </a>
        <h3>{{$car->model}}</h3>
        <h3>{{$car->platenumber}}</h3>
        <h3>{{$car->status}}</h3>
        <p>{{$car->description}}</p>
    </div><br>
@endforeach
