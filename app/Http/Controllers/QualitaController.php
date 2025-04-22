<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QualitaController extends Controller
{
    function view()
    {
        if (!session()->has('utente')) {
            return Redirect::to('login');
        }
        $utente = session('utente');
        $ol = DB::SELECT('SELECT * FROM PROL WHERE Id_PrOL in (SELECT Id_PrOL from PrBLAttivitaEx Where Arrestata = 0 and Prodotta = 0 and PercProdotta < 100) ORDER BY TIMEINS DESC ');
        $id_xformqualita = DB::SELECT('SELECT * FROM xFormQualita ORDER BY TIMEINS DESC ');
        return view('qualita.qualita', compact('utente', 'ol', 'id_xformqualita'));
    }

    function onForm(Request $request)
    {
        $body = $request->all();
        if (isset($body['salva']))
            $body['campo106'] = $body['uniqueInput'];
        $body['campo104'] = 'QUALITA';
        if (isset($body['uniqueInput'])) {
            unset($body['uniqueInput']);
        }
        if (isset($body['uniqueInput_id'])) {
            $uniqueInput_id = $body['uniqueInput_id'];
            unset($body['uniqueInput_id']);
        }

        if (isset($body['modifica'])) {
            unset($body['modifica']);
            unset($body['uniqueInput']);
            unset($body['uniqueInput_id']);
            $check_old = DB::SELECT('SELECT * FROM xFormQualita WHERE campo106 = \'' . $body['campo106'] . '\' ');
            if (sizeof($check_old) > 0)
                DB::TABLE('xFormQualita')->where('Id_xFormQualita', '=', $uniqueInput_id)->update($body);
            else
                DB::TABLE('xFormQualita')->insert($body);
        } else {
            unset($body['salva']);
            unset($body['uniqueInput']);
            unset($body['uniqueInput_id']);
            DB::TABLE('xFormQualita')->insert($body);
        }
        return Redirect::to('qualita');
    }


    function viewMateria()
    {
        if (!session()->has('utente')) {
            return Redirect::to('login');
        }
        $utente = session('utente');
        return view('qualita.qualitamateria', compact('utente'));
    }

    function onFormMateria(Request $request)
    {
        $body = $request->all();
        $body['campo106'] = $body['uniqueInput'];
        $body['campo104'] = 'QUALITA_MATERIA';
        if (isset($body['uniqueInput'])) unset($body['uniqueInput']);
        if (isset($body['salva'])) unset($body['salva']);
        $check_old = DB::SELECT('SELECT * FROM xFormQualita WHERE campo106 = \'' . $body['campo106'] . '\' ');
        if (sizeof($check_old) > 0)
            DB::TABLE('xFormQualita')->where('campo106', '=', $body['campo106'])->update($body);
        else
            DB::TABLE('xFormQualita')->insert($body);

        return Redirect::to('qualita_materia');
    }
}
