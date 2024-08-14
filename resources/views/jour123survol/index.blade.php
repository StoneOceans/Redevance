@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1><i class="fas fa-plane-departure"></i> Liste des vols pour la journée du {{ $items[0]->flight_date }}</h1>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><i class="fas fa-table"></i> Vols soumis à redevance uniquement</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('jour123survol.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Ajouter un vol
                </a>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th><i class="fas fa-hashtag"></i> Sequence Number</th>
                                <th><i class="fas fa-clock"></i> Time of Departure</th>
                                <th><i class="fas fa-plane-departure"></i> Departure Aerodrome</th>
                                <th><i class="fas fa-plane-arrival"></i> Arrival Aerodrome</th>
                                <th><i class="fas fa-fingerprint"></i> Flight Identification</th>
                                <th><i class="fas fa-plane"></i> Type of Aircraft</th>
                                <th><i class="fas fa-eye"></i> Voir</th>
                                <th><i class="fas fa-edit"></i> Modifier</th>
                                <th><i class="fas fa-trash-alt"></i> Supprimer</th>
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
                                            <i class="fas fa-eye"></i> Voir
                                        </a>
                                    </td>
                                    <td style="background-color: cyan;">
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                            <i class="fas fa-edit"></i> Modifier
                                        </button>
                                    </td>
                                    <td style="background-color: cyan;">
                                        <form method="post" action="{{ route('jour123survol.destroy', ['jour123survol' => $item->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i> Supprimer
                                            </button>
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
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <form method="post" action="{{ route('jour123survol.destroy', ['jour123survol' => $item->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $item->id }}">
                                                <i class="fas fa-edit"></i> Modifier un Enregistrement
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('jour123survol.update', $item->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label><i class="fas fa-hashtag"></i> Sequence Number</label>
                                                    <input type="text" class="form-control" name="sequence_number" value="{{ $item->sequence_number }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label><i class="fas fa-fingerprint"></i> Code</label>
                                                    <input type="text" class="form-control" name="code" value="{{ $item->code }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label><i class="fas fa-clock"></i> Time of Departure</label>
                                                    <input type="text" class="form-control" name="time_of_departure_entry" value="{{ $item->time_of_departure_entry }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label><i class="fas fa-plane-departure"></i> Departure Aerodrome</label>
                                                    <input type="text" class="form-control" name="departure_aerodrome" value="{{ $item->departure_aerodrome }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label><i class="fas fa-plane-arrival"></i> Arrival Aerodrome</label>
                                                    <input type="text" class="form-control" name="arrival_aerodrome" value="{{ $item->arrival_aerodrome }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label><i class="fas fa-fingerprint"></i> Flight Identification</label>
                                                    <input type="text" class="form-control" name="flight_identification" value="{{ $item->flight_identification }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label><i class="fas fa-exclamation-triangle"></i> Main Exemption Code</label>
                                                    <input type="text" class="form-control" name="main_Exemption_code" value="{{ $item->main_Exemption_code }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label><i class="fas fa-plane"></i> Type of Aircraft</label>
                                                    <input type="text" class="form-control" name="type_of_aircraft" value="{{ $item->type_of_aircraft }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label><i class="fas fa-user-tie"></i> Operator</label>
                                                    <input type="text" class="form-control" name="operator" value="{{ $item->operator }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label><i class="fas fa-file-alt"></i> Aircraft Registration</label>
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
                <h4 class="card-title"><i class="fas fa-info-circle"></i> Détails du Survol</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th><i class="fas fa-file-alt"></i> Aircraft Registration</th>
                                <th><i class="fas fa-comment-alt"></i> Comment</th>
                                <th><i class="fas fa-calendar-day"></i> Flight Date</th>
                                <th><i class="fas fa-id-badge"></i> iFPLID</th>
                                <th><i class="fas fa-map-marker-alt"></i> Planned Aerodrome</th>
                                <th><i class="fas fa-exclamation-triangle"></i> Charging Zone Overflow</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $selectedItem->aircraft_Registration }}</td>
                                <td>{{ $selectedItem->comment1 }}</td>
                                <td>{{ $selectedItem->flight_date }}</td>
                                <td>{{ $selectedItem->iFPLID }}</td>
                                <td>{{ $selectedItem->planned_aerodrome }}</td>
                                <td>{{ $selectedItem->charging_zone_overflow }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'entry')"><i class="fas fa-map-marker-alt"></i> Entry Point</button>
                        <button class="tablinks" onclick="openTab(event, 'exit')"><i class="fas fa-sign-out-alt"></i> Exit Point</button>
                        <button class="tablinks" onclick="openTab(event, 'sup')"><i class="fas fa-exclamation-triangle"></i> Sup Exemption Code</button>
                        <button class="tablinks" onclick="openTab(event, 'source')"><i class="fas fa-map-marker-alt"></i> Source of the Aircraft Address</button>
                        <button class="tablinks" onclick="openTab(event, 'bit')"><i class="fas fa-microchip"></i> 24-bit Aircraft Address</button>
                        <button class="tablinks" onclick="openTab(event, 'comment2')"><i class="fas fa-comment-alt"></i> Comment Second</button>
                        <button class="tablinks" onclick="openTab(event, 'case7')"><i class="fas fa-layer-group"></i> Case 7</button>
                        <button class="tablinks" onclick="openTab(event, 'case8')"><i class="fas fa-layer-group"></i> Case 8</button>
                        <button class="tablinks" onclick="openTab(event, 'case9')"><i class="fas fa-layer-group"></i> Case 9</button>
                        <button class="tablinks" onclick="openTab(event, 'case10')"><i class="fas fa-layer-group"></i> Case 10</button>
                        <button class="tablinks" onclick="openTab(event, 'case13')"><i class="fas fa-layer-group"></i> Case 13</button>
                        <button class="tablinks" onclick="openTab(event, 'case15')"><i class="fas fa-layer-group"></i> Case 15</button>
                        <button class="tablinks" onclick="openTab(event, 'case16')"><i class="fas fa-layer-group"></i> Case 16</button>
                        <button class="tablinks" onclick="openTab(event, 'case18')"><i class="fas fa-layer-group"></i> Case 18</button>
                        <button class="tablinks" onclick="openTab(event, 'front')"><i class="fas fa-plane"></i> Front ALG FR</button>
                        <button class="tablinks" onclick="openTab(event, 'premier')"><i class="fas fa-chart-line"></i> Premier Plot FR</button>
                        <button class="tablinks" onclick="openTab(event, 'modes')"><i class="fas fa-signal"></i> Modes FR</button>
                        <button class="tablinks" onclick="openTab(event, 'ccr')"><i class="fas fa-clock"></i> CCR Arrival</button>
                        <button class="tablinks" onclick="openTab(event, 'typeavion')"><i class="fas fa-plane"></i> Type Avion SURVOL</button>
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
