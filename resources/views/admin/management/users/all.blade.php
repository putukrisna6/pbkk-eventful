@extends('admin.layouts.app')

@section('content')
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                {{ $role }} Management
            </h1>
            <button class="button light">Button</button>
        </div>
    </section>

    <section class="section main-section">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                    Users
                </p>
                <a href="#" class="card-header-icon">
                    <span class="icon"><i class="mdi mdi-reload"></i></span>
                </a>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="image-cell">
                                <div class="image">
                                    <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg"
                                        class="rounded-full">
                                </div>
                            </td>
                            <td data-label="Name">{{ $user->name }}</td>
                            <td data-label="Email">{{ $user->email }}</td>
                            <td data-label="Created">
                                <small class="text-gray-500">{{ $user->created_at }}</small>
                            </td>
                            <td data-label="Updated">
                                <small class="text-gray-500">{{ $user->updated_at }}</small>
                            </td>
                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <button class="button small green --jb-modal" data-target="sample-modal-2"
                                        type="button">
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
                <div class="table-pagination">
                    <div class="flex items-center justify-between">
                        <div class="buttons">
                            <button type="button" class="button active">1</button>
                            <button type="button" class="button">2</button>
                            <button type="button" class="button">3</button>
                        </div>
                        <small>Page 1 of 3</small>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
