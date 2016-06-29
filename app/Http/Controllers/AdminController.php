<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    	if(Auth::user()->type != 0) {
    		return redirect('accessError');
    	}
    }

    /**
     * the index page
     *
     *
     * @return view
     **/
    public function index() {
        // dd(Auth::user());
    	return view('admin.index');
    }

	/**
     * view the list of all senior citizens
     *
     *
     * @return view with pagination
     **/
    public function seniorCitizens() {
    	$seniorCitizens = User::seniors()->get();
        $seniorCitizenDetails = array();
        foreach($seniorCitizens as $seniorCitizen) {
            $details = $seniorCitizen->detail()->get();
            if(count($details) != 0)    
                array_push($seniorCitizenDetails, $details);
        }
        $perPage = 2;
        $currentPage = Input::get('page', 1) - 1;
        $total = count($seniorCitizenDetails);
        $pagedData = array_slice($seniorCitizenDetails, $currentPage * $perPage, $perPage);
        $seniorCitizens = new LengthAwarePaginator($pagedData, $total, $perPage, $currentPage+1);
        $seniorCitizens->setPath(Input::getBasePath());
        return view('admin.senior_citizens', compact('seniorCitizens'));
    }

    /**
     * view the list of all profile viewers
     *
     *
     * @return view with pagination
     **/
    public function profileViewers() {
    	$profileViewers = User::viewers()->get();
        $profileViewerDetails = array();
        foreach($profileViewers as $profileViewer) {
            $details = $profileViewer->detail()->get();
            if(count($details) != 0)
                array_push($profileViewerDetails, $details);
        }
        $perPage = 2;
        $currentPage = Input::get('page', 1) - 1;
        $total = count($profileViewerDetails);
        $pagedData = array_slice($profileViewerDetails, $currentPage * $perPage, $perPage);
        $profileViewers = new LengthAwarePaginator($pagedData, $total, $perPage, $currentPage+1);
        $profileViewers->setPath(Input::getBasePath());
        return view('admin.profile_viewers', compact('profileViewers'));
    }

    /**
     * view the list of all authorized departments
     *
     *
     * @return view with pagination
     **/
    public function departments() {
    	$departments = User::departments()->get();
        $departmentDetails = array();
        foreach($departments as $department) {
            $details = $department->detail()->get();
            if(count($details) != 0)
                array_push($departmentDetails, $details);
        }
        $perPage = 2;
        $currentPage = Input::get('page', 1) - 1;
        $total = count($departmentDetails);
        $pagedData = array_slice($departmentDetails, $currentPage * $perPage, $perPage);
        $departments = new LengthAwarePaginator($pagedData, $total, $perPage, $currentPage+1);
        $departments->setPath(Input::getBasePath());

        return view('admin.departments', compact('departments'));
    }

    /**
    * open the edit page to edit details of a user
    *
    * @param Detail detail
    * @return view
    **/
	public function edit(Detail $detail) {
		return view('admin.edit', compact('detail'));
	}

	/**
    * modify the details of a user through admin panel
    *
    * @param Detail detail
    * @param DetailRequest request
    * @return admin home page
    **/
	public function update(Detail $detail, DetailRequest $request) {
		$detail->update($request->all());
		return redirect('admin');
	}
}
