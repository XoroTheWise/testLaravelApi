<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TypeResource;
use App\Models\Type;

class TypeController extends Controller
{
    const PAGES = 10;

    public function index(Request $request)
    {
        if ($request->id) {
            return (TypeResource::collection(Type::paginate(self::PAGES)->where('id', $request->id)));
        } else if ($request->name) {
            return (TypeResource::collection(Type::paginate(self::PAGES)->where('name', $request->name)));
        } else if ($request->mask) {
            return (TypeResource::collection(Type::paginate(self::PAGES)->where('mask', $request->mask)));
        } else {
            return (TypeResource::collection(Type::paginate(self::PAGES)));
        }
    }
}
