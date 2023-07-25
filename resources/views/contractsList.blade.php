<a href="/contract/create">create new contract</a>

<div>
    <div>
        <form action="" method="get">
            <input name="search" type="text" >
            <label for="search" >search</label>
        </form>
    </div>
</div>
<div>
    @foreach($Contracts as $contract)
        <a href="/contract/{{$contract->id}}">
            <p>{{$contract->client_name}}</p>
        </a>
        <p>{{$contract->client_cin}}</p>
        <p>{{$contract->price}}</p>
        <p>{{$contract->car->platenumber}}</p>
        <br>
    @endforeach
</div>
