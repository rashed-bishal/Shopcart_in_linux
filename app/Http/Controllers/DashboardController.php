<?php
namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function home()
    {
        return view('admin.dashboard');
    }
    public function categoryList()
    {
        $categories = Category::paginate(4);
        return view('admin.categories.index')->with('categories',$categories);
    }
    public function categoryManage()
    {
        $categories = Category::all();
        return view('admin.categories.management')->with('categories',$categories);
    }
    public function subCategoryList()
    {
        $categories = Category::all();
        return view('admin.subcategories.index')->with('categories',$categories);
    }
    public function subCategoryManage()
    {
        $categories = Category::all();
        return view('admin.subcategories.management')->with('categories',$categories);
    }
    public function createProduct()
    {
        $categories = Category::all();
        return view('admin.products.create')->with('categories',$categories);
    }
}