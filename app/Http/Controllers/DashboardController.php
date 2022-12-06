<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JenisCutiModel;
use App\Models\CutiModel;

class DashboardController extends Controller
{
    public function index()
    {
        $dataAkun = User::count();
        $dataJenisCuti = JenisCutiModel::count();
        $dataCuti = CutiModel::count();
        return view('dashboard', compact('dataAkun', 'dataJenisCuti', 'dataCuti'));
    }
}
