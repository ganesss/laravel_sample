<?php

namespace App\Http\Controllers;

use App\ReachRohs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;

class ReachrohsController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reach_rohs_list = ReachRohs::all();
        return view('rohs.list', compact('reach_rohs_list'));
    }

    public function create()
    {       
        $reach_rohs_list = ReachRohs::all();
        return view('rohs.create', compact('reach_rohs_list'));
    }

    public function store(Request $request)
    {       
        $store_data['ipc_name']=$request->substance_name;
        $store_data['cas_no']=$request->case_no;
        $store_data['threshold_value']=$request->threshold_value;
        $store_data['threshold_unit']=$request->threshold_title;
        $store_data['created_on']=date('Y-m-d H:i:s');

        $reach_rohs_insert = ReachRohs::insert($store_data);

        if($reach_rohs_insert){
            return redirect('rohs')->with('message', 'Inserted was success  ');
        }
        return view('rohs.create', compact('reach_rohs_list'));
    }

    public function edit($id)
    {
        $rohs_edit = ReachRohs::find($id);
        return view('rohs.edit', compact('rohs_edit'));
    }

    public function update(Request $request,$id)
    {
        $store_data['ipc_name']=$request->substance_name;
        $store_data['cas_no']=$request->case_no;
        $store_data['threshold_value']=$request->threshold_value;

        ReachRohs::where('chemical_id', $id)
          ->update($store_data);

        // alert()->success('Page has been updated.');

        return back();
    }

    public function destroy($id)
    {
        ReachRohs::destroy($id);
        return redirect('/rohs');
    }
}