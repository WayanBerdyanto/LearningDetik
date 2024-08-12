<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KejuruanModel;
use App\Models\ListTopikModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;


class DashboardAdminController extends Controller
{
    public function dashboard()
    {
        $listtopik = ListTopikModel::join('kejuruan', 'kejuruan.id', '=', 'listtopik.id_kejuruan')
            ->select('kejuruan.nama_kejuruan', 'listtopik.*')
            ->paginate(10);
        return view('admin.dashboard', compact('listtopik'));
    }

    public function formadd()
    {
        $kejuruan = KejuruanModel::all();
        return view('admin.formadd', compact('kejuruan'));
    }
    public function posttopic(Request $request)
    {
        try {
            $request->validate([
                'id_kejuruan' => 'required',
                'title' => 'required|string|max:255',
                'description' => 'required',
                'status' => 'required',
                'price' => 'required',
                'level' => 'required',
                'duration' => 'required',
                'instructor' => 'required',
                'photo' => 'required|mimes:jpeg,png,jpg,gif',
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('admin.dashboard')->with('toast_error', $e->getMessage())->withErrors($e->validator->errors());
        }

        if ($request->hasFile('photo')) {
            $files_name = time() . '-' . $request->file('photo')->getClientOriginalName();

            ListTopikModel::create([
                'id_kejuruan' => $request->id_kejuruan,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'price' => $request->price,
                'level' => $request->level,
                'duration' => $request->duration . 'jam',
                'instructor' => $request->instructor,
                'photo' => $files_name,
            ]);

            $request->file('photo')->storeAs('listtopik', $files_name, 'public');

            return redirect()->route('admin.dashboard')->with('toast_success', 'Topic Successfully Created');
        } else {
            return redirect()->route('admin.dashboard')->with('toast_error', 'No photo was uploaded');
        }

    }
}
