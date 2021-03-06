<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\File;
use App\Owns;
use App\User; 
use App\IndividualAccess;



class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if not logged in, then redirect to register page.
        if (!Auth::check()){
            return view('auth.register');
        }

        $data['files'] = Owns
            ::where('user_id', '=', Auth::id())
            ->join('file', 'owns.file_id', '=', 'file.id')
            ->select('file.id', 'file.file_path', 'file.visibility', 'file.name')
            ->getQuery()
            ->get();

        // select * from File natural join IndividualAccess where userID = pm34;
        // TODO: need to change to see who shared it with me. Check pagescontroller for more information boss
        $data['iaFiles'] = IndividualAccess
            ::where('user_id', '=', Auth::id())
            ->join('file', 'individualAccess.file_id', '=', 'file.id')
            ->select('file.id', 'file.file_path', 'file.visibility', 'file.name')
            ->getQuery()
            ->get();
        
        $data['count'] = $data['files']->count();
        $data['iaCount'] = $data['iaFiles']->count();
        return view('files.index')->with('data', $data);
    }

    public function vault(){
        
        $data['files'] = File
            ::where('visibility', '=', 1)
            ->getQuery()
            ->get();
        
        $data['count'] = $data['files']->count();
        return view('vault')->with('data', $data);
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
        // if not logged in, then redirect to register page.
        if (!Auth::check()){
            return view('auth.register');
        }

        // validation begins

        $input = $request->all();
        $input['file'] = $request->file('file'); // cache the file

        $rules = [];
        $rules['file'] = 'required|max:2048';
        $rules['visibility'] = ['required', Rule::in(['Public', 'Private'])];
        
        if (in_array("item_id", $input)){
            foreach($input['item_id'] as $key => $val){
                $rules[$key] = 'exists:users.name';
            }
        }
        
        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
  			$notification = array(
                'message' => $validator->messages()->first(),
                'alert-type' => 'error'
              );
            return back()->with($notification);
        }

        // validation ends

        \DB::beginTransaction();
                
        // creation of the new file
        $file = new File;
        
        $tmp = $input['file'];
        if (!$tmp){
            \DB::rollbackTransaction();
            \DB::commit();
            return redirect()->action('HomeController@index');
        }

        // generate a new filename. getClientOriginalExtension() for the file extension
        $file->name = $tmp->getClientOriginalName();
        
        // save to storage/app/photos as the new $filename
        $file->file_path = $tmp->storeAs('files', $file->name . time());

        // set public visibility to false
        if ($request->get('visibility', 0) == 'Private'){
            $file->visibility = 0;
        } else {
            $file->visibility = 1;
        }

        // persist to database
        $file->save();

        // inserts into owns relation 
        $owns = new Owns;
        $owns->file_id = $file->id;
        $owns->user_id = Auth::id();

        $owns->save();

        // insert into IndividualAccess select userID, fileID from User cross join (select * from File natural join owns where userID = pm34 and fileID = fileID) where name in the set of names passed in
        $iaList = $request->item_id;

        // if list is countable go through and add file.
        $iaListString = "";
        if ($iaList){
            for ($i=0; $i < count($iaList); $i++){
            
                // add to IndividualAccess table // $file->id
                $ia = new IndividualAccess;
                if ($iaList[$i] != Auth::id() || $iaList[$i] != "None"){
                    $ia->user_id = $iaList[$i];
                    $ia->file_id = $file->id;
                    $ia->save();
                    
                    //create shared string
                    $iaTmp = User::where('id', '=', $iaList[$i])->select('name')->first();
                    $iaListString = $iaListString . $iaTmp['name'];
                    if ($i != count($iaList)-1){
                        $iaListString = $iaListString . ", ";
                    }
                }
            }
        }

        \DB::commit();


        $notification = array(
            'message' => "Successfully Uploaded " . $file->name . ". Shared with: " . $iaListString,
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // if not logged in, then redirect to register page.
        if (!Auth::check()){
            return view('auth.register');
        }

        // files owned 
        $data['files'] = Owns
            ::where('user_id', '=', Auth::id())
            ->join('file', 'owns.file_id', '=', 'file.id')
            ->select('file.id', 'file.file_path', 'file.visibility', 'file.name')
            ->getQuery()
            ->get();

        // shared files
        $data['iaFiles'] = IndividualAccess
            ::where('user_id', '=', Auth::id())
            ->join('file', 'individualAccess.file_id', '=', 'file.id')
            ->select('file.id', 'file.file_path', 'file.visibility', 'file.name')
            ->getQuery()
            ->get();
        
        $data['publicFiles'] = File
            ::where('visibility', '=', 1)
            ->join('owns', 'owns.user_id', '!=', Auth::id())
            ->getQuery()
            ->get();
        
        $tmp = $data['files']->where('id', '=', $id)->first();
        $tmp1 = $data['iaFiles']->where('id', '=', $id)->first();
        $tmp2 = $data['publicFiles']->where('id', '=', $id)->first();

        // return if user doesn't have access to resource
        if (!$tmp){
            if (!$tmp1){
                if (!$tmp2)
                    return redirect()->route('files.index'); 
                else {
                    return Storage::download($tmp2->file_path, $tmp2->name);
                }
            } else {
                return Storage::download($tmp1->file_path, $tmp1->name);
            }
        }

        return Storage::download($tmp->file_path, $tmp->name);
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

    public function replace(Request $request){

        $record = File::find($request->get('fileid'));

        // cache and check
        $tmp = $request->file('new_file');
        if (!$tmp){
            return redirect()->route('files.index'); 
        }

        // delete file from server
        Storage::delete($record->file_path);

        // generate a new filename. getClientOriginalExtension() for the file extension
        $record->name = $tmp->getClientOriginalName();
        
        // save to storage/app/photos as the new $filename
        $record->file_path = $tmp->storeAs('files', $record->name . time());

        $record->save();

        return redirect()->route('files.index');        
    }

    public function rename(Request $request){
        // $validateData = $request->validate([
        //     'new_filename' => 'required|string|min:2',
        //     'fileid' => 'required'
        // ]);

        // change file name
        $record = File::find($request->get('fileid'));
        $record->name = $request->get('new_filename');
        $record->save();

        return redirect()->route('files.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if not logged in, then redirect to register page.
        if (!Auth::check()){
            return view('auth.register');
        }

        // TODO: figure out what happens when a file is deleted that is not in owns or individualAccess

        $data['files'] = Owns
            ::where('user_id', '=', Auth::id())
            ->join('file', 'owns.file_id', '=', 'file.id')
            ->select('file.id', 'file.file_path', 'file.visibility', 'file.name')
            ->getQuery()
            ->get();
        
        $toDelete = $data['files']->where('id', '=', $id)->first();

        if (!$toDelete){
            return redirect()->action('HomeController@index');
        }

        \DB::beginTransaction(); 

        File::destroy($id);
        $deletedOwnsRows = Owns::where('file_id', '=', $id)->delete();
        $deletedIARows = IndividualAccess::where('file_id', '=', $id)->delete();

        \DB::commit();

        Storage::delete($toDelete->file_path);


        return redirect()->route('files.index');
    }
}
