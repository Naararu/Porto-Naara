@extends('dashboard/dashboard') 
@section('content')
    <p class="card-title">Experience</p>
    <div class="pb-3"><a href="{{ route ('education.create')}}" class="btn btn-primary">+ New Education</a></div>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th class="col-1">No</th>
                    <th>University</th>
                    <th>Faculty</th>
                    <th>Major</th>
                    <th>GPA</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th class="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($data as $item)
                <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->information1 }}</td>
                        <td>{{ $item->information2 }}</td>
                        <td>{{ $item->information3 }}</td>
                        <td>{{ $item->tgl_mulai_new }}</td>
                        <td>{{ $item->tgl_akhir_new }}</td>
                        <td>
                            <a href="{{ route('education.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form onsubmit="return confirm ('Do you really want to delete selected data?')" 
                                action="{{ route ('education.destroy', $item->id)}}" 
                                class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" name="submi t" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection