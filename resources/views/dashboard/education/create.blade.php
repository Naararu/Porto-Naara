@extends('dashboard/dashboard')
@section('content')
    <div class="pb-3"><a href="{{ route ('education.index')}}" class="btn btn-secondary"> 
        << Back</a>
    </div>
    <form action="{{ route ('education.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">University</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="title"
                id="title"
                aria-describedby="helpId"
                placeholder="University" value="{{ Session::get('title')}}"
            />
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Faculty</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="information1"
                id="information1"
                aria-describedby="helpId"
                placeholder="Faculty" value="{{ Session::get('information1')}}"
            />
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Major</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="information2"
                id="information2"
                aria-describedby="helpId"
                placeholder="Major" value="{{ Session::get('information2')}}"
            />
        </div>

        <div class="mb-3">
            <label for="" class="form-label">GPA</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="information3"
                id="information3"
                aria-describedby="helpId"
                placeholder="GPA" value="{{ Session::get('information3')}}"
            />
        </div>

        <div class="mb-3">
            <div class="row">
                <div class="col-auto">Start Date</div>
                <div class="col-auto"><input type="date" 
                    class="form-control form-control-sm" 
                    name="tgl_mulai" placeholder="dd/mm/yyyy" 
                    value="{{ Session::get('tgl_mulai')}}" >
                </div>
                <div class="col-auto">End Date</div>
                <div class="col-auto"><input type="date" 
                    class="form-control form-control-sm" 
                    name="tgl_akhir" placeholder="dd/mm/yyyy" 
                    value="{{ Session::get('tgl_akhir')}}">
                </div>
            </div> 
        </div>
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection