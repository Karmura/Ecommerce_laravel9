<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Movie;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('admin.dashboard')->with('items',$items);
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        if($request->hasFile("cover")){
            $file = $request->file("cover");
            $imageName = 'cover_'.time().'_'.$file->getClientOriginalName();
            $file->move(('movie/cover'),$imageName);

            $item = new Item([
                "title" => $request->title,
                "body" => $request->body,
                "cover" => $imageName,
            ]);
            $item->save();
        }

        if($request->hasFile("movies")){
            $files = $request->file("movies");
            foreach ($files as $file) {
                $movieName = time().'_'.$file->getClientOriginalName();
                $request['item_id'] = $item->id;
                $request['movie'] = $movieName;
                $file->move(public_path('movie'),$movieName);
                Movie::create($request->all());
            }
        }

        return redirect("admin/dashboard");

    }

    public function destroy($id)
    {
        $items = Item::findOrFail($id);
        if(File::exists("movie/cover/".$items->cover)){
            File::delete("movie/cover/".$items->cover);
        }
        $movies = Movie::where("item_id",$items->id)->get();
        foreach($movies as $movie){
            if(File::exists("movie/".$movie->movie)){
                File::delete("movie/".$movie->movie);
                Movie::find($id)->delete();
            }
        }
        $items->delete();
        return back();
    }

    public function edit($id)
    {
        $items = Item::FindOrFail($id);
        return view('admin.edit')->with('items',$items);
    }

    public function deletemovie($id)
    {
        $movies = Movie::findOrFail($id);
        if(File::exists("movie/".$movies->movie)){
            File::delete("movie/".$movies->movie);
        }
        Movie::find($id)->delete();
        return back();
        // dd("hi");
    }

        public function deletecover($id)
    {
        $cover = Item::findOrFail($id)->cover;
        if(File::exists("movie/cover/".$cover)){
            File::delete("movie/cover/".$cover);
        }
        return back();
        // dd("hi");
    }

    public function update(Request $request,$id)
    {
        $item = Item::findOrFail($id);
        if($request->hasFile("cover")){
            if(File::exists("movie/cover".$item->cover)){
                File::delete("movie/cover".$item->cover);
            }
            $file = $request->file("cover");
            $item->cover = 'cover_'.time().'_'.$file->getClientOriginalName();
            $file->move(('movie/cover'),$item->cover);
            $request['cover'] = $item->cover;
        }
        $item->update([
            "title" => $request->title,
            "body" => $request->body,
            "cover" => $item->cover,
        ]);

        if($request->hasFile("movies")){
            $files = $request->file("movies");
            foreach($files as $file){
                $movieName = time().'_'.$file->getClientOriginalName();
                $request["item_id"] = $id;
                $request["movie"] = $movieName;
                $file->move(public_path('movie'),$movieName);
                Movie::create($request->all());
            }
        }
        return redirect("/admin/dashboard");
        // dd("hi");
    }
}
