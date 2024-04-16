@extends('dashboard/dashboard')

@section('content')

    <form action="{{ route ('skill.update')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Programming Language & Tools</label>
            <input
                type="text"
                class="form-control form-control-sm skills"
                name="_language"
                id="title"
                aria-describedby="helpId"
                placeholder="Programming Language & Tools" value="{{ get_value('_language')}}"
            />
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Workflow</label>
            <textarea class="form-control summernote"
                name="_workflow"      
                rows="5" > {{ get_value('_workflow')}}
            </textarea>
        </div>
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection