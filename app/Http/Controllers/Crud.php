<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrudModel;

class Crud extends Controller
{
    public function addToContact($id=0)
    {


       $data['contact_list'] =  CrudModel::all(); 

       if(!empty($id)){
       	$data['contact_get_one'] =  CrudModel::find($id); 
       }
       
       return view('add',$data);	
    }

    public function contact_store(Request $request)
    {
    	
    	$data =  $request->all();

    	$insert = CrudModel::create($data);
       
        if(!empty($insert))
        {
        	return redirect('contact')->with('success','inserted');
          
        }
        else
        {
            return redirect('contact')->with('error','error  something went wrong');
        }
    }

    public function contact_update(Request $request)
    {
    	
    	$id =  $request->id;

    	$contact = CrudModel::find($id);
        
        $contact->name =  $request->name;
        $contact->email = $request->email;
        
        $update = $contact->save();
    
       
        if(!empty($update))
        {
        	return redirect('contact')->with('success','update successfully');
          
        }
        else
        {
            return redirect('contact')->with('error','error  something went wrong');
        }
    }

   public function contact_delete($id)
   {
      $contact = CrudModel::find($id);

      $deleted = $contact->delete();
      
      if(!empty($deleted))
        {
        	return redirect('contact')->with('success','deleted successfully');
          
        }
        else
        {
            return redirect('contact')->with('error','error  something went wrong');
        }

   }

}
