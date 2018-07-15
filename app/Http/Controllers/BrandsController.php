<?php
namespace App\Http\Controllers;
use App\MobileBrand;
use Illuminate\Http\Request;
class BrandsController extends Controller
{
    public function getMobileBrands()
    {
        $models = MobileBrand::all();
        $data = '';
        foreach($models as $model)
        {
            $data .= '<option value="'.$model->id.'">'.$model->name.'</option>';
        }
        return response()->json(['success' => $data]);
    }
}