@extends('dashboard/dashboard')

@section('content')

    <form action="{{ route ('pagesettings.update')}}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-2">Home</label>
            <div class="col-sm-6">
                <select class="form-control form-control-sm" name="page_home" id="">
                    <option value="">-Choose-</option>
                    @foreach ($pagedata as $item)
                        <option value="{{ $item->id}}" {{ get_value('page_home') == $item->id ? 'selected' : '' }} > {{ $item->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection