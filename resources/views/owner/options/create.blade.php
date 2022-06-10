@extends('owner.layouts.app')

@section('content')
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Create Options for <b>{{ $building->name }}</b>
            </h1>
        </div>
    </section>

    @extends('shared.layouts.flash')

    <section class="section main-section">
        <div class="card mb-6">
            <div class="card-content">
                <form method="POST" action="{{ route('owner.options.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" id="name" name="name" :value="old('name')" required
                                        autofocus type="text" placeholder="Option Name">
                                    <span class="icon left"><i class="mdi mdi-domain"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" id="desc" name="desc" :value="old('desc')" required
                                        autofocus type="text" placeholder="Option Description">
                                    <span class="icon left"><i class="mdi mdi-domain"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="field addons">
                                    <div class="control">
                                        <input class="input" value="Rp." size="3" readonly>
                                    </div>
                                    <div class="control expanded">
                                        <input class="input" type="number" id="price" name="price" :value="old('price')" placeholder="Price" required>
                                    </div>
                                </div>
                            </div>
                            <input class="input" type="hidden" id="building_id" name="building_id" value="{{ $building->id }}" required>
                            <div class="field">
                                <label class="label">Option Image</label>
                                <div class="field-body">
                                    <div class="field file">
                                        <label class="upload control">
                                            <a class="button blue">
                                                Upload
                                            </a>
                                            <input id="image" name="image" type="file">
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
                        <div class="control">
                            <button type="reset" class="button red">
                                Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function handleEvent(event) {
            document.getElementById('latitude').value = event.latLng.lat();
            document.getElementById('longitude').value = event.latLng.lng();
        }

        function initMap() {
            var latnya = document.getElementById('latitude').value;
            var longinya = document.getElementById('longitude').value;

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 18,
                center: {
                    lat: parseFloat(latnya),
                    lng: parseFloat(longinya)
                }
            });
            var geocoder = new google.maps.Geocoder();

            var marker = new google.maps.Marker({
                map: map,
                draggable: true,
                position: {
                    lat: parseFloat(latnya),
                    lng: parseFloat(longinya)
                }
            });

            marker.addListener('drag', handleEvent);
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTnAg_gwZ-GQxB6xC0h2cY4TDFYU28ov8&callback=initMap"></script>
@endsection
