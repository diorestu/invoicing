<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Project;
use App\Models\Contract;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $client    = Project::count();
        $contractSdm  = Contract::where('status', 'accept')->where('tipe', 'sdm')->orWhere('status', 'accept')->where('tipe', 'event')->count();
        $contractPk  = Contract::where('status', 'accept')->where('tipe', 'pekerjaan')->count();
        $wilayah  = count(Project::groupBy('provinsi')->pluck('provinsi'));
        // dd(count($wilayah));
        $invActive = Invoice::whereMonth('period', date('m'))->whereYear('period', date('Y'))->count();
        $invDone   = Invoice::whereMonth('period', date('m'))->whereYear('period', date('Y'))->where('status', 'dibayar')->count();
        $totalInvDone   = Invoice::whereMonth('period', date('m'))->whereYear('period', date('Y'))->where('status', 'dibayar')->sum('nominal');
        // $client    = Project::count();
        // $client    = Project::count();
        return view('home', compact('client', 'contractSdm', 'contractPk', 'invActive', 'invDone', 'wilayah', 'totalInvDone'));
    }
}
