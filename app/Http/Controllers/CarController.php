<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class CarController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Car::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('description', function ($row) {
                    return '<p class="white-space">' . $row->description . '</p>';
                })
                ->addColumn('file', function ($row) {
                    $image = '<img src="' . asset($row->file) . '" width="50px">';
                    return $image;
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="dropdown">
                            <button type="button" class="p-0 btn dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="' . route('admin.cars.edit', $row->id) . '"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="javascript:hapus(\'' . $row->id . '\')"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                    </div>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'file', 'description'])
                ->make(true);
        }
        return view('pages.admin.cars.index');
    }

    public function create()
    {
        return view('pages.admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|max:255',
            'license_plate' => 'required|max:255',
            'daily_rate' => 'required|max:255',
            'file' => 'required',
        ]);

        try {
            // create user
            $file = $request->file('file');
            if (file_exists($file)) {
                $nama_file = time() . "-" . $file->getClientOriginalName();
                $namaFolder2 = 'file/cars';
                $file->move($namaFolder2, $nama_file);
                $pathPublic = $namaFolder2 . "/" . $nama_file;
            } else {
                $pathPublic = null;
            }

            $service = Car::create([
                'brand' => $request->brand,
                'model' => $request->model,
                'license_plate' => $request->license_plate,
                'daily_rate' => $request->daily_rate,
                'file' => $pathPublic,
            ]);

            //echo $service;
            //redirect
            return redirect()->route('admin.cars.index')->with('success', 'cars created successfully');
        } catch (\Throwable $e) {
            //return $e->getMessage();
            return back()->with(['error' => 'Data gagal disimpan.']);
        }
    }

    public function edit(string $id)
    {
        // get all cars
        $cars = Car::findOrFail($id);
        return view('pages.admin.cars.edit', compact('cars'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|max:255',
            'license_plate' => 'required|max:255',
            'daily_rate' => 'required|max:255',
            'file' => '',
        ]);

        try {
            //check passwordy
            $file = $request->file('file');
            //echo $file;
            if (file_exists($file)) {
                $nama_file = time() . "-" . $file->getClientOriginalName();
                $namaFolder2 = 'file/cars';
                $file->move($namaFolder2, $nama_file);
                $pathPublic2 = $namaFolder2 . "/" . $nama_file;
                $data = Car::where('id', $id)->first();
                File::delete($data->file);
                echo $pathPublic2;
            } else {
                $pathPublic2 = $request->pathFile;
            }
            //update user with password
            $cars = Car::where("id", $id)->update([
                'brand' => $request->brand,
                'model' => $request->model,
                'license_plate' => $request->license_plate,
                'daily_rate' => $request->daily_rate,
                'file' => $pathPublic2,
            ]);

            //echo $cars;
            //redirect
            return redirect()->route('admin.cars.index')->with('success', 'cars updated successfully');

        } catch (\Throwable $th) {
            //return $th->getMessage();
            return back()->with(['error' => 'Data gagal diperbarui.']);
        }

    }

    public function destroy($id)
    {
        try {
            $data = Car::find($id);

            // delete data
            $data->delete();

            // delete file
            File::delete($data->file);

            return redirect()->route('admin.cars.index')->with('success', 'cars deleted successfully');

        } catch (\Throwable $th) {
            return back()->with(['error' => 'Data gagal dihapus.']);
        }
    }
}
