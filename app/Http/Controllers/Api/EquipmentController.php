<?php

namespace App\Http\Controllers\Api;

use App\Enums\TypeMaskEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\EquipmentResource;
use App\Http\Requests\EquipmentCreateRequest;
use App\Http\Requests\EquipmentUpdateRequest;
use App\Models\Equipment;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    const PAGES = 10;

    public function index(Request $request)
    {
        if ($request->id) {
            return (EquipmentResource::collection(Equipment::paginate(self::PAGES)->where('id', $request->id)));
        } else if ($request->type_id) {
            return (EquipmentResource::collection(Equipment::paginate(self::PAGES)->where('type_id', $request->type_id)));
        } else if ($request->number) {
            return (EquipmentResource::collection(Equipment::paginate(self::PAGES)->where('number', $request->number)));
        } else if ($request->note) {
            return (EquipmentResource::collection(Equipment::paginate(self::PAGES)->where('note', $request->note)));
        } else {
            return (EquipmentResource::collection(Equipment::paginate(self::PAGES)));
        }
    }

    public function show($id)
    {
        if (!Equipment::find($id)) {
            $data = [
                'error' => 'There is no equipment with this id',
            ];
            return $data;
        }
        return new EquipmentResource(Equipment::findOrFail($id));
    }

    /**
     * @param EquipmentCreateRequest $request
     */

    public function create(EquipmentCreateRequest $request)
    {
        $errors = array();
        foreach ($request->number as $number) {
            if (count(Equipment::all()->where('number', $number)) == 0) {
                if (preg_match(TypeMaskEnum::$maskItems[$request->type_id], $number)) {
                    if (Equipment::create([
                        'type_id' => $request->type_id,
                        'number' => $number,
                        'note' => $request->note,
                    ])) {
                        $errors[] = $number . " = Successful create";
                    }
                } else {
                    $errors[] = $number . " = failed validation";
                }
            } else {
                $errors[] = $number . " = exist";
            }
        }
        return $errors;
    }

    /**
     * @param EquipmentUpdateRequest $request
     * @param int $id
     */

    public function update(EquipmentUpdateRequest $request, int $id)
    {
        if (!Equipment::find($id)) {
            $data = [
                'error' => 'There is no equipment with this id',
            ];
            return $data;
        } else {
            $equipment = Equipment::find($id);
            $errors = array();

            if ($request->type_id) {
                if ($request->number) {
                    if (preg_match(TypeMaskEnum::$maskItems[$request->type_id], $request->number)) {
                        if ($equipment->update($request->validated())) {
                            $errors[] = $request->number . " = Successful update";
                        }
                    } else {
                        $errors[] = "Failed validation";
                    }
                } else {
                    if ($equipment->update($request->validated())) {
                        $errors[] = $equipment->number . " = Successful update";
                    }
                }
            } else {
                if ($request->number) {
                    if (preg_match(TypeMaskEnum::$maskItems[$equipment->type_id], $request->number)) {
                        if ($equipment->update($request->validated())) {
                            $errors[] = $request->number . " = Successful update";
                        }
                    } else {
                        $errors[] = "Failed validation";
                    }
                } else {
                    if ($equipment->update($request->validated())) {
                        $errors[] = $equipment->number . " = Successful update";
                    }
                }
            }
            return $errors;
        }
    }

    /**
     * @param int $id
     */

    public function delete(int $id)
    {
        if (!Equipment::find($id)) {
            $data = [
                'error' => 'There is no equipment with this id',
            ];
            return $data;
        } else {
            $equipment = Equipment::find($id);
            $equipment->delete($id);
            $data = [
                'message' => 'Deleted',
                'equipment' => $equipment,
            ];
            return $data;
        }
    }
}
