@extends('backoffice.layouts.default')

@section('breadcrumb')
    <section class="content-header">
        <h1>Admission Test Location Management</h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('backoffice.dashboard.get') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('backoffice.hsp.admission-test.get') }}"> Admission Test Location List</a></li>
            <li class="active">Create Admission Test Location</li>
        </ol>
    </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Admission Test Location</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{ route('backoffice.hsp.admission-test.edit.post', $admissionTest->id) }}" method="post" role="form">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" class="form-control" id="year" name="year" value="{{ old('year', $admissionTest->year) }}" readonly>
                                {!! '<div class="text-red">'.$errors->first('year').'</div>' !!}
                            </div>

                            <div class="form-group">
                                <label>Province</label>
                                <select name="province" class="form-control">
                                    @foreach($provinceList as $province)
                                        <option value="{{ $province->cityNameTH }}" {{ (old('province', $admissionTest->province) == $province->cityNameTH ? 'selected' : '') }}>{{ $province->cityNameTH }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Location Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $admissionTest->name) }}">
                                {!! '<div class="text-red">'.$errors->first('name').'</div>' !!}
                            </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" class="form-control" id="date" name="date" value="{{ old('date', $admissionTest->date) }}" readonly>
                                {!! '<div class="text-red">'.$errors->first('date').'</div>' !!}
                            </div>

                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount', $admissionTest->amount) }}">
                                {!! '<div class="text-red">'.$errors->first('amount').'</div>' !!}
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="close" {{ (old('status', $admissionTest->status) == 'close' ? 'selected' : '') }}>Close</option>
                                    <option value="open" {{ (old('status', $admissionTest->status) == 'open' ? 'selected' : '') }}>Open</option>
                                </select>
                                {!! '<div class="text-red">'.$errors->first('status').'</div>' !!}
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div>
        </div>
    </section>

    <script>
        $('#year').datepicker({
            format : 'yyyy',
            viewMode : "years",
            minViewMode : "years",
            autoclose : true
        });

        $('#date').datepicker({
            format : 'yyyy-mm-dd',
            autoclose : true
        });
    </script>
@endsection