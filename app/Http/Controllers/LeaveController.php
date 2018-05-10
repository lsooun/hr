<?php

namespace App\Http\Controllers;

use App\Classes\permission;
use App\Leave;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

date_default_timezone_set(app_config('Timezone'));

class LeaveController extends Controller {
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  /* leave  Function Start Here */
  public function leave() {
    $self = 'leave-application';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $leave = Leave::all();
    return view('admin.leave', compact('leave'));
  }

  /* viewLeave  Function Start Here */
  public function viewLeave($id) {
    $self = 'leave-application';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $leave = Leave::find($id);

    return view('admin.view-leave-application', compact('leave'));

  }

  /* postJobStatus  Function Start Here */
  public function postJobStatus(Request $request) {
    $self = 'leave-application';
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
      'status' => 'required'
    ]);
    $niceNames = array(
      'status' => '状态'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('leave/edit/' . $cmd)->withErrors($v->errors());
    }

    $leave = Leave::find($cmd);
    if ($leave) {
      $leave->status = $request->status;
      $leave->remark = $request->remark;
      $leave->save();

      return redirect('leave')->with([
        'message' => '请假状态更新成功'
      ]);
    } else {
      return redirect('leave')->with([
        'message' => '没有请假申请',
        'message_important' => true
      ]);
    }
  }

  /* deleteLeaveApplication  Function Start Here */
  public function deleteLeaveApplication($id) {
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('leave')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'leave-application';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $leave = Leave::find($id);
    if ($leave) {
      $leave->delete();
      return redirect('leave')->with([
        'message' => '请假申请删除成功'
      ]);
    } else {
      return redirect('leave')->with([
        'message' => '没有请假申请',
        'message_important' => true
      ]);
    }
  }

}
