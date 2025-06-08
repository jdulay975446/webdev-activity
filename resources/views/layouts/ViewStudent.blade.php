@extends('layouts.base')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Student List</h2>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createStudentModal">
            + Create Student
        </button>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Student Table -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Middlename</th>
                <th>Lastname</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->firstname }}</td>
                    <td>{{ $student->middlename }}</td>
                    <td>{{ $student->lastname }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ ucfirst($student->gender) }}</td>
                    <td>{{ $student->address }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Modal Form -->
    <div class="modal fade" id="createStudentModal" tabindex="-1" aria-labelledby="createStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('createStudent') }}" method="POST" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createStudentModalLabel">Create New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Validation Errors -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label>First Name</label>
                        <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Middle Name</label>
                        <input type="text" name="middlename" class="form-control" value="{{ old('middlename') }}">
                    </div>

                    <div class="mb-3">
                        <label>Last Name</label>
                        <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control" value="{{ old('age') }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Gender</label>
                        <select name="gender" class="form-select" required>
                            <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select Gender</option>
                            <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Create</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection