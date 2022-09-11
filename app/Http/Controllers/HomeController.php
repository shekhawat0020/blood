<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\DonorHistory;
use App\Models\Receipt;
use Datatables;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

   

    public function donorList(Request $request){
        if ($request->ajax()) {
            $data = DonorHistory::with('donor')->latest()->get();
         

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<button type="button" class="btn btn-sm btn-primary loadmodal" data-url="'.route('donor-edit-form', $row->donor_id).'"><i class="fa fa-pencil"></i></button>
                        <button type="button" class="btn btn-sm btn-danger deleterecord" data-url="'.route('donor-delete', $row->id).'"><i class="fa fa-trash"></i></button>';

                        return $btn;
                    })
                    ->editColumn('created_at',function($row){
                        return date('d-m-Y', strtotime($row->created_at));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function receiptList(Request $request){
        if ($request->ajax()) {
            $data = Receipt::latest()->get();
         

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<a  class="btn btn-sm btn-primary" href="'.route('receipt-print', $row->id).'"><i class="fa fa-print"></i></a>';
                        if($row->status == 'Created'){
                        $btn .= ' <button type="button" class="btn btn-sm btn-danger deleterecord" data-url="'.route('receipt-cancel', $row->id).'"><i class="fa fa-close"></i></button>';
                        }
                        return $btn;
                    })
                    ->editColumn('created_at',function($row){
                        return date('d-m-Y', strtotime($row->created_at));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function donorEditForm($id){
        
        $donor = Donor::where('id', $id)->with('donor_history')->first();
        $html  = view('donor-edit', compact('donor'))->render();
        
       

        return response()->json([
			'status' => true,
             'showModal' => true,             
             'modalData' => $html,             
			]);



    }

    public function donorDelete($id){
        
        $donor = DonorHistory::where('id', $id)->delete();       
       
        if($donor){
            return response()->json([
                'status' => true,
                 'msg' => 'Record Deleted', 
                 'aplus' => getBloodStock('A+'),             
                 'amins' => getBloodStock('A-'), 
                 'oplus' => getBloodStock('O+'),             
                 'omins' => getBloodStock('O-'),
                 'abplus' => getBloodStock('AB+'),             
                 'abmins' => getBloodStock('AB-'),
                 'bplus' => getBloodStock('B+'),             
                 'bmins' => getBloodStock('B-'),               
                 'totalstock' => getTotalStock(),           
                ]);
        }else{
            return response()->json([
                'status' => false,
                 'msg' => "Something went wrong Please try again",              
                ]);
        }
        



    }

    public function getDonorForm(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required|numeric',
            // 'link' => 'required'
        ]);

        if ($validator->fails())
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}
        $mobile = $request->mobile_no;
        $donor = Donor::where('mobile_no', $request->mobile_no)->with('donor_history')->first();
        //dd($donor);
        if(isset($donor->id)){
            //edit donor
            $html  = view('donor-edit', compact('donor'))->render();
        }else{
             //create donor
             $html  = view('donor-create', compact('mobile'))->render();
        }
       

        return response()->json([
			'status' => true,
             'msg' => '',
             'showModal' => true,             
             'modalData' => $html,
             'aplus' => getBloodStock('A+'),             
             'amins' => getBloodStock('A-'), 
             'oplus' => getBloodStock('O+'),             
             'omins' => getBloodStock('O-'),
             'abplus' => getBloodStock('AB+'),             
             'abmins' => getBloodStock('AB-'),
             'bplus' => getBloodStock('B+'),             
             'bmins' => getBloodStock('B-'),              
             'totalstock' => getTotalStock(),               
			]);



    }

    public function donorCreate(Request $request){
        $validator = Validator::make($request->all(), [
            'action' => 'required',
            'name' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            'mobile_no' => 'required|numeric|unique:donors|digits:10',
            'address' => 'required',
            'weight' => 'required|numeric',
            'blood_group' => 'required',
            'hb' => 'required',
            // 'link' => 'required'
        ]);

        if ($validator->fails())
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}

        $donor = new Donor();
        $donor->name = $request->name;
        $donor->father_name = $request->father_name;
        $donor->dob = $request->dob;
        $donor->age = $request->age;
        $donor->gender = $request->gender;
        $donor->email = $request->email;
        $donor->mobile_no = $request->mobile_no;
        $donor->occupation = $request->occupation;
        $donor->address = $request->address;
        $donor->weight = $request->weight;
        $donor->blood_group = $request->blood_group;
        $donor->hb = $request->hb;
        $donor->save();

        if($request->action){
            $donorHistory = new DonorHistory();
            $donorHistory->donor_id = $donor->id;
            $donorHistory->unit = 1;
            $donorHistory->blood_group = $donor->blood_group;
            $donorHistory->hb = $donor->hb;
            $donorHistory->save();
        }


        return response()->json([
			'status' => true,
             'msg' => 'Donor Update Successfully',
             'showModal' => false,
             'aplus' => getBloodStock('A+'),             
             'amins' => getBloodStock('A-'), 
             'oplus' => getBloodStock('O+'),             
             'omins' => getBloodStock('O-'),
             'abplus' => getBloodStock('AB+'),             
             'abmins' => getBloodStock('AB-'),
             'bplus' => getBloodStock('B+'),             
             'bmins' => getBloodStock('B-'),              
             'totalstock' => getTotalStock(),               
			]);


    }

    public function donorEdit(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:donors',
            'action' => 'required',
            'name' => 'required',
            'age' => 'required|numeric',
            'gender' => 'required',
            'mobile_no' => 'required|numeric||digits:10|unique:donors,id,'.$request->id,
            'address' => 'required',
            'weight' => 'required|numeric',
            'blood_group' => 'required',
            'hb' => 'required',
            // 'link' => 'required'
        ]);

        if ($validator->fails())
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}

        $donor =  Donor::find($request->id);
        $donor->name = $request->name;
        $donor->father_name = $request->father_name;
        $donor->dob = $request->dob;
        $donor->age = $request->age;
        $donor->gender = $request->gender;
        $donor->email = $request->email;
        $donor->mobile_no = $request->mobile_no;
        $donor->occupation = $request->occupation;
        $donor->address = $request->address;
        $donor->weight = $request->weight;
        $donor->blood_group = $request->blood_group;
        $donor->hb = $request->hb;
        $donor->save();


        if($request->action){
            $donorHistory = new DonorHistory();
            $donorHistory->donor_id = $donor->id;
            $donorHistory->unit = 1;
            $donorHistory->blood_group = $donor->blood_group;
            $donorHistory->hb = $donor->hb;
            $donorHistory->save();
        }


        return response()->json([
			'status' => true,
             'msg' => 'Donor Add Successfully',
             'showModal' => false, 
             'aplus' => getBloodStock('A+'),             
             'amins' => getBloodStock('A-'), 
             'oplus' => getBloodStock('O+'),             
             'omins' => getBloodStock('O-'),
             'abplus' => getBloodStock('AB+'),             
             'abmins' => getBloodStock('AB-'),
             'bplus' => getBloodStock('B+'),             
             'bmins' => getBloodStock('B-'),              
             'totalstock' => getTotalStock(),              
			]);

    }

   

    public function donorView(Request $request){
        
    }


    public function getReceiptForm(Request $request){
        $validator = Validator::make($request->all(), [
            'mobile_no' => 'required|numeric|digits:10',
            // 'link' => 'required'
        ]);

        if ($validator->fails())
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}
        $receipts = Receipt::where('mobile_no',$request->mobile_no)->get();
        $mobile = $request->mobile_no;
        $html  = view('receipt-create', compact('mobile', 'receipts'))->render();
       

        return response()->json([
			'status' => true,
             'msg' => '',
             'showModal' => true,             
             'modalData' => $html,
             'aplus' => getBloodStock('A+'),             
             'amins' => getBloodStock('A-'), 
             'oplus' => getBloodStock('O+'),             
             'omins' => getBloodStock('O-'),
             'abplus' => getBloodStock('AB+'),             
             'abmins' => getBloodStock('AB-'),
             'bplus' => getBloodStock('B+'),             
             'bmins' => getBloodStock('B-'),              
             'totalstock' => getTotalStock(),               
			]);



    }


    public function receiptCreate(Request $request){
        $validator = Validator::make($request->all(), [
            'receipt_no' => 'required|numeric|unique:receipts',
            'bag_no' => 'required|numeric',
            'issue_no' => 'required|numeric',
            'patient_name' => 'required',
            'recipient_name' => 'required',
            'mobile_no' => 'required|numeric|digits:10',
            'payment_mode' => 'required',
            'blood_group' => 'required',
            'price' => 'required|numeric',
            // 'link' => 'required'
        ]);

        if ($validator->fails())
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}
        $quntity_in_unity = $request->PRBC+$request->FFP+$request->RDP+$request->SDP+$request->Other;
        if($quntity_in_unity > getBloodStock($request->blood_group)){
            return response()->json([
                'status' => false,
                'errors' => ['blood_group' => array('Available stock for Blood Group '.$request->blood_group.' = '.getBloodStock($request->blood_group) )]
                ]);
        }

        $receipt = new Receipt();
        $receipt->receipt_no = $request->receipt_no;
        $receipt->patient_name = $request->patient_name;
        $receipt->hospital_name = $request->hospital_name;
        $receipt->recipient_name = $request->recipient_name;
        $receipt->mobile_no = $request->mobile_no;
        $receipt->PRBC = $request->PRBC;
        $receipt->FFP = $request->FFP;
        $receipt->RDP = $request->RDP;
        $receipt->SDP = $request->SDP;
        $receipt->Other = $request->Other;
        $receipt->bag_no = $request->bag_no;
        $receipt->issue_no = $request->issue_no;
        $receipt->quntity_in_unity = $quntity_in_unity;
        $receipt->payment_mode = $request->payment_mode;
        $receipt->blood_group = $request->blood_group;
        $receipt->price = $request->price;
        $receipt->save();

        


        return response()->json([
			'status' => true,
             'msg' => 'Receipt Update Successfully',
             'showModal' => false,
             'aplus' => getBloodStock('A+'),             
             'amins' => getBloodStock('A-'), 
             'oplus' => getBloodStock('O+'),             
             'omins' => getBloodStock('O-'),
             'abplus' => getBloodStock('AB+'),             
             'abmins' => getBloodStock('AB-'),
             'bplus' => getBloodStock('B+'),             
             'bmins' => getBloodStock('B-'),              
             'totalstock' => getTotalStock(),               
			]);


    }


    public function receiptCancel($id){
        
        $receipt = Receipt::where('id', $id)->update([
            'status' => 'Cancel'
        ]);       
       
        if($receipt){
            return response()->json([
                'status' => true,
                 'msg' => 'Record Cancel', 
                 'aplus' => getBloodStock('A+'),             
                 'amins' => getBloodStock('A-'), 
                 'oplus' => getBloodStock('O+'),             
                 'omins' => getBloodStock('O-'),
                 'abplus' => getBloodStock('AB+'),             
                 'abmins' => getBloodStock('AB-'),
                 'bplus' => getBloodStock('B+'),             
                 'bmins' => getBloodStock('B-'),               
                 'totalstock' => getTotalStock(),               
                ]);
        }else{
            return response()->json([
                'status' => false,
                 'msg' => "Something went wrong Please try again",              
                ]);
        }
        



    }

    public function receiptPrint($id){
        $data = array();
        $pdf = Pdf::loadView('receipt-print', $data);
        return $pdf->download('invoice.pdf');
    }


}
