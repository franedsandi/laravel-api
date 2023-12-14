<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' =>'required|min:3|max:255',
            'email' =>'required|email|min:3|max:255',
            'subject'=>'required|min:3|max:255',
            'message' =>'required|min:3',
        ],
        [
            'name.required'=>'Name is required',
            'email.required'=>'Email is required',
            'subject.required'=>'Subject is required',
            'message.required'=>'Message is required',
            'name.min'=>'Name must be at least 3 characters',
            'email.min'=>'Email must be at least 3 characters',
            'subject.min'=>'Subject must be at least 3 characters',
            'message.min'=>'Message must be at least 3 characters',
            'name.max'=>'Name cannot be more than 255 characters',
            'email.max'=>'Email cannot be more than 255 characters',
            'subject.max'=>'Subject cannot be more than 255 characters',
        ]
    );
    if ($validator->fails()) {
        $success = false;
        $errors = $validator->errors();
        return response()->json(compact('success', 'errors'));
        }

    $success=true;
    return response()->json(compact('success',));
    }
}
