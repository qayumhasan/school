<form class="form-horizontal" action="{{ route('admin.academic.subject.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="form-group row">
        <div class="col-sm-12">
            <input  type="text" class="form-control" id="name"  value="{{ $subject->name }}" name="name" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            Subject Type
            <div class="col-md-6">
                <input type="radio" {{ $subject->type == 1 ? 'CHECKED' : '' }} value="1" class="mr-1" name="type" required> <b> Theory </b>
                <input type="radio"  {{ $subject->type == 2 ? 'CHECKED' : '' }} value="2" class="mr-1" name="type" required><b> Practical </b>
             </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12">
            Subject Type
            <label for="code"> Subject Code: </label>
            <input  type="text" class="form-control" id="code"  value="{{ $subject->code }}" name="code" required>
        </div>
    </div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">Close</button>
        <button type="submit" class="btn btn-blue">Update</button>
    </div>
</form>



