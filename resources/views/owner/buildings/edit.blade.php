@extends('owner.layouts.app')

@section('content')
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Edit Building
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
                <form method="POST" action="{{ route('buildings.update', $building->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="field">
                        <div class="field-body">
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" id="name" name="name" value="{{ $building->name }}" required
                                        autofocus type="text">
                                    <span class="icon left"><i class="mdi mdi-domain"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control icons-left">
                                    <textarea class="textarea" style="padding-left: 2.5rem" id="text" name="text"  required
                                        placeholder="Building Description"><?php echo htmlspecialchars($building->text); ?></textarea>
                                    <span class="icon left"><i class="mdi mdi-text"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control icons-left">
                                    <select class="input" id="type_id" name="type_id" :value="old('type_id')" required
                                        autofocus type="text">
                                        <option  value="{{ $buildingType->type_id }}">Select Building Type</option>
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}" {{$buildingType->type_id == $type->id  ? 'selected' : ''}}>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="icon left"><i class="mdi mdi-domain"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" id="phone" name="phone" value="{{ $building->phone }}" required
                                        type="text" placeholder="Phone Number">
                                    <span class="icon left"><i class="mdi mdi-phone"></i></span>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control icons-left">
                                    <input class="input" type="text" id="address" name="address" value="{{ $building->address }}" required placeholder="Address">
                                    <span class="icon left"><i class="mdi mdi-city"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <label class="label">Building Coordinates</label>
                            </div>
                            <div class="field grouped">
                                <div class="control icons-left">
                                    <input class="input" name="latitude" id="latitude" placeholder="Latitude"
                                        required type="text" value="{{ $building->latitude }}">
                                    <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
                                </div>
                                <div class="control icons-left">
                                    <input class="input" name="longitude" id="longitude" placeholder="Longitude"
                                        required type="text" value="{{ $building->longitude }}">
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
                                <label class="label">Building Image</label>
                                <div class="field-body">
                                    <div class="field file">
                                        <label class="upload control">
                                            <a class="button blue">
                                                Upload
                                            </a>
                                            <!-- show image from encode64 -->
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
