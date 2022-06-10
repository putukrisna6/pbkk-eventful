@extends('owner.layouts.app')

@section('content')
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Rent Options <b>{{ $building->name }}</b>
            </h1>
        </div>
    </section>

    @extends('shared.layouts.flash')

    <section class="section main-section">
        <div class="card mb-6">

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
@endsection
