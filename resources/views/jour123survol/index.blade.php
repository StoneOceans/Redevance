@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Liste de Vols pour la journée du {{ $selectedItem->flight_date }}</h1>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Table des Survols</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('jour123survol.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Ajouter un Enregistrement
                </a>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th>Sequence Number</th>
                                <th>Time of Departure</th>
                                <th>Departure Aerodrome</th>
                                <th>Arrival Aerodrome</th>
                                <th>Flight Identification</th>
                                <th>Type of Aircraft</th>
                                <th>Voir</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                            <tr>


                                    @if ($selectedItem !== null && $selectedItem->id == $item->id)
                                        <td style="background-color: cyan;">{{ $item->sequence_number }}</td>
                                        <td style="background-color: cyan;">{{ $item->time_of_departure_entry }}</td>
                                        <td style="background-color: cyan;">{{ $item->departure_aerodrome }}</td>
                                        <td style="background-color: cyan;">{{ $item->arrival_aerodrome }}</td>
                                        <td style="background-color: cyan;">{{ $item->flight_identification }}</td>
                                        <td style="background-color: cyan;">{{ $item->type_of_aircraft }}</td>
                                        <td style="background-color: cyan;">
                                        <a href="{{ route('jour123survol.index', ['id' => $item->id]) }}" class="btn btn-info btn-sm">
                                            <i class="mdi mdi-eye"></i> Voir
                                        </a>
                                        </td>
                                        <td style="background-color: cyan;">
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Modifier</button>
                                        </td>
                                        <td style="background-color: cyan;">
                                            <form method="post" action="{{ route('jour123survol.destroy', ['jour123survol' => $item->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                            </form>
                                        </td>
                                    @else
                                        <td>{{ $item->sequence_number }}</td>
                                        <td>{{ $item->time_of_departure_entry }}</td>
                                        <td>{{ $item->departure_aerodrome }}</td>
                                        <td>{{ $item->arrival_aerodrome }}</td>
                                        <td>{{ $item->flight_identification }}</td>
                                        <td>{{ $item->type_of_aircraft }}</td>
                                        <td>
                                        <a href="{{ route('jour123survol.index', ['id' => $item->id]) }}" class="btn btn-info btn-sm">
                                            <i class="mdi mdi-eye"></i> Voir
                                        </a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">Modifier</button>
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('jour123survol.destroy', ['jour123survol' => $item->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                            </form>
                                        </td>
                                    @endif
                                
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">Modifier un Enregistrement</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('jour123survol.update', $item->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label>Sequence Number</label>
                                                    <input type="text" class="form-control" name="sequence_number" value="{{ $item->sequence_number }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Code</label>
                                                    <input type="text" class="form-control" name="code" value="{{ $item->code }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Time of Departure</label>
                                                    <input type="text" class="form-control" name="time_of_departure_entry" value="{{ $item->time_of_departure_entry }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Departure Aerodrome</label>
                                                    <input type="text" class="form-control" name="departure_aerodrome" value="{{ $item->departure_aerodrome }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Arrival Aerodrome</label>
                                                    <input type="text" class="form-control" name="arrival_aerodrome" value="{{ $item->arrival_aerodrome }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Flight Identification</label>
                                                    <input type="text" class="form-control" name="flight_identification" value="{{ $item->flight_identification }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Main Exemption Code</label>
                                                    <input type="text" class="form-control" name="main_Exemption_code" value="{{ $item->main_Exemption_code }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Type of Aircraft</label>
                                                    <input type="text" class="form-control" name="type_of_aircraft" value="{{ $item->type_of_aircraft }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Operator</label>
                                                    <input type="text" class="form-control" name="operator" value="{{ $item->operator }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Aircraft Registration</label>
                                                    <input type="text" class="form-control" name="aircraft_Registration" value="{{ $item->aircraft_Registration }}" />
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary" value="Enregistrer les modifications" />
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {!! $items->links() !!}

        @if($selectedItem)
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="card-title">Détails du Survol</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>aircraft_Registration</th>
                                <th>comment1</th>
                                <th>flight_date</th>
                                <th>iFPLID</th>
                                <th>planned_aerodrome</th>
                                <th>charging_zone_overflow</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $selectedItem->aircraft_Registration  }}</td>
                                <td>{{ $selectedItem->comment1 }}</td>
                                <td>{{ $selectedItem->flight_date }}</td>
                                <td>{{ $selectedItem->iFPLID }}</td>
                                <td>{{ $selectedItem->planned_aerodrome }}</td>
                                <td>{{ $selectedItem->charging_zone_overflow }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'entry')">Entry Point</button>
                        <button class="tablinks" onclick="openTab(event, 'exit')">Exit Point</button>
                        <button class="tablinks" onclick="openTab(event, 'sup')">Sup exemption code </button>
                        <button class="tablinks" onclick="openTab(event, 'source')">Source of the Aircraft address</button>
                        <button class="tablinks" onclick="openTab(event, 'bit')">24_bit_Aircraft_Address</button>
                        <button class="tablinks" onclick="openTab(event, 'comment2')">Comment second </button>
                        <button class="tablinks" onclick="openTab(event, 'case7')">Case 7</button>
                        <button class="tablinks" onclick="openTab(event, 'case8')">Case 8</button>
                        <button class="tablinks" onclick="openTab(event, 'case9')">Case 9 </button>
                        <button class="tablinks" onclick="openTab(event, 'case10')">Case 10</button>
                        <button class="tablinks" onclick="openTab(event, 'case13')">Case 13</button>
                        <button class="tablinks" onclick="openTab(event, 'case15')">Case 15 </button>
                        <button class="tablinks" onclick="openTab(event, 'case16')">Case 16</button>
                        <button class="tablinks" onclick="openTab(event, 'case18')">Case 18</button>
                        <button class="tablinks" onclick="openTab(event, 'front')">Front ALG FR</button>
                        <button class="tablinks" onclick="openTab(event, 'premier')">Premier plot FR</button>
                        <button class="tablinks" onclick="openTab(event, 'modes')">Modes FR</button>
                        <button class="tablinks" onclick="openTab(event, 'ccr')">CCR ArrivalL</button>
                        <button class="tablinks" onclick="openTab(event, 'typeavion')">Type Avion SURVOL </button>
                    </div>
                    <div id="entry" class="tabcontent">
                        <p>{{ $selectedItem->entry_point }}</p>
                    </div>
                    <div id="exit" class="tabcontent">
                        <p>{{ $selectedItem->exit_point }}</p>
                    </div>
                    <div id="sup" class="tabcontent">
                        <p>{{ $selectedItem->sup_exemption_code }}</p>
                    </div>
                    <div id="source" class="tabcontent">
                        <p>{{ $selectedItem->source_of_the_Aircraft_Address }}</p>
                    </div>
                    <div id="bit" class="tabcontent">
                        <p>{{ $selectedItem->{'24_bit_Aircraft_Address'} }}</p>
                    </div>
                    <div id="comment2" class="tabcontent">
                        <p>{{ $selectedItem->comment2 }}</p>
                    </div>
                    <div id="case7" class="tabcontent">
                        <p>{{ $selectedItem->case7 }}</p>
                    </div>
                    <div id="case8" class="tabcontent">
                        <p>{{ $selectedItem->case8 }}</p>
                    </div>
                    <div id="case9" class="tabcontent">
                        <p>{{ $selectedItem->case9 }}</p>
                    </div>
                    <div id="case10" class="tabcontent">
                        <p>{{ $selectedItem->case10 }}</p>
                    </div>
                    <div id="case13" class="tabcontent">
                        <p>{{ $selectedItem->case13 }}</p>
                    </div>
                    <div id="case15" class="tabcontent">
                        <p>{{ $selectedItem->case15 }}</p>
                    </div>
                    <div id="case16" class="tabcontent">
                        <p>{{ $selectedItem->case16 }}</p>
                    </div>
                    <div id="case18" class="tabcontent">
                        <p>{{ $selectedItem->case18 }}</p>
                    </div>
                    <div id="front" class="tabcontent">
                        <p>{{ $selectedItem->front_alg_fr }}</p>
                    </div>
                    <div id="premier" class="tabcontent">
                        <p>{{ $selectedItem->premier_plot_fr }}</p>
                    </div>
                    <div id="modes" class="tabcontent">
                        <p>{{ $selectedItem->modes_fr }}</p>
                    </div>
                    <div id="ccr" class="tabcontent">
                        <p>{{ $selectedItem->ccrArrival }}</p>
                    </div>
                    <div id="typeavion" class="tabcontent">
                        <p>{{ $selectedItem->type_Avion_Survol }}</p>
                    </div>
                </div>
            </div>
        </div>
        @else
            <p>Aucun survol sélectionné</p>
        @endif
    </div>
</div>

<script>
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>

@endsection
