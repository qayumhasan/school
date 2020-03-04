
@extends('admin.master')
@section('content')
<div class="middle_content_wrapper">
    <section class="page_content">
        <!-- panel -->
        <div class="panel mb-0">
            <div class="panel_header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Assigned Vehicles</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                        <a href="{{ route('admin.assign.vehicle.index') }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-plus"></i></span> <span>Back</span></a>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-lg-12">
    <div class="panel">
        <div class="panel_header">
            <div class="panel_title"><span>Edit Assigned Vehicles</span></div>
        </div>
        <div class="panel_body">
        <form action="{{ route('admin.assign.vehicle.update', $route->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="inputEmail3" class="col-form-label text-right">route Name:</label>
                    <input type="text" class="form-control" id="vehicle_model" placeholder="Vehicle model" value="{{$route->name}}" name="vehicle_model" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class=" col-form-label text-right">Select vehicles (Multiple):</label>
                    <select required class="select2" multiple="multiple" name="vehicle_ids[]" data-placeholder="Vehicles" data-dropdown-css-class="select2-purple" style="width: 100%;">
                        @foreach ($vehicles as $vehicle)
                            <option
                            @foreach ($route->routeVehicles as $routeVehicle)
                              {{ $vehicle->id == $routeVehicle->vehicle_id ? 'SELECTED' : '' }}
                            @endforeach
                            value="{{ $vehicle->id }}">
                            {{ $vehicle->vehicle_model }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-blue float-right">Update</button>
              </form>
        </div>
    </div>
</div>
</div>
</section>
</div>

@endsection

@push('js')
<script type="text/javascript">
    $(document).ready(function () {
       //Initialize Select2 Elements
       $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'
        })
    });
</script>
@endpush
