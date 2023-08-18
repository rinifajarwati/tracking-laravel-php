<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\addsignature;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class addsignaturecontroller extends Controller
{
    public function index()
    {
        
        $data=[
            "title" =>"Warehouse | IMI Tracking",
        ];
        return view('signatureuser.index', $data);
    }

    public function uploadPDF(Request $request)
    {
        $user = User::find(Auth::id());
    
        if ($request->hasFile('img')) {
            $oldFotoProfil = $user->img;
    
            // Menghapus foto profil lama jika ada
            if ($oldFotoProfil !== null) {
                Storage::delete('public\assetsgambar\file' . $oldFotoProfil);
            }
    
            $fotoProfil = $request->file('img');
            $filename = time() . '_' . $fotoProfil->getClientOriginalName();
    
            // Menyimpan foto profil baru
            $path = $fotoProfil->storeAs('public\assetsgambar\file', $filename);
            $user->img = $filename;
        }
    
        $user->save();
    
        return redirect()->back()->with('success', 'Gambar berhasil diupdate!');
    }




    // public function update(Request $request)
    // {
    //     $user = Auth::position_id();
    //     $user->signature()->updateOrCreate([], ['img' => $request->input('img')]);

    //     return redirect()->back()->with('succes', 'Tanda tangan berhasil disimpan.');
    // }
    

//    public function uploadPDF(Request $request, $uid)
//     {
        
//         $userUid = auth()->user()->uid;
//         // dd($request->toArray());
//         $request->validate([
//             'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
//          ]);
      
//          $image = User::findOrFail($uid);
//          if ($request->hasFile('img')) {
//             $file = $request->file('img');
//             $path = $file->store('file_img');
//             $image->path = $path;
//             $request = User::find($userUid);
//          }
//          if ($uid->img) {
//             Storage::delete($uid->img); // Menghapus gambar dari file storage
//         }
      
//          $image->save();
      
//          return redirect()->back()->with('success', 'Gambar berhasil diupdate!');
//         // $this->validate($request, [ 
//         //     'img' => 'nullable|image|mimes:jpeg,jpg,png',
//         // ]);
           
//         //     $userUid = auth()->user()->uid;
//         //     if($request->file('img')){
//         //         // dd($request);
//         //         // upload image
//         //         $image = $request->file('img');
//         //         $image = addsignature::find($userUid);
//         //         $fileName =Str::random(40).'.'.$image->getClientOriginalExtension();
//         //         Storage::disk('file_img')->put($fileName, file_get_contents($image));
    
//         //         // delete old image
//         //         Storage::delete('file_img'. $post->image);
    
//         //         // update post data image
//         //         $post->update([
//         //             'img' => $image
//         //         ]);
//         //     }
            
//             // $file=request()->file('img');
//             // $fileName =Str::random(40).'.'.$file->getClientOriginalExtension();
//             // Storage::disk('file_img')->put($fileName, file_get_contents($file));

//             // $user = User::find($userUid)
//             // ->update($file);
//             // $user->img = $fileName;
//             // $post->save();
//             // dd($post);
            
//             // return redirect()->back()->with('success', 'Tanda tangan berhasil diunggah.');
            
            
            
        
//     }
    

}
