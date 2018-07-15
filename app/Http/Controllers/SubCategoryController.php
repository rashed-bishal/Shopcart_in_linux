<?php
namespace App\Http\Controllers;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('categoryId');
        $subcategoryName = $request->input('name');
        $category = Category::find($id);
        foreach ($category->subcategories as $subcategory)
        {
            if($subcategory->name == $subcategoryName)
            {
                return response()->json(['warning' => $subcategoryName.' already exists under '.$category->name]);
            }
        }
        $subcategory = new Subcategory();
        $subcategory->name = $subcategoryName;
        $category->subcategories()->save($subcategory);
        return response()->json(['success'=>$subcategoryName]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = '';
        $subcategories = Subcategory::where('category_id',$id)->get();
        foreach($subcategories as $subcategory)
        {
            $data .= '<tr><td>'.$subcategory->id.'</td><td>'.$subcategory->name.'</td><td>'.$subcategory->created_at->diffForHumans().'</td><td>'.$subcategory->updated_at->diffForHumans().'</td></tr>';
        }
        return response()->json(['subcategories' => $data]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data ='';
        $category = Category::find($id);
        foreach($category->subcategories as $subcategory)
        {
            $data .= '<option value='.$subcategory->id.'>'.$subcategory->name.'</option>';
        }
        return response()->json(['subcategories' => $data]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = $request->input(['name']);
        $oldname = $request->input('oldsubcat_name');
        $category = Category::find($id);
        foreach($category->subcategories as $subcategory)
        {
            if($subcategory->name === $name)
            {
                return response()->json(['warning' => $name.' already exists in '.$subcategory->category->name]);
            }
        }
        $subcategory = Subcategory::where('name',$oldname)->where('category_id',$id)->get()->first();
        $subcategory->name = $name;
        $subcategory->save();
        return response()->json(['success' => $name.' subcategory has been updated!']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = explode('+',$id);
        $subcategory = Subcategory::where('id',$ids[1])->where('category_id',$ids[0])->get()->first();
        $subcategory->delete();
        return response()->json(['success'=>'Deletion Sample Message.']);
    }
}