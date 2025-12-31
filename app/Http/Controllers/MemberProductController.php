<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberProductController extends Controller
{
    /**
     * Display a listing of the member's products.
     */
    public function index()
    {
        $member = Member::where('user_id', Auth::id())->first();

        if (!$member) {
            return redirect()->back()->with('error', 'Member not found.');
        }

        $products = MemberProduct::where('member_id', $member->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $hasProducts = $products->count() > 0;

        return view('member-products.index', compact('products', 'hasProducts', 'member'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $member = Member::where('user_id', Auth::id())->first();

        if (!$member) {
            return redirect()->back()->with('error', 'Member not found.');
        }

        return view('member-products.create', compact('member'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $member = Member::where('user_id', Auth::id())->first();

        if (!$member) {
            return redirect()->back()->with('error', 'Member not found.');
        }

        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'quantity' => 'nullable|integer|min:1',
            'sku' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            DB::beginTransaction();

            $validated['member_id'] = $member->id;
            MemberProduct::create($validated);

            DB::commit();

            return redirect()->route('member-products.index')
                ->with('success', 'Product added successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while adding the product. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit($id)
    {
        $member = Member::where('user_id', Auth::id())->first();

        if (!$member) {
            return redirect()->back()->with('error', 'Member not found.');
        }

        $product = MemberProduct::where('id', $id)
            ->where('member_id', $member->id)
            ->first();

        if (!$product) {
            return redirect()->route('member-products.index')
                ->with('error', 'Product not found.');
        }

        return view('member-products.edit', compact('product', 'member'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, $id)
    {
        $member = Member::where('user_id', Auth::id())->first();
        
        if (!$member) {
            return redirect()->back()->with('error', 'Member not found.');
        }

        $product = MemberProduct::where('id', $id)
            ->where('member_id', $member->id)
            ->first();

        if (!$product) {
            return redirect()->route('member-products.index')
                ->with('error', 'Product not found.');
        }

        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric|min:0',
            'category' => 'nullable|string|max:255',
            'quantity' => 'nullable|integer|min:1',
            'sku' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            DB::beginTransaction();

            $product->update($validated);

            DB::commit();

            return redirect()->route('member-products.index')
                ->with('success', 'Product updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while updating the product. Please try again.');
        }
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy($id)
    {
        $member = Member::where('user_id', Auth::id())->first();

        if (!$member) {
            return response()->json(['success' => false, 'message' => 'Member not found.'], 404);
        }

        // Check if this is the only product
        $productCount = MemberProduct::where('member_id', $member->id)->count();

        if ($productCount <= 1) {
            return response()->json([
                'success' => false,
                'message' => 'You must have at least one product. Cannot delete the last product.'
            ], 400);
        }

        $product = MemberProduct::where('id', $id)
            ->where('member_id', $member->id)
            ->first();

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found.'
            ], 404);
        }

        try {
            DB::beginTransaction();

            $product->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully!'
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the product. Please try again.'
            ], 500);
        }
    }
}

