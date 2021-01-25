<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Dosen;

use App\Models\Matkul;

use Illuminate\Support\Str;

class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dasboard');
    }

    public function listdosen()
    {
        $dosen = Dosen::paginate(5);
        $matkul = Matkul::all();
        return view('listdosen', compact('dosen', 'matkul'));
    }

    public function listmatkul()
    {
        $matkul = Matkul::paginate(1);
        return view('listmatkul', compact('matkul'));
    }

    public function storedosen(Request $request)
    {
        $post = new Dosen;
        $post->nip = $request->nip;
        $post->name = $request->name;
        $post->matkul_id = $request->matkul_id;
        $post->alamat = $request->alamat;
        $post->slug = Str::slug($request->get('name'));
        $post->save();
        return redirect('/listdosen');
    }

    public function updatedosen(Dosen $dosen)
    {
        $dsn = request()->all();
        $dosen->update($dsn);
        return redirect('/listdosen');
    }

    public function deletedosen(Dosen $dosen)
    {
        $dosen->delete();
        return redirect('/listdosen');
    }

    public function storematkul(Request $request)
    {
        $post = new Matkul;
        $post->matkul_id = $request->matkul_id;
        $post->name = $request->name;
        $post->slug = Str::slug($request->get('name'));
        $post->save();
        return redirect('/listmatkul');
    }

    public function updatematkul(Matkul $matkul)
    {
        $mtkl = request()->all();
        $matkul->update($mtkl);
        return redirect('/listmatkul');
    }

    public function deletematkul(Matkul $matkul)
    {
        $matkul->delete();
        return redirect('/listmatkul');
    }
}
