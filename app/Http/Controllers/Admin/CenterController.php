<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Center;
use App\Models\CenterImage;
use App\Models\OrdinaryRoom;
use App\Models\User;
use App\Models\VipRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class CenterController extends Controller
{
    public function index()
    {
        $centers = Center::all();
        return view('admin.center.index', compact('centers'));
    }

    public function create()
    {
        return view('admin.center.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'google_map_link' => 'required',
            'image' => 'required|image',
            'food_status' => 'nullable',
            'open_time' => 'required',
            'close_time' => 'required',
            'ordinary_seat_number' => 'required|integer',
            'ordinary_seat_price' => 'required|integer',
            'ordinary_computer_performance' => 'required',
            'vip_room_number' => 'nullable|integer',
            'vip_room_seat_number' => 'nullable|integer',
            'vip_room_seat_price' => 'nullable|integer',
            'vip_computer_performance' => 'nullable|string',

            'user_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',

        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/game_center/',$filename);
            $validatedData['image'] = 'uploads/game_center/'.$filename;
        }

        $center = Center::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'description' => $validatedData['description'],
            'google_map_link' => $validatedData['google_map_link'],
            'image' => $validatedData['image'],
            'food_status' => $request->food_status == true ? '1' : '0',
            'open_time' => $validatedData['open_time'],
            'close_time' => $validatedData['close_time'],
        ]);

        if($request->hasFile('center_image')){
            $uploadPath = 'uploads/center_image/';

            $i = 1;
            foreach($request->file('center_image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $center->centerImages()->create([
                    'center_id' => $center->id,
                    'image' => $finalImagePathName
                ]);
            }
        }

        OrdinaryRoom::create([
            'center_id' => $center->id,
            'seat_number' => $validatedData['ordinary_seat_number'],
            'price' => $validatedData['ordinary_seat_price'],
            'computer_performance' => $validatedData['ordinary_computer_performance']
        ]);

        if ($request->has('vip_room_number') and $request->has('vip_room_seat_number') and
            $request->has('vip_room_seat_price'))
        {
            VipRoom::create([
                'center_id' => $center->id,
                'room_number' => $validatedData['vip_room_number'],
                'seat_number' => $validatedData['vip_room_seat_number'],
                'price' => $validatedData['vip_room_seat_price'],
                'computer_performance' => $validatedData['vip_computer_performance']
            ]);
        }

        User::create([
            'name' => $validatedData['user_name'],
            'email' => $validatedData['email'],
            'center_id' => $center->id,
            'role_as' => 2,
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect('admin/center')->with('message', 'Center created successfully');
    }

    public function edit($id)
    {
        $center = Center::findOrFail($id);
        $center_ordinary = OrdinaryRoom::where('center_id',$id)->first();
        $center_vip = VipRoom::where('center_id',$id)->first();
        return view('admin.center.edit', compact('center','center_ordinary','center_vip'));
    }

    public function update(Request $request, $id)
    {
        $center = Center::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'google_map_link' => 'required',
            'image' => 'nullable|image',
            'food_status' => 'nullable',
            'open_time' => 'required',
            'close_time' => 'required',
            'ordinary_seat_number' => 'required|integer',
            'ordinary_seat_price' => 'required|integer',
            'ordinary_computer_performance' => 'required',
            'vip_room_number' => 'nullable|integer',
            'vip_room_seat_number' => 'nullable|integer',
            'vip_room_seat_price' => 'nullable|integer',
            'vip_computer_performance' => 'nullable|string',
        ]);

        if($request->hasFile('image')){

            $destination = $center->image;

            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/game_center/',$filename);
            $validatedData['image'] = 'uploads/game_center/'.$filename;
        }

        $center->update([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'description' => $validatedData['description'],
            'google_map_link' => $validatedData['google_map_link'],
            'image' => $validatedData['image'] ?? $center->image,
            'food_status' => $request->food_status == true ? '1' : '0',
            'open_time' => $validatedData['open_time'],
            'close_time' => $validatedData['close_time'],
        ]);

        $center_ordinary = OrdinaryRoom::where('center_id', $center->id)->first();
        $center_vip = VipRoom::where('center_id', $center->id)->first();

        $center_ordinary->update([
            'center_id' => $center->id,
            'seat_number' => $validatedData['ordinary_seat_number'],
            'price' => $validatedData['ordinary_seat_price'],
            'computer_performance' => $validatedData['ordinary_computer_performance']
        ]);

        if ($request->has('vip_room_number') and $request->has('vip_room_seat_number') and $request->has('vip_room_seat_price')) {
            VipRoom::updateOrCreate(
                ['center_id' => $center->id],
                [
                    'room_number' => $validatedData['vip_room_number'],
                    'seat_number' => $validatedData['vip_room_seat_number'],
                    'price' => $validatedData['vip_room_seat_price'],
                    'computer_performance' => $validatedData['vip_computer_performance']
                ]
            );
        }

        return redirect('admin/center')->with('message', 'Center updated successfully');
    }

    public function destroy($id)
    {
        $center = Center::findOrFail($id);
        $center->delete();
        return redirect('admin/center')->with('message', 'Center deleted successfully');
    }

    public function centerImage($id)
    {
        $center = Center::findOrFail($id);
        return view('admin.center.image',compact('center'));
    }

    public function centerPostImage(Request $request, $id)
    {
        $center = Center::findOrFail($id);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/center_image/';

            $i = 1;
            foreach($request->file('image') as $file){
                $extension = $file->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extension;
                $file->move($uploadPath,$filename);
                $finalPathName = $uploadPath.$filename;

                $center->centerImages()->create([
                    'center_id' => $center->id,
                    'image' => $finalPathName
                ]);
            }
        }

        return redirect()->back()->with('message','Data амжилттай хуулагдлаа');
    }

    public function removeImage($id)
    {
        $center_image = CenterImage::findOrFail($id);

        if(File::exists($center_image->file)){
            File::delete($center_image->file);
        }
        $center_image->delete();
        return redirect()->back()->with('message','Зураг амжилттай устлаа');

    }
}
