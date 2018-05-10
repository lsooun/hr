<?php

namespace App\Http\Controllers;

use App\Classes\permission;
use App\Department;
use App\Designation;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

date_default_timezone_set(app_config('Timezone'));

class DesignationsController extends Controller {

  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  /* designations  Function Start Here */
  public function designations() {
    $self = 'designations';

    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $departments = Department::all();
    $designations = Designation::all();
    return view('admin.designations', compact('departments', 'designations'));
  }

  /* addDesignation  Function Start Here */
  public function addDesignation(Request $request) {
    $self = 'designations';

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
      'designation' => 'required', 'department' => 'required'
    ]);
    $niceNames = array(
      'designation' => '任职',
      'department' => '部门'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('designations')->withErrors($v->errors());
    }

    $designations = Designation::firstOrCreate(['did' => $request->department, 'designation' => $request->designation]);

    if ($designations->wasRecentlyCreated) {
      return redirect('designations')->with([
        'message' => '成功增加任职'
      ]);

    } else {
      return redirect('designations')->with([
        'message' => '任职已经存在',
        'message_important' => true
      ]);
    }

  }

  /* deleteDesignation  Function Start Here */
  public function deleteDesignation($id) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('designations')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'designations';

    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $designation = Designation::find($id);
    if ($designation) {
      $designation->delete();

      return redirect('designations')->with([
        'message' => '成功删除任职',
      ]);
    } else {
      return redirect('designations')->with([
        'message' => '没有任职信息',
        'message_important' => true
      ]);
    }
  }

  /* updateDesignation  Function Start Here */
  public function updateDesignation(Request $request) {
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('designations')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'designations';

    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $cmd = Input::get('cmd');

    $v = \Validator::make($request->all(), [
      'designation' => 'required', 'department' => 'required'
    ]);
    $niceNames = array(
      'designation' => '任职',
      'department' => '部门'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('designations')->withErrors($v->errors());
    }

    $designation = trim(Input::get('designation'));
    $department = Input::get('department');

    $des = Designation::find($cmd);

    $exist = Designation::where('did', $department)->where('designation', $designation)->first();

    if ($designation != $des->designation AND $department != $des->did) {

      if ($exist) {
        return redirect('designations')->with([
          'message' => '任职已经存在',
          'message_important' => true
        ]);
      }
    }

    $des->did = $department;
    $des->designation = $designation;
    $des->save();

    return redirect('designations')->with([
      'message' => '任职更新成功'
    ]);

  }

}
