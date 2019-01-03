<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\input;
use Validator;
use Redirect;
use Response;
use App\customers;


class Customers_Controller extends Controller
{
	function list(){
		$list = customers::orderby('id','desc')->paginate(5);
		return view('customers_view.list')->with('list',$list);
	}
    // function add(request $req){
    // 	$this->validate($req,[
    // 		'username' => 'required',
    // 		'sex' => 'required',
    // 		'address'=>'required',
    // 	]);

    // 	$cus = new customers();
    // 	$cus->name = $req->username;
    // 	$cus->age = $req->age;
    // 	$cus->sex = $req->sex;
    // 	$cus->address = $req->address;
    // 	$cus->city = $req->city;
    // 	$cus->province = $req->province;
    // 	$cus->postal = $req->postal;
    // 	$cus->country = $req->country;
    // 	$cus->save();

    // 	return $this->list();
    // }

    // ------------------- Add ------------------------
    function add(request $req){
        $rules = array(
            'username' => 'required',
            'sex' => 'required',
            'address'=>'required',
            'age' => 'required|int',
            'city'=>'required',
            'province' =>'required',
            'postal'=>'required|max:6',
            'country'=>'required'
        );

        $validator = Validator::make(input::all(),$rules);
        if($validator->fails()) return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
        else{
            $cus = new customers();
            $cus->name = $req->username;
            $cus->age = $req->age;
            $cus->sex = $req->sex;
            $cus->address = $req->address;
            $cus->city = $req->city;
            $cus->province = $req->province;
            $cus->postal = $req->postal;
            $cus->country = $req->country;
            $cus->save();

            return response()->json($cus);
        }
        
    }
    // ------------------- Delete ------------------------
    function delete(request $r){
    	try{
            customers::find($r->id)->delete();
            $success = array(
                'success' => 'success',
                'id'=> $r->id
            );
            return response()->json($success);
        }catch(Exception $ex){
            $errors = array('errors'=>'fail');
            return response()->json($errors);
        }
    	
    }
    // ------------------- Edit ------------------------
    // function edit(request $r){
    // 	return view('customers_view.edit')->with('edit',customers::find($r->id));
    // }
    
    // ------------------- Update ------------------------
    function update(request $req){
    	
    	$rules = array(
            'username' => 'required',
            'sex' => 'required',
            'address'=>'required',
            'age' => 'required|int',
            'city'=>'required',
            'province' =>'required',
            'postal'=>'required|max:6',
            'country'=>'required'
        );

        $validator = Validator::make(input::all(),$rules);
        if($validator->fails()){ 
            return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
        }
        else{
            $cus = customers::find($req->id); 
            $cus->name = $req->username;
            $cus->age = $req->age;
            $cus->sex = $req->sex;
            $cus->address = $req->address;
            $cus->city = $req->city;
            $cus->province = $req->province;
            $cus->postal = $req->postal;
            $cus->country = $req->country;
            $cus->save();
            return response()->json($cus);
            
        }
    }

    // ------------------- Live Search ------------------------
    public function live_search(request $r){
        if($r->ajax()){
            $output=''; $data = '';
            $query = $r->name_search;
            if($query != ''){
                $data = customers::where('id',$query)
                        ->orWhere('name','like','%'.$query.'%')
                        ->orWhere('age','like','%'.$query.'%')
                        ->orWhere('sex','like','%'.$query.'%')
                        ->orWhere('address','like','%'.$query.'%')
                        ->orWhere('city','like','%'.$query.'%')
                        ->orWhere('province','like','%'.$query.'%')
                        ->orWhere('postal','like','%'.$query.'%')
                        ->orWhere('country','like','%'.$query.'%')
                        ->get(); 
            }else{
                $data = customers::orderby('id','asc')->get();
            }
            $total_row = $data->count();
            if($total_row>0){
                foreach($data as $row){
                    $output .= '
                        <tr>
                         <td>'.$row->id.'</td>
                         <td>'.$row->name.'</td>
                         <td>'.$row->sex.'</td>
                         <td>'.$row->age.'</td>
                         <td>'.$row->address.'</td>
                        </tr>
                        ';
                }
            }else{
                $output = '
                   <tr>
                    <td align="center" colspan="5">No Data Found</td>
                   </tr>
                   ';
            }
            $data = array(
               'table_data'  => $output,
              );

              echo json_encode($data);
            }
    }
}
