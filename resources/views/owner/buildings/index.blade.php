@extends('owner.layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
@endsection

@section('content')
    <section class="is-hero-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
        <h1 class="title">
            Buildings List
        </h1>
        <a href="{{ route('buildings.create') }}" class="button green"><span class="icon"><i class="mdi mdi-plus"></i></span>Add</a>
    </div>
    </section>

  <section class="section main-section">
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Buildings
        </p>
      </header>
      <div class="card-content">
        <table class="table">
          <thead>
          <tr>
            <th class="image-cell"></th>
            <th>Name</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($buildings as $building)
            <tr>
                <td class="image-cell">
                <div class="image">
                    <img src="{{ 'data:image/png;base64,' . $building->image }}" class="rounded-full">
                </div>
                </td>
                <td data-label="Name">{{ $building->name }}</td>
                <td data-label="Phone">{{ $building->phone }}</td>
                <td data-label="Address">{{ $building->address }}</td>
                <td data-label="Created">
                <small class="text-gray-500">{{ $building->created_at }}</small>
                </td>
                <td data-label="Updated">
                    <small class="text-gray-500">{{ $building->updated_at }}</small>
                    </td>
                <td class="actions-cell">
                <div class="buttons right nowrap">
                    <button class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                    <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </button>
                    <button class="button small red --jb-modal" data-target="sample-modal" type="button">
                    <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                    </button>
                </div>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    </section>
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('asset/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/jquery.rowspanizer.min.js') }}"></script>
<script>
    $(document).ready(function() {
      $('table').DataTable({
        columnDefs: [
            { orderable: false, targets: [0, 6] }
        ],
        order: [[1, 'asc']]
      });
      $('.dataTables_length').addClass('bs-select');
    });
  </script>
@endsection
