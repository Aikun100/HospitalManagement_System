<div class="grid grid-2 gap-2">
    <div class="form-group">
        <label class="form-label">Item Name *</label>
        <input type="text" name="item_name" class="form-control" value="{{ old('item_name', $inventory->item_name ?? '') }}" required placeholder="Item name">
        @error('item_name') <span style="color:#ef4444;">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Quantity *</label>
        <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $inventory->quantity ?? 0) }}" required>
        @error('quantity') <span style="color:#ef4444;">{{ $message }}</span> @enderror
    </div>
</div>

    <div class="form-group">
        <label class="form-label">Minimum Quantity</label>
        <input type="number" name="minimum_quantity" class="form-control" value="{{ old('minimum_quantity', $inventory->minimum_quantity ?? 5) }}">
        @error('minimum_quantity') <span style="color:#ef4444;">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label class="form-label">Description / Notes</label>
        <textarea name="description" class="form-control">{{ old('description', $inventory->description ?? '') }}</textarea>
        @error('description') <span style="color:#ef4444;">{{ $message }}</span> @enderror
    </div>
