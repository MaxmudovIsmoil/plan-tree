<?php

namespace App\Http\Controllers;

use App\Http\Resources\CableChangeResource;
use App\Models\CableChange;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CableChangeController extends Controller
{
    public function getCableChanges(): JsonResponse
    {
        try {

            $changes = CableChange::with('user')->orderBy('id', 'DESC')->get();
            return response()->success(CableChangeResource::collection($changes));
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }
}
