@extends('layouts.template')

@section('content')
<div class="row">
  <div class="col-md-12">
    <h1>Redevances</h1>
    <div class="card ">
      <div class="card-header">
        <h4 class="card-title">Table de vols</h4>
      </div>
      <div class="card-body">
      <a href="{{ route('product.create') }}" class="btn btn-primary">
      <i class="mdi mdi-plus"></i>
                      
</a>
        <div class="table-responsive">
          <table class="table tablesorter " id="">
            <thead class=" text-primary">
              <tr>
                <th>FLPL Call Sign</th>
                <th>FLPL Departure Airport</th>
                <th>FLPL Arrival Airport</th>
                <th class="text-center">Aircraft Type</th>
                <th class="text-center">AOBT</th>
                <th class="text-center">EOBT</th>
                <th class="text-center">File Date</th>
                <th class="text-center">Flight State</th>
                <th class="text-center">Flight Type</th>
                <th class="text-center">IFPS Registration Mark</th>
                <th class="text-center">Initial Flight Rule</th>
                <th class="text-center">NM IFPS ID</th>
                <th class="text-center">NM Tactical ID</th>
                <th class="text-center"> Delete</th>
                <th class="text-center"> Modify</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
              <tr>
                <td>{{ $product->flpl_call_sign }}</td>
                <td>{{ $product->flpl_depr_airp }}</td>
                <td>{{ $product->flpl_arrv_airp }}</td>
                <td class="text-center">{{ $product->airc_type }}</td>
                <td class="text-center">{{ $product->aobt }}</td>
                <td class="text-center">{{ $product->eobt }}</td>
                <td class="text-center">{{ $product->file_date }}</td>
                <td class="text-center">{{ $product->flight_state }}</td>
                <td class="text-center">{{ $product->flight_type }}</td>
                <td class="text-center">{{ $product->ifps_registration_mark }}</td>
                <td class="text-center">{{ $product->initial_flight_rule }}</td>
                <td class="text-center">{{ $product->nm_ifps_id }}</td>
                <td class="text-center">{{ $product->nm_tactical_id }}</td>
                <td class="text-center">
                    <a href="{{ route('product.create') }}" class="btn btn-alert">
                      <i class="mdi mdi-block-helper"></i>
                      <form method="post" action="{{route('product.destroy', ['product' => $product])}}">
                            @csrf 
                            @method('delete')
                        </form>
                    </a>
                </td>
                <td class="text-center">
                <a href="{{route('product.edit', ['product' => $product])}}" class="btn btn-secondary">
                    Edit
                </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>

@endsection
