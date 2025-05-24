@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-5 text-gradient fw-bold">🚀 Employee Management</h2>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Employee Registration Card -->
            <div class="card border-0 rounded-4 shadow-lg mb-5">
                <div class="card-body p-4 p-md-5">
                    <h4 class="mb-4 text-center text-primary fw-bold">Register a New Employee</h4>
                    
                    <form method="POST" action="{{ route('employee.store') }}">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">👤 Full Name</label>
                                <input type="text" name="emp_name" class="form-control rounded-pill" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">🎂 Date of Birth</label>
                                <input type="date" name="dob" class="form-control rounded-pill" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">📞 Phone Number</label>
                                <input type="text" name="phone" class="form-control rounded-pill" placeholder="+91 9876543210" required>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-lg btn-success rounded-pill px-5 shadow">
                                <i class="fa fa-user-plus me-2"></i> Register Employee
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Employee Table -->
            <div class="card border-0 shadow-lg rounded-4">
                <div class="card-body p-4">
                    <h5 class="mb-4 text-center text-secondary">👥 Registered Employees</h5>

                    <div class="table-responsive">
                        <table class="table table-hover text-center align-middle">
                            <thead class="table-light rounded-top">
                                <tr class="text-secondary">
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>DOB</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $key => $employee)
                                    <tr class="table-row-hover bg-white border-bottom">
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $employee->emp_name }}</td>
                                        <td>{{ $employee->dob }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>
                                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-outline-primary btn-sm rounded-pill me-2">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-muted">No employees found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Custom Styles --}}
<style>
    .text-gradient {
        background: linear-gradient(to right, #1e88e5, #43a047);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .table-row-hover:hover {
        background-color: #f1f5f9 !important;
        transition: all 0.2s ease-in-out;
    }

    .card {
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.01);
    }

    .btn-outline-primary:hover, .btn-outline-danger:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
</style>
@endsection
