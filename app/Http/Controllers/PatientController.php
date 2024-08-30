<?php

namespace App\Http\Controllers;
use App\Models\Patient;
Use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        return view ('pasien.index',compact(['patients']));
    }

    public function create()
    {
        return view ('pasien.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'rm' => 'max:8',
            'nama' => 'required',
            'tanggal' => 'required',
            'ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fotolain' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ktppj' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fotopj' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
          
        ]);

        $patients =Patient::create([
            'rm' => $request->rm,
            'nama' => $request->nama,
              'tanggal' => $request->tanggal,
            'ktp' => $request->ktp,
            'kk' => $request->kk,
            'fotolain' => $request->fotolain,
            'ktppj' => $request->ktppj,
            'fotopj' => $request->fotopj,
        ]);

       
        if ($request->hasFile('ktp')) {
            $request->file('ktp')->move('images/', $request->file('ktp')->getClientOriginalName());
            $patients->ktp = $request->file('ktp')->getClientOriginalName();
           
        }
        if ($request->hasFile('kk')) {
            $request->file('kk')->move('images/', $request->file('kk')->getClientOriginalName());
            $patients->kk = $request->file('kk')->getClientOriginalName();
            
        }
        if ($request->hasFile('fotolain')) {
            $request->file('fotolain')->move('images/', $request->file('fotolain')->getClientOriginalName());
            $patients->fotolain = $request->file('fotolain')->getClientOriginalName();
           
        }
        if ($request->hasFile('ktppj')) {
            $request->file('ktppj')->move('images/', $request->file('ktppj')->getClientOriginalName());
            $patients->ktppj = $request->file('ktppj')->getClientOriginalName();
          
        }
        if ($request->hasFile('fotopj')) {
            $request->file('fotopj')->move('images/', $request->file('fotopj')->getClientOriginalName());
            $patients->fotopj = $request->file('fotopj')->getClientOriginalName();
            
        }

        $patients->save();
        return redirect('/pasien')->with('sukses', 'Data Berhasil Ditambahkan !');
        
    }
    public function delete($id)
    {

        $patients= Patient::find($id);
        $patients->delete();
        if (!is_null($patients->ktp)) {
            $ktp = public_path('images/' . $patients->ktp);
            if (File::exists($ktp)) {
                unlink($ktp);
            }
        }
        if (!is_null($patients->kk)) {
            $kk = public_path('images/' . $patients->kk);
            if (File::exists($kk)) {
                unlink($kk);
            }
        }
        if (!is_null($patients->fotolain)) {
            $fotolain = public_path('images/' . $patients->fotolain);
            if (File::exists($fotolain)) {
                unlink($fotolain);
            }
        }
        if (!is_null($patients->ktppj)) {
            $ktppj = public_path('images/' . $patients->ktppj);
            if (File::exists($ktppj)) {
                unlink($ktppj);
            }
        }
        if (!is_null($patients->fotopj)) {
            $fotopj = public_path('images/' . $patients->fotopj);
            if (File::exists($fotopj)) {
                unlink($fotopj);
            }
        }
        
        return redirect('/pasien')->with('sukses', 'Data Berhasil di Hapus');
    }
    public function edit($id)
    {
        $patients = Patient::find($id);

        return view('pasien.edit',compact(['patients']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rm' => 'max:8',
            'nama' => 'required',
            'tanggal' => 'required',
            'ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fotolain' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ktppj' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fotopj' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
          
        ]);
        $patients = Patient::find($id);
        $patients::update([
            'rm' => $request->rm,
            'nama' => $request->nama,
              'tanggal' => $request->tanggal,
            'ktp' => $request->ktp,
            'kk' => $request->kk,
            'fotolain' => $request->fotolain,
            'ktppj' => $request->ktppj,
            'fotopj' => $request->fotopj,
        ]);
       if ($request->hasfile('ktp')) 
       {
        $filepath= public_path('images/');
        $file = $request->file('ktp');
        $file_name = time(). $file->getClientOriginalName();
        $file->move($filepath,$file_name );

        if (!is_null($patients->ktp)) 
        {
            $oldImage=public_path('images/' . $patients->ktp);
            if(File::exists($oldImage))
            {
                unlink ($oldImage);
            }
        }
        $patients->ktp = $file_name;
       }
       if ($request->hasfile('kk')) 
       {
        $filepath= public_path('images/');
        $file = $request->file('kk');
        $file_name = time(). $file->getClientOriginalName();
        $file->move($filepath,$file_name );

        if (!is_null($patients->ktp)) 
        {
            $oldImage=public_path('images/' . $patients->kk);
            if(File::exists($oldImage))
            {
                unlink ($oldImage);
            }
        }
        $patients->kk = $file_name;
       }
       if ($request->hasfile('fotolain')) 
       {
        $filepath= public_path('images/');
        $file = $request->file('fotolain');
        $file_name = time(). $file->getClientOriginalName();
        $file->move($filepath,$file_name );

        if (!is_null($patients->fotolain)) 
        {
            $oldImage=public_path('images/' . $patients->fotolain);
            if(File::exists($oldImage))
            {
                unlink ($oldImage);
            }
        }
        $patients->fotolain = $file_name;
       }
       if ($request->hasfile('ktppj')) 
       {
        $filepath= public_path('images/');
        $file = $request->file('ktppj');
        $file_name = time(). $file->getClientOriginalName();
        $file->move($filepath,$file_name );

        if (!is_null($patients->ktppj)) 
        {
            $oldImage=public_path('images/' . $patients->ktppj);
            if(File::exists($oldImage))
            {
                unlink ($oldImage);
            }
        }
        $patients->ktppj = $file_name;
       }
       if ($request->hasfile('fotopj')) 
       {
        $filepath= public_path('images/');
        $file = $request->file('fotopj');
        $file_name = time(). $file->getClientOriginalName();
        $file->move($filepath,$file_name );

        if (!is_null($patients->fotopj)) 
        {
            $oldImage=public_path('images/' . $patients->fotopj);
            if(File::exists($oldImage))
            {
                unlink ($oldImage);
            }
        }
        $patients->fotopj = $file_name;
       }

        $result = $patients->save();
       
        return redirect('pasien')->with('success','Data berhasil di Ubah');

    }
}