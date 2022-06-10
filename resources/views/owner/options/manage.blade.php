@extends('owner.layouts.app')

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
@endsection

@section('content')
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Rent Options <b>{{ $building->name }}</b>
            </h1>
            <a href="{{ route('owner.options.create', ['building' => $building]) }}" class="button green"><span class="icon"><i
                class="mdi mdi-plus"></i></span>Add</a>
        </div>
    </section>

    @extends('shared.layouts.flash')

    <section class="section main-section">
        <div class="card ">
            <div class="card-content">
                <form method="POST" action="{{ route('owner.options.availability', $building->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <div class="field-body">
                            <div class="field">
                                <label class="label">Availability</label>
                                <div class="field-body">
                                    <div class="field">
                                        <label class="switch">
                                            <input type="checkbox" {{ ($building->status == 4) ? 'checked' : '' }} name="status" id="status" value="4">
                                            <span class="check"></span>
                                            <span class="control-label">Available</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="field grouped">
                        <div class="control">
                            <button type="submit" class="button green">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="section main-section">
        <div class="card ">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    Options
                </p>
            </header>
            <div class="card-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="image-cell"></th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($building->options as $option)
                            <tr>
                                <td class="image-cell">
                                    <div class="image">
                                        <img src="{{ 'data:image/png;base64,' . $option->image }}"
                                            class="rounded-full">
                                    </div>
                                </td>
                                <td data-label="Name">{{ $option->name }}</td>
                                <td data-label="Description">{{ $option->desc }}</td>
                                <td data-label="Price">Rp.{{ number_format($option->price ,2,",",".") }}</td>
                                <td data-label="Created">
                                    <small class="text-gray-500">{{ $option->created_at }}</small>
                                </td>
                                <td data-label="Updated">
                                    <small class="text-gray-500">{{ $option->updated_at }}</small>
                                </td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <form class="mb-0" action="{{ route('owner.options.destroy') }}"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="id" id="id" value="{{ $option->id }}">
                                            <button class="button small red --jb-modal" type="submit">
                                                <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                                            </button>
                                        </form>
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
                columnDefs: [{
                    orderable: false,
                    targets: [0, 6]
                }],
                order: [
                    [1, 'asc']
                ]
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
