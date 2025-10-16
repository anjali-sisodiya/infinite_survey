<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\BeneficiaryModel;
use App\Models\BaselineModel;
use App\Models\UjwalaModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class InfiniteSurveyController extends Controller
{
    public function infinite_register(){
        return view('admin.partials.register');
    }

    public function store_register(Request $request)
    {
        
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);

       
        User::create([
            'name' => $validated['username'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return redirect('/infinite_login');
    }


    public function infinite_login(){
        return view('admin.partials.login');
    }

   public function store_login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    if (Auth::attempt($credentials)) {
        return redirect()->intended('admin')->with('success','Login Sucessfull');

    } else {
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}


public function infinite_logout(Request $request)
{
    Auth::logout();

   
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/infinite_login');
}


    

    public function beneficiary_form(){
        return view('admin.infinite_survey.beneficiary_data');
    }

   public function store_beneficiary_data(Request $request)
{

    $rules = [
        'b_name' => 'required|string|max:255',
        'f_name' => 'required|string|max:255',
        'gender' => 'required|in:male,female',
        'age' => 'required|integer|min:0',
        'f_members' => 'required|integer|min:0',
        'occupation' => 'required|string|max:255',
        'avg_mnth_incm' => 'required|numeric|min:0',
        'vilg_name' => 'required|string|max:255',
        'tehsil_block' => 'required|string|max:255',
        'panchayat' => 'required|string|max:255',
        'district' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'b_mo_no' => 'required|string|max:255',
        'b_adhr_smgr_no' => 'required|string|max:255',
        'b_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ];
    $validatedData = $request->validate($rules);

    $member = new BeneficiaryModel;
    // $member->fill($validatedData);
    $member->b_name = $request->input('b_name');
    $member->father_name = $request->input('f_name');
    $member->gender = $request->input('gender');
    $member->age = $request->input('age');
    $member->fmly_members = $request->input('f_members');
    $member->occupation = $request->input('occupation');
    $member->avg_mnthly_incm = $request->input('avg_mnth_incm');
    $member->vlg_name = $request->input('vilg_name');
    $member->teh_or_block_name = $request->input('tehsil_block');
    $member->panchayat_name = $request->input('panchayat');
    $member->district_name = $request->input('district');
    $member->state_name = $request->input('state');
    $member->b_mobile = $request->input('b_mo_no');
    $member->b_mo_adhr_or_smgr_no = $request->input('b_adhr_smgr_no');

    if ($request->hasFile('b_img') && $request->file('b_img')->isValid()) {
        $file = $request->file('b_img');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('upload/', $filename);
        $member->b_img = 'upload/' . $filename;
    }

    $result = $member->save();

    if ($result) {
        return redirect('/baseline_info_form');
    } else {
        echo "Something went wrong";
    }
}


   public function show_beneficiary_data(Request $request) {
    $search = $request['search'] ?? "";
    $stateFilter = $request->input('state') ?? "all";
    $vlgFilter = $request->input('vilg_name') ?? "all";
    $statusFilter = $request->input('status') ?? "all";
    $tehsilFilter = $request->input('tehsil_block') ?? "all";


   
    $query = BeneficiaryModel::query();

    if ($search != "") {
        $query->where('beneficiary_id', 'LIKE', "%$search%")
              ->orWhere('b_name', 'LIKE', "%$search%")
              ->orWhere('father_name', 'LIKE', "%$search%")
              ->orWhere('gender', 'LIKE', "%$search%")
              ->orWhere('age', 'LIKE', "%$search%")
              ->orWhere('fmly_members', 'LIKE', "%$search%")
              ->orWhere('occupation', 'LIKE', "%$search%")
              ->orWhere('avg_mnthly_incm', 'LIKE', "%$search%")
              ->orWhere('vlg_name', 'LIKE', "%$search%")
              ->orWhere('teh_or_block_name', 'LIKE', "%$search%")
              ->orWhere('panchayat_name', 'LIKE', "%$search%")
              ->orWhere('district_name', 'LIKE', "%$search%")
              ->orWhere('state_name', 'LIKE', "%$search%")
              ->orWhere('b_img', 'LIKE', "%$search%")
              ->orWhere('b_mobile', 'LIKE', "%$search%")
              ->orWhere('b_mo_adhr_or_smgr_no', 'LIKE', "%$search%");
    }
     if ($stateFilter !== "all") {
        $query->where('state_name', $stateFilter);
    }
   if ($vlgFilter !== "all") {
        $query->where('vlg_name', $vlgFilter);
    }
     if ($tehsilFilter !== "all") {
        $query->where('teh_or_block_name', $tehsilFilter);
    }
    if ($statusFilter !== "all") {
        $query->where('status', $statusFilter);
    }
     

    
    $show = $query->get();

    $data = compact('show', 'search', 'statusFilter','vlgFilter','tehsilFilter','stateFilter');
    return view('admin.infinite_survey.beneficiary_list')->with($data);
}

       public function showlist($id) {
        $show = BeneficiaryModel::where('beneficiary_id', $id)->first();
        $data = BaselineModel::where('beneficiary_id', $id)->first();
        $list = UjwalaModel::where('beneficiary_id', $id)->first();
        
        return view('admin.infinite_survey.infinite_survey_data', compact('show', 'data', 'list'));
    }

    public function edit_beneficiary($id){
        $show = BeneficiaryModel::find($id);
        return view('admin.infinite_survey.beneficiary_edit', ['show' => $show]);
    }

    public function update_beneficiary(Request $request, $id)
    {
        $member = BeneficiaryModel::find($id);
        $member->b_name = $request->input('b_name');
        $member->father_name = $request->input('f_name');
        $member->gender = $request->input('gender');
        $member->age = $request->input('age');
        $member->fmly_members = $request->input('f_members');
        $member->occupation = $request->input('occupation');
        $member->avg_mnthly_incm = $request->input('avg_mnth_incm');
        $member->vlg_name = $request->input('vilg_name');
        $member->teh_or_block_name = $request->input('tehsil_block');
        $member->panchayat_name = $request->input('panchayat');
        $member->district_name = $request->input('district');
        $member->state_name = $request->input('state');
        $member->b_mobile = $request->input('b_mo_no');
        $member->b_mo_adhr_or_smgr_no = $request->input('b_adhr_smgr_no');
    
        if ($request->hasFile('b_img') && $request->file('b_img')->isValid()) {
            $file = $request->file('b_img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $member->b_img = 'upload/' . $filename;
        }
    
        $result = $member->update();
    
        if ($result) {
            return redirect()->route('show_beneficiary_data')->with('success', 'Beneficiary Data updated successfully.');
        } else {
            echo "No update";
        }
    }

     public function accept_beneficiary(Request $request, $id)
{
    $member = BeneficiaryModel::find($id); 
    $member->status = 'Accepted';
    $result = $member->save(); 

    if ($result) {
        return redirect()->route('show_beneficiary_data')->with('success', 'Beneficiary Status Updated to Accepted.');
    } else {
        echo "No status update";
    }
}

public function reject_beneficiary(Request $request, $id)
{
    $member = BeneficiaryModel::find($id);
    $member->status = 'Cancel';
    $result = $member->save(); 

    if ($result) {
        return redirect()->route('show_beneficiary_data')->with('success', 'Beneficiary Status Updated to Cancel.');
    } else {
        echo "No status update";
    }
}

public function beneficiary_pending(){
    $show = BeneficiaryModel::where('status', 'Pending')->get();
    return view('admin.infinite_survey.beneficiary_pending', compact('show'));
}

public function beneficiary_accept(){
    $show = BeneficiaryModel::where('status', 'Accepted')->get();
    return view('admin.infinite_survey.beneficiary_accept', compact('show'));
}

public function beneficiary_reject(){
    $show = BeneficiaryModel::where('status', 'Cancel')->get();
    return view('admin.infinite_survey.beneficiary_reject', compact('show'));
}


    
    
    
    

//*****************************************************/

public function baseline_info_form(){
    return view('admin.infinite_survey.baseline_information');
}



    public function store_baseline_info_data(Request $request)
    {

        $rules = [
            'avg_time_per_meal' => 'required',
            'prob_procured' => 'required',
            'fuel_amount' => 'required',
            'problems_current_cookstove' => 'required',
            'photo_cookstove' => 'required|image|mimes:jpeg,png|max:2048', 
        ];
    
        $validatedData = $request->validate($rules);
    
      
        $rs = BeneficiaryModel::all()->max('beneficiary_id');
        $member = new BaselineModel;

    
        $member->cookstove_type = $request->input('cookstove_type');
        $member->no_of_meals = $request->input('no_of_meals');
        $member->avg_time_per_meal = $request->input('avg_time_per_meal');
        $member->fuel_type = $request->input('fuel_type');
        $member->prob_procured = $request->input('prob_procured');
        $member->purchase_receipts = $request->input('receipts');
        $member->fuel_amount = $request->input('fuel_amount');
        $member->problems_current_cookstove = $request->input('problems_current_cookstove');
        $member->beneficiary_id = $rs;
        if ($request->hasFile('photo_cookstove') && $request->file('photo_cookstove')->isValid()) {
            $file = $request->file('photo_cookstove');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $member->photo_cookstove = 'upload/' . $filename;
        }

    
        $result = $member->save();
    
        if ($result) {
            return redirect('/ujwala_scheme_form');
        } else {
            echo "Something went wrong";
        }
    }

   public function show_baseline_data(Request $request) {
    $search = $request['search'] ?? "";
    $cookstoveFilter = $request->input('cookstove_type') ?? "all";
    $receiptsFilter = $request->input('receipts') ?? "all";
    $fuelFilter = $request->input('fuel_type') ?? "all";
    $statusFilter = $request->input('status') ?? "all";

    $query = BaselineModel::query();

    if ($search != "") {
        $query->where('beneficiary_id', 'LIKE', "%$search%")
              ->orWhere('cookstove_type', 'LIKE', "%$search%")
              ->orWhere('photo_cookstove', 'LIKE', "%$search%")
              ->orWhere('no_of_meals', 'LIKE', "%$search%")
              ->orWhere('avg_time_per_meal', 'LIKE', "%$search%")
              ->orWhere('fuel_type', 'LIKE', "%$search%")
              ->orWhere('prob_procured', 'LIKE', "%$search%")
              ->orWhere('purchase_receipts', 'LIKE', "%$search%")
              ->orWhere('fuel_amount', 'LIKE', "%$search%")
              ->orWhere('problems_current_cookstove', 'LIKE', "%$search%");
    }

    if ($cookstoveFilter !== "all") {
        $query->where('cookstove_type', $cookstoveFilter);
    }

    if ($receiptsFilter !== "all") {
        $query->where('purchase_receipts', $receiptsFilter);
    }

    if ($fuelFilter !== "all") {
        $query->where('fuel_type', $fuelFilter);
    }

    if ($statusFilter !== "all") {
        $query->where('status', $statusFilter);
    }

    $show = $query->get();

    $data = compact('show', 'search', 'cookstoveFilter','receiptsFilter', 'fuelFilter','statusFilter');
    return view('admin.infinite_survey.baseline_list')->with($data);
}



       public function edit_baseline($id){
        $show = BaselineModel::find($id);
        return view('admin.infinite_survey.baseline_edit', ['show' => $show]);
    }

    public function update_baseline(Request $request, $id)
    {
        // $rs = BeneficiaryModel::all()->max('beneficiary_id');
        $member = BaselineModel::find($id);
        $member->cookstove_type = $request->input('cookstove_type');
        $member->no_of_meals = $request->input('no_of_meals');
        $member->avg_time_per_meal = $request->input('avg_time_per_meal');
        $member->fuel_type = $request->input('fuel_type');
        $member->prob_procured = $request->input('prob_procured');
        $member->purchase_receipts = $request->input('receipts');
        $member->fuel_amount = $request->input('fuel_amount');
        $member->problems_current_cookstove = $request->input('problems_current_cookstove');
        // $member->beneficiary_id = $rs;
        if ($request->hasFile('photo_cookstove') && $request->file('photo_cookstove')->isValid()) {
            $file = $request->file('photo_cookstove');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('upload/', $filename);
            $member->photo_cookstove = 'upload/' . $filename;
        }

    
        $result = $member->update();
    
        if ($result) {
            return redirect()->route('show_baseline_data')->with('success', 'Baseline Information updated successfully.');
        } else {
            echo "No update";
        }
    }

    public function accept_baseline(Request $request, $id)
{
    $member = BaselineModel::find($id); 
    $member->status = 'Accepted';
    $result = $member->save(); 

    if ($result) {
        return redirect()->route('show_baseline_data')->with('success', 'Baseline Status Updated to Accepted.');
    } else {
        echo "No status update";
    }
}

public function reject_baseline(Request $request, $id)
{
    $member = BaselineModel::find($id);
    $member->status = 'Cancel';
    $result = $member->save(); 

    if ($result) {
        return redirect()->route('show_baseline_data')->with('success', 'Baseline Status Updated to Cancel.');
    } else {
        echo "No status update";
    }
}

public function baseline_pending(){
    $show = BaselineModel::where('status', 'Pending')->get();
    return view('admin.infinite_survey.baseline_pending_data', compact('show'));
}

public function baseline_accept(){
    $show = BaselineModel::where('status', 'Accepted')->get();
    return view('admin.infinite_survey.baseline_accept_data', compact('show'));
}

public function baseline_reject(){
    $show = BaselineModel::where('status', 'Cancel')->get();
    return view('admin.infinite_survey.baseline_reject_data', compact('show'));
}



    


    //*****************************************************/

    public function ujwala_scheme_form(){
        return view('admin.infinite_survey.ujwala_scheme');
    }

    public function store_ujwala_data(Request $request)
    {
        $rules = [
            'pay_one_lpg' => 'required',
            'prob_face_lpg' => 'required',
        ];
    
    
        $validatedData = $request->validate($rules);

        $rs = BeneficiaryModel::all()->max('beneficiary_id');
        $member = new UjwalaModel;
        $member->avail_lpg= $request->input('avail_lpg');
        $member->no_of_cylinders= $request->input('no_of_cylinders');
        $member->use_lpg_inaday= $request->input('use_lpg_inaday');
        $member->months_onelpg_last= $request->input('months_onelpg_last');
        $member->pay_one_lpg= $request->input('pay_one_lpg');
        $member->it_affordabale= $request->input('it_affordable');
        $member->use_traditional_cookstove= $request->input('trad_cookstove');
        $member->prob_face_lpg= $request->input('prob_face_lpg');
        $member->beneficiary_id = $rs;
        $result = $member->save();
        if( $result){
            return redirect()->route('survey_datalist', ['id' => $rs]);



        }else{
            echo "Something went wrong";
        }
       
    }

    public function show_ujwala_data(Request $request) {
       
        $search = $request->input('search', "");
        $no_cylindersFilter = $request->input('no_of_cylinders', "all");
        $statusFilter = $request->input('status', "all");
        $avail_lpgFilter = $request->input('avail_lpg', "all");
    
       
        $query = UjwalaModel::query();
    
       
        if ($search !== "") {
            $query->where('beneficiary_id', 'LIKE', "%$search%")
                    ->orWhere('avail_lpg', 'LIKE', "%$search%")
                    ->orWhere('no_of_cylinders', 'LIKE', "%$search%")
                    ->orWhere('use_lpg_inaday', 'LIKE', "%$search%")
                    ->orWhere('months_onelpg_last', 'LIKE', "%$search%")
                    ->orWhere('pay_one_lpg', 'LIKE', "%$search%")
                    ->orWhere('it_affordabale', 'LIKE', "%$search%")
                    ->orWhere('use_traditional_cookstove', 'LIKE', "%$search%")
                    ->orWhere('prob_face_lpg', 'LIKE', "%$search%");
            
        }
    
       
        if ($no_cylindersFilter !== "all") {
            $query->where('no_of_cylinders', $no_cylindersFilter);
        }
    
        if ($avail_lpgFilter !== "all") {
            $query->where('avail_lpg', $avail_lpgFilter);
        }
    
        if ($statusFilter !== "all") {
            $query->where('status', $statusFilter);
        }
    
        
        $show = $query->get();
    
        
        $data = compact('show', 'search', 'no_cylindersFilter', 'avail_lpgFilter', 'statusFilter');
        
        return view('admin.infinite_survey.ujwala_list', $data);
    }
    

       public function edit_ujwala($id){
        $show = UjwalaModel::find($id);
        return view('admin.infinite_survey.ujwala_edit', ['show' => $show]);
    }

    public function update_ujwala(Request $request, $id)
    {
        $member = UjwalaModel::find($id);
        $member->avail_lpg = $request->input('avail_lpg');
        $member->no_of_cylinders = $request->input('no_of_cylinders');
        $member->use_lpg_inaday = $request->input('use_lpg_inaday');
        $member->months_onelpg_last = $request->input('months_onelpg_last');
        $member->pay_one_lpg = $request->input('pay_one_lpg');
        $member->it_affordabale = $request->input('it_affordable');
        $member->use_traditional_cookstove = $request->input('trad_cookstove');
        $member->prob_face_lpg = $request->input('prob_face_lpg');
    
        $result = $member->update();
        
        if ($result) {
            return redirect()->route('show_ujwala_data')->with('success', 'Ujwala Scheme details updated successfully.');
        } else {
            echo "No update";
        }
    }

    public function accept_ujwala(Request $request, $id)
{
    $member = UjwalaModel::find($id); 
    $member->status = 'Accepted';
    $result = $member->save(); 

    if ($result) {
        return redirect()->route('show_ujwala_data')->with('success', 'Ujwala Status Updated to Accepted.');
    } else {
        echo "No status update";
    }
}

public function reject_ujwala(Request $request, $id)
{
    $member = UjwalaModel::find($id);
    $member->status = 'Cancel';
    $result = $member->save(); 

    if ($result) {
        return redirect()->route('show_ujwala_data')->with('success', 'Ujwala Status Updated to Cancel.');
    } else {
        echo "No status update";
    }
}

public function ujwala_pending(){
    $show = UjwalaModel::where('status', 'Pending')->get();
    return view('admin.infinite_survey.ujwala_pending', compact('show'));
}

public function ujwala_accept(){
    $show = UjwalaModel::where('status', 'Accepted')->get();
    return view('admin.infinite_survey.ujwala_accept', compact('show'));
}

public function ujwala_reject(){
    $show = UjwalaModel::where('status', 'Cancel')->get();
    return view('admin.infinite_survey.ujwala_reject', compact('show'));
}
    

       // *********************************************************

    public function infinite_tables(){
        $beneficiaryCount = DB::table('beneficiary_data')->count();
        $baselineCount = DB::table('baseline_information')->count();
        $ujwalaCount = DB::table('ujwala_scheme_details')->count();
    
        return view('admin.infinite_survey.infinite_tables', compact('beneficiaryCount', 'baselineCount', 'ujwalaCount'));
    }
    
    
    public function beneficiary_list(){
        return view('admin.infinite_survey.beneficiary_list');
    }


    

}
