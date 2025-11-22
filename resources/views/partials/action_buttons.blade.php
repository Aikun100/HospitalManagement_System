@php
    // $model: the Eloquent model instance to act on
    // $routePrefix: e.g. 'patients', 'doctors' (default: 'patients')
    $routePrefix = $routePrefix ?? 'patients';
    $model = $model ?? ($item ?? null);
    if (! $model) {
        throw new \Exception('partials.action_buttons requires $model');
    }
@endphp

<div class="d-flex gap-1">
    <a href="{{ route($routePrefix.'.show', $model) }}" class="btn btn-sm btn-info" title="View">
        <i class="fas fa-eye"></i>
    </a>

    <a href="{{ route($routePrefix.'.edit', $model) }}" class="btn btn-sm btn-warning" title="Edit">
        <i class="fas fa-edit"></i>
    </a>

    <form action="{{ route($routePrefix.'.destroy', $model) }}" method="POST" style="display:inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
            <i class="fas fa-trash"></i>
        </button>
    </form>
</div>
