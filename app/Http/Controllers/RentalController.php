<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class RentalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Rental::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('user_id', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('car_id', function ($row) {
                    return $row->car->brand . " " . $row->car->model;
                })
                ->addColumn('action', function ($row) {
                    $btn = '
                    <div class="dropdown">
                            <button type="button" class="p-0 btn dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="javascript:hapus(\'' . $row->id . '\')"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                    </div>
                    ';
                    return $btn;
                })
                ->rawColumns(['action', 'file', 'description'])
                ->make(true);
        }
        return view('pages.admin.rentals.index');
    }

    public function create()
    {
        $users = User::all();
        $cars = Car::all();
        return view('pages.admin.rentals.create', compact('users', 'cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Verifikasi ketersediaan mobil pada tanggal yang diminta
        if (!$this->isCarAvailable($request->input('car_id'), $request->input('start_date'), $request->input('end_date'))) {
            return redirect()->back()->with('error', 'Mobil tidak tersedia pada tanggal yang diminta.');
        }

        // Simpan data peminjaman
        Rental::create([
            'user_id' => $request->input('user_id'),
            'car_id' => $request->input('car_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        return redirect()->route('admin.rentals.index')->with('success', 'Peminjaman berhasil dibuat.');
    }

    private function isCarAvailable($carId, $startDate, $endDate)
    {
        $existingRentals = Rental::where('car_id', $carId)
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($query) use ($startDate, $endDate) {
                        $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                    });
            })
            ->count();

        return $existingRentals === 0;
    }

    public function show($id)
    {
        // Implementasi tampilan detail peminjaman
    }

    public function edit($id)
    {
        // Implementasi tampilan formulir pengeditan peminjaman
    }

    public function update(Request $request, $id)
    {
        // Validasi dan pembaruan informasi peminjaman
    }

    public function destroy($id)
    {
        try {
            $data = Rental::find($id);

            // delete data
            $data->delete();

            return redirect()->route('admin.rentals.index')->with('success', 'rentals data deleted successfully');

        } catch (\Throwable $th) {
            return back()->with(['error' => 'Data gagal dihapus.']);
        }
    }
}
