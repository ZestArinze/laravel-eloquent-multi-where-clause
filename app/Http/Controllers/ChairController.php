<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use Illuminate\Http\Request;

class ChairController extends Controller
{
    public function index(Request $request) {

        // case 1: simple conditions, simple array

        $filter = $request->validate([
            'category' => 'string',
            'legs' => 'integer',
            'color' => 'string',
            'height' => 'numeric',
        ]);

        $queryA = Chair::where('category', $request->category)
            ->where('legs',  $request->legs)
            ->where('color',  $request->color)
            ->where('height',  $request->height)
            ->get();

        $queryB = Chair::where($filter)->get();

        return response()->json([
            'queryA' => $queryA,
            'queryB' => $queryB,
        ]);

        // case 2: complex conditions, nested arrays

        $queryX = Chair::where('name', 'LIKE', '%fo%')
            ->where('category', '=', 'wooden')
            ->where('legs', '=', 3)
            ->where('color', '=', 'red')
            ->where('height', '<', 4)
            ->where('has_back_rest', '=', 1)
            ->get();
        
        $conditions = [
            ['name', 'LIKE', '%foo%'],
            ['category', '=', 'wooden'],
            ['legs', '=', 3],
            ['color', '=', 'red'],
            ['height', '<', 4],
            ['has_back_rest', '=', 1],
        ];

        $queryY = Chair::where($conditions)->get();
        $queryZ = Chair::where($conditions)->get();

        return response()->json([
            'queryX' => $queryX,
            'queryY' => $queryY,
            'queryZ' => $queryZ,
        ]);
    }
}
