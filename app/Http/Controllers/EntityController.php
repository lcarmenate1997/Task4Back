<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    public function index()
    {
        return Entity::orderBy('id','desc')->get();
    }

    public function show($id)
    {
        return Entity::find($id);
    }

    public function store(Request $request)
    {
        return Entity::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $entity = Entity::findOrFail($id);
        $entity->update($request->all());

        return $entity;
    }

    public function delete($id)
    {
        $entity = Entity::findOrFail($id);
        $entity->delete();

        return 204;
    }
}
