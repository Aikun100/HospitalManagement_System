<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = auth()->user();
            if (!$user) {
                return redirect()->route('login');
            }
            if ($user->role !== 'admin') {
                abort(403);
            }
            return $next($request);
        });
    }
    public function index(Request $request)
    {
        $query = Inventory::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('item_name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('item_code', 'like', "%{$search}%");
        }

        $items = $query->latest()->paginate(10);
        return view('inventory.index', compact('items'));
    }

    public function create()
    {
        // pass an empty Inventory instance so the form partial can reference attributes safely
        $inventory = new Inventory();
        return view('inventory.create', compact('inventory'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|in:medicine,equipment,supplies,surgical,other',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'minimum_quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'unit_price' => 'required|numeric|min:0',
            'supplier' => 'nullable|string|max:255',
            'expiry_date' => 'nullable|date',
            'purchase_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
        ]);

        $validated['item_code'] = 'INV-' . strtoupper(Str::random(8));
        
        // Auto-set status based on quantity
        if ($validated['quantity'] == 0) {
            $validated['status'] = 'out_of_stock';
        } elseif ($validated['quantity'] <= $validated['minimum_quantity']) {
            $validated['status'] = 'low_stock';
        } else {
            $validated['status'] = 'available';
        }

        Inventory::create($validated);

        return redirect()->route('inventory.index')->with('success', 'Inventory item created successfully!');
    }

    public function show(Inventory $inventory)
    {
        return view('inventory.show', compact('inventory'));
    }

    public function edit(Inventory $inventory)
    {
        return view('inventory.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'category' => 'required|in:medicine,equipment,supplies,surgical,other',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'minimum_quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'unit_price' => 'required|numeric|min:0',
            'supplier' => 'nullable|string|max:255',
            'expiry_date' => 'nullable|date',
            'purchase_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
        ]);

        // Auto-set status based on quantity
        if ($validated['quantity'] == 0) {
            $validated['status'] = 'out_of_stock';
        } elseif ($validated['quantity'] <= $validated['minimum_quantity']) {
            $validated['status'] = 'low_stock';
        } else {
            $validated['status'] = 'available';
        }

        $inventory->update($validated);

        return redirect()->route('inventory.index')->with('success', 'Inventory item updated successfully!');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventory.index')->with('success', 'Inventory item deleted successfully!');
    }
}
