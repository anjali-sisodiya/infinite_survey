<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Productmodel;
use App\Models\User;


class ProductController extends Controller
{
   
    public function registration(){
        return view('product.registration');
    }

    public function storeinfo()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
       
        return redirect()->to('/showloginpage');
    }
    public function showloginpage(){
        return view('product.login');
    }
    

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if(Auth::attempt($credentials))
        {
         return redirect()->intended('addproduct')->withSuccess('login sucessfull');
        }
         return back()->withErrors([
             'email' => 'The provided credentials do not match our records.',
         ]);
    }

    public function logout(Request $request){
        Auth::logout();

       
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        
        return redirect('/showloginpage');
    }
    

    public function addproduct(){
        return view('product.addproduct');
    }
   

    public function store(Request $request)
    {
        
        $member = new Productmodel;
        $member->product_name= $request->input('p_name');
        $member->product_price= $request->input('p_price');
     
       if($request->hasFile('image')&&
       $request->file('image')->isValid()){
        $file= $request->file('image');
        $extension= $file->getClientOriginalExtension();
        $filename = time().'.'. $extension;
        $file->move('upload/', $filename);
        $member['image'] = 'upload/' .$filename;

       }

        $result = $member->save();
        if( $result){
            return redirect()->to('/showlist');
        }else{
            echo "Something went wrong";
        }
        
    }
    public function showlist() {
     $show = Productmodel::all();
   
    return view('product.productlist', ['show' => $show]);
    }

    public function edit($id){
        $show = Productmodel::find($id);
        return view('editproduct', ['show' => $show]);
    }
    public function update(Request $request,$id)
    {
        $member = Productmodel::find($id);

        $member->product_name = $request->input('p_name');
        $member->product_price = $request->input('p_price');
        
       if($request->hasFile('image')&&
       $request->file('image')->isValid()){
        $file= $request->file('image');
        $extension= $file->getClientOriginalExtension();
        $filename = time().'.'. $extension;
        $file->move('upload/',$filename);
        $member['image'] = 'upload/' .$filename;

       }

       $member->update();

       return redirect()->to('/showlist');

        
    }
  public function trash($id){
        $product = Productmodel::where('id',$id)->first();
        $product->delete();
        return redirect()->to('/showlist');
    }
    public function undo(){
        $show = Productmodel::onlyTrashed()->get();
        return view('product.recycle_bin', ['show' => $show]);
    }
    public function restore($id){
        $product = Productmodel::withTrashed()->find($id);
        if(!is_null($product)){
            $product->restore();
        }
       
        return redirect()->to('/showlist');
    }


    public function delete($id){
      
        $product = Productmodel::withTrashed()->find($id);
        if(!is_null($product)){
            $product->forceDelete();
        }
       
        return redirect()->to('/showlist');
    }

   
   
}
