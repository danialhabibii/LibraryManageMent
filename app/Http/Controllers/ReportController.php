<?php

namespace App\Http\Controllers;

use App\Action\library\report\TotalBookAction;
use App\Http\Resources\Library\BookResource;
use App\Http\Resources\Library\report\ReportResource;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function totalBooks(TotalBookAction $totalBookAction)
    {
        $total = $totalBookAction->execute();
        return $this->ok(
            ReportResource::make($total),
        );
    }
}
