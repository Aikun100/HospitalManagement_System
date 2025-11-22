<div class="grid grid-2 gap-2">
    <div class="form-group">
        <label class="form-label">Full Name *</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name ?? '') }}" required placeholder="Enter doctor's full name">
        @error('name') <span style="color:#ef4444; font-size:0.875rem;">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Specialty</label>
        <input type="text" name="specialty" class="form-control" value="{{ old('specialty', $doctor->specialty ?? '') }}" placeholder="e.g. Cardiology">
        @error('specialty') <span style="color:#ef4444; font-size:0.875rem;">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $doctor->email ?? '') }}" placeholder="doctor@example.com">
        @error('email') <span style="color:#ef4444; font-size:0.875rem;">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Phone</label>
        <input type="tel" name="phone" class="form-control" value="{{ old('phone', $doctor->phone ?? '') }}" placeholder="+1234567890">
        @error('phone') <span style="color:#ef4444; font-size:0.875rem;">{{ $message }}</span> @enderror
    </div>
</div>

<div class="form-group">
    <label class="form-label">Notes</label>
    <textarea name="notes" class="form-control" placeholder="Additional information">{{ old('notes', $doctor->notes ?? '') }}</textarea>
    @error('notes') <span style="color:#ef4444; font-size:0.875rem;">{{ $message }}</span> @enderror
</div>
