<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\BaseController;
use App\Models\Address;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use Illuminate\Routing\Redirector as RedirectorAlias;
use View;
use Auth;
use App\Http\Services\UserService;
use App\Http\Requests\Web\UserRequest;
use App\Http\Requests\Web\ChangePasswordRequest;

class UserController extends BaseController
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboard()
    {
        $address = auth()->user()->addresses->last();
        return View::make('web.user.dashboard', ['user' => auth()->user(),'address'=>$address]);
    }

    public function orders()
    {
        $orders = auth()->user()->orders()->get();
        return View::make('web.user.orders.index', ['user' => auth()->user(),'orders'=>$orders]);
    }

    public function wishlist()
        {
            $favoriteProducts = auth()->user()->favoritedProducts()->get();
            return View::make('web.user.wishlist.index', ['user' => auth()->user(),'favoriteProducts'=>$favoriteProducts]);
        }

    public function edit()
    {
        $address = auth()->user()->addresses->last();


        $locations = Location::where('active', true)->where('parent_id', null)->get();
        $selectedCity = '';
        $selectedRegion = '';
        $selectedDistrict    = '';
        $regions = [];
        $districts = [];
        if($address){
            if (Location::find(Location::find($address->location_id)->parent_id)) {
                $selectedCity = Location::find(Location::find($address->location_id)->parent_id)->id;
                if (Location::find(Location::find($address->location_id)->parent_id)->parent_id) {
                    $selectedCity = Location::find(Location::find($address->location_id)->parent_id)->parent_id;
                }
            }

            if ($selectedCity) {
                $regions = Location::where('active', true)->where('parent_id', $selectedCity)->get();
            }
            $selectedRegion = Location::find($address->location_id)->parent_id == $selectedCity ? $selectedRegion = Location::find($address->location_id)->id:Location::find($address->location_id)->parent_id;



            if ($selectedRegion) {
                $districts = Location::where('active', true)->where('parent_id', $selectedRegion)->get();
            }
            $selectedDistrict = Location::find($address->location_id)->id;

            if (Location::find($address->location_id)->parent_id == $selectedCity) {
                $selectedRegion = Location::find($address->location_id)->id;
                $selectedDistrict = '';
            }

            return View::make('web.user.edit_new', ['user' => auth()->user(), 'address' => $address, 'locations' => $locations, 'regions' => $regions, 'districts' => $districts, 'selectedCity' => $selectedCity, 'selectedRegion' => $selectedRegion, 'selectedDistrict' => $selectedDistrict]) ;


        }else{
            $locations = Location::where('active', true)->where('parent_id', null)->get();
            $regions = [];
            if (old('city_id')) {
                $regions = Location::where('active', true)->where('parent_id', old('city_id'))->get();
            }
            $districts = [];
            if (old('region_id')) {
                $districts = Location::where('active', true)->where('parent_id', old('region_id'))->get();
            }

            return View::make('web.user.edit_new', ['user' => auth()->user(), 'address' => $address, 'locations' => $locations, 'regions' => $regions, 'districts' => $districts]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        $address = auth()->user()->addresses->last();

        $this->userService->fillFromRequest($request, auth()->user());
        $this->userService->fillUserAddress($request, $address);
        return redirect(route('profile.edit'))->with('success', trans('profile_updated_successfully'));
    }

    /**
     * Update user password
     * @return \Illuminate\Contracts\View\View
     */
    public function editPassword()
    {
        return View::make('web.user.change_password', ['user' => auth()->user()]);
    }

    /**
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse|RedirectorAlias
     */
    public function updatePassword(ChangePasswordRequest $request)
    {
        if (!$this->userService->fillChangePasswordFromRequest($request, auth()->user())) {
            return redirect()->back()->with('error', trans('please_enter_correct_password'));
        }

        return redirect()->back()->with('success', trans('password_updated_successfully'));
    }

}
