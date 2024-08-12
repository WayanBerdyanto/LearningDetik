<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KejuruanModel;
use App\Models\ListTopikModel;

class HomePageController extends Controller
{
    public function homeindex(Request $request)
    {
        $value = $request->input('title');
        $listtopik = ListTopikModel::join('kejuruan', 'kejuruan.id', '=', 'listtopik.id_kejuruan')
            ->select('kejuruan.nama_kejuruan', 'listtopik.*')
            ->when($value, function ($query, $value) {
                if ($value !== "") {
                    return $query->where('listtopik.title', 'like', '%' . $value . '%');
                }
            })
            ->paginate(8);
        return view('pages.home', compact('listtopik'));
    }

    public function training(Request $request)
    {
        $value = $request->input('value');
        $divisi = KejuruanModel::all();
        $listtopik = ListTopikModel::join('kejuruan', 'kejuruan.id', '=', 'listtopik.id_kejuruan')
            ->select('kejuruan.nama_kejuruan', 'listtopik.*')
            ->when($value, function ($query, $value) {
                if ($value !== "") {
                    return $query->where('kejuruan.nama_kejuruan', $value);
                }
            })->get();

        return view('pages.training', compact('listtopik', 'divisi'));
    }
}
