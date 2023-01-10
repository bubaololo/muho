<?php

namespace App\Http\Controllers;

use App\Models\Credential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $credentials = $user->credential()->first();
        return view('credentials-edit', compact('credentials'));
        
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
    info($request->all());
        $validated = $request->validate(['user_id' => 'nullable|exists:users,user_id|unique:credentials,user_id',
            'name' => 'bail|alpha|required|max:50|string',
            'surname' => 'alpha_dash|required|max:50|string',
            'middle_name' => 'alpha|required|max:50|string',
//            'address' => 'required',
            'tel' => 'regex:/^[\d\-\+]+$/',
            'index' => 'integer'
        ]);
        

       
        $user = Auth::user();
        $requestData = $request->all();

        
        
        
        $credentialsCheck = $user->credential()->first();
        if($credentialsCheck) {
            $credentials = $credentialsCheck;
            return view('home', compact('credentials'));
        } else {
    
           $credentials = Credential::create([
                
                'name' => $requestData['name'],
                'user_id' => $user->id,
                'surname' => $requestData['surname'],
                'middle_name' => $requestData['middle_name'],
                'address' => $requestData['address'],
                'apartment' => $requestData['apartment'],
                'comment' => $requestData['comment'],
                'tel' => $requestData['tel'],
                'whatsapp' => $requestData['whatsapp'],
                'telegram' => $requestData['telegram'],
                'last_ip' => $request->ip(),
    
            ]);
            $credentials = $user->credential()->first();
            return view('home', compact('credentials'));
        }
        
        
        
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
        
        $validated = $request->validate([
            'name' => 'bail|alpha|required|max:50|string',
            'surname' => 'alpha_dash|required|max:50|string',
            'middle_name' => 'alpha|required|max:50|string',
//            'address' => 'required',
            'tel' => 'regex:/^[\d\-\+]+$/',
            'index' => 'integer'
        ]);
        
        
        $user = Auth::user();
        $requestData = $request->all();
        $credentials = $user->credential()->first();
        $credentials->query()->update([
        
            'name' => $requestData['name'],
            'surname' => $requestData['surname'],
            'middle_name' => $requestData['middle_name'],
            'address' => $requestData['address'],
            'apartment' => $requestData['apartment'],
            'comment' => $requestData['comment'],
            'tel' => $requestData['tel'],
            'whatsapp' => $requestData['whatsapp'],
            'telegram' => $requestData['telegram'],
            'index' => $requestData['index'],
            'last_ip' => $request->ip(),
        ]);
        $credentials = $user->credential()->first();
        return view('home', compact('credentials'));
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
