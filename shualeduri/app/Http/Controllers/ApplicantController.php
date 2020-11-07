<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditApplicantRequest;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function getAllApplicants() {
        $allApplicants = Applicant::all();

        return view('applicant_list')->with("applicants", $allApplicants);
    }

    public function getApplicantEdit($id) {
        $applicant = Applicant::findOrFail($id);

        return view('edit')->with('applicant', $applicant);
    }

    public function editApplicant(EditApplicantRequest $editApplicantRequest, $id) {
        $applicant = Applicant::findOrFail($id);

        $applicant->update($editApplicantRequest->all());

        return redirect('/');
    }

    public function hired(Applicant $applicant)
    {
        $applicant->update(['is_hired' => 1]);
        return back();
    }
}
