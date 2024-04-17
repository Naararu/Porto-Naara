@extends('dashboard/dashboard')

@section('content')

    <form action="{{ route ('profile.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row justify-content-between">
            <div class="col-5">
                <h3>Profile</h3>
                @if (get_value('_photo'))
                    <img style="max-width:100px;max-height:100px" src="{{ asset('photo')."/".get_value('_photo')}}">
                @endif
                <div class="mb-3">
                <label for="_photo" class="form-label">Photo</label>
                <input
                    type="file"
                    class="form-control form-control-sm"
                    name="_photo"
                    id="_photo"
                    />
                </div>
                <div class="mb-3">
                <label for="_city" class="form-label">City</label>
                <input
                    type="text"
                    class="form-control form-control-sm"
                    name="_city"
                    id="_city"
                    value="{{ get_value('_city') }}"
                    />
                </div>
                <div class="mb-3">
                <label for="_province" class="form-label">Province</label>
                <input
                    type="text"
                    class="form-control form-control-sm"
                    name="_province"
                    id="_province"
                    value="{{ get_value('_province') }}"
                    />
                </div>
                <div class="mb-3">
                <label for="_number" class="form-label">Phone Number</label>
                <input
                    type="text"
                    class="form-control form-control-sm"
                    name="_number"
                    id="_number"
                    value="{{ get_value('_number') }}"
                    />
                </div>
                <div class="mb-3">
                <label for="_email" class="form-label">Email</label>
                <input
                    type="text"
                    class="form-control form-control-sm"
                    name="_email"
                    id="_email" 
                    value="{{ get_value('_email') }}"
                    />
                </div>
            </div>
            
            <div class="col-5">
                <h3>Social Media Account</h3>
                <div class="mb-3">
                <label for="_linkedin" class="form-label">LinkedIn</label>
                <input
                    type="text"
                    class="form-control form-control-sm"
                    name="_linkedin"
                    id="_linkedin"
                    value="{{ get_value('_linkedin') }}"
                    />
                </div>
                <div class="mb-3">
                <label for="_ig" class="form-label">Instagram</label>
                <input
                    type="text"
                    class="form-control form-control-sm"
                    name="_ig"
                    id="_ig"
                    value="{{ get_value('_ig') }}"
                    />
                </div>
                <div class="mb-3">
                <label for="_github" class="form-label">GitHub</label>
                <input
                    type="text"
                    class="form-control form-control-sm"
                    name="_github"
                    id="_github"
                    value="{{ get_value('_github') }}"
                    />
                </div>

            </div>
        </div>
        <button class="btn btn-primary" name="save" type="submit">SAVE</button>
    </form>
@endsection