<div class="grid grid-2 gap-2">
    <div class="form-group">
        <label class="form-label">Patient *</label>
        <select name="patient_id" class="form-control" required>
            <option value="">Select Patient</option>
            @foreach($patients as $p)
                <option value="{{ $p->id }}" {{ old('patient_id', $appointment->patient_id ?? '') == $p->id ? 'selected' : '' }}>{{ $p->name }} ({{ $p->patient_id }})</option>
            @endforeach
        </select>
        @error('patient_id') <span style="color:#ef4444;">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Doctor *</label>
        <select name="doctor_id" class="form-control" required>
            <option value="">Select Doctor</option>
            @foreach($doctors as $d)
                <option value="{{ $d->id }}" {{ old('doctor_id', $appointment->doctor_id ?? '') == $d->id ? 'selected' : '' }}>{{ $d->name }} ({{ $d->specialty ?? '—' }})</option>
            @endforeach
        </select>
        @error('doctor_id') <span style="color:#ef4444;">{{ $message }}</span> @enderror
    </div>
</div>

<div class="grid grid-2 gap-2">
    <div class="form-group">
        <label class="form-label">Appointment Date *</label>
        <input type="datetime-local" name="appointment_date" class="form-control" value="{{ old('appointment_date', isset($appointment) && $appointment->appointment_date ? $appointment->appointment_date->format('Y-m-d\TH:i') : '') }}" required>
        @error('appointment_date') <span style="color:#ef4444;">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Status</label>
        <select name="status" class="form-control">
            @foreach(['scheduled','confirmed','completed','cancelled'] as $s)
                <option value="{{ $s }}" {{ old('status', $appointment->status ?? '') == $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <label class="form-label">Notes</label>
    <textarea name="notes" class="form-control">{{ old('notes', $appointment->notes ?? '') }}</textarea>
</div>
