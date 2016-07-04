<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\WorkExperience;
use App\Detail;
use Auth;
use App\Http\Requests;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\DetailRequest;

class AdminController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    	if(Auth::user() && Auth::user()->type != 0) {
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
    public function searchCitizens() {
        return view('admin.search_citizens', compact('seniorCitizens'));
    }

    /**
     * view the list of filtered senior citizens
     *
     * @param Request request
     * @return view with pagination
     **/
    public function seniorCitizens(Request $request) {
        $data = $request->all();
        unset($data['_token']);
        unset($data['page']);
        if(!count($data))
            return redirect('admin/search_citizens');
        $data = array_filter($data);
        $query = WorkExperience::where($data);
        $seniorCitizens = $query->get();
        $seniorCitizenDetails = array();
        foreach($seniorCitizens as $seniorCitizen) {
            $details = $seniorCitizen->user->detail()->get();
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
        $result = 1;
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
        return view('admin.profile_viewers', compact('profileViewers', 'result'));
    }

    /**
     * view the list of all filtered profile viewers
     *
     * @param Request request
     * @return view with pagination
     **/
    public function searchViewers(Request $request) {
        $data = $request->all();
        unset($data['_token']);
        unset($data['page']);
        if(!count($data)){
            $result = 0;
            $profileViewers = array();
            return view('admin.profile_viewers', compact('profileViewers', 'result'));
        }
        else {
            $result = 2;
            $profileViewers = Detail::where($data)->paginate(2);

            return view('admin.profile_viewers', compact('profileViewers', 'result'));
        }
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
	public function edit(User $user) {
		// return view('admin_edit', compact('detail'));
        $type = $user->type;
        $details = $user->detail()->get()[0];
        switch($type) {
            case '1':
                return view('admin.profile_viewer_edit', compact('user', 'details'));
                break;
            case '2':
                return view('admin.senior_citizen_edit', compact('user', 'details'));
                break;
            case '3':
                return view('admin.department_edit', compact('user', 'details'));
                break;
        }
	}

	/**
    * modify the details of a user through admin panel
    *
    * @param Detail detail
    * @param DetailRequest request
    * @return admin home page
    **/
	public function update(User $user, DetailRequest $request) {
        $data = $request->all();
        $data['user_id'] = $user->id;
        $user->update($data);
		$user->detail->update($data);
		return redirect('admin');
	}

    /**
    * open the view page to edit details of a user
    *
    * @param User $user
    * @return view
    **/
    public function show(User $user) {
        $type = $user->type;
        $detail = $user->detail()->get()[0];
        switch($type) {
            case '1':
                return view('admin.profile_viewer_profile', compact('detail'));
                break;
            case '2':
                $work_experiences = $user->work_experiences()->get();
                return view('admin.senior_citizen_profile', compact('detail', 'work_experiences'));
                break;
            case '3':
                return view('admin.department_profile', compact('detail'));
                break;
        }
    }

    /**
     * download cv for a user if it exists
     *
     * @param Detail detail
     * @return download pdf
     **/
    public function download(Detail $detail) {
        $cv = $detail->cv;
        return response()->download(public_path('cv\\'.$cv));
    }
}