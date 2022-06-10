@extends('admin.layouts.app')

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
                Orders Queue
            </h1>
        </div>
    </section>

    @extends('shared.layouts.flash')

    <section class="section main-section">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    List
                </p>
            </header>
            <div class="card-content">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Building</th>
                            <th>Applicant</th>
                            <th>Due</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>

                                <td data-label="Building">{{ $order->building->name }}</td>
                                <td data-label="Applicant">{{ $order->user->name }}</td>
                                <td data-label="Due">Rp.{{ number_format($order->total_price ,2,",",".") }}</td>
                                <td data-label="Status">{{ $status[$order->status] }}</td>
                                <td data-label="Created">
                                    <small class="text-gray-500">{{ $order->created_at }}</small>
                                </td>
                                <td data-label="Updated">
                                    <small class="text-gray-500">{{ $order->updated_at }}</small>
                                </td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <form class="mb-0" action="{{ route('orders.approve') }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $order->id }}" name="order_id" id="order_id">
                                            <input type="hidden" value="2" name="order_status" id="order_status">
                                            <button class="button small green --jb-modal" type="submit">
                                                <span class="icon"><i class="mdi mdi-check"></i></span>
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
                // columnDefs: [{
                //     orderable: false,
                //     targets: [5]
                // }],
                order: [
                    [0, 'asc']
                ]
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
