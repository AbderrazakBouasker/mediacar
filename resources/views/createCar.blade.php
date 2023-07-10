<div>
    <form action="/cars/create/submit" method="post">
        <input type="text" placeholder="name">
        <input type="text" placeholder="model">
        <input type="text" placeholder="platenumber">
        <input type="text" placeholder="status">
        <input type="text" placeholder="availability">
        <input type="text" placeholder="description">
        <input type="text" placeholder="gearbox">
        <input type="text" placeholder="number of seats">
        <input type="text" placeholder="fueltype">
        <input type="text" placeholder="horsepower">
        @csrf
        <input type="submit">
        <input type="reset">
    </form>
</div>
