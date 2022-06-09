@extends('owner.layouts.app')

@section('content')
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Add Building
            </h1>
        </div>
    </section>

    <section class="section main-section">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-ballot"></i></span>
                    Forms
                </p>
            </header>
            <div class="card-content">
                <form method="POST" action="{{ route('buildings.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" id="name" name="name" :value="old('email')" required
                                        autofocus type="text" placeholder="Building Name">
                                    <span class="icon left"><i class="mdi mdi-domain"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control icons-left">
                                    <textarea class="textarea" style="padding-left: 2.5rem" id="text" name="text" :value="old('text')" required
                                        placeholder="Building Description"></textarea>
                                    <span class="icon left"><i class="mdi mdi-text"></i></span>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" id="phone" name="phone" :value="old('phone')" required
                                        type="text" placeholder="Phone Number">
                                    <span class="icon left"><i class="mdi mdi-phone"></i></span>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" type="text" id="address" name="address" :value="old('address')" required placeholder="Address">
                                    <span class="icon left"><i class="mdi mdi-city"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Building Coordinates</label>
                            </div>
                            <div class="field grouped">
                                <div class="control icons-left">
                                    <input class="input" name="latitude" id="latitude" placeholder="Latitude"
                                        required type="number" step="0.00000001" value="-6.232393">
                                    <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
                                </div>
                                <div class="control icons-left">
                                    <input class="input" name="longitude" id="longitude" placeholder="Longitude"
                                        required type="number" step="0.00000001" value="106.820287">
                                    <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
                                </div>
                                <div class="control">
                                    <button type="button" onclick="initMap()" class="button light">
                                        Locate
                                    </button>
                                </div>
                            </div>
                            <div class="field">
                                <div class="field-body">
                                    <div id="map" style="height: 500px"></div>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">File Gambar Gedung</label>
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
