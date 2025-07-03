<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use App\Models\roomFeature;
use Illuminate\Http\Request;
use Storage;
use Str;

class RoomController extends Controller
{
    public function rooms()
    {
        $rooms = Room::latest()->get();
        return view('backend.room.rooms', compact('rooms'));
    }
    public function create()
    {
        $categories = Category::latest()->get();
        $features = roomFeature::latest()->get();

        return view('backend.room.create', compact('categories', 'features'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'room_number' => 'required|unique:rooms,room_number',
            'price' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $room = new Room;
        $room->category_id = $request->category_id;
        $room->room_number = $request->room_number;
        $room->name = $request->name;
        $room->slug = $request->name
            ? Str::slug($request->name . '-' . $request->room_number)
            : Str::slug($request->room_number);
        $room->view = $request->view;
        $room->guest = $request->guest;
        $room->bathroom = $request->bathroom;
        $room->area = $request->area;
        $room->price = $request->price;
        $room->discount_price = $request->discount_price;
        $room->discount_percent = $request->discount_percent;
        $room->unit = $request->unit ?? 'Per Night';
        $room->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('rooms', 'public');
            $room->image = $imagePath;
        }

        $room->save();

        return redirect()->back()->with('success', 'Room created successfully!');
    }
    public function view(Room $room)
    {

        return view('backend.room.room', compact('room'));
    }
    public function edit(Room $room)
    {
        $categories = Category::latest()->get();
        return view('backend.room.edit', compact('room','categories'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'price' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $room->category_id = $request->category_id;
        $room->room_number = $request->room_number;
        $room->name = $request->name;
        $room->slug = $request->name
            ? Str::slug($request->name . '-' . $request->room_number)
            : Str::slug($request->room_number);
        $room->view = $request->view;
        $room->guest = $request->guest;
        $room->bathroom = $request->bathroom;
        $room->area = $request->area;
        $room->price = $request->price;
        $room->discount_price = $request->discount_price;
        $room->discount_percent = $request->discount_percent;
        $room->unit = $request->unit ?? 'Per Night';
        $room->description = $request->description;

        if ($request->hasFile('image')) {
            if ($room->image && Storage::disk('public')->exists($room->image)) {
                Storage::disk('public')->delete($room->image);
            }
            $imagePath = $request->file('image')->store('rooms', 'public');
            $room->image = $imagePath;
        }

        $room->save();

        return redirect(route('admin.room.index'))->with('success', 'Room updated successfully!');
    }
    public function delete(Room $room)
    {
        if ($room->image && Storage::disk('public')->exists($room->image)) {
            Storage::disk('public')->delete($room->image);
        }

        $room->delete();

        return redirect(route('admin.room.index'))->with('success', 'Room deleted successfully!');
    }



}
