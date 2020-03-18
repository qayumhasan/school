@extends('admin.master')
@push('css')
<style>
footer{
    background-color: #fff;
    display: block;
    overflow: hidden;
    border-top:5px solid #353C48;
    bottom:0px;
    right:0px;
    width: 100%;
    padding:5px;
    padding-left: 235px;
    transition: .5s all ease;
   margin-top: 200px;
  }
</style>

@endpush
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- content wrpper -->

<!--middle content wrapper-->
<div class="middle_content_wrapper">

    <section class="page_area">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="panel">
                <div class="panel_header">
                    <div class="row">
                        <div class="panel_title">
                            <span class="panel_icon"><i class="fas fa-plus-square"></i></span>
                            <span>Student Information</span>
                        </div>
                    </div>
                </div>
                <div class="panel_body">
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="inputEmail3" class="text-center">Employee ID <span
                                    style="color:red">*</span></label>
                            <input type="text" id="employee_id" class="form-control" name="employee_id" required>
                        </div>

                        <div class="col-sm-4">
                            <label for="inputEmail3" class="text-center">Name</label>
                            <input type="text" id="name" value="{{ old('name') }}" class="form-control" name="name"
                                required>
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="col-sm-4">
                            <label for="inputEmail3" class="text-center">Gender</label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="">--Selecet gender--</option>
                                @foreach($genders as $gender)
                                <option {{ $gender->name == old('gender') ? 'SELECTED' : '' }}
                                    value="{{ $gender->name }}">{{ $gender->name }}</option>
                                @endforeach
                                <select>
                                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label for="inputEmail3" class="text-center">Religion</label>
                            <input type="text" id="religion" value="{{ old('religion') }}" class="form-control"
                                name="religion" required>
                            <span class="text-danger">{{ $errors->first('religion') }}</span>
                        </div>

                        <div class="col-sm-4">
                            <label for="inputEmail3" class="text-center">Blood Group</label>
                            <select id="blood_group" class="form-control" name="blood_group" required>
                                <option value="">--Selecet Blood Group--</option>
                                @foreach($bloodGroups as $bloodGroup)
                                <option {{ $bloodGroup->id == old('blood_group') ? "SELECTED" : "" }}
                                    value="{{ $bloodGroup->id }}">{{ $bloodGroup->group_name }}</option>
                                @endforeach
                                <select>
                                    <span class="text-danger">{{ $errors->first('blood_group') }}</span>
                        </div>

                        <div class="col-sm-4">
                            <label for="inputEmail3" class="text-center">Date Of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                        </div>

                        <div class="col-sm-4">
                            <label for="inputEmail3" class="text-center">Mobile No<span
                                    style="color:red">*</span></label>
                            <input type="number" value="{{ old('mobile_no') }}" class="form-control" name="mobile_no"
                                required>
                            <span class="text-danger">{{ $errors->first('mobile_no') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputEmail3" class="text-center">Present Address <span
                                    style="color: red">*</span></label>
                            <textarea name="present_address" class="form-control" id="present_address" placeholder="Present address" cols="8"
                                rows="3" required>{{ old('present_address') }}</textarea>
                            <span class="text-danger">{{ $errors->first('present_address') }}</span>
                        </div>

                        <div class="col-sm-6">
                            <label for="inputEmail3" class="text-center">Permanent Address <span
                                    style="color: red">*</span></label>
                            <textarea name="permanent_address" id="permanent_address" class="form-control" placeholder="Present address"
                                cols="8" rows="3" required>{{ old('present_address') }}</textarea>
                            <span class="text-danger">{{ $errors->first('permanent_address') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Photo</label>
                            <input required type="file" id="photo" name="photo" id="input-file-now" class="form-control dropify"
                                size="20"/>
                            <span class="text-danger">{{ $errors->first('photo') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Email address <span
                                    style="color: red">*</span></label>
                            <input type="text" id="email_address" value="{{ old('email_address') }}"
                                name="email_address" class="form-control" required/>
                            <span class="text-danger">{{ $errors->first('email_address') }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Facebook Link <span
                                    style="color: red">*</span></label>
                            <input type="text" value="{{ old('facebook_link') }}" name="facebook_link"
                                id="facebook_link" class="form-control"/>
                            <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">linkedIn Link <span
                                    style="color: red">*</span></label>
                            <input type="text" value="{{ old('linkedIn_link') }}" name="linkedIn_link"
                                id="linkedIn_link" class="form-control"/>
                            <span class="text-danger">{{ $errors->first('linkedIn_link') }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Twitter Link <span
                                    style="color: red">*</span></label>
                            <input type="text" value="{{ old('twitter_link') }}" name="twitter_link" id="twitter_link"
                                class="form-control" required/>
                            <span class="text-danger">{{ $errors->first('twitter_link') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Designation</label>
                            <select id="blood_group" class="form-control" name="designation" required>
                                @foreach($designations as $designation)
                                <option {{ $designation->name == old('designation') ? "SELECTED" : "" }}
                                    value="{{ $designation->id }}">{{ $designation->name }}</option>
                                @endforeach
                                <select>
                                    <span class="text-danger">{{ $errors->first('designation') }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Group/Department</label>
                            <select id="blood_group" id="group" class="form-control" name="group" required>
                                <option value="">--Selecet Blood Group/Department--</option>
                                @foreach($groups as $group)
                                <option {{ $group->id == old('group') ? "SELECTED" : "" }} value="{{ $group->id }}">
                                    {{ $group->name }}</option>
                                @endforeach
                                <select>
                                    <span class="text-danger">{{ $errors->first('group') }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Joining Date <span
                                    style="color: red">*</span></label>
                            <input type="text" name="joining_date" id="joining_date" class="form-control" required/>
                            <span class="text-danger">{{ $errors->first('joining_date') }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Qualification <span
                                    style="color: red">*</span></label>
                            <input  type="text" name="qualification" value="{{ old('qualification') }}"
                                id="qualification" class="form-control" required/>
                            <span class="text-danger">{{ $errors->first('qualification') }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Role</label>
                            <select required id="role" class="form-control" name="role">
                                <option value="">--Selecet Role--</option>
                                @foreach($roles as $role)
                                <option {{ $role->role_known_id == old('role') ? "SELECTED" : "" }}
                                    value="{{ $role->role_known_id }}">{{ $role->name }}</option>
                                @endforeach
                            <select>
                            <span class="text-danger">{{ $errors->first('role') }}</span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Bank Name <span style="color: red">*</span></label>
                            <input type="text" value="{{ old('bank_name') }}" class="form-control" name="bank_name"
                                id="bank_name">
                            <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                        </div>
                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Account Holder</label>
                            <input type="text" value="{{ old('account_holder') }}" class="form-control"
                                name="account_holder" id="account_holder">
                            <span class="text-danger">{{ $errors->first('account_holder') }}</span>
                        </div>
                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Bank Branch</label>
                            <input type="text" value="{{ old('bank_branch') }}" class="form-control" name="bank_branch"
                                id="bank_branch"  required>
                            <span class="text-danger">{{ $errors->first('bank_branch') }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Bank Address</label>
                            <input type="text" value="{{ old('bank_address') }}" class="form-control" name="bank_address"
                        id="bank_address">
                            <span class="text-danger">{{ $errors->first('bank_address') }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">IFSC Code</label>
                            <input type="text" value="{{ old('ifsc_code') }}" class="form-control" id="ifsc_code" name="ifsc_code">
                            <span class="text-danger">{{ $errors->first('ifsc_code') }}</span>
                        </div>

                        <div class="col-sm-3">
                            <label for="inputEmail3" class="text-center">Account Number</label>
                            <input type="text" value="{{ old('account_no') }}" class="form-control" name="account_no">
                        </div>

                    </div>
                </div>
            </div>
</div>

</form>
</section>
</div>
<!--/middle content wrapper-->

<!-- hostel select rooom find -->

@endsection
