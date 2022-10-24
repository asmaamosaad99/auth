
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Employee Form </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Employee</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('employees.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong>Employee Name:</strong>
                        <input type="text" name="name" value="{{ $employee->name }}" class="form-control"
                            placeholder="Employee name">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Employee Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Employee Email"
                            value="{{ $employee->email }}">
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Employee Age:</strong>
                        <input type="number" name="age" value="{{ $employee->age }}" class="form-control"
                            placeholder="Employee age">
                        @error('age')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Employee Depart:</strong>
                    <input type="number" name="Department_id" class="form-control" placeholder="Department_id"
                        value="{{ $employee->Department_id }}">
                    @error('Department_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
