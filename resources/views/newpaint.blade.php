@extends('layout')
{{-- BODY --}}
@section('content')
    <div class="main-container">
        <div class="header-container">
            <h1 class="title-banner">JUAN'S AUTO PAINT</h1>
            <div class="header-menu">
                <ul class ="menus">
                    <li><a class="menu active-menu" href="{{ url('createpaintjobpage')}}" data-type = "new">NEW PAINT JOB</a></li>
                    <li><a  class="menu " data-type = "list" href="{{ url('/')}}">PAINT JOBS </a></li>
                </ul>
            </div>
        </div>
        <div class="body-container">
            <h3 class ="sub-banner" align="center">New Paint Job</h3>

            <div class="body-main-container">
                <div class="main-container">
                    <div class="car-container">
                        <div class="current-car-container"><img src="{{ asset('images/default.png') }}"> </div>
                        <div class="arrow"><img src="{{ asset('images/arrow.png') }}"></div>
                        <div class="target-car-container"><img src="{{ asset('images/default.png') }}"> </div>
                    </div>

                    <div class="car-details-container">
                        
                        <form id="paint-job-form" >
                            <div class = "form-group">
                                <label class="car-details-title">Car Details</label>
                            </div>
                            <div class = "form-group">
                                <label class="car-details-label">Plate No.</label><input class ="car-details-input" type="text" name="plate_number">
                            </div>
                            <div class = "form-group">
                                <label class="car-details-label">Current Color</label><select name="current_color" class="car-details-input car-details-colors car-details-current-color"><option value="default">Default</option><option value="green">Green</option><option value="red">Red</option><option value="blue">Blue</option></select>
                            </div>
                            <div class = "form-group">
                                <label class="car-details-label">Target Color</label><select name="target_color" class="car-details-input car-details-colors car-details-target-color"><option value="default">Default</option><option value="green">Green</option><option value="red">Red</option><option value="blue">Blue</option></select>
                            </div>
                            <div class = "form-group">
                                <label class="car-details-label">is VIP</label><input class ="car-details-input-check" type="checkbox" name="is_vip">
                            </div>

                        </form>

                        <div class = "form-group">
                                <button class="car-details-submit">Submit</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection