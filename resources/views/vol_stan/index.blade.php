@extends('layouts.template')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Vol STAN</h1>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Table de vols</h4>
      </div>
      <div class="card-body">
        <a href="{{ route('vol_stan.create') }}" class="btn btn-primary">
          <i class="mdi mdi-plus"></i> Ajouter un Vol
        </a>
        <div class="table-responsive">
          <table class="table tablesorter" id="">
            <thead class="text-primary">
              <tr>
                <th>Call Sign</th>
                <th>A_dep</th>
                <th>A_des</th>
                <th>heure_entree</th>
                <th>Immatriculation</th>
                <th>Delete</th>
                <th>Modify</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
              @foreach($vol_stan as $vol)
              <tr>
                <td>{{ $vol->Call_sign }}</td>
                <td>{{ $vol->A_dep }}</td>
                <td>{{ $vol->A_des }}</td>
                <td>{{ $vol->heure_entree }}</td>
                <td>{{ $vol->Immatriculation }}</td>
                <td>
                  <form method="post" action="{{ route('vol_stan.destroy', ['vol_stan' => $vol->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $vol->id }}">Edit</button>
                </td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal{{ $vol->id }}">View</button>
                  <div class="modal fade" tabindex="-1" role="dialog" id="viewModal{{ $vol->id }}">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">View Vol</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p><strong>Date_file: </strong>{{ $vol->Date_file }}</p>
                          <p><strong>Date_flight: </strong>{{ $vol->Date_flight }}</p>
                          <p><strong>Pln OACI: </strong>{{ $vol->pln_oaci }}</p>
                          <p><strong>adresse_mac: </strong>{{ $vol->adresse_mac }}</p>
                          <p><strong>ifpl_id: </strong>{{ $vol->ifpl_id }}</p>
                          <p><strong>code_examption: </strong>{{ $vol->code_examption }}</p>
                          <p><strong>code_operateur: </strong>{{ $vol->code_operateur }}</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>

              <!-- Edit Modal -->
              <div class="modal fade" tabindex="-1" role="dialog" id="editModal{{ $vol->id }}">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Modifier un Vol</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post" action="{{ route('vol_stan.update', $vol->id) }}">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                          <label>Call Sign</label>
                          <input type="text" class="form-control" name="Call_sign" placeholder="Call Sign" value="{{ $vol->Call_sign }}" />
                        </div>
                        <div class="form-group">
                          <label>A_dep</label>
                          <input type="text" class="form-control" name="A_dep" placeholder="A_dep" value="{{ $vol->A_dep }}" />
                        </div>
                        <div class="form-group">
                          <label>A_des</label>
                          <input type="text" class="form-control" name="A_des" placeholder="A_des" value="{{ $vol->A_des }}" />
                        </div>
                        <div class="form-group">
                          <label>heure_entree</label>
                          <input type="text" class="form-control" name="heure_entree" placeholder="heure_entree" value="{{ $vol->heure_entree }}" />
                        </div>
                        <div class="form-group">
                          <label>Immatriculation</label>
                          <input type="text" class="form-control" name="Immatriculation" placeholder="Immatriculation" value="{{ $vol->Immatriculation }}" />
                        </div>
                        <div class="form-group">
                          <label>Date_file</label>
                          <input type="text" class="form-control" name="Date_file" placeholder="Date_file" value="{{ $vol->Date_file }}" />
                        </div>
                        <div class="form-group">
                          <label>Date_flight</label>
                          <input type="text" class="form-control" name="Date_flight" placeholder="Date_flight" value="{{ $vol->Date_flight }}" />
                        </div>
                        <div class="form-group">
                          <label>Pln Oaci</label>
                          <input type="text" class="form-control" name="pln_oaci" placeholder="pln_oaci" value="{{ $vol->pln_oaci }}" />
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
                          <label>code_examption</label>
                          <input type="text" class="form-control" name="code_examption" placeholder="code_examption" value="{{ $vol->code_examption }}" />
                        </div>
                        <div class="form-group">
                          <label>code_operateur</label>
                          <input type="text" class="form-control" name="code_operateur" placeholder="code_operateur" value="{{ $vol->code_operateur }}" />
                        </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary" value="Save Changes" />
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
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
  </div>
</div>
@endsection
