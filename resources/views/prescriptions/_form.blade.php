<div class="form-group">
    <label class="form-label">Patient *</label>
    <select name="patient_id" class="form-control" required>
        <option value="">Select Patient</option>
        @foreach($patients as $p)
            <option value="{{ $p->id }}" {{ old('patient_id', $prescription->patient_id ?? '') == $p->id ? 'selected' : '' }}>{{ $p->name }} ({{ $p->patient_id }})</option>
        @endforeach
    </select>
    @error('patient_id') <span style="color:#ef4444;">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label class="form-label">Doctor</label>
    <select name="doctor_id" class="form-control">
        <option value="">Select Doctor</option>
        @foreach($doctors as $d)
            <option value="{{ $d->id }}" {{ old('doctor_id', $prescription->doctor_id ?? '') == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label class="form-label">Medication *</label>
    <input type="text" name="medication" class="form-control" value="{{ old('medication', $prescription->medication ?? '') }}" required placeholder="Medicine name and dosage">
    @error('medication') <span style="color:#ef4444;">{{ $message }}</span> @enderror
</div>

<div class="form-group">
    <label class="form-label">Instructions</label>
    <textarea name="instructions" class="form-control">{{ old('instructions', $prescription->instructions ?? '') }}</textarea>
</div>
