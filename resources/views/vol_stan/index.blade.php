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
                  <form method="post" action="{{ route('vol_stan.destroy', ['vol_stan' => $vol]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
                <td class="text-center">
                  <a href="{{ route('vol_stan.edit', ['vol_stan' => $vol]) }}" class="btn btn-secondary">Edit</a>
                </td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewModal{{ $vol->id }}">View</button>
                  <div class="modal" tabindex="-1" role="dialog" id="viewModal{{ $vol->id }}">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">View</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                        <p style="margin-bottom: 10px; font-size: 16px;">
                            <strong>Date_file:   </strong>{{ $vol->Date_file }}<br>
                        </p>
                        <p style="margin-bottom: 10px; font-size: 16px;">
                            <strong>Date_flight:   </strong>{{ $vol->Date_flight }}<br>
                        </p>
                        <p style="margin-bottom: 10px; font-size: 16px;">
                            <strong>Pln OACI:   </strong> {{ $vol->pln_oaci }}<br>
                        </p>
                        <p style="margin-bottom: 10px; font-size: 16px;">
                            <strong>adresse_mac:   </strong>{{ $vol->adresse_mac }}<br>
                        </p>
                        <p style="margin-bottom: 10px; font-size: 16px;">
                            <strong>ifpl_id:   </strong>{{ $vol->ifpl_id }}<br>
                        </p>
                        <p style="margin-bottom: 10px; font-size: 16px;">
                            <strong>code_examption:   </strong>{{ $vol->code_examption }}<br>
                        </p>
                        <p style="margin-bottom: 10px; font-size: 16px;">
                            <strong>code_operateur:   </strong>{{ $vol->code_operateur }}<br>
                        </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
