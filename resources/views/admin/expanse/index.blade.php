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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>All Expanse</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                            <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal1"><i
                                    class="fas fa-plus"></i></span> <span>Add Expanse</span></a>
                        </div>
                    </div>
                </div>

            </div>
            <form id="multiple_delete" action="{{ route('admin.expanse.multiple.delete') }}" method="post">
                @csrf
                <button type="submit" style="margin: 5px;" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Delete all</button>
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
                                    <th>Invoice No</th>
                                    <th>Date</th>
                                    <th>Month</th>
                                    <th>Year</th>
                                    <th>Expanse Head</th>
                                    <th>Note</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expanses as $expanse)
                                <tr class="text-center">
                                    <td>
                                        <label class="chech_container mb-4">
                                            <input type="checkbox" name="deleteId[]" class="checkbox"
                                                value="{{$expanse->id}}">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td>{{ $expanse->invoice_no }}</td>
                                    <td>{{ $expanse->date }}</td>
                                    <td>{{ $expanse->month }}</td>
                                    <td>{{ $expanse->year }}</td>
                                    <td>{{ $expanse->ExpanseHeader->name }}</td>
                                    <td>{{ $expanse->note }}</td>
                                    @if($expanse->status==1)
                                    <td class="center"><span class="btn btn-sm btn-success">Active</span></td>
                                    @else
                                    <td class="center"><span class="btn btn-sm btn-danger">Inactive</span></td>
                                    @endif
                                    <td>{{$expanse->amount}}</td>
                                    <td>
                                        @if($expanse->status==1)
                                        <a href="{{ route('admin.expanse.status.update', $expanse->id ) }}"
                                            class="btn btn-success btn-sm ">
                                            <i class="fas fa-thumbs-up"></i></a>
                                        @else
                                        <a href="{{ route('admin.expanse.status.update', $expanse->id ) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-thumbs-down"></i>
                                        </a>
                                        @endif
                                    | <a href="#" data-id="{{ $expanse->id }}" title="edit" data-toggle="modal"
                                        data-target="#editModal" class="edit_expanse btn btn-sm btn-blue text-white"><i class="fas fa-pencil-alt"></i></a> |
                                        <a id="delete" href="{{ route('admin.expanse.delete', $expanse->id) }}"
                                            class="btn btn-danger btn-sm text-white" title="Delete">
                                            <i class="far fa-trash-alt"></i>
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

<div class="modal fade bd-example-modal-lg" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Expanse</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('admin.expanse.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right">Invoice No :</label>
                            <input type="text" class="form-control" value="{{$invoiceId}}" name="invoice_no" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label  class="col-form-label text-right">Header :</label>
                            {{-- <input type="text" class="form-control" placeholder="Category name" name="name" required> --}}
                            <select required name="header_id" class="form-control">
                                <option value="">Select Header</option>
                                @foreach ($headers as $header)
                            <option value="{{ $header->id }}"> {{ $header->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right">Date :</label>
                        <input type="date" class="form-control" value="{{date('Y-m-d')}}" name="date" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right">Amount :</label>
                            <input type="number" class="form-control" placeholder="Amount" name="amount" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-form-label text-right">Note (Optional) :</label>
                            <textarea name="note" id="" cols="10" placeholder="Note" rows="3" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group text-right">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label=""> Close</button>
                        <button type="submit" class="btn btn-blue">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content edit_content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Expanse</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body edit_modal_body">

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

<script>
    $(document).ready(function () {
       $(document).on('click', '.edit_expanse', function(){
           var expanse_id = $(this).data('id');
           $.ajax({
               url:"{{ url('admin/expanses/edit') }}" + "/" + expanse_id,
               type:'get',
               success:function(data){
                   $('.edit_modal_body').empty();
                   $('.edit_modal_body').append(data);
               }
           });
       });
   });
</script>

@endpush
