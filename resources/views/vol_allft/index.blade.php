@extends('layouts.copy')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>Vol</h1>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Table de vols</h4>
            </div>
            <div class="card-body">
                <a href="{{ route('vol_allft.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus"></i> Ajouter un Vol
                </a>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th>Call Sign</th>
                                <th>A_dep</th>
                                <th>A_des</th>
                                <th>heure_entree</th>
                                <th>Immatriculation</th>
                                <th>Delete</th>
                                <th>Modify</th>
                                <th>Voir un vol</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vol_allft_paginate as $vol)
                            <tr>
                                <td>{{ $vol->call_sign }}</td>
                                <td>{{ $vol->a_dep }}</td>
                                <td>{{ $vol->a_des }}</td>
                                <td>{{ $vol->heure_de_reference }}</td>
                                <td>{{ $vol->immatriculation }}</td>
                                <td>
                                    <form method="post" action="{{ route('vol_allft.destroy', ['vol_allft' => $vol->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $vol->id }}">Edit</button>
                                </td>
                                <td>
                                    <a href="{{ route('vol_allft.index',['id' => $vol->id]) }}" class="btn btn-primary">
                                        <i class="mdi mdi-eye"></i> Voir un vol
                                    </a>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $vol->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $vol->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $vol->id }}">Modifier un Vol</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('vol_allft.update', $vol->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="_method" value="PUT">
                                                <div class="form-group">
                                                    <label>Call Sign</label>
                                                    <input type="text" class="form-control" name="call_sign" value="{{ $vol->call_sign }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>A_dep</label>
                                                    <input type="text" class="form-control" name="a_dep" value="{{ $vol->a_dep }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>A_des</label>
                                                    <input type="text" class="form-control" name="a_des" value="{{ $vol->a_des }}" />
                                                </div>
                                                <div class="form-group">
                                                    <label>heure_entree</label>
                                                    <input type="text" class="form-control" name="heure_de_reference" value="{{ $vol->heure_de_reference }}" />
                                                </div>
                                                <div class="form-group">
                                                  <label>Immatriculation</label>
                                                  <input type="text" class="form-control" name="immatriculation" placeholder="immatriculation" value="{{ $vol->immatriculation }}" />
                                                </div>
                                                <div class="form-group">
                                                  <label>adresse_mac</label>
                                                  <input type="text" class="form-control" name="adresse_mac" placeholder="adresse_mac" value="{{ $vol->adresse_mac }}" />
                                                </div>
                                                <div class="form-group">
                                                  <label>ifpl_id</label>
                                                  <input type="text" class="form-control" name="ifpl_id" placeholder="ifpl_id" value="{{ $vol->ifpl_id }}" />
                                                </div>
                                                <div class="form-group">
                                                  <label>Rang de la transaction operateur</label>
                                                  <input type="text" class="form-control" name="finaltransaction" placeholder="Rang de la transaction operateur" value="{{ $vol->finaltransaction }}" />
                                                </div>
                                                <div class="form-group">
                                                  <label>Texte de la transaction operateur</label>
                                                  <input type="text" class="form-control" name="texte_transaction_operateur" placeholder="Texte de la transaction operateur" value="{{ $vol->case9}}" />
                                                </div>
                                                <div class="form-group">
                                                  <label>Accuse TRT de la transaction operateur</label>
                                                  <input type="text" class="form-control" name="accuseTrttransaction" placeholder="Accuse TRT de la transaction operateur" value="{{ $vol->accuseTrttransaction }}" />
                                                </div>
                                                <div class="form-group">
                                                  <input type="submit" class="btn btn-primary" value="Save Changes" />
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
    {!! $vol_allft_paginate->links() !!}
    <a href="/downloads-pdf" id="downloadPdfsBtn">Download Flights PDF</a>

    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Vols details</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          @if ($id)
            @foreach($vol_allft as $vol)
              @if($vol->id==$id)
                <table class="table tablesorter" id="">
                  <thead class="text-primary">
                    <tr>
                      <th>adresse_mac</th>
                      <th>ifpl_id</th>
                      <th>code_examption</th>
                      <th>code_operateur</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ $vol->adresse_mac }}</td>
                      <td>{{ $vol->ifpl_id }}</td>
                      <td>{{ $vol->code_examption }}</td>
                      <td>{{ $vol->code_operateur }}</td>
                    </tr>
                  </tbody>
                </table>
                
                <div class="tab">
                  <button class="tablinks" onclick="openCity(event, 'rang')">Rang de la transaction operateur</button>
                  <button class="tablinks" onclick="openCity(event, 'texte')">Texte de la transaction operateur</button>
                  <button class="tablinks" onclick="openCity(event, 'accuse')">Accuse TRT de la transaction operateur </button>
                </div>
                <div id="rang" class="tabcontent">
                  <p>{{ $vol->finaltransaction }}</p>
                </div>
                <div id="texte" class="tabcontent">
                  <p>{{ $vol->case7 }}</p>
                  <p>{{ $vol->case8 }}</p>
                  <p>{{ $vol->case9 }}</p>
                  <p>{{ $vol->case10 }}</p>
                  <p>{{ $vol->case13 }}</p>
                  <p>{{ $vol->case15 }}</p>
                  <p>{{ $vol->case16 }}</p>
                  <p>{{ $vol->case18 }}</p>
                </div>
                <div id="accuse" class="tabcontent">
                  <p>{{ $vol->heure }}</p>
                  <p>{{ $vol->minute }}</p>
                  <p>{{ $vol->accuseTrttransaction }}</p>
                  <p>{{ $vol->ccrArrival }}</p>
                </div>
                
                <style>
                    body {font-family: Arial;color: #6D769C;}

                    /* Style the tab */
                    .tab {
                      overflow: hidden;
                      background-color: white;
                    }

                    /* Style the buttons inside the tab */
                    .tab button {
                      background-color: inherit;
                      float: left;
                      border: none;
                      outline: none;
                      cursor: pointer;
                      padding: 14px 16px;
                      transition: 0.3s;
                      font-size: 17px;
                      color: black;
                    }

                    /* Change background color of buttons on hover */
                    .tab button:hover {
                      background-color: lightgray;
                    }

                    /* Create an active/current tablink class */
                    .tab button.active {
                      background-color: lightgray;
                    }

                    /* Style the tab content */
                    .tabcontent {
                      display: none;
                      padding: 6px 12px;
                      -webkit-animation: fadeEffect 1s;
                      animation: fadeEffect 1s;
                    }

                    /* Fade in tabs */
                    @-webkit-keyframes fadeEffect {
                      from {opacity: 0;}
                      to {opacity: 1;}
                    }

                    @keyframes fadeEffect {
                      from {opacity: 0;}
                      to {opacity: 1;}
                    }
                    </style>
                    <script>
                    function openCity(evt, cityName) {
                      var i, tabcontent, tablinks;
                      tabcontent = document.getElementsByClassName("tabcontent");
                      for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                      }
                      tablinks = document.getElementsByClassName("tablinks");
                      for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                      }
                      document.getElementById(cityName).style.display = "block";
                      evt.currentTarget.className += " active";
                    }
                    </script>
                
              @endif
            @endforeach
          @else
          <p> Aucun vol sélectionné</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
