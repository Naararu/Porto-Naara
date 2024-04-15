@extends('dashboard/dashboard')
@section('content')
    <div class="pb-3"><a href="{{ route ('experience.index')}}" class="btn btn-secondary"> 
        << Back</a>
    </div>
    <form action="{{ route ('experience.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Experience Title</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="title"
                id="title"
                aria-describedby="helpId"
                placeholder="Position" value="{{ Session::get('title')}}"
            />
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Company Name</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="information1"
                id="information1"
                aria-describedby="helpId"
                placeholder="info" value="{{ Session::get('information1')}}"
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

        <div class="mb-3">
            <label for="" class="form-label">Content</label>
            <textarea class="form-control summernote"
                name="content"      
                rows="5" >{{ Session::get('content')}}
            </textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection