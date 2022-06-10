<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypesController extends Controller
{
    public function index() {
        $types = Type::all();
        return view('admin.management.types.index', compact('types'));
    }

    public function create() {
        return view('admin.management.types.create');
    }

    public function store(Request $request) {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:types'],
                'image' => ['required', 'image'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $message = '';
            foreach ($e->errors() as $key => $error) {
                $message = $message . $key . ': ' . $error[0];
            }

            session()->flash('error', $message);
            return redirect()->route('types.index');
        }

        $type = new Type;

        $type->name = $request->name;
        $type->image = base64_encode(file_get_contents($request->file('image')->path()));

        $type->save();
        session()->flash('success', 'Type created successfully.');
        return redirect()->route('types.index');
    }

    // function to edit
    public function edit($id) {
        $type = Type::find($id);
        return view('admin.management.types.edit', compact('type'));
    }

    // function to update
    public function update(Request $request, $id) {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255', 'unique:types,name,' . $id],
                // 'image' => ['required', 'image'],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $message = '';
            foreach ($e->errors() as $key => $error) {
                $message = $message . $key . ': ' . $error[0];
            }

            session()->flash('error', $message);
            return redirect()->route('types.index');
        }

        $type = Type::find($id);
        $type->name = $request->name;
        if ($request->hasFile('image')) {
            $type->image = base64_encode(file_get_contents($request->file('image')->path()));
        }

        // $type->image = base64_encode(file_get_contents($request->file('image')->path()));
        $type->save();
        session()->flash('success', 'Type updated successfully.');
        return redirect()->route('types.index');
    }

    public function destroy($id) {
        $type = Type::find($id);
        $type->delete();
        session()->flash('success', 'Type deleted successfully.');
        return redirect()->route('types.index');
    }
}
