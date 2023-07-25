<h1>Contract for renting a car </h1>
<h6>client name: {{$contract->client_name}}</h6>
<h6>client cin: {{$contract->client_cin}}</h6>
<h6>contract start date: {{$contract->rent_start_date}}</h6>
<h6>contract end date: {{$contract->rent_end_date}}</h6>
<h6>for the price of: {{$contract->price}}</h6>
<h4>the car information</h4>
<h6>car name: {{$contract->car->name}}</h6>
<h6>car plate number: {{$contract->car->platenumber}}</h6>
<p>signe here</p>
