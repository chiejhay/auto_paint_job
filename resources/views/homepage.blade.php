@extends('layout')
{{-- BODY --}}
@section('content')
<div class="main-container">
        <div class="header-container">
            <h1 class="title-banner">JUAN'S AUTO PAINT</h1>
            <div class="header-menu">
                <ul class ="menus">
                    <li><a class="menu" href="{{ url('createpaintjobpage')}}" data-type = "new">NEW PAINT JOB</a></li>
                    <li><a  class="menu active-menu" data-type = "list" href="{{ url('/')}}">PAINT JOBS </a></li>
                </ul>
            </div>
        </div>
        <div class="body-container">
            <h3 class ="sub-banner" align="center">Paint Jobs</h3>

            <div class="body-main-container">
                <div class="left-container">
                    <div class = "paint-progess">
                        <p><b>Paint Jobs in Progress</b></p>
                        <table border="1" class="show-list">
                            <thead >
                                <tr>
                                    <th>Plate No.</th>
                                    <th>Current Color</th>
                                    <th>Target Color</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(count($paint_jobs['inprogress']) > 0)
                                    @foreach($paint_jobs['inprogress'] as $key => $value)
                                        <tr>
                                            <td>{{ $value['plate_number'] }}</td>
                                            <td>{{ $value['current_color'] }}</td>
                                            <td>{{ $value['target_color'] }}</td>
                                            <td><span class="mark-completed" data-id="{{ $value['id'] }}">Mark as Completed</span></td>
                                        </tr>
                                    @endforeach
                                @else 
                                    <tr>
                                        <td colspan="4">No data</td>
                                    </tr>
                                @endif
                            </tbody>

                            
                        </table>
                    </div>
                    
                    <div class = "paint-queue">
                        <p><b>Paint Queue</b></p>
                        <table border="1" class="show-list">
                            <thead >
                                <tr>
                                    <th>Plate No.</th>
                                    <th>Current Color</th>
                                    <th>Target Color</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($paint_jobs['queue']) > 0)
                                    @foreach($paint_jobs['queue'] as $key => $value)
                                        <tr>
                                            <td>{{ $value['plate_number'] }}</td>
                                            <td>{{ $value['current_color'] }}</td>
                                            <td>{{ $value['target_color'] }}</td>
                                        </tr>
                                    @endforeach
                                @else 
                                    <tr>
                                        <td colspan="3">No data</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="right-container">
                    <table class="shop-performance">
                        <thead>
                            <tr>
                                <th colspan="2">SHOP PERFORMANCE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total Cars Painted:</td>
                                <td><span class="total">{{ $paint_jobs['total_cars_painted'] }} </span></td>
                            </tr>
                            <tr>
                                <td colspan="2">Breakdown:</td>
                            </tr>
                            <tr>
                                <td><span class="breakdown">Blue</span></td>
                                <td><span class ="total total-blue">{{ $paint_jobs['blue_painted'] }}</span></td>
                            </tr>
                            <tr>
                                <td><span class="breakdown">Red</span></td>
                                <td><span class ="total total-red">{{ $paint_jobs['red_painted'] }}</span></td>
                            </tr>
                            <tr>
                                <td><span class="breakdown">Green</span></td>
                                <td><span class ="total total-green">{{ $paint_jobs['green_painted'] }}</span></td>
                            </tr>
                        </tbody>

                        </table>
                </div>
            </div>
        </div>
    </div>
@endsection