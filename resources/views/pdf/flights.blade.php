<div class="card">
    <div class="card-header">
        <h4 class="card-title">First twenty Flights</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="text-primary">
                    <tr>
                        <th>Call Sign</th>
                        <th>Departure Airport</th>
                        <th>Destination Airport</th>
                        <th>Registration</th>
                        <th>Entry Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($firstFiveFlights as $flight)
                    <tr>
                        <td>{{ $flight->call_sign }}</td>
                        <td>{{ $flight->a_dep }}</td>
                        <td>{{ $flight->a_des }}</td>
                        <td>{{ $flight->heure_de_reference }}</td>
                        <td>{{ $flight->immatriculation }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
