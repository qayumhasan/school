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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Trashed Category</span>
                        </div>
                    </div>
                </div>

            </div>

        <form id="multiple_delete" action="{{ route('admin.class.multiple.hard.delete') }}" method="post">
                @csrf
                <button type="submit" name="delete_all" style="margin: 5px;" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete
                    all</button>
                <button type="submit" name="refactor_all" formaction="{{ route('admin.class.multiple.refactor') }}" style="margin: 5px;" class="btn btn-sm btn-success"><i class="fas fa-recycle"></i>Restore all</button>
                <div class="panel_body">
                    <div class="table-responsive">
                        <table id="dataTableExample1" class="table table-bordered table-striped table-hover mb-2">
                            <thead>
                                <tr class="text-center">
                                    <th>
                                        <label class="chech_container mb-1 p-0">
                                            Select all
                                            <input type="checkbox" id="check_all">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($classes as $class)
                                <tr class="text-center">
                                    <td>
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" name="class_id[]" class="checkbox"
                                                value="{{$class->id}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{$class->name}}</td>

                                    <td>
                                    <a id="delete" href="{{ route('admin.class.hard.delete', $class->id) }}" class="btn btn-danger btn-sm text-white">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <a href="{{ route('admin.class.refactor', $class->id) }}" class="btn btn-info btn-sm text-white">
                                            <i class="fas fa-recycle"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </section>
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

@endpush
