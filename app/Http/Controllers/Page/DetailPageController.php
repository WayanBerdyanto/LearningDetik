<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KejuruanModel;
use App\Models\ListTopikModel;

class DetailPageController extends Controller
{
    public function detailtraining($id)
    {
        $result = ListTopikModel::join('kejuruan', 'kejuruan.id', '=', 'listtopik.id_kejuruan')
        ->select('kejuruan.nama_kejuruan', 'listtopik.*')
        ->where('listtopik.id', '=', $id)
        ->get();
        return view('pages.detail', compact('result'));
    }
}
