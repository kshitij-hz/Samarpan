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
    			return view('profile_viewer.index', compact('$details'));
    			break;
    		case '2':
    			$work_experiences = Auth::user()->work_experiences()->get();
    			return view('senior_citizen.index', compact('$details', 'work_experiences'));
    			break;
    		case '3':
    			return view('department.index', compact('$details'));
    			break;
    	}
    }

    public function edit() {
    	$type = Auth::user()->type;
        $details = Auth::user()->detail()->get();
    	switch($type) {
    		case '1':
    			return view('profile_viewer.edit', compact('details'));
    			break;
    		case '2':
                $work_experiences = Auth::user()->work_experiences()->get();
    			return view('senior_citizen.edit', compact('details', 'work_experiences'));
    			break;
    		case '3':
    			return view('department.edit', compact('details'));
    			break;
    	}
    }

    /**
     * store the details in database
     *
     * @param DetailRequest request
     * @return profile page with flash or some alert
     **/
    public function store(DetailRequest $request) {
        $data = $request->all();
        if(Input::file('photo')->isValid()) {
            $destination = 'uploads';
            $extension = Input::file('photo')->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            Input::file('photo')->move($destination, $filename);
            $data['photo'] = $filename;
        }
        $article = Auth::user()->detail()->create($data);
        // session()->flash('flash_message', 'Your article has been created!');
        flash()->overlay('Your details has been successfully edited');
    	$detail = Auth::user()->detail()->createOrUpdate($request->all());
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

	public function view() {
        if(Auth::user()->type != 1)
            return redirect('accessError');

		$seniorCitizens = User::seniors()->get();
        $seniorCitizenDetails = array();
        foreach($seniorCitizens as $seniorCitizen) {
            $details = $seniorCitizen->detail()->get();
            array_push($seniorCitizenDetails, $details);
        }
        $perPage = 2;
        $currentPage = Input::get('page', 1) - 1;
        $pagedData = array_slice($seniorCitizenDetails, $currentPage * $perPage, $perPage);
        $seniorCitizens = new LengthAwarePaginator($pagedData, count($seniorCitizenDetails), $perPage, $currentPage+1);
        $seniorCitizens->setPath(Input::getBasePath());
        return view('profile_viewer.view', compact('seniorCitizens'));
	}
}