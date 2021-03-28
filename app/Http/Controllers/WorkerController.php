<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WorkerController extends Controller
{
    public function index()
    {
        return Worker::with('user')->get();
    }

    public function show($id)
    {
        return Worker::find($id);
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $this->setUserEmail($request->name, $request->last_name);
        $user->password = Hash::make($request->dni);
        $user->save();

        $worker = new Worker;
        $worker->name = $request->name;
        $worker->last_name = $request->last_name;
        $worker->dni = $request->dni;
        $worker->date_birth = $request->date_birth;
        $worker->address = $request->address;
        $worker->user_id = User::orderBy('id', 'desc')->first()->id;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time()."_".$file->getClientOriginalName();
            $endPath = public_path('/images');
            $file->move($endPath, $fileName);
            $worker->image = $fileName;
        }
        $worker->save();

        return $worker;
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', Worker::findOrFail($id)->user_id)->first();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $this->setUserEmail($request->name, $request->last_name);
        $user->password = Hash::make($request->dni);
        $user->save();

        $worker = Worker::findOrFail($id);
        $worker->name = $request->name;
        $worker->last_name = $request->last_name;
        $worker->dni = $request->dni;
        $worker->date_birth = $request->date_birth;
        $worker->address = $request->address;
        $worker->user_id = $user->id;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = time()."_".$file->getClientOriginalName();
            $endPath = public_path('/images');
            $file->move($endPath, $fileName);
            $worker->image = $fileName;
        }
        $worker->save();

        return $worker;
    }

    public function delete(Request $request, $id)
    {
        $worker = Worker::findOrFail($id);
        $worker->delete();

        return 204;
    }

    private function setUserEmail($name, $last_name, $edit = false)
    {

        $i = 1;
        $email = str_replace(' ', '', Str::lower($name .  $last_name[0] . '@test.com'));

        while (User::where('email', $email)->first() != null) {
            $i++;
            $email =  str_replace(' ', '', Str::lower($name .  Str::substr($last_name, 0, $i) . '@test.com'));
        }
        return  $email;
    }
}
