<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Excel;
use App\Models\User;
use App\Models\Recipe;
use App\Imports\ProductImport;
use App\Models\Product;

class AdminController extends Controller
{
    
    function import() 
    {
        Excel::import(new ProductImport,request()->file('file'));
               
        return back();
    }
    function index(){

        return view('dashboards.admins.index');
       }
       
       function importForm()
       {
            $products = Product::get();
           return view('dashboards.admins.importform', compact('products'));
         
       }
    
       function profile(){
           return view('dashboards.admins.profile');
       }
       function settings(){
           return view('dashboards.admins.settings');
       }
       function ekle(){
        return view('dashboards.admins.ekle');
        }
        function urunler(){
        $products = DB::select('select * from urun');
        return view('dashboards.admins.urunler',['products'=>$products]);
        }   
        function firmalar(){
            $firms = DB::select('select * from firma');
            return view('dashboards.admins.firmalar',['firms'=>$firms]);
            }   
       
        function addProduct(Request $request)
        {
            
            $product_name = $request->input('urunAd');
            $product_code = $request->input('urunKod');
            $product_type = $request->input('urunOlcut');
            $product_buy = $request->input('urunAlis');
            $product_sell = $request->input('urunSatis');
            $product_active = $request->input('urunAktif');
            $data=array('urun_Ad'=>$product_name,"urun_Kod"=>$product_code,"urun_Olcut"=>$product_type,"urun_Alis"=>$product_buy,"urun_Satis"=>$product_sell,"urun_Aktif"=>$product_active);
            $check = DB::table('urun')->insert($data);
            if($check){
                return back()->with('success','Urun başarıyla eklendi!');
            }
            else
            {
                return back()->with('error','Urun eklenemedi!');
            }
            
    }
    function addRecipe(Request $request)
    {
        
        $recipe_product1 = $request->input('urun1');
        $recipe_product2 = $request->input('urun2');
        $recipe_ratio = $request->input('oran');
        $recipe_wastage = $request->input('fire');
        $data=array('recete_Urun1ID'=>$recipe_product1,"recete_Urun2ID"=>$recipe_product2,"recete_Oran"=>$recipe_ratio,"recete_Oranfire"=>$recipe_wastage);
        $check = DB::table('recete')->insert($data);
        $products = DB::select('select * from urun');
        $recipeproducts = Recipe::select("*")
                        ->where("recete_Urun1ID", $recipe_product1)
                        ->get();
                        $names = DB::table('urun')
                        ->select('*')
                        ->join('recete', 'recete.recete_Urun2ID', '=', 'urun.urun_ID')
                        ->where('recete_Urun1ID', $recipe_product1)
                        ->get();
        return view('dashboards.admins.recete',['recipeproducts'=>$recipeproducts,'products'=>$products,'recipeproduct1'=>$recipe_product1,'names'=>$names]);
        
}
function showRecipe(Request $request)
    {   
        $recipeproduct1 = $request->input('urun1ID');
         $names = DB::table('urun')
        ->select('*')
        ->join('recete', 'recete.recete_Urun2ID', '=', 'urun.urun_ID')
        ->where('recete_Urun1ID', $recipeproduct1)
        ->get();
        $products = DB::select('select * from urun');
       
        $recipeproducts = Recipe::select("*")
                        ->where("recete_Urun1ID", $recipeproduct1)
                        ->get();
        return view('dashboards.admins.recete',['recipeproducts'=>$recipeproducts,'products'=>$products,'recipeproduct1'=>$recipeproduct1,'names'=>$names]);
        
       
      
        
}

    

    function addFirm(Request $request)
    {
        
        $firm_name = $request->input('firmaAd');
        $firm_code = $request->input('firmaKod');
        $firm_taxno = $request->input('firmaVno');
        $firm_address = $request->input('firmaAdres');
        $firm_supply = $request->input('firmaTedarik');
        $firm_client = $request->input('firmaMusteri');
        $firm_active = $request->input('firmaAktif');
        $data=array('firma_Ad'=>$firm_name,"firma_Kod"=>$firm_code,"firma_Vno"=>$firm_taxno,"firma_Adres"=>$firm_address,"firma_Tedarik"=>$firm_supply,"firma_Musteri"=>$firm_client,"firma_Aktif"=>$firm_active);
        $check = DB::table('firma')->insert($data);
        if($check){
            return back()->with('success','Firma başarıyla eklendi!');
        }
        else
        {
            return back()->with('error','Firma eklenemedi!');
        }
}
    

       function updateInfo(Request $request){
           
               $validator = \Validator::make($request->all(),[
                   'name'=>'required',
                   'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
                   'favoritecolor'=>'required',
               ]);

               if(!$validator->passes()){
                   return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
               }else{
                    $query = User::find(Auth::user()->id)->update([
                         'name'=>$request->name,
                         'email'=>$request->email,
                         'favoriteColor'=>$request->favoritecolor,
                    ]);

                    if(!$query){
                        return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
                    }else{
                        return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
                    }
               }
       }
       

       function updatePicture(Request $request){
           $path = 'users/images/';
           $file = $request->file('admin_image');
           $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

           //Upload new image
           $upload = $file->move(public_path($path), $new_name);
           
           if( !$upload ){
               return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
           }else{
               //Get Old picture
               $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

               if( $oldPicture != '' ){
                   if( \File::exists(public_path($path.$oldPicture))){
                       \File::delete(public_path($path.$oldPicture));
                   }
               }

               //Update DB
               $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

               if( !$upload ){
                   return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
               }else{
                   return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
               }
           }
       }


       function changePassword(Request $request){
           //Validate form
           $validator = \Validator::make($request->all(),[
               'oldpassword'=>[
                   'required', function($attribute, $value, $fail){
                       if( !\Hash::check($value, Auth::user()->password) ){
                           return $fail(__('The current password is incorrect'));
                       }
                   },
                   'min:8',
                   'max:30'
                ],
                'newpassword'=>'required|min:8|max:30',
                'cnewpassword'=>'required|same:newpassword'
            ],[
                'oldpassword.required'=>'Enter your current password',
                'oldpassword.min'=>'Old password must have atleast 8 characters',
                'oldpassword.max'=>'Old password must not be greater than 30 characters',
                'newpassword.required'=>'Enter new password',
                'newpassword.min'=>'New password must have atleast 8 characters',
                'newpassword.max'=>'New password must not be greater than 30 characters',
                'cnewpassword.required'=>'ReEnter your new password',
                'cnewpassword.same'=>'New password and Confirm new password must match'
            ]);

           if( !$validator->passes() ){
               return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
           }else{
                
            $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

            if( !$update ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
            }
           }
       }
       

}
