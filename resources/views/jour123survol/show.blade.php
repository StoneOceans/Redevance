@extends('layouts.copy')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-4">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="card-title">Détails de l'Enregistrement</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Sequence Number</th>
                        <td>{{ $jour_123_survol->sequence_number }}</td>
                    </tr>
                    <tr>
                        <th>Code</th>
                        <td>{{ $jour_123_survol->code }}</td>
                    </tr>
                    <tr>
                        <th>Time of Departure Entry</th>
                        <td>{{ $jour_123_survol->time_of_departure_entry }}</td>
                    </tr>
                    <tr>
                        <th>Departure Aerodrome</th>
                        <td>{{ $jour_123_survol->departure_aerodrome }}</td>
                    </tr>
                    <tr>
                        <th>Arrival Aerodrome</th>
                        <td>{{ $jour_123_survol->arrival_aerodrome }}</td>
                    </tr>
                    <tr>
                        <th>Flight Identification</th>
                        <td>{{ $jour_123_survol->flight_identification }}</td>
                    </tr>
                    <tr>
                        <th>Main Exemption Code</th>
                        <td>{{ $jour_123_survol->main_Exemption_code }}</td>
                    </tr>
                    <tr>
                        <th>Type of Aircraft</th>
                        <td>{{ $jour_123_survol->type_of_aircraft }}</td>
                    </tr>
                    <tr>
                        <th>Operator</th>
                        <td>{{ $jour_123_survol->operator }}</td>
                    </tr>
                    <tr>
                        <th>Aircraft Registration</th>
                        <td>{{ $jour_123_survol->aircraft_Registration }}</td>
                    </tr>
                    <tr>
                        <th>Comment 1</th>
                        <td>{{ $jour_123_survol->comment1 }}</td>
                    </tr>
                    <tr>
                        <th>Flight Date</th>
                        <td>{{ $jour_123_survol->flight_date }}</td>
                    </tr>
                    <tr>
                        <th>IFPLID</th>
                        <td>{{ $jour_123_survol->iFPLID }}</td>
                    </tr>
                    <tr>
                        <th>Planned Aerodrome</th>
                        <td>{{ $jour_123_survol->planned_aerodrome }}</td>
                    </tr>
                    <tr>
                        <th>Charging Zone Overflow</th>
                        <td>{{ $jour_123_survol->charging_zone_overflow }}</td>
                    </tr>
                    <tr>
                        <th>Entry Point</th>
                        <td>{{ $jour_123_survol->entry_point }}</td>
                    </tr>
                    <tr>
                        <th>Exit Point</th>
                        <td>{{ $jour_123_survol->exit_point }}</td>
                    </tr>
                    <tr>
                        <th>Sup Exemption Code</th>
                        <td>{{ $jour_123_survol->sup_exemption_code }}</td>
                    </tr>
                    <tr>
                        <th>Source of the Aircraft Address</th>
                        <td>{{ $jour_123_survol->source_of_the_Aircraft_Address }}</td>
                    </tr>
                    <tr>
                        <th>24-bit Aircraft Address</th>
                        <td>{{ $jour_123_survol->{'24_bit_Aircraft_Address'} }}</td>
                    </tr>
                    <tr>
                        <th>Comment 2</th>
                        <td>{{ $jour_123_survol->comment2 }}</td>
                    </tr>
                    <tr>
                        <th>Case 7</th>
                        <td>{{ $jour_123_survol->case7 }}</td>
                    </tr>
                    <tr>
                        <th>Case 8</th>
                        <td>{{ $jour_123_survol->case8 }}</td>
                    </tr>
                    <tr>
                        <th>Case 9</th>
                        <td>{{ $jour_123_survol->case9 }}</td>
                    </tr>
                    <tr>
                        <th>Case 10</th>
                        <td>{{ $jour_123_survol->case10 }}</td>
                    </tr>
                    <tr>
                        <th>Case 13</th>
                        <td>{{ $jour_123_survol->case13 }}</td>
                    </tr>
                    <tr>
                        <th>Case 15</th>
                        <td>{{ $jour_123_survol->case15 }}</td>
                    </tr>
                    <tr>
                        <th>Case 16</th>
                        <td>{{ $jour_123_survol->case16 }}</td>
                    </tr>
                    <tr>
                        <th>Case 18</th>
                        <td>{{ $jour_123_survol->case18 }}</td>
                    </tr>
                    <tr>
                        <th>CCR Arrival</th>
                        <td>{{ $jour_123_survol->ccrArrival }}</td>
                    </tr>
                    <tr>
                        <th>Front Alg FR</th>
                        <td>{{ $jour_123_survol->front_alg_fr }}</td>
                    </tr>
                    <tr>
                        <th>Premier Plot FR</th>
                        <td>{{ $jour_123_survol->premier_plot_fr }}</td>
                    </tr>
                    <tr>
                        <th>Modes FR</th>
                        <td>{{ $jour_123_survol->modes_fr }}</td>
                    </tr>
                    <tr>
                        <th>Type Avion Survol</th>
                        <td>{{ $jour_123_survol->type_Avion_Survol }}</td>
                    </tr>
                </table>

                <div class="mt-4 text-center">
                    <a href="{{ route('jour123survol.index') }}" class="btn btn-secondary">Retour à la liste</a>
                    <a href="{{ route('jour123survol.edit', $jour_123_survol->sequence_number) }}" class="btn btn-warning">
                        <i class="mdi mdi-pencil"></i> Modifier
                    </a>
                    <form action="{{ route('jour123survol.destroy', $jour_123_survol->sequence_number) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="mdi mdi-delete"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
