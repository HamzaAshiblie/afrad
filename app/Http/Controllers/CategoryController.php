<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $categories = Category::all();
        return view('category',['categories'=>$categories]);
    }
    public function addCategory(Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'formula'=>'required'
        ]);
        $category = new Category();
        $category->name = $request['name'];
        $category->formula = $request['formula'];
        $message= 'حدث خطأ، لم يتم إضافة التصنيف';
        if ($category->save())
        {
            $message='تمت إضافة التصنيف بنجاح';
        }
        return redirect()->route('category')->with(['message'=>$message]);
    }
    public function editCategory( Request $request)
    {
        $this->validate($request, [
            'name'=> 'required',
            'formula'=>'required'
        ]);
        $category = Category::where('id',$request['id'])->first();
        $category->name = $request['name'];
        $category->formula = $request['formula'];
        if ($category->update())
        {
            return response()->json($category,200);
        }
        return redirect()->route('category');

    }
}
