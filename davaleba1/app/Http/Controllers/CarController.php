<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getCars() {
        $cars = Car::all();

        return view('cars')->with("cars", $cars);
    }

    public function getCar($id) {
        $car = Car::findOrFail($id);

        return view('car')->with('car', $car);
    }

    public function getCreateCar() {
        return view('create_car');
    }

    public function saveCar(StoreCarRequest $request) {
        $car = new Car($request->all());

        $car->save();

        return redirect('cars');
    }

    public function getEditCar($id) {
        $car = Car::findOrFail($id);

        return view('edit_car')->with('car', $car);
    }

    public function updateCar(Request $request, $id) {
        $car = Car::findOrFail($id);

        $car->update($request->all());

        return redirect('cars');
    }

    public function deleteCar(Car $car) {
        try {
            $car->delete();
        } catch (\Exception $e) {
        }

        return redirect()->back();
    }
}
