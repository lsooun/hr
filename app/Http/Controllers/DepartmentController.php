<?php

namespace App\Http\Controllers;

use App\Classes\permission;
use App\Department;
use App\Designation;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

date_default_timezone_set(app_config('Timezone'));

class DepartmentController extends Controller {
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  /* departments  Function Start Here */
  public function departments() {
    $self = 'departments';

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
    return view('admin.departments', compact('departments'));

  }

  /* addDepartment  Function Start Here */
  public function addDepartment(Request $request) {

    $self = 'departments';

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
      'department' => 'required'
    ]);
    $niceNames = array(
      'department' => '部门'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('departments')->withErrors($v->errors());
    }

    $department = Department::firstOrCreate(['department' => $request->department]);

    if ($department->wasRecentlyCreated) {
      return redirect('departments')->with([
        'message' => '部门增加成功'
      ]);

    } else {
      return redirect('departments')->with([
        'message' => 'Department Already Exist',
        'message_important' => true
      ]);
    }

  }

  /* updateDepartment  Function Start Here */
  public function updateDepartment(Request $request) {
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('departments')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'departments';
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
      'department' => 'required'
    ]);
    $niceNames = array(
      'department' => '部门'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('departments')->withErrors($v->errors());
    }
    $department = Department::find($cmd);
    $department_name = Input::get('department');

    if ($department_name != $department->department) {

      $exist = Department::where('department', $department_name)->first();
      if ($exist) {
        return redirect('departments')->with([
          'message' => 'Department name already exist',
          'message_important' => true
        ]);
      }
    }

    if ($department) {
      $department->department = $department_name;
      $department->save();

      return redirect('departments')->with([
        'message' => '部门增加成功'
      ]);

    } else {
      return redirect('departments')->with([
        'message' => '没有部门信息',
        'message_important' => true
      ]);
    }
  }

  /* deleteDepartment  Function Start Here */
  public function deleteDepartment($id) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('departments')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'departments';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $department = Department::find($id);
    if ($department) {

      Designation::where('did', $id)->delete();
      $department->delete();

      return redirect('departments')->with([
        'message' => '部门删除成功'
      ]);
    } else {
      return redirect('departments')->with([
        'message' => '没有部门信息',
        'message_important' => true
      ]);
    }

  }

}
