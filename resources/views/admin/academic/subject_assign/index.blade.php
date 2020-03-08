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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Assigned Subject</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Assign Subject</span></a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- {{ route('admin.assign.subject.class.multiple.delete') }} --}}
        <form action="" id="multiple_delete" method="post">
                @csrf
                <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                            <thead>
                                <tr class="text-left">
                                    <th>
                                        <label class="chech_container mb-1 p-0">
                                            Select all
                                            <input type="checkbox" id="check_all">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Subjects</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                    <tr class="text-left">
                                        <td>
                                            <label class="chech_container mb-4">
                                            <input type="checkbox" name="deleteId[]" class="checkbox"
                                            value="">
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                        <td>Class</td>
                                        <td>a</td>
                                        <td class="text-left">
                                            <b>- Bangle</b> <br/>
                                            <b>- Math</b><br/>
                                            <b>- English 1st part</b><br/>
                                            <b>- English 2st part</b><br/>
                                        </td>

                                        <td class="text-center">
                                        <a href="" class="edit_route btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                                        <a id="delete" href=""
                                                class="btn btn-danger btn-sm text-white" title="Delete">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Assign Subject To Class</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <form class="form-horizontal" action="{{ route('admin.academic.assign.subject.class') }}" method="POST">
                    @csrf
                    <div class="form-group row">

                        <div class="col-sm-12">
                            <label for="inputEmail3" class="col-form-label text-right">Class :</label>
                            <select required class="form-control select_class" name="class_id">
                                <option value="">Select class</option>
                                @foreach ($formClasses as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label text-right">Select Section :</label>
                            <select required class="form-control" id="sections" name="section_id">

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="inputEmail3" class=" col-form-label text-right">Select Section :</label>
                            <select class="select2" multiple="multiple" name="subject_ids[]" data-placeholder="Section" data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                @foreach ($formSubjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close </button>
                        <button type="submit" class="btn btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')


<script type="text/javascript">

    $(document).ready(function () {
        $('#check_all').on('click', function (e) {

            if ($(this).is(':checked', true)) {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked', false);
            }
        });
    });

</script>

<script type="text/javascript">

    $(document).ready(function () {
       //Initialize Select2 Elements
       $('.select2').select2()
        //Initialize Select2 Elements
    });

</script>

<script type="text/javascript">

    $(document).ready(function () {
       $('.select_class').on('change', function () {
            var classId = $(this).val();
            $.ajax({
                url:"{{ url('admin/academic/assign/subjects/get/sections/by/') }}"+"/"+classId,
                type:'get',
                dataType:'json',
                success:function(data){
                    //console.log(data);
                    $('#sections').empty();
                    $('#sections').append(' <option value="">--Select Section--</option>');
                    $.each(data,function(key, val){
                        $('#sections').append(' <option value="'+ val.section_id +'">'+ val.section.name +'</option>');
                    })
                }
            })
       })
    });

</script>

@endpush
