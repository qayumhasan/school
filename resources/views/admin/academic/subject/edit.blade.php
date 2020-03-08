
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
                            <span class="panel_icon"><i class="fas fa-border-all"></i></span><span>Subject</span>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="panel_title">
                        <a href="{{ route('admin.academic.subject.index') }}" class="btn btn-sm btn-success"><i
                                    class="fas fa-plus"></i></span> <span>Back</span></a>
                        </div>
                    </div>
                </div>
            </div>
<div class="col-lg-12">
    <div class="panel">
        <div class="panel_header">
            <div class="panel_title"><span>Edit Subject</span></div>
        </div>
        <div class="panel_body">
        <form action="{{ route('admin.academic.subject.update', $subject->id) }}" method="POST">
                @csrf

                <div class="form-group">
                  <label for="name"> Subject Name: </label>
                  <input  type="text" class="form-control" id="name"  value="{{ $subject->name }}" name="name" required>
                </div>


                <div class="form-group">
                    Subject Type
                    <div class="col-md-6">
                        <input type="radio" {{ $subject->type == 1 ? 'CHECKED' : '' }} value="1" class="mr-1" name="type" required> <b> Theory </b>
                        <input type="radio"  {{ $subject->type == 2 ? 'CHECKED' : '' }} value="2" class="mr-1" name="type" required><b> Practical </b>
                     </div>
                </div>

                <div class="form-group">
                    <label for="code"> Subject Code: </label>
                    <input  type="text" class="form-control" id="code"  value="{{ $subject->code }}" name="code" required>
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
