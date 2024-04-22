<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Producta;

class DataController extends Controller
{
    //

    public function import()
    {
        return view('data.downloadfile');
    }
    public function downloadfile(Request $request): View
    {
        $// Validation du fichier CSV
        $request->validate([
            'file' => 'required|mimes:csv,txt',
        ]);

        // Récupération du fichier CSV
        $file = $request->file('file');

        // Lecture du fichier CSV et extraction des données
        $data = Excel::read($file)->toArray();

        // Enregistrement des données dans la base de données
        // foreach ($data as $row) {
        //     // Mappez les données CSV aux champs de votre modèle
        //     $user = new User;
        //     $user->name = $row['nom']; // Remplacez 'nom' par le nom de la colonne CSV
        //     $user->email = $row['email']; // Remplacez 'email' par le nom de la colonne CSV
        //     $user->save();
        // }

        // Message de réussite
        return redirect()->back()->with('success', 'Données CSV importées avec succès!');
    }
    
}
