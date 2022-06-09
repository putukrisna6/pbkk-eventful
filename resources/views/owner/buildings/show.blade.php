@extends('owner.layouts.app')

@section('content')
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Manage <b>{{ $building->name }}</b>
            </h1>
            <a href="{{ route('buildings.edit', ['building' => $building]) }}" class="button light"><span class="icon"><i
                class="mdi mdi-pencil"></i></span>Edit</a>
        </div>
    </section>

    <section class="section main-section">

    </section>

@endsection
