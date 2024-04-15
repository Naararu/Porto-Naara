@extends('dashboard/dashboard') 
@section('content')
    <p class="card-title">Experience</p>
    <div class="pb-3"><a href="{{ route ('experience.create')}}" class="btn btn-primary">+ New Experience</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>Position</th>
                    <th>Company Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->information1 }}</td>
                        <td>{{ $item->tgl_mulai_new }}</td>
                        <td>{{ $item->tgl_akhir_new }}</td>
                        <td>
                            <a href="{{ route('experience.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm ('Do you really want to delete selected data?')" 
                                action="{{ route ('experience.destroy', $item->id)}}" 
                                class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" name="submit" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection