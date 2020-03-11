<form class="form-horizontal" action="{{ route('admin.expanse.update', $expanse->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="invoice_no"> Invoice Number: </label>
            <input readonly type="text" class="form-control" id="invoice_no"  value="{{ $expanse->invoice_no }}" name="invoice_no" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="invoice_no"> Header: </label>
            <select required class="form-control" name="header_id" id="">
                <option value="">Select header</option>
                @foreach ($headers as $header)
                <option {{ $header->id == $expanse->expanse_header_id ? 'SELECTED' : '' }} value="{{ $header->id }}">{{ $header->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="amount"> Date: </label>
            <input type="date" class="form-control" value="{{date('Y-m-d', strtotime($expanse->date))}}" name="date" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="amount"> Amount: </label>
            <input  type="number" class="form-control" id="amount"  value="{{ $expanse->amount }}" name="amount" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            <label for="amount"> Note: </label>
            <textarea name="note" id="" cols="10" placeholder="Note" rows="3" class="form-control">{{ $expanse->note }}</textarea>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn btn-blue">Update</button>
    </div>
</form>
