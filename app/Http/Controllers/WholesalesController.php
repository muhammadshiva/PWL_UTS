<?php

namespace App\Http\Controllers;
use App\Models\Wholesales;
use Illuminate\Http\Request;

class WholesalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->keywords;
        if($search){

            $posts = Wholesales::orWhere('brand','LIKE',"%{$search}%")
            ->orWhere('model','LIKE',"%{$search}%")
            ->orWhere('category','LIKE',"%{$search}%")
            ->orderBy('id','asc')
            ->paginate(5);
            // Paginate on search by keywords
            $posts->appends(['keywords' => $search]);
        
        } else {
            // Show the car lists
            $posts = Wholesales::orderBy('id', 'asc')->paginate(5); 
        }
        return view('wholesales.index', compact('posts'));
        with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wholesales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data 
        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'category' => 'required',
            'transmission' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ]);

         // Fungsi eloquent untuk menambah data 
         Wholesales::create($request->all());

         
        //Jika data berhasil ditambahkan, akan kembali ke halaman utama 
        return redirect()->route('wholesales.index')
        ->with('success', 'Data Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Wholesales = Wholesales::find($id);
        return view('wholesales.detail', compact('Wholesales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menampilkan detail data dengan menemukan berdasarkan id untuk diedit 
        $Wholesales = Wholesales::find($id);
        return view('wholesales.edit', compact('Wholesales'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Melakukan validasi data 
         $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'category' => 'required',
            'transmission' => 'required',
            'price' => 'required',
            'qty' => 'required',
        ]);

        // Funsgi eloquent untuk mengupdate data inputan kita 
        Wholesales::find($id)->update($request->all());

        // Jika data berhasil diupdata, akan kembali ke halaman utama 
        return redirect()->route('wholesales.index')
        ->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wholesales::find($id)->delete();
        return redirect()->route('wholesales.index')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
