@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Edit Student</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                </div>
                <div class="mb-3">
                    <label>Department:</label>
                    <select class="form-control" name="department" >
                        <option value="">Select Department</option>
                        <option value="Automobile">Automobile</option>
                        <option value="Civil">Civil</option>
                        <option value="Computer">Computer</option>
                        <option value="ECE">ECE</option>
                        <option value="EEE">EEE</option>
                        <option value="Mechanical">Mechanical</option>
                        <option value="IT">IT</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div class="form-check">
                        <input type="radio" name="gender" value="Male" class="form-check-input" id="male"
                            {{ old('gender', $student->gender ?? '') == 'Male' ? 'checked' : '' }}>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="gender" value="Female" class="form-check-input" id="female"
                            {{ old('gender', $student->gender ?? '') == 'Female' ? 'checked' : '' }}>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="gender" value="Other" class="form-check-input" id="other"
                            {{ old('gender', $student->gender ?? '') == 'Other' ? 'checked' : '' }}>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Skills</label>
                    @php
                        $selectedSkills = json_decode($student->skills, true) ?? [];
                    @endphp
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="PHP" 
                            {{ in_array('PHP', $selectedSkills) ? 'checked' : '' }}>
                        <label class="form-check-label">PHP</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="Laravel" 
                            {{ in_array('Laravel', $selectedSkills) ? 'checked' : '' }}>
                        <label class="form-check-label">Laravel</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="JavaScript" 
                            {{ in_array('JavaScript', $selectedSkills) ? 'checked' : '' }}>
                        <label class="form-check-label">JavaScript</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="MySQL" 
                            {{ in_array('MySQL', $selectedSkills) ? 'checked' : '' }}>
                        <label class="form-check-label">MySQL</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="skills[]" value="Bootstrap" 
                            {{ in_array('Bootstrap', $selectedSkills) ? 'checked' : '' }}>
                        <label class="form-check-label">Bootstrap</label>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Update Student</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
