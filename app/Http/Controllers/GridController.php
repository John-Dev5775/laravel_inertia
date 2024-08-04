<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class GridController extends Controller
{
    private $grid;

    public function __construct()
    {
        $this->grid = [
            ['blue', 'blue', 'red'],
            ['red', 'blue', 'red'],
            ['red', 'red', 'red']
        ];
    }

    public function index()
    {
        return Inertia::render('Square', ['grid' => $this->grid]);
    }

    public function handleClick(Request $request)
    {
        $row = $request->input('row');
        $col = $request->input('col');

        // Get the current color of the clicked square
        $currentColor = $this->grid[$row][$col];

        // Toggle the color of the clicked square
        $this->grid[$row][$col] = $currentColor === 'blue' ? 'red' : 'blue';

        // Change adjacent squares
        $adjacentColors = $currentColor === 'blue' ? 'red' : 'blue';
        if ($row > 0) $this->grid[$row - 1][$col] = $adjacentColors;
        if ($row < 2) $this->grid[$row + 1][$col] = $adjacentColors;
        if ($col > 0) $this->grid[$row][$col - 1] = $adjacentColors;
        if ($col < 2) $this->grid[$row][$col + 1] = $adjacentColors;

        return response()->json(['grid' => $this->grid]);
    }

    //
}
