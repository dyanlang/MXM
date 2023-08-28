<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Image;
use Auth;
use Session;
use DB;

class SellerController extends Controller
{
    public function index()
    {
        $users = User::latest('created_at')->get();
        return view('seller.sel_details', ['users' => $users]);

    }

    public function sel_reg()
    {

        return view('auth.seller_register');
    }



    public function user_to_seller(Request $request, User $id)
    {
        $users = Auth::user();

        if ($request->hasFile('uVal_Id_1', 'uVal_Id_2', 'u2x2_Id')) {
                
            request()->validate([
            
                'uVal_Id_1' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
                'uVal_Id_2' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
                'u2x2_Id' =>  'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
        
            ]);
            
            $uVal_Id_1 = $request->file('uVal_Id_1');
            $uVal_Id_1_file = time() . '.' . $uVal_Id_1->getClientOriginalExtension();
            Image::make($uVal_Id_1)->resize(300, 300)->save( public_path('valid_ID_1/' . $uVal_Id_1_file ) );

            $uVal_Id_2 = $request->file('uVal_Id_2');
            $uVal_Id_2_file = time() . '.' . $uVal_Id_2->getClientOriginalExtension();
            Image::make($uVal_Id_2)->resize(300, 300)->save( public_path('valid_ID_2/' . $uVal_Id_2_file ) );

            $u2x2_Id = $request->file('u2x2_Id');
            $u2x2_Id_file = time() . '.' . $u2x2_Id->getClientOriginalExtension();
            Image::make($u2x2_Id)->resize(300, 300)->save( public_path('2x2_BG/' . $u2x2_Id_file ) );

            $data = $request->input();
            $request->session()->put('Data', $data);

            $output = $request->session()->get('Data');

            $uReq = $output['uReq'];

            $users->uVal_Id_1 = $uVal_Id_1_file;
            $users->uVal_Id_2 = $uVal_Id_2_file;
            $users->u2x2_Id = $u2x2_Id_file;
            $users->uReq = $uReq;

            $query = $users->save();

            if ($query) {

                return back()->with('fail', 'Something went wrong, Please try again!');
            }

        }

    }

    public function update_image(Request $request)
    {
    	// Handle the user upload of image

    	if ($request->hasFile('uImg')){

            request()->validate([
                'uImg' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
            ]);
            
    		$uImg = $request->file('uImg');
    		$filename = time() . '.' . $uImg->getClientOriginalExtension();
    		Image::make($uImg)->resize(300, 300)->save( public_path('users/' . $filename) );

    		$user = Auth::user();
    		$user->uImg = $filename;
    		$user->save();
    	}

    	return view('/seller.sel_details', array('user' => Auth::user()) );

    }

    public function store(Request $request)
    {
        request()->validate([

            'lastname' => 'required', 'string', 'max: 50',
            'firstname' => 'required', 'string', 'max: 50',
            'middlename' => 'required', 'string', 'max: 50',
            'uBday' => 'date',
            'uGndr' => 'required', 'string', 'max: 6',
            'uMob' => 'required', 'string', 'digits: 13',
            'uHouseNo' => 'required', 'integer', 'max: 11',
            'uStrt' => 'required', 'string', 'max: 30',
            'uBrgy' => 'required', 'string', 'max: 30',
            'uProv' => 'required', 'string', 'max: 30',
            'uCity' => 'required', 'string', 'max: 30',
            'uZip' => 'required', 'char', 'max: 4',
        ]);

        
        $users = new User();

        $users->lastname = request('lastname');     
        $users->firstname = request('firstname');
        $users->middlename = request('middlename');
        $users->uBday = request('uBday');
        $users->uGndr = request('uGndr');
        $users->uMob = request('uMob');
        $users->uHouseNo = request('uHouseNo');
        $users->uStrt = request('uStrt');
        $users->uBrgy = request('uBrgy');
        $users->uProv = request('uProv');
        $users->uCity = request('uCity');
        $users->uZip = request('uZip');

        $users->save();    
        return redirect('/details');
    }

    public function show(User $user)
    {
        $users = User::find($user);
        return view('seller.sel_details', compact('users'));
    }

    public function edit(User $user)
    {   
        return view('seller.sel_details', compact('user'));
    }

    public function update($id)
    {
        $users = User::find($id);

        $users->lastname = request('lastname'); 
        $users->firstname = request('firstname');     
        $users->middlename = request('middlename');
        $users->uBday = request('uBday');
        $users->uGndr = request('uGndr');

        $users->uMob = request('uMob');
        $users->uHouseNo = request('uHouseNo');
        $users->uStrt = request('uStrt');
        $users->uBrgy = request('uBrgy');
        $users->uProv = request('uProv');
        $users->uCity = request('uCity');
        $users->uZip = request('uZip');
        
        $users->save();
        return redirect('/details');
    }



    public function products()
    {
        $uID = Auth::user()->id;

        // PARA LANG SA COUNT TO. PARA MAKITA LANG KUNG ILANG PRODUCTS MERON SA CATEGORY NA YON.

        $c1 = Product::where('pdCat', 'Babies & Kids')->where('uID', $uID)->where('pdType', '1')->count();
        $c2 = Product::where('pdCat', 'Cameras')->where('uID', $uID)->where('pdType', '1')->count();
        $c3 = Product::where('pdCat', 'Gaming')->where('uID', $uID)->where('pdType', '1')->count();
        $c4 = Product::where('pdCat', 'Groceries')->where('uID', $uID)->where('pdType', '1')->count();
        $c5 = Product::where('pdCat', 'Hobbies & Stationery')->where('uID', $uID)->where('pdType', '1')->count();
        $c6 = Product::where('pdCat', 'Home & Living')->where('uID', $uID)->where('pdType', '1')->count();
        $c7 = Product::where('pdCat', 'Home Appliances')->where('uID', $uID)->where('pdType', '1')->count();
        $c8 = Product::where('pdCat', 'Home Entertainment')->where('uID', $uID)->where('pdType', '1')->count();
        $c9 = Product::where('pdCat', 'Laptops')->where('uID', $uID)->where('pdType', '1')->count();
        $c10 = Product::where('pdCat', 'Makeup & Fragrances')->where('uID', $uID)->where('pdType', '1')->count();
        $c11 = Product::where('pdCat', "Men's Accessories")->where('uID', $uID)->where('pdType', '1')->count();
        $c12 = Product::where('pdCat', "Men's Apparel")->where('uID', $uID)->where('pdType', '1')->count();
        $c13 = Product::where('pdCat', "Men's Shoes")->where('uID', $uID)->where('pdType', '1')->count();
        $c14 = Product::where('pdCat', "Mobile Accessories")->where('uID', $uID)->where('pdType', '1')->count();
        $c15 = Product::where('pdCat', "Mobiles and Gadgets")->where('uID', $uID)->where('pdType', '1')->count();
        $c16 = Product::where('pdCat', "Motors")->where('uID', $uID)->where('pdType', '1')->count();
        $c17 = Product::where('pdCat', "Personal Care")->where('uID', $uID)->where('pdType', '1')->count();
        $c18 = Product::where('pdCat', "Pet Care")->where('uID', $uID)->where('pdType', '1')->count();
        $c19 = Product::where('pdCat', "Sports")->where('uID', $uID)->where('pdType', '1')->count();
        $c20 = Product::where('pdCat', "Toys, Games & Collectibles")->where('uID', $uID)->where('pdType', '1')->count();
        $c21 = Product::where('pdCat', "Women's Accessories")->where('uID', $uID)->where('pdType', '1')->count();
        $c22 = Product::where('pdCat', "Women's Apparel")->where('uID', $uID)->where('pdType', '1')->count();
        $c23 = Product::where('pdCat', "Women's Bags")->where('uID', $uID)->where('pdType', '1')->count();
        $c24 = Product::where('pdCat', "Women's Shoes")->where('uID', $uID)->where('pdType', '1')->count();


        return view('seller.products', compact('c1', 'c2', 'c3', 'c4', 'c5', 'c6', 'c7', 'c8', 'c9', 'c10', 'c11', 'c12', 'c13', 'c14', 'c15', 'c16', 'c17', 'c18', 'c19', 'c20', 'c21', 'c22', 'c23', 'c24'));
    
    }

    // PARA SA MGA CATEGORY TO. GINAWAN KO NA LANG NG TIG-IISANG FILE. YUNG CATEGORY NA FOLDER SA LOOB NG SELLER FOLDER

    public function c1(Product $pID)
    {
        $uID = Auth::user()->id;
        $c1 = Product::where('pdCat', 'Babies & Kids')->where('uID', $uID)->where('pdType', '1')->get();

        $cc1 = Product::where('pdCat', 'Babies & Kids')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_bk', compact('c1', 'cc1'));

    }

    public function c2(Product $pID)
    {
        $uID = Auth::user()->id;
        $c2 = Product::where('pdCat','Cameras')->where('uID', $uID)->where('pdType', '1')->get();

        $cc2 = Product::where('pdCat','Cameras')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_cam', compact('c2', 'cc2'));

    }

    public function c3(Product $pID)
    {
        $uID = Auth::user()->id;
        $c3 = Product::where('pdCat', 'Gaming')->where('uID', $uID)->where('pdType', '1')->get();

        $cc3 = Product::where('pdCat', 'Gaming')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_gaming', compact('c3', 'cc3'));

    }

    public function c4(Product $pID)
    {
        $uID = Auth::user()->id;
        $c4 = Product::where('pdCat', 'Groceries')->where('uID', $uID)->where('pdType', '1')->get();

        $cc4 = Product::where('pdCat', 'Groceries')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_gro', compact('c4', 'cc4'));

    }

    public function c5(Product $pID)
    {
        $uID = Auth::user()->id;
        $c5 = Product::where('pdCat', 'Hobbies & Stationery')->where('uID', $uID)->where('pdType', '1')->get();

        $cc5 = Product::where('pdCat', 'Hobbies & Stationery')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_hs', compact('c5', 'cc5'));

    }

    public function c6(Product $pID)
    {
        $uID = Auth::user()->id;
        $c6 = Product::where('pdCat', 'Home & Living')->where('uID', $uID)->where('pdType', '1')->get();

        $cc6 = Product::where('pdCat', 'Home & Living')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_hl', compact('c6', 'cc6'));

    }

    public function c7(Product $pID)
    {
        $uID = Auth::user()->id;
        $c7 = Product::where('pdCat', 'Home Appliances')->where('uID', $uID)->where('pdType', '1')->get();

        $cc7 = Product::where('pdCat', 'Home Appliances')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_ha', compact('c7', 'cc7'));

    }

    public function c8(Product $pID)
    {
        $uID = Auth::user()->id;
        $c8 = Product::where('pdCat', 'Home Entertainment')->where('uID', $uID)->where('pdType', '1')->get();

        $cc8 = Product::where('pdCat', 'Home Entertainment')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_he', compact('c8', 'cc8'));

    }

    public function c9(Product $pID)
    {
        $uID = Auth::user()->id;
        $c9 = Product::where('pdCat', 'Laptops')->where('uID', $uID)->where('pdType', '1')->get();

        $cc9 = Product::where('pdCat', 'Laptops')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_lap', compact('c9', 'cc9'));

    }

    public function c10(Product $pID)
    {
        $uID = Auth::user()->id;
        $c10 = Product::where('pdCat', 'Makeup & Fragrances')->where('uID', $uID)->where('pdType', '1')->get();

        $cc10 = Product::where('pdCat', 'Makeup & Fragrances')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_mf', compact('c10', 'cc10'));

    }

    public function c11(Product $pID)
    {
        $uID = Auth::user()->id;
        $c11 = Product::where("pdCat", "Men's Accessories")->where('uID', $uID)->where('pdType', '1')->get();

        $cc11 = Product::where("pdCat", "Men's Accessories")->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_men1', compact('c11', 'cc11'));

    }

    public function c12(Product $pID)
    {
        $uID = Auth::user()->id;
        $c12 = Product::where("pdCat", "Men's Apparel")->where('uID', $uID)->where('pdType', '1')->get();

        $cc12 = Product::where("pdCat", "Men's Apparel")->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_men2', compact('c12', 'cc12'));

    }

    public function c13(Product $pID)
    {
        $uID = Auth::user()->id;
        $c13 = Product::where("pdCat", "Men's Shoes")->where('uID', $uID)->where('pdType', '1')->get();

        $cc13 = Product::where("pdCat", "Men's Shoes")->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_men3', compact('c13', 'cc13'));

    }

    public function c14(Product $pID)
    {
        $uID = Auth::user()->id;
        $c14 = Product::where('pdCat', 'Mobile Accessories')->where('uID', $uID)->where('pdType', '1')->get();

        $cc14 = Product::where('pdCat', 'Mobile Accessories')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_ma', compact('c14', 'cc14'));

    }

    public function c15(Product $pID)
    {
        $uID = Auth::user()->id;
        $c15 = Product::where('pdCat', 'Mobiles and Gadgets')->where('uID', $uID)->where('pdType', '1')->get();

        $cc15 = Product::where('pdCat', 'Mobiles and Gadgets')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_mg', compact('c15', 'cc15'));

    }

    public function c16(Product $pID)
    {
        $uID = Auth::user()->id;
        $c16 = Product::where('pdCat', 'Motors')->where('uID', $uID)->where('pdType', '1')->get();

        $cc16 = Product::where('pdCat', 'Motors')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_motors', compact('c16', 'cc16'));

    }

    public function c17(Product $pID)
    {
        $uID = Auth::user()->id;
        $c17 = Product::where('pdCat', 'Personal Care')->where('uID', $uID)->where('pdType', '1')->get();

        $cc17 = Product::where('pdCat', 'Personal Care')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_pc1', compact('c17', 'cc17'));

    }

    public function c18(Product $pID)
    {
        $uID = Auth::user()->id;
        $c18 = Product::where('pdCat', 'Pet Care')->where('uID', $uID)->where('pdType', '1')->get();

        $cc18 = Product::where('pdCat', 'Pet Care')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_pc2', compact('c18', 'cc18'));

    }

    public function c19(Product $pID)
    {
        $uID = Auth::user()->id;
        $c19 = Product::where('pdCat', 'Sports')->where('uID', $uID)->where('pdType', '1')->get();

        $cc19 = Product::where('pdCat', 'Sports')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_sports', compact('c19', 'cc19'));

    }

    public function c20(Product $pID)
    {
        $uID = Auth::user()->id;
        $c20 = Product::where('pdCat', 'Toys, Games & Collectibles')->where('uID', $uID)->where('pdType', '1')->get();

        $cc20 = Product::where('pdCat', 'Toys, Games & Collectibles')->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_tgc', compact('c20', 'cc20'));

    }

    public function c21(Product $pID)
    {
        $uID = Auth::user()->id;
        $c21 = Product::where("pdCat", "Women's Accessories")->where('uID', $uID)->where('pdType', '1')->get();

        $cc21 = Product::where("pdCat", "Women's Accessories")->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_women1', compact('c21', 'cc21'));

    }

    public function c22(Product $pID)
    {
        $uID = Auth::user()->id;
        $c22 = Product::where("pdCat", "Women's Apparel")->where('uID', $uID)->where('pdType', '1')->get();

        $cc22 = Product::where("pdCat", "Women's Apparel")->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_women2', compact('c22', 'cc22'));

    }

    public function c23(Product $pID)
    {
        $uID = Auth::user()->id;
        $c23 = Product::where("pdCat", "Women's Bags")->where('uID', $uID)->where('pdType', '1')->get();

        $cc23 = Product::where("pdCat", "Women's Bags")->where('uID', $uID)->where('pdType', '1')->count();

        return view('seller.category.view_women3', compact('c23', 'cc23'));

    }

    public function c24(Product $pID)
    {
        $uID = Auth::user()->id;
        $c24 = Product::where("pdCat", "Women's Shoes")->where('uID', $uID)->where('pdType', '1')->get();

        $cc24 = Product::where("pdCat", "Women's Shoes")->where('uID', $uID)->where('pdType', '1')->count();
        
        return view('seller.category.view_women4', compact('c24', 'cc24'));

    }

    public function view_product(Product $products, $pID)
    {
        $products = Product::find($pID);
        return view('seller.view_product', compact('products'));
    }


    public function update_product(Request $request, $pID)
    {   
        if ($request->hasFile('pdImg')){

            request()->validate([
                'pdImg' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:255',
            ]);
            
    		$pdImg = $request->file('pdImg');
    		$filename = time() . '.' . $pdImg->getClientOriginalExtension();
    		Image::make($pdImg)->resize(300, 300)->save( public_path('products/' . $filename) );
        

            $products = Product::find($pID);
            
            $products->pdImg = $filename;
            $products->pdNam = request('pdNam');
            $products->pdPrc = request('pdPrc');
            $products->pdQty = request('pdQty');
            $products->pdVar = request('pdVar');
            $products->pdWeight = request('pdWeight');
            $products->pdHeight = request('pdHeight');
            $products->pdLength = request('pdLength');
            $products->pdDef = request('pdDef');

            $query = $products->save();

            if ($query) {

                return back()->with('success', 'Product Updated!');
            
            } else {

                return back()->with('fail', 'Something went wrong, Please try again!');
            }
        }
        
    }

    public function delete_product(Request $request, $pID)
    { 
        $products = Product::find($request->pID);

        $products->pdType = 0;

        $products->save();

        return back();

    }

    // public function seller_store($id)
    // {

    //     $sellers = User::join('prdt_tb', 'prdt_tb.uID', '=', 'users_tb.id')
    //             ->join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
    //             ->get(['users_tb.*', 'order_tb.*', 'prdt_tb.*'])
    //             ->find($id);

    //     $prod = Product::join('users_tb', 'users_tb.id', '=', 'prdt_tb.uID')
    //             ->join('order_tb', 'order_tb.pID', '=', 'prdt_tb.pID')
    //             ->where('prdt_tb.uID', '$id')
    //             ->where('prdt_tb.pdType', '!=', '0')
    //             ->get(['users_tb.*', 'order_tb.*', 'prdt_tb.*']);

    //     return view('users.view_store', compact('sellers', 'prod'));

    // }
}
