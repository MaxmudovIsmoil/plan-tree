<?php

namespace App\Services;

use App\Http\Resources\CableResource;
use App\Models\Cable;
use App\Models\CableChange;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CableService
{

    public function list(): JsonResponse
    {
        try {
            $cable = Cable::with('user')->orderBy('id', 'DESC')->get();
            return response()->success(CableResource::collection($cable));
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }
    }

    public function one(int $id): JsonResponse
    {
        try {
            $cable = Cable::findOrfail($id);
            return response()->success(new CableResource($cable));
        }
        catch (\Exception $e) {
            return response()->fail($e->getMessage());
        }

    }
    public function createOrUpdate(array $data): JsonResponse
    {
        try {
            DB::beginTransaction();
                Log::info(json_encode($data));
                if (isset($data['cable_id']) && is_numeric($data['cable_id'])) {
                    $cable = Cable::findOrFail($data['cable_id']);
                    CableChange::create([
                        'cable_id' => $data['cable_id'],
                        'user_id' => $data['user_id'],
                        'old_name' => $cable->name,
                        'new_name' => $data['name'],
                        'old_remain_stock' => $cable->remain_stock,
                        'new_remain_stock' => $data['remain_stock'],
                        'old_purpose' => $cable->purpose,
                        'new_purpose' => $data['purpose'],
                        'old_expected_delivery' => $cable->expected_delivery,
                        'new_expected_delivery' => $data['expected_delivery'],
                    ]);

                    $cable->fill([
                        'name' => $data['name'],
                        'remain_stock' => $data['remain_stock'],
                        'purpose' => $data['purpose'],
                        'expected_delivery' => $data['expected_delivery'],
                    ]);
                    $cable->save();
                }
                else {
                    Cable::create([
                        'user_id' => Auth::id(),
                        'name' => $data['name'],
                        'remain_stock' => $data['remain_stock'],
                        'purpose' => $data['purpose'],
                        'expected_delivery' => $data['expected_delivery'],
                    ]);
                }
            DB::commit();
            return response()->success('ok');
        }
        catch (\Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage());
        }
    }


    public function destroy(int $id): JsonResponse
    {
        try {
            return response()->success(Cable::destroy($id));
        }
        catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

}

