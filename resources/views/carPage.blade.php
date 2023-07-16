<div>
    <form action="/cars/{{$car->platenumber}}" method="post" enctype="multipart/form-data">
        @method('PATCH')
        <input type="text" value="{{old('name',$car->name)}}" name="name" placeholder="name" required>
        @error('name')
        <p>{{$message}}</p>
        @enderror
        <input type="text" value="{{old('model',$car->model)}}" name="model" placeholder="model" required>
        @error('model')
        <p>{{$message}}</p>
        @enderror
        <input type="text" value="{{old('platenumber',$car->platenumber)}}" name="platenumber" placeholder="platenumber" required>
        @error('platenumber')
        <p>{{$message}}</p>
        @enderror
        <input type="text" value="{{old('status',$car->status)}}" name="status" placeholder="status" required>
        @error('status')
        <p>{{$message}}</p>
        @enderror
        <input type="text" value="{{old('availability',$car->availability)}}" name="availability" placeholder="availability" required>
        @error('availability')
        <p>{{$message}}</p>
        @enderror
        <input type="text" value="{{old('description',$car->description)}}" name="description" placeholder="description">
        @error('description')
        <p>{{$message}}</p>
        @enderror
        <input type="text" value="{{old('gearbox',$car->gearbox)}}" name="gearbox" placeholder="gearbox" required>
        @error('gearbox')
        <p>{{$message}}</p>
        @enderror
        <input type="text" value="{{old('numberofseats',$car->numberofseats)}}" name="numberofseats" placeholder="numberofseats" required>
        @error('numberofseats')
        <p>{{$message}}</p>
        @enderror
        <input type="text" value="{{old('fueltype',$car->fueltype)}}" name="fueltype" placeholder="fueltype" required>
        @error('fueltype')
        <p>{{$message}}</p>
        @enderror
        <input type="text" value="{{old('horsepower',$car->horsepower)}}" name="horsepower" placeholder="horsepower" required>
        @error('horsepower')
        <p>{{$message}}</p>
        @enderror
        <input type="file" name="picture" id="picture">
        @error('picture')
        <p>{{$message}}</p>
        @enderror
        <img src="{{asset('storage/' . $car->picture)}}" alt="car picture">
        @csrf
        <input type="submit">
        <input type="reset">
    </form>
    <form method="post" action="/cars/{{$car->platenumber}}">
        @csrf
        @method('delete')
        <button>Delete</button>
    </form>
</div>
