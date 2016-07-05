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
                $work_experiences = Auth::user()->work_experiences()->get();
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
                $work_experiences = Auth::user()->work_experiences()->get();
                return view('senior_citizen.profile', compact('details', 'work_experiences'));
                break;
            case '3':
                return view('department.profile', compact('details'));
                break;
        }
    }

    public function startVerification() {
        $verify = Auth::user()->verify;
        if($verify=='0')
            return redirect('verification')->with('verif_id', Auth::user()->id);
    }

    public function workExperience() {
        if(Auth::user()->type != '2')
            return redirect('accessError');

        $work_experiences = Auth::user()->work_experiences()->latest('to')->get();
        return view('senior_citizen.work_experience', compact('work_experiences'));
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
     * view the filter to search citizens
     *
     *
     * @return view with pagination
     **/
    public function searchCitizens() {
        return view('profile_viewer.search_citizens', compact('seniorCitizens'));
    }

    /**
     * view the list of filtered senior citizens
     *
     * @param Request request
     * @return view with pagination
     **/
    public function view(Request $request) {
        $data = $request->all();
        unset($data['_token']);
        unset($data['page']);
        if(!count($data))
            return redirect('search_senior_citizens');
        $data = array_filter($data);
        $query = WorkExperience::where($data);
        $seniorCitizens = $query->get();
        $seniorCitizenDetails = array();
        foreach($seniorCitizens as $seniorCitizen) {
            $details = $seniorCitizen->user->detail()->get();
            $verify = $seniorCitizen->user->verify;
            if(count($details) != 0 && $verify==1)
                array_push($seniorCitizenDetails, $details);
        }
        $perPage = 2;
        $currentPage = Input::get('page', 1) - 1;
        $total = count($seniorCitizenDetails);
        $pagedData = array_slice($seniorCitizenDetails, $currentPage * $perPage, $perPage);
        $seniorCitizens = new LengthAwarePaginator($pagedData, $total, $perPage, $currentPage+1);
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
        $detail = $user->detail()->get()[0];
        $work_experiences = $user->work_experiences()->get();

        return view('profile_viewer.senior_citizen', compact('detail', 'work_experiences'));
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
     * open upload page for department
     *
     * 
     * @return upload view to upload csv or xls
     **/
    public function uploadView() {
        if(Auth::user()->type != '3')
            return redirect('accessError');
        return view('department.upload');
    }

    /**
     * store the work experiences in database
     *
     * @param Request request
     * @return profile page with flash or some alert
     **/
    public function storeExperience(Request $request) {
        $this->validate($request, [
            'sector' => 'required',
            'category' => 'required',
            'company' => 'required',
            'position' => 'required',
            'role' => 'required',
            'from' => 'date|required',
            'to' => 'date|required'
        ]);
        $newexperience = Auth::user()->work_experiences()->create($request->all());
        return redirect('profile');
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
     * store the bulk details in database
     *
     * @param Request request
     * @return profile page with flash or some alert
     **/
    public function bulkUpload(Request $request) {
        $this->validate($request, [
            'file' => 'required|max:1024'
        ]);
        if($request->hasFile('file')) {
            $file = Input::file('file');
            
            $extension = $file->getClientOriginalExtension();
            if ($extension!='csv' && $extension!='xls' && $extension!='xlsx') {
                return redirect('upload')->with('filetype_error','upload a csv or an excel file only');
            }
           
            if (($handle = fopen($file,'r')) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ',')) !==FALSE) {
                    if(!isset($data[0]) || empty($data[0]) || !isset($data[9]) || empty($data[9]))
                        continue;
                    if(strtolower($data[0]) == "firstname")
                        continue;
                    $check = User::where("email",$data[1])->count();
                    if($check>0)
                        continue; 

                    $user = new User();
                    $user->name = $data[0].' '.$data[2];
                    $user->email = $data[9];
                    $user->contact = $data[5];
                    $user->password = $data[9];
                    $user->type = '2';
                    if($user->save()) {
                        $detail = new Detail();
                        $detail->user_id = $user->id;
                        $detail->firstname = $data[0];
                        $detail->middlename = $data[1];
                        $detail->lastname = $data[2];
                        $detail->date_of_birth = $data[3];
                        $detail->gender = $data[4];
                        $detail->contact_mobile = $data[5];
                        $detail->contact_home = $data[6];
                        $detail->contact_pager = $data[7];
                        $detail->contact_fax = $data[8];
                        $detail->email_personal = $data[9];
                        $detail->address_permanent = $data[10];
                        $detail->city_permanent = $data[11];
                        $detail->state_permanent = $data[12];
                        $detail->country_permanent = $data[13];
                        $detail->retirement = $data[14];
                        $detail->expertise_in = $data[15];
                        $detail->save();
                    }
                }
            }
            fclose($handle);
            return redirect('upload')->with(
                        'uploded_success','Profiles successfully uploaded.'
                    );
        }
        return redirect('upload');
    }
}