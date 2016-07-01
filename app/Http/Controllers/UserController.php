<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Requests\DetailRequest;
use App\Detail;
use App\WorkExperience;
use App\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
        $type = Auth::user()->type;
        if($type != '1' || $type != '2' || $type != '3') {
            return redirect('accessError');
        }
    }

    public function index() {
    	$type = Auth::user()->type;
    	$details = Auth::user()->detail()->get();
    	switch($type) {
    		case '1':
    			return view('profile_viewer.index', compact('details'));
    			break;
    		case '2':
    			return view('senior_citizen.index', compact('details', 'work_experiences'));
    			break;
    		case '3':
    			return view('department.index', compact('details'));
    			break;
    	}
    }

    public function profile() {
        $type = Auth::user()->type;
        $details = Auth::user()->detail()->get();
        switch($type) {
            case '1':
                return view('profile_viewer.profile', compact('details'));
                break;
            case '2':
                return view('senior_citizen.profile', compact('details', 'work_experiences'));
                break;
            case '3':
                return view('department.profile', compact('details'));
                break;
        }
    }

    public function workExperience() {
        if(Auth::user()->type != '2')
            return redirect('accessError');

        $work_experiences = Auth::user()->work_experiences()->get();
        return view('senior_citizen.work_experience', compact('$work_experiences'));
    }

    public function edit() {
    	$type = Auth::user()->type;
        $details = Auth::user()->detail()->get()[0];
    	switch($type) {
    		case '1':
    			return view('profile_viewer.edit', compact('details'));
    			break;
    		case '2':
    			return view('senior_citizen.edit', compact('details', 'work_experiences'));
    			break;
    		case '3':
    			return view('department.edit', compact('details'));
    			break;
    	}
    }

    /**
     * view of senior citizen as shown to profile viewer
     *
     * @return view page with details
     *
     **/
    public function view() {
        if(Auth::user()->type != 1)
            return redirect('accessError');

        $seniorCitizens = User::seniors()->get();
        $seniorCitizenDetails = array();
        foreach($seniorCitizens as $seniorCitizen) {
            $details = $seniorCitizen->detail()->get();
            if(count($details) != 0)    
                array_push($seniorCitizenDetails, $details);
        }
        $perPage = 2;
        $currentPage = Input::get('page', 1) - 1;
        $pagedData = array_slice($seniorCitizenDetails, $currentPage * $perPage, $perPage);
        $seniorCitizens = new LengthAwarePaginator($pagedData, count($seniorCitizenDetails), $perPage, $currentPage+1);
        $seniorCitizens->setPath(Input::getBasePath());
        return view('profile_viewer.view', compact('seniorCitizens'));
    }

    /**
     * show details of particular senior citizen
     *
     * @param User user
     * @return view of user
     **/
    public function show(User $user) {
        $details = $user->detail()->get();
        $work_experiences = $user->work_experiences()->get();

        return view('profile_viewer.senior_citizen', compact('details', 'work_experiences'));
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

    /**
     * store the initial details in database
     *
     * @param DetailRequest request
     * @return profile page with flash or some alert
     **/
    public function store(DetailRequest $request) {
        $data = $request->all();
        if(Input::file('photofile')->isValid()) {
            $destination = 'photo';
            $extension = Input::file('photofile')->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            Input::file('photofile')->move($destination, $filename);
            $data['photo'] = $filename;
        }
        if(Auth::user()->type=='2' && Input::file('cvfile')->isValid()) {
            $destination = 'cv';
            $extension = Input::file('cvfile')->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            Input::file('cvfile')->move($destination, $filename);
            $data['cv'] = $filename;
        }

        $detail = Auth::user()->detail()->create($data);
        // session()->flash('flash_message', 'Your article has been created!');
        // flash()->overlay('Your profile has been successfully created');
        return redirect('profile');
    }

    /**
     * update the details in database
     *
     * @param DetailRequest request
     * @return profile page with flash or some alert
     **/
    public function update(DetailRequest $request) {
        $data = $request->all();
        if(Input::file('photofile')->isValid()) {
            $destination = 'photo';
            $extension = Input::file('photofile')->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            Input::file('photofile')->move($destination, $filename);
            $data['photo'] = $filename;
        }
        if(Auth::user()->type=='2' && Input::file('cvfile')->isValid()) {
            $destination = 'cv';
            $extension = Input::file('cvfile')->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            Input::file('cvfile')->move($destination, $filename);
            $data['cv'] = $filename;
        }

        $detail = Auth::user()->detail()->create($data);
        // session()->flash('flash_message', 'Your article has been created!');
        // flash()->overlay('Your profile has been successfully created');
        return redirect('profile');
    }

    /**
     * store the work experiences in database
     *
     * @param Request request
     * @return profile page with flash or some alert
     **/
    public function storeExperience(Request $request) {
    	$newexperience = Auth::user()->work_experiences()->create($request->all());
    	return redirect('profile');
    }

    /**
     * store the bulk details in database
     *
     * @param Request request
     * @return profile page with flash or some alert
     **/
    public function bulkUpload(Request $request) {

    }
}