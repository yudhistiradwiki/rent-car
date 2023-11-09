<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Returns;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ReturnController extends Controller
{
    public function returnForm()
    {
        return view('pages.admin.returns.return');
    }

    public function returnCar(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|exists:cars,license_plate',
        ]);

        $car = Rental::whereHas('car', function ($query) use ($request) {
            $query->where('license_plate', $request->input('license_plate'));
        })->where('user_id', auth()->id())
            ->whereNull('return_id')
            ->first();

        if (!$car) {
            return redirect()->route('admin.returnForm')->with('error', 'Mobil dengan nomor plat tersebut tidak sedang disewa atau sudah dikembalikan.');
        }

        $startDate = \Carbon\Carbon::parse($car->start_date);
        $endDate = now();
        $totalDays = $endDate->diffInDays($startDate);

        $return = Returns::create([
            'rental_id' => $car->id,
            'return_date' => $endDate,
            'total_days' => $totalDays,
            'total_cost' => $totalDays * $car->car->daily_rate,
        ]);

        $car->return_id = $return->id;
        $car->save();

        return redirect()->route('admin.returnForm')->with('success', 'Mobil berhasil dikembalikan. Jumlah hari penyewaan: ' . $totalDays . '. Biaya sewa: ' . $return->total_cost);
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Returns::all();

            return DataTables::of($data)
                ->addIndexColumn()
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
        return view('pages.admin.returns.index');
    }

    public function create()
    {
        // Implementasi tampilan formulir pengembalian mobil
    }

    public function store(Request $request)
    {
        // Validasi dan penyimpanan data pengembalian mobil
    }

    public function show($id)
    {
        // Implementasi tampilan detail pengembalian
    }

    public function edit($id)
    {
        // Implementasi tampilan formulir pengeditan pengembalian
    }

    public function update(Request $request, $id)
    {
        // Validasi dan pembaruan informasi pengembalian
    }

    public function destroy($id)
    {
        // Implementasi pembatalan pengembalian
    }
}
