<?php

namespace App\Http\Controllers;

use App\Models\Casal;
use App\Models\Ciutat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\VarDumper\VarDumper;

class CasalController extends Controller
{
    public function index(Request $request)
    {
        /*$users = DB::table('casals')
            ->join('ciutats', 'casals.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();*/

        $casals = Casal::join('ciutats', 'casals.ciutat', '=', 'ciutats.id')
        ->select('casals.*', 'ciutats.nom as nomCiutat')
        ->get() ?? [];
        return view('casals.index', compact('casals'));
    }

    public function create()
    {
        $ciutats = Ciutat::all();
        return view('casals.create', compact('ciutats'));
    }

    public function store(Request $request)
    {
        $nom = $request->input('nom');
        $data_inici = $request->input('data_inici');
        $data_final = $request->input('data_final');
        $n_places = $request->input('n_places');
        $ciutat = $request->input('ciutat');

        $result = Casal::create([
            'nom' => $nom,
            'data_inici' => $data_inici,
            'data_final' => $data_final,
            'n_places' => $n_places,
            'ciutat' => $ciutat,
            
        ]);

        return redirect()->route('casal.index')->with('status', $result ? 'Casal creat' : 'Error creant casal');
        
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $casal = Casal::findOrFail($id);
        $ciutats = Ciutat::all();

        return view('casals.edit', compact(
            'casal', 
            'ciutats'
        ));
    }

    public function update(Request $request, $id)
    {
        $nom = $request->input('nom');
        $data_inici = $request->input('data_inici');
        $data_final = $request->input('data_final');
        $n_places = $request->input('n_places');
        $ciutat = $request->input('ciutat');

        $result = Casal::where('id', $id)
        ->update([
            'nom' => $nom,
            'data_inici' => $data_inici,
            'data_final' => $data_final,
            'n_places' => $n_places,
            'ciutat' => $ciutat,
        ]);

        return redirect()->route('casal.index')->with('status', $result ? 'Casal creat' : 'Error creant casal');
        
    }

    public function destroy($id)
    {
        $result = Casal::destroy($id);
        return redirect()->route('casal.index')->with('status', $result ? 'Casal creat' : 'Error creant casal');
    }
}
