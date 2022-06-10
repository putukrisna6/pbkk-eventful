@extends('owner.layouts.app')

@section('content')
    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Manage <b>{{ $building->name }}</b>
            </h1>
            <div>
                @if (in_array($building->status, [4, 5]))
                <a href="{{ route('owner.options.manage', ['building' => $building->id]) }}" class="button blue"><span class="icon"><i
                    class="mdi mdi-store"></i></span>Rent Options</a>
                @endif
                <a href="{{ route('buildings.edit', ['building' => $building]) }}" class="button light"><span class="icon"><i
                    class="mdi mdi-pencil"></i></span>Edit</a>
            </div>
        </div>
    </section>

    <section class="section main-section">
        <div class="card mb-6">
            <div class="card-content">
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
                    <div class="card">
                        <div class="image">
                            <img src="{{ 'data:image/png;base64,' . $building->image }}" alt="building image" style="">
                        </div>
                    </div>
                    <div class="card">
                        <div class="field">
                            <label class="label">Building Type</label>
                            <div class="control">
                                <input type="text" readonly value="{{ $types->name }}" class="input is-static">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Phone</label>
                            <div class="control">
                                <input type="text" readonly value="{{ $building->phone }}" class="input is-static">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Address</label>
                            <div class="control">
                                <input type="text" readonly value="{{ $building->address }}" class="input is-static">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Building Description</label>
                            <div class="control">
                                <textarea class="textarea is-static" readonly id="text" name="text" ><?php echo htmlspecialchars($building->text); ?></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Building Coordinates</label>
                        </div>
                        <div class="field grouped">
                            <div class="control icons-left">
                                <input class="input" readonly name="latitude" id="latitude" type="text" value="{{ $building->latitude }}">
                                <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
                            </div>
                            <div class="control icons-left">
                                <input class="input" readonly name="longitude" id="longitude"  type="text" value="{{ $building->longitude }}">
                                <span class="icon left"><i class="mdi mdi-map-marker"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="field-body">
                                <div id="map" style="height: 500px"></div>
                            </div>
                        </div>
                    </div>

                </div>
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
