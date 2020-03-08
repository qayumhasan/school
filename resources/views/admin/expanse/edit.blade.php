
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Expanse</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                        <a href="{{ route('admin.expanse.index') }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-plus"></i></span> <span>Back</span></a>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-lg-12">
    <div class="panel">
        <div class="panel_header">
            <div class="panel_title"><span>Edit Expanse</span></div>
        </div>
        <div class="panel_body">
        <form action="{{ route('admin.expanse.update', $expanse->id) }}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="invoice_no"> Invoice Number: </label>
                  <input readonly type="text" class="form-control" id="invoice_no"  value="{{ $expanse->invoice_no }}" name="invoice_no" required>
                </div>
                <div class="form-group">
                  <label for="invoice_no"> Header: </label>

                  <select required class="form-control" name="header_id" id="">
                      <option value="">Select header</option>
                      @foreach ($headers as $header)
                        <option {{ $header->id == $expanse->expanse_header_id ? 'SELECTED' : '' }} value="{{ $header->id }}">{{ $header->name }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="form-group">
                    <label for="amount"> Date: </label>
                    <input type="date" class="form-control" value="{{date('Y-m-d', strtotime($expanse->date))}}" name="date" required>
                </div>

                <div class="form-group">
                    <label for="amount"> Amount: </label>
                    <input  type="number" class="form-control" id="amount"  value="{{ $expanse->amount }}" name="amount" required>
                </div>
                <div class="form-group">
                    <label for="amount"> Note: </label>
                    <textarea name="note" id="" cols="10" placeholder="Note" rows="3" class="form-control">{{ $expanse->note }}</textarea>
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
