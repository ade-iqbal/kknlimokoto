<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\DetailApplication;
use App\Models\Jorong;
use App\Models\Letter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PDF;

;

class ApplicationController extends Controller
{
    public function create(Request $request): View
    {
        $jorongs = Jorong::all();
        $letters = Letter::all();
        return view('application.create', compact('jorongs', 'letters'));
    }

    public function store(ApplicationRequest $request): RedirectResponse
    {
        $application = Application::create([
            'citizen_name' => ucwords($request->citizen_name),
            'place_of_birth' => ucwords($request->place_of_birth),
            'date_of_birth' => $request->date_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'occupation' => ucwords($request->occupation),
            'jorong_id' => $request->jorong_id,
            'date' => date("Y-m-d"),
            'need' => strtolower($request->need)
        ]);

        foreach($request->letters as $letter):
            DetailApplication::create([
                'application_id' => $application->id,
                'letter_id' => $letter
            ]);
        endforeach;

        return redirect()->back()->with('success', 'Permohonan berhasil dibuat.');
    }

    public function print(Request $request, Application $id)
    {
        if($id->accepted_date === null){
            $id->update([
                'ref_number' => $request->ref_number,
                'property_taxes' => $request->property_taxes,
                'accepted_date' => date('Y-m-d')
            ]);
        }
        else{
            $id->update([
                'ref_number' => $request->ref_number,
                'property_taxes' => $request->property_taxes,
            ]);
        }

        $data = [];
        if($request->hasFile('sign')){
            $data = [
                'application' => $id->load(['detailApplications', 'jorong']),
                'sign' => base64_encode($request->file('sign')->get())
            ];
        }
        else {
            $data = [
                'application' => $id->load(['detailApplications', 'jorong']),
            ];
        }

        $pdf = PDF::loadView('application.print', $data)->setPaper('A4', 'potrait');
        return $pdf->stream('rekomendasi.pdf');
    }

    public function destroy(Request $request, Application $id): RedirectResponse
    {
        $id->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
