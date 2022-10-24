<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Heloo</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('employees.create') }}"> Create Emplyee</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    {{-- <th> Depart ID</th> --}}
                    <th> Name</th>
                    <th>Email</th>
                    <th> Age</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        {{-- <td>{{ $employee->Department_id }}</td> --}}
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->age }}</td>
                        <td>
                            <form action="{{ route('employees.destroy',$employee->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                @can('admin')

                                <button type="submit" class="btn btn-danger">Delete</button>
                                @endcan
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $employees->links() !!}
    </div>
</body>
</html>
