<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\DistribusiModel;
use App\Models\RuangModel;
use App\Models\StatusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DistribusiController extends Controller
{
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Distribusi Barang JTI',
            'list' => ['Home', 'Distribusi']
        ];

        $page = (object)[
            'title' => 'Daftar Distribusi Barang JTI',
        ];

        $activeMenu = 'distribusi';
        $statusAwal = StatusModel::all();
        $statusAkhir = StatusModel::all();
        $ruang = RuangModel::all();
        $barang = BarangModel::all();

        return view('distribusi.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ruang' => $ruang, 'barang' => $barang, 'statusAwal' => $statusAwal, 'statusAkhir' => $statusAkhir, 'activeMenu' => $activeMenu]);
    }

    public function list(Request $request)
    {
        $distribusis = DistribusiModel::select('id_distribusi', 'id_barang', 'id_ruang', 'id_detail_status_awal', 'id_detail_status_akhir')
                        ->with('barang')
                        ->with('ruang')
                        ->with('statusAwal')
                        ->with('statusAkhir');

        if ($request->id_barang) {
            $distribusis->where('id_barang', $request->id_barang);
        }

        if ($request->id_ruang) {
            $distribusis->where('id_ruang', $request->id_ruang);
        }
        
        if ($request->id_detail_status) {
            $distribusis->whereHas('detail_status', function ($query) use ($request) {
                $query->where('id', $request->id_detail_status);
            });
        }

        return DataTables::of($distribusis)
            ->addIndexColumn() // menambahkan kolom index / no urut (default id_distribusi kolom: DT_RowIndex)
            ->addColumn('aksi', function ($distribusi) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/distribusi/' . $distribusi->id_distribusi) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/distribusi/' . $distribusi->id_distribusi . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/distribusi/' . $distribusi->id_distribusi) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm"onclick="return confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }

    public function create(){
        $breadcrumb = (object)[
            'title' => 'Tambah Distribusi Barang JTI',
            'list' => ['Home', 'Distribusi', 'Tambah']
        ];

        $page = (object)[
            'title' => 'Tambah Data Distribusi Barang JTI Baru',
        ];

        $activeMenu = 'distribusi';
        $barang = BarangModel::all();
        $ruang = RuangModel::all();
        $statusAwal = StatusModel::all();
        $statusAkhir = StatusModel::all();

        return view('distribusi.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'ruang' => $ruang, 'statusAwal' => $statusAwal, 'statusAkhir' => $statusAkhir, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request){
        $request->validate([
            'id_barang'              =>'required|integer',
            'id_ruang'               =>'required|integer',
            'id_detail_status_awal'  =>'required|integer',
            'id_detail_status_akhir' =>'required|integer'
        ]);

        DistribusiModel::create([
            'id_barang'              => $request->id_barang,
            'id_ruang'               => $request->id_ruang,
            'id_detail_status_awal'  => $request->id_detail_status_awal,
            'id_detail_status_akhir' => $request->id_detail_status_akhir
        ]);

        return redirect('/distribusi')->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id){
        $distribusi = DistribusiModel::with('ruang')->with('barang')->find($id);

        $breadcrumb = (object)[
            'title' => 'Detail Distribusi Barang JTI',
            'list' => ['Home', 'Distribusi', 'Detail']
        ];

        $page = (object)[
            'title' => 'Detail Distribusi Barang JTI',
        ];

        $activeMenu = 'distribusi';

        return view('distribusi.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'distribusi' => $distribusi, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id){
        $distribusi = DistribusiModel::find($id);
        $ruang = RuangModel::all();
        $barang = BarangModel::all();
        $statusAwal = StatusModel::all();
        $statusAkhir = StatusModel::all();

        $breadcrumb = (object)[
            'title' => 'Edit Data Distribusi Barang JTI',
            'list' => ['Home', 'Distribusi', 'Edit']
        ];

        $page = (object)[
            'title' => 'Edit Data Distribusi Barang JTI',
        ];

        $activeMenu = 'distribusi';

        return view('distribusi.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'ruang' => $ruang, 'barang' => $barang, 'statusAwal' => $statusAwal, 'statusAkhir' => $statusAkhir, 'distribusi' => $distribusi, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'id_barang'              =>'required|integer:detail_distribusi_barang,' .$id. ',id_distribusi',
            'id_ruang'               =>'required|integer',
            'id_detail_status_awal'  =>'required|integer',
            'id_detail_status_akhir' =>'required|integer'
        ]);

        DistribusiModel::find($id)->update([
            'id_barang'              => $request->id_barang,
            'id_ruang'               => $request->id_ruang,
            'id_detail_status_awal'  => $request->id_detail_status_awal,
            'id_detail_status_akhir' => $request->id_detail_status_akhir
        ]);

        return redirect('/distribusi')->with('success', 'Data berhasil diubah!');;
    }

    public function destroy($id)
    {
        $check = DistribusiModel::find($id);
        if(!$check){
            return redirect('/distribusi')->with('error', 'Data tidak ditemukan!');
        }

        try{
            DistribusiModel::destroy($id);
            return redirect('/distribusi')->with('success', 'Data berhasil dihapus!');
        }catch(\Illuminate\Database\QueryException $e){
            return redirect('/distribusi')->with('error', 'Data gagal dihapus! masih terdapat tabel lain yang terikat dengan data ini!');
        }
    }
}

