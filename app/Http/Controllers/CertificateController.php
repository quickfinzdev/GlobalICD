<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Certificate;

use PDF;

class CertificateController extends Controller
{
    //


    public function getIos(Request $request)
    {
        $user = Certificate::paginate();
        return response()->json($user);
    }


    public function addIso(Request $request)
    {

        if ($request->id) {
            Certificate::where('id', $request->id)->update($request->all());
        } else {
            $user = new Certificate();

            $user->organization = $request->organization;
            $user->certificate_type = $request->certificate_type;
            $user->address = $request->address;
            $user->mobile = $request->mobile;
            $user->email = $request->email;
            $user->certificate_no = $request->certificate_no;
            $user->issue_date = $request->issue_date;
            $user->expiry_date = $request->expiry_date;
            $user->f_s_date = $request->f_s_date;
            $user->s_s_date = $request->s_s_date;

            $user->save();
        }

    }
    public function generatePDF(Request $request)
    {
        $data = [
            'organization' => $request->organization,
            'certificate_type' => $request->certificate_type,
            'address' => $request->address,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'certificate_no' => $request->certificate_no,
            'issue_date' => $request->issue_date,
            'expiry_date' => $request->expiry_date,
            's_s_date' => $request->s_s_date,
            'f_s_date' => $request->f_s_date,
        ];
        $pdf = PDF::loadView('ios-certificate', $data);
        return $pdf->stream('example.pdf');
        // return $pdf->download('example.pdf');
    }



}
