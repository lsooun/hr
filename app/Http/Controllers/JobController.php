<?php

namespace App\Http\Controllers;

use App\Classes\permission;
use App\Designation;
use App\Http\Requests;
use App\JobApplicants;
use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

date_default_timezone_set(app_config('Timezone'));

class JobController extends Controller {
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  /* jobs  Function Start Here */
  public function jobs() {

    $self = 'job-application';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $jobs = Jobs::all();
    $designation = Designation::all();
    return view('admin.jobs', compact('jobs', 'designation'));
  }

  /* postNewJob  Function Start Here */
  public function postNewJob(Request $request) {
    $self = 'add-new-job';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $v = \Validator::make($request->all(), [
      'position' => 'required', 'no_position' => 'required', 'post_date' => 'required', 'status' => 'required'
    ]);
    $niceNames = array(
      'position' => '职位',
      'no_position' => '发布号',
      'post_date' => '发布日期',
      'status' => '状态'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('jobs')->withErrors($v->errors());
    }

    $position = Input::get('position');
    $no_position = Input::get('no_position');
    $post_date = Input::get('post_date');
    $apply_date = Input::get('apply_date');
    $close_date = Input::get('close_date');
    $status = Input::get('status');
    $description = Input::get('description');
    $job_type = Input::get('job_type');
    $experience = Input::get('experience');
    $age = Input::get('age');
    $job_location = Input::get('job_location');
    $salary_range = Input::get('salary_range');
    $short_description = Input::get('short_description');

    if ($position != '') {
      $exist = Jobs::where('position', '=', $position)->first();

      if ($exist) {
        return redirect('jobs')->with([
          'message' => '已经发布过这个职位',
          'message_important' => true
        ]);
      }
    }

    $jobs = new Jobs();
    $jobs->position = $position;
    $jobs->no_position = $no_position;
    $jobs->job_type = $job_type;
    $jobs->experience = $experience;
    $jobs->age = $age;
    $jobs->job_location = $job_location;
    $jobs->salary_range = $salary_range;
    $jobs->post_date = $post_date;
    $jobs->apply_date = $apply_date;
    $jobs->close_date = $close_date;
    $jobs->status = $status;
    $jobs->short_description = $short_description;
    $jobs->description = $description;
    $jobs->save();

    return redirect('jobs')->with([
      'message' => '成功增加职位'
    ]);

  }

  /* editJob  Function Start Here */
  public function editJob($id) {
    $self = 'job-application';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $job = Jobs::find($id);
    if ($job) {
      $designation = Designation::all();
      return view('admin.edit-job', compact('job', 'designation'));
    } else {
      return redirect('jobs')->with([
        'message' => 'Job not found for edit',
        'message_important' => true
      ]);
    }
  }

  /* postEditJob  Function Start Here */
  public function postEditJob(Request $request) {

    $cmd = Input::get('cmd');

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('jobs/edit/' . $cmd)->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'job-application';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $v = \Validator::make($request->all(), [
      'position' => 'required', 'no_position' => 'required', 'post_date' => 'required', 'status' => 'required'
    ]);
    $niceNames = array(
      'position' => '职位',
      'no_position' => '发布号',
      'post_date' => '发布日期',
      'status' => '状态'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('jobs/edit/' . $cmd)->withErrors($v->errors());
    }

    $position = Input::get('position');
    $no_position = Input::get('no_position');
    $post_date = Input::get('post_date');
    $apply_date = Input::get('apply_date');
    $close_date = Input::get('close_date');
    $status = Input::get('status');
    $description = Input::get('description');
    $job_type = Input::get('job_type');
    $experience = Input::get('experience');
    $age = Input::get('age');
    $job_location = Input::get('job_location');
    $salary_range = Input::get('salary_range');
    $short_description = Input::get('short_description');

    $jobs = Jobs::find($cmd);
    $exist_pos = $jobs->position;

    if ($position != '') {
      if ($position != $exist_pos) {
        $exist = Jobs::where('position', '=', $position)->first();
        if ($exist) {
          return redirect('jobs/edit/' . $cmd)->with([
            'message' => '已经发布过这个职位',
            'message_important' => true
          ]);
        }
      }
    }

    $jobs->position = $position;
    $jobs->no_position = $no_position;
    $jobs->job_type = $job_type;
    $jobs->experience = $experience;
    $jobs->age = $age;
    $jobs->job_location = $job_location;
    $jobs->salary_range = $salary_range;
    $jobs->short_description = $short_description;
    $jobs->post_date = $post_date;
    $jobs->apply_date = $apply_date;
    $jobs->close_date = $close_date;
    $jobs->status = $status;
    $jobs->description = $description;
    $jobs->save();

    return redirect('jobs')->with([
      'message' => '成功更新职位'
    ]);

  }

  /* deleteJob  Function Start Here */
  public function deleteJob($id) {
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('jobs')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'job-application';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $job = Jobs::find($id);
    if ($job) {
      JobApplicants::where('job_id', '=', $id)->delete();
      $job->delete();
      return redirect('jobs')->with([
        'message' => '成功删除职位'
      ]);
    } else {
      return redirect('jobs')->with([
        'message' => '没有找到职位',
        'message_important' => true
      ]);
    }
  }

  /* viewApplicant  Function Start Here */
  public function viewApplicant($id) {
    $self = 'job-applicants';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $applicants = JobApplicants::where('job_id', '=', $id)->get();
    return view('admin.view-application', compact('applicants'));
  }

  /* downloadResume  Function Start Here */
  public function downloadResume($id) {
    $self = 'job-applicants';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $file = JobApplicants::find($id)->resume;
    return response()->download(storage_path('app/resume/' . $file));
  }

  /* deleteApplication  Function Start Here */
  public function deleteApplication($id) {
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('jobs')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'job-applicants';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $delete_app = JobApplicants::find($id);
    if ($delete_app) {
      $job_id = $delete_app->job_id;
      $delete_app->delete();

      return redirect('jobs/view-applicant/' . $job_id)->with([
        'message' => '求职申请删除成功'
      ]);
    } else {
      return redirect('jobs')->with([
        'message' => '没有可以删除的求职申请',
        'message_important' => true
      ]);
    }
  }

  /* setApplicantStatus  Function Start Here */
  public function setApplicantStatus(Request $request) {
    $self = 'job-applicants';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $job_id = Input::get('job_id');
    $cmd = Input::get('cmd');
    $v = \Validator::make($request->all(), [
      'status' => 'required'
    ]);
    $niceNames = array(
      'status' => '状态'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('jobs/view-applicant/' . $job_id)->withErrors($v->fails());
    }

    $job_applicant = JobApplicants::find($cmd);
    if ($job_applicant) {
      $job_applicant->status = $request->status;
      $job_applicant->save();

      return redirect('jobs/view-applicant/' . $job_id)->with([
        'message' => '状态更新成功',
      ]);

    } else {
      return redirect('jobs/view-applicant/' . $job_id)->with([
        'message' => '没有找到职位候选人',
        'message_important' => true
      ]);
    }

  }

}
