<div>
    <form action="/cars/create" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="name" name="name" value="{{old('name')}}" required>
        @error('name')
            <p>{{$message}}</p>
        @enderror
        <input type="text" placeholder="model" name="model" value="{{old('model')}}" required>
        @error('model')
        <p>{{$message}}</p>
        @enderror
        <input type="text" placeholder="platenumber" name="platenumber"  value="{{old('platenumber')}}" required>
        @error('platenumber')
        <p>{{$message}}</p>
        @enderror
{{--        <input type="text" placeholder="status" name="status">--}}
{{--        <input type="text" placeholder="availability" name="availability">--}}
        <input type="text" placeholder="description" name="description  value="{{old('description')}}"">
        @error('description')
        <p>{{$message}}</p>
        @enderror
        <input type="text" placeholder="gearbox" name="gearbox"  value="{{old('gearbox')}}" required>
        @error('gearbox')
        <p>{{$message}}</p>
        @enderror
        <input type="text" placeholder="numberofseats" name="numberofseats"  value="{{old('numberofseats')}}" required>
        @error('numberofseats')
        <p>{{$message}}</p>
        @enderror
        <input type="text" placeholder="fueltype" name="fueltype"  value="{{old('fueltype')}}" required>
        @error('fueltype')
        <p>{{$message}}</p>
        @enderror
        <input type="text" placeholder="horsepower" name="horsepower"  value="{{old('horsepower')}}" required>
        @error('horsepower')
        <p>{{$message}}</p>
        @enderror
        <input type="text" placeholder="price" name="price"  value="{{old('price')}}" required>
        @error('price')
        <p>{{$message}}</p>
        @enderror
        <input type="file" name="picture" id="picture" required>
        @error('picture')
        <p>{{$message}}</p>
        @enderror
        @csrf
        <input type="submit">
        <input type="reset">
    </form>
</div>
