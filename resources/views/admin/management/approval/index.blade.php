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
                Approval Queue
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
                            <th>Name</th>
                            <th>Applicant</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>

                                <td data-label="Name">{{ $task->building->name }}</td>
                                <td data-label="Name">{{ $task->user->name }}</td>
                                <td data-label="Status">{{ $status[$task->status] }}</td>
                                <td data-label="Created">
                                    <small class="text-gray-500">{{ $task->created_at }}</small>
                                </td>
                                <td data-label="Updated">
                                    <small class="text-gray-500">{{ $task->updated_at }}</small>
                                </td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <form class="mb-0" action="{{ route('approval.approve', ['task' => $task->id]) }}"
                                            method="POST">
                                            @csrf
                                            <input type="hidden" value="2" name="approval_status" id="approval_status">
                                            <button class="button small green --jb-modal" type="submit">
                                                <span class="icon"><i class="mdi mdi-check"></i></span>
                                            </button>
                                        </form>
                                        <a href="{{ route('approval.show', ['task' => $task->id]) }}" class="button small blue"
                                            type="button">
                                            <span class="icon"><i class="mdi mdi-eye"></i></span>
                                        </a>
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
                    targets: [5]
                }],
                order: [
                    [0, 'asc']
                ]
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
