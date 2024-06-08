@extends('layouts.template')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Vol all ft</h1>
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Table de vols</h4>
      </div>
      <div class="card-body">
        <a href="{{ route('vol_allft.create') }}" class="btn btn-primary">
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
                <th>Voir un vol</th>
              </tr>
            </thead>
            <tbody>
              @foreach($vol_allft_paginate as $vol)
              <tr>
                <td>{{ $vol->Call_sign }}</td>
                <td>{{ $vol->A_dep }}</td>
                <td>{{ $vol->A_des }}</td>
                <td>{{ $vol->heure_entree }}</td>
                <td>{{ $vol->Immatriculation }}</td>
                <td>
                  <form method="post" action="{{ route('vol_allft.destroy', ['vol_allft' => $vol->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
                <td>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal{{ $vol->id }}">Edit</button>
                </td>
                <td>
                  <a href="{{ route('vol_allft.index',['id' => $vol->id]) }}" class="btn btn-primary">
                    <i class="mdi mdi-eye"></i> Voir un vol
                  </a>
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
                      <form method="post" action="{{ route('vol_allft.update', $vol->id) }}">
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
                          <label>Rang de la transaction operateur</label>
                          <input type="text" class="form-control" name="rang_transaction_operateur" placeholder="Rang de la transaction operateur" value="{{ $vol->rang_transaction_operateur }}" />
                        </div>
                        <div class="form-group">
                          <label>Texte de la transaction operateur</label>
                          <input type="text" class="form-control" name="texte_transaction_operateur" placeholder="Texte de la transaction operateur" value="{{ $vol->texte_transaction_operateur }}" />
                        </div>
                        <div class="form-group">
                          <label>Accuse TRT de la transaction operateur</label>
                          <input type="text" class="form-control" name="accuse_trt_transaction_operateur" placeholder="Accuse TRT de la transaction operateur" value="{{ $vol->accuse_trt_transaction_operateur }}" />
                        </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary" value="Save Changes" />
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="card" id="hoverCard" style="display:none; position:absolute;">
          <div class="card-header">
            <h5 class="card-title">Flight Details</h5>
          </div>
            <div class="table-responsive">
          </div>
        </div>
      </div>
    </div>
    {!! $vol_allft_paginate->links() !!}
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
                      <th>Date_file</th>
                      <th>Date_flight</th>
                      <th>adresse_mac</th>
                      <th>ifpl_id</th>
                      <th>code_examption</th>
                      <th>code_operateur</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>{{ $vol->Date_file }}</td>
                      <td>{{ $vol->Date_flight }}</td>
                      <td>{{ $vol->adresse_mac }}</td>
                      <td>{{ $vol->ifpl_id }}</td>
                      <td>{{ $vol->code_examption }}</td>
                      <td>{{ $vol->code_operateur }}</td>
                    </tr>
                        </div>
                      </div>
                    </div>
                  </tbody>
                </table>
              @endif
            @endforeach
          @else
          <p> Aucun vol selectionné</p>
          @endif
        </div>
        <div class="card" id="hoverCard" style="display:none; position:absolute;">
          <div class="card-header">
            <h5 class="card-title">Flight Details</h5>
          </div>
          <div class="card-body">
            <p><strong>Call Sign:</strong> <span id="cardCallSign"></span></p>
            <p><strong>A_dep:</strong> <span id="cardADep"></span></p>
            <p><strong>A_des:</strong> <span id="cardADes"></span></p>
            <p><strong>heure_entree:</strong> <span id="cardHeureEntree"></span></p>
            <p><strong>Immatriculation:</strong> <span id="cardImmatriculation"></span></p>
            <p><strong>Rang de la transaction operateur:</strong> <span id="cardRangTransactionOperateur"></span></p>
            <p><strong>Texte de la transaction operateur:</strong> <span id="cardTexteTransactionOperateur"></span></p>
            <p><strong>Accuse TRT de la transaction operateur:</strong> <span id="cardAccuseTRTTransactionOperateur"></span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', (event) => {
  const viewButtons = document.querySelectorAll('.view-button');
  const hoverCard = document.getElementById('hoverCard');

  viewButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      const row = button.closest('tr');
      const callSign = row.querySelector('td:nth-child(1)').innerText;
      const aDep = row.querySelector('td:nth-child(2)').innerText;
      const aDes = row.querySelector('td:nth-child(3)').innerText;
      const heureEntree = row.querySelector('td:nth-child(4)').innerText;
      const immatriculation = row.querySelector('td:nth-child(5)').innerText;
      const rangTransactionOperateur = row.dataset.rangTransactionOperateur;
      const texteTransactionOperateur = row.dataset.texteTransactionOperateur;
      const accuseTRTTransactionOperateur = row.dataset.accuseTRTTransactionOperateur;

      document.getElementById('cardCallSign').innerText = callSign;
      document.getElementById('cardADep').innerText = aDep;
      document.getElementById('cardADes').innerText = aDes;
      document.getElementById('cardHeureEntree').innerText = heureEntree;
      document.getElementById('cardImmatriculation').innerText = immatriculation;
      document.getElementById('cardRangTransactionOperateur').innerText = rangTransactionOperateur;
      document.getElementById('cardTexteTransactionOperateur').innerText = texteTransactionOperateur;
      document.getElementById('cardAccuseTRTTransactionOperateur').innerText = accuseTRTTransactionOperateur;

      const rect = row.getBoundingClientRect();
      hoverCard.style.top = `${rect.bottom + window.scrollY}px`;
      hoverCard.style.left = `${rect.left + window.scrollX}px`;
      hoverCard.style.display = 'block';
    });
  });

  document.addEventListener('click', (e) => {
    if (!hoverCard.contains(e.target) && !e.target.classList.contains('view-button')) {
      hoverCard.style.display = 'none';
    }
  });
});
</script>

<style>
#hoverCard {
  width: 1000px; /* Increased width */
  height: 400px; /* Increased height */
  z-index: 100;
  border: 0px solid #ddd;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>
