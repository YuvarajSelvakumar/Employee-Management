@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center mb-5 text-gradient fw-bold">✏️ Edit Employee Details</h2>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Edit Employee Card -->
            <div class="card border-0 rounded-4 shadow-lg">
                <div class="card-body p-4 p-md-5">
                    <h4 class="mb-4 text-center text-primary fw-bold">Update Information</h4>

                    <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                        {!! csrf_field() !!}
                        @method("PATCH")

                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">👤 Full Name</label>
                                <input type="text" class="form-control rounded-pill" name="emp_name" value="{{ $employee->emp_name }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">🎂 Date of Birth</label>
                                <input type="date" class="form-control rounded-pill" name="dob" value="{{ $employee->dob }}" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-semibold">📞 Phone Number</label>
                                <input type="text" class="form-control rounded-pill" name="phone" value="{{ $employee->phone }}" required>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-lg btn-primary rounded-pill px-5 shadow" value="Update">
                        </div>
                    </form>
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

    .card {
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.01);
    }

    .btn-primary:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }
</style>

@endsection
