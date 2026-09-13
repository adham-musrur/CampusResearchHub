<?php

namespace App\Http\Controllers;

use App\Models\ResearchUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResearchUpdateController extends Controller
{

    public function index()
    {
        $updates = ResearchUpdate::with('publisher')
            ->latest()
            ->get();

        return view('updates.index', compact('updates'));
    }



    public function create()
    {
        $this->authorize('create', ResearchUpdate::class);

        return view('updates.create');
    }



    public function store(Request $request)
    {
        $this->authorize('create', ResearchUpdate::class);


        $request->validate([

            'title' => 'required|string|max:255',

            'description' => 'required|string',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',

        ]);



        $imagePath = null;



        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')
                ->store('research-updates', 'public');

        }



        ResearchUpdate::create([

            'title' => $request->title,

            'description' => $request->description,

            'image' => $imagePath,

            'published_by' => auth()->id(),

        ]);



        return redirect()
            ->route('updates.index')
            ->with('success', 'Research update published successfully!');

    }




    public function show(ResearchUpdate $update)
    {
        $update->load('publisher');

        return view('updates.show', compact('update'));
    }




    public function destroy(ResearchUpdate $update)
    {

        $this->authorize('delete', $update);



        if (
            $update->image &&
            Storage::disk('public')->exists($update->image)
        ) {

            Storage::disk('public')->delete($update->image);

        }



        $update->delete();



        return redirect()
            ->route('updates.index')
            ->with('success', 'Research update deleted successfully!');

    }

}