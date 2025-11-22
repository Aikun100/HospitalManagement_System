@php
    use Carbon\Carbon;
@endphp

<div class="grid grid-2 gap-2">
    <div class="form-group">
        <label class="form-label">Full Name *</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name ?? '') }}" required placeholder="Enter patient's full name">
        @error('name')
            <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Date of Birth *</label>
        <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', isset($patient) && $patient->date_of_birth ? Carbon::parse($patient->date_of_birth)->format('Y-m-d') : '') }}" required>
        @error('date_of_birth')
            <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Gender *</label>
        <select name="gender" class="form-control" required>
            <option value="">Select Gender</option>
            <option value="male" {{ old('gender', $patient->gender ?? '') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ old('gender', $patient->gender ?? '') == 'female' ? 'selected' : '' }}>Female</option>
            <option value="other" {{ old('gender', $patient->gender ?? '') == 'other' ? 'selected' : '' }}>Other</option>
        </select>
        @error('gender')
            <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Blood Group</label>
        <select name="blood_group" class="form-control">
            <option value="">Select Blood Group</option>
            @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg)
                <option value="{{ $bg }}" {{ old('blood_group', $patient->blood_group ?? '') == $bg ? 'selected' : '' }}>{{ $bg }}</option>
            @endforeach
        </select>
        @error('blood_group')
            <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Email *</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $patient->email ?? '') }}" required placeholder="patient@example.com">
        @error('email')
            <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Phone *</label>
        <input type="tel" name="phone" class="form-control" value="{{ old('phone', $patient->phone ?? '') }}" required placeholder="+1234567890">
        @error('phone')
            <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span>
        @enderror
    </div>
</div>

<div class="form-group">
    <label class="form-label">Address *</label>
    <textarea name="address" class="form-control" required placeholder="Enter complete address">{{ old('address', $patient->address ?? '') }}</textarea>
    @error('address')
        <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span>
    @enderror
</div>

<div class="grid grid-2 gap-2">
    <div class="form-group">
        <label class="form-label">Medical History</label>
        <textarea name="medical_history" class="form-control" placeholder="Enter any relevant medical history">{{ old('medical_history', $patient->medical_history ?? '') }}</textarea>
        @error('medical_history')
            <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Allergies</label>
        <textarea name="allergies" class="form-control" placeholder="List any known allergies">{{ old('allergies', $patient->allergies ?? '') }}</textarea>
        @error('allergies')
            <span style="color: #ef4444; font-size: 0.875rem;">{{ $message }}</span>
        @enderror
    </div>
</div>
