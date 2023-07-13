<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<div>
    <form action="" method="get">
        <input name="search" type="text" >
        <label for="search" >search</label>
    </form>
</div>
<div>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown button
        </button>
        <ul class="dropdown-menu">

                <li><a class="dropdown-item" href="#">none</a></li>
                <li><a class="dropdown-item" href="#">manuel</a></li>
                <li><a class="dropdown-item" href="#">automatic</a></li>

        </ul>
    </div>
</div>
<a href="/cars/create">Add new car</a>
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
