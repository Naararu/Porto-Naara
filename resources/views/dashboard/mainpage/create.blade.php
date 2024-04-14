@extends('dashboard/dashboard')
@section('content')
    <div class="pb-3"><a href="{{ route ('mainpage.index')}}" class="btn btn-secondary"> 
        << Back</a>
    </div>
    <form action="{{ route ('mainpage.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input
                type="text"
                class="form-control form-control-sm"
                name="title"
                id="title"
                aria-describedby="helpId"
                placeholder="title" value="{{ Session::get('title')}}"
            />
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