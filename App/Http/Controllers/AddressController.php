<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('user.profile.addresses', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'address' => 'required|string',
            'is_default' => 'nullable|boolean',
        ]);

        $user = auth()->user();

        // Jika ditandai sebagai default, set semua alamat lain jadi false
        if ($request->is_default) {
            $user->addresses()->update(['is_default' => false]);
        }

        $user->addresses()->create([
            'label' => $request->label,
            'address' => $request->address,
            'is_default' => $request->is_default ?? false,
        ]);

        return redirect()->route('user.profile.addresses')->with('success', 'Alamat berhasil ditambahkan!');
    }

    public function setDefault($id)
    {
        $user = Auth::user();
        $address = $user->addresses()->findOrFail($id);

        // Set semua alamat jadi non-default
        $user->addresses()->update(['is_default' => false]);

        // Set alamat ini jadi default
        $address->update(['is_default' => true]);

        return redirect()->route('user.profile.addresses')->with('success', 'Alamat berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $address = Address::where('user_id', auth()->id())->findOrFail($id);
        $address->delete();

        return redirect()->route('user.profile.addresses')->with('success', 'Alamat berhasil dihapus!');
    }
}