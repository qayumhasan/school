
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Vehicle</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                        <a href="{{ route('admin.vehicle.index') }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-plus"></i></span> <span>Back</span></a>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-lg-12">
    <div class="panel">
        <div class="panel_header">
            <div class="panel_title"><span>Edit Vehicle</span></div>
        </div>
        <div class="panel_body">
        <form action="{{ route('admin.vehicle.update', $vehicle->id) }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="vehicle_number"> Vehicle Number: </label>
                <input type="text" class="form-control" id="vehicle_number" placeholder="Vehicle number" value="{{ $vehicle->vehicle_number }}" name="vehicle_number" required>
                  <span class="text-danger">{{ $errors->first('vehicle_number') }}</span>
                </div>
                <div class="form-group">
                  <label for="vehicle_model"> Vehicle Model: </label>
                  <input type="text" class="form-control" id="vehicle_model" placeholder="Vehicle model" value="{{$vehicle->vehicle_model}}" name="vehicle_model" required>
                  <span class="text-danger">{{ $errors->first('vehicle_model') }}</span>
                </div>
                <div class="form-group">
                  <label for="year_made"> Year Made: </label>
                  <input type="text" class="form-control" id="year_made" placeholder="year Made" value="{{$vehicle->year_made}}" name="year_made" required>
                  <span class="text-danger">{{ $errors->first('year_made') }}</span>
                </div>

                <div class="form-group">
                  <label for="driver_name"> Driver name: </label>
                  <select class="form-control" id="driver_name" name="driver_id" >
                    <option value="">Select Driver Name</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="driver_license"> Driver License (opt): </label>
                  <input type="text" class="form-control" id="driver_license" placeholder="Driver License" value="{{ $vehicle->driver_license ? $vehicle->driver_license : old('driver_license') }}" name="driver_license">
                </div>
                <button type="submit" class="btn btn-blue float-right">Submit</button>
              </form>
        </div>
    </div>
</div>
</div>
</section>
</div>

@endsection
