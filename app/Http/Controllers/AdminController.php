<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Casino;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.home');
    }

    /**
     * Show the casino index.
     *
     * @return View
     */
    public function casinoIndex(): View
    {
        $casinoList = Casino::all();
        return view('admin.casinos', compact('casinoList'));
    }

    /**
     * Add / Edit a casino
     *
     * @param int $id
     * @return View
     */
    public function casino(int $id = null): View
    {
        $casino = Casino::find($id);
        return view('admin.casino', compact('casino','id'));
    }

    /**
     * Create / Update the casino record.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function casinoUpdate(Request $request): RedirectResponse
    {
        // Validation
        $rules = [
            'name' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'opening_times' => 'required'
        ];
        $messages = [
            'name.required' => 'Please input a name',
            'latitude.required' => 'Please input latitude',
            'latitude.numeric' => 'Please input a numeric latitude',
            'longitude.required' => 'Please input longitude',
            'longitude.numeric' => 'Please input a numeric longitude',
            'opening_times.required' => 'Please input opening times'
        ];
        $request->validate($rules, $messages);

        // Obtain data
        $data = [
            'name' => $request->name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'opening_times' => $request->opening_times
        ];

        // Add / edit data
        if ($request->itemid == null) {
            Casino::create($data);
        }
        else {
            Casino::where('id', $request->itemid)->update($data);
        }

        return redirect('/admin/casinos');
    }

    /**
     * Delete the casino record.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function casinoDelete(int $id): RedirectResponse
    {
        Casino::destroy($id);

        return redirect('/admin/casinos');
    }


}
