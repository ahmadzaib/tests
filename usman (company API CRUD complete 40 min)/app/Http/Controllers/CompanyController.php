<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyCollection;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = CompanyCollection::collection(Company::all());
        return response()->json(['message'=>null,'data'=>$data,'success'=>true],201);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('img')){
            $image = $request->file('img');
            $name = uniqid().'-'.$image->getClientOriginalExtension();
            $dest = public_path('/image');
            $image->move($dest,$name);
            $data['img'] = $name;
        }
        Company::create($data);
        return response()->json(['message'=>'Company Data Insert Successfully','data'=>null,'success'=>true],200);
    }

    public function show(Company $company)
    {
        $data = new CompanyCollection($company);
        return response()->json(['message'=>null,'data'=>$data,'success'=>true],201);
    }

    public function update(Request $request, Company $company)
    {
        $data = $request->all();
        if($request->hasFile('img')){
            $image = $request->file('img');
            $name = uniqid().'-'.$image->getClientOriginalExtension();
            $dest = public_path('/image');
            $image->move($dest,$name);
            $data['img'] = $name;
        }
        $company->update($data);
        return response()->json(['message'=>'Company Data Updated Successfully','data'=>null,'success'=>true],200);

    }

    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(['message'=>'Company Data Deleted Successfully','data'=>null,'success'=>true],200);
    }
}
