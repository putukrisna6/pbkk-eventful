<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" />

<x-app-layout>
    <div>
        <div class="bg-gray-200 min-h-screen pt-4">
            <div class="container mx-auto">
                <div class="inputs w-full max-w-2xl p-6 mx-auto">
                    <h2 class="text-2xl text-gray-900">Rent Orders</h2>
                    <div class='flex flex-wrap -mx-3 my-6'>
                        <div class="personal w-full border-t border-gray-400 pt-4">
                            <div class="card-content">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Building</th>
                                            <th>Due</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td data-label="Building">{{ $order->building->name }}</td>
                                                <td data-label="Due">Rp.{{ number_format($order->total_price ,2,",",".") }}</td>
                                                <td data-label="Status">{{ $status[$order->status] }}</td>
                                                <td >
                                                    <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 border border-gray-700 rounded">
                                                        <a href="{{ route('orders.show', ['order' => $order->id]) }}">Details</a>
                                                    </button>
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
        </div>
    </div>
</x-app-layout>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('asset/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/jquery.rowspanizer.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('table').DataTable({
            columnDefs: [{
                orderable: false,
                targets: [3]
            }],
            order: [
                [0, 'asc']
            ]
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>
