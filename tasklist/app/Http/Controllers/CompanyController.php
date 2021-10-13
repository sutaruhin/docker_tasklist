<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choice()
    {
        $user = \Auth::user();
        if(($user->post)==0){
            $company = Cpmpany::find($user->companyId);
            return view ('task.show',[
                'company'=>$company
            ]);
        }

        return view ('company.choice');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;

        $company->companyName = $request->companyName;
        $company->companyPass= $request->companyPass;
        $company->owner = \Auth::id();
        $company->save();

        $user = \Auth::user();
        $user->post = 4;
        $user->companyId = $company->id;
        $user->save();

        \Log::debug('会社を作成し個人のタスク画面へ');

        return view ('user.show',[
            'company' => $company,
        ])

    }

    public function belong(Request $request)
    {
        $company = Company::where('companyPass',$request->companyPass);
        $user->post = 0;
        $user->companyId = $company->id;
        $user->save();

        \Log::debug('会社に所属するリクエストを送り個人のタスク画面へ');

        return view ('user.show');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
