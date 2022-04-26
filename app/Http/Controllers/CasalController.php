<?php

namespace App\Http\Controllers;

use App\Models\Casal;
use App\Models\Ciutat;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Symfony\Component\VarDumper\VarDumper;

class CasalController extends Controller
{
    public function index(Request $request)
    {
        $msg = Session::get('msg') ?? '';
        $alert = Session::get('alert') ?? '';

        $casals = Casal::join('ciutats', 'casals.ciutat', '=', 'ciutats.id')
        ->select('casals.*', 'ciutats.nom as nomCiutat')
        ->get() ?? [];
        return view('casals.index', compact('casals', 'msg', 'alert'));
    }

    public function create()
    {
        $msg = Session::get('msg') ?? '';
        $alert = Session::get('alert') ?? '';

        $ciutats = Ciutat::all();
        return view('casals.create', compact('ciutats', 'msg', 'alert'));
    }

    public function store(Request $request)
    {
        $nom = $request->input('nom');
        $data_inici = $request->input('data_inici');
        $data_final = $request->input('data_final');
        $n_places = $request->input('n_places');
        $ciutat = $request->input('ciutat');
        
        
        /*if(!new DateTime($data_inici) < new DateTime($data_final)) {
            return redirect()->route('casal.index')->with([
                'msg' => 'Data d\'inici més gran que data final.',
                'alert' => 'alert-warning'
            ]);
        }*/

        $result = Casal::create([
            'nom' => $nom,
            'data_inici' => $data_inici,
            'data_final' => $data_final,
            'n_places' => $n_places,
            'ciutat' => $ciutat,
            
        ]);

        return redirect()->route('casal.index')->with([
            'msg' => $result ? 'Casal creat' : 'Error creant casal',
            'alert' => $result ? 'alert-primary' : 'alert-warning'
        ]);
        
    }

    public function show($id)
    {
        
    }

    public function edit($id)
    {
        $msg = Session::get('msg') ?? '';
        $alert = Session::get('alert') ?? '';

        $casal = Casal::findOrFail($id);
        $ciutats = Ciutat::all();

        return view('casals.edit', compact(
            'casal', 
            'ciutats',
            'msg',
            'alert'
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

        return redirect()->route('casal.index')->with([
            'msg' => $result ? 'Casal editat' : 'Error editant casal',
            'alert' => $result ? 'alert-primary' : 'alert-warning'
        ]);
        
    }

    public function destroy($id)
    {
        $result = Casal::destroy($id);
        return redirect()->route('casal.index')->with([
            'msg' => $result ? 'Casal eliminat' : 'Error eliminant casal',
            'alert' => $result ? 'alert-primary' : 'alert-warning'
        ]);
    }
}
