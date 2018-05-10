<?php

namespace App\Http\Controllers;

use App\Classes\permission;
use App\Holiday;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

date_default_timezone_set(app_config('Timezone'));

class HolidayController extends Controller {
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  /* holiday  Function Start Here */
  public function holiday() {
    $self = 'holiday';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    return view('admin.holiday');
  }

  /* eventCalendar  Function Start Here */
  public function eventCalendar() {
    $fdate = Input::get('from');
    $fdate = $fdate / 1000;
    $fdate = date('Y-m-d', $fdate);
    $tdate = Input::get('to');
    $tdate = $tdate / 1000;
    $tdate = date('Y-m-d', $tdate);
    $out = array();

    //find current month
    $d = Holiday::all();
    foreach ($d as $xs) {
      $id = $xs->id;
      $date = $xs->holiday;
      $occasion = $xs->occasion;
      $occasion_name = language_data('Occasion Name') . ': ' . $occasion;

      $url = url('holiday/view-holiday/' . $id);
      $out[] = array(
        'id' => $id,
        'title' => $occasion_name,
        'url' => $url,
        'class' => 'event-important',
        'start' => strtotime($date) . '000',
        'end' => strtotime($date) . '000'
      );
    }

    echo json_encode(array('success' => 1, 'result' => $out));
    exit;
  }

  /* addHoliday  Function Start Here */
  public function addHoliday() {
    $self = 'add-new-holiday';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    return view('admin.add-holiday');
  }

  /* postAddHoliday  Function Start Here */
  public function postAddHoliday(Request $request) {

    $self = 'add-new-holiday';
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
      'date' => 'required', 'occasion' => 'required'
    ]);
    $niceNames = array(
      'date' => '日期',
      'occasion' => '节日'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('holiday/add')->withErrors($v->errors());
    }

    $holiday = Holiday::firstOrCreate(['holiday' => $request->date, 'occasion' => $request->occasion]);

    if ($holiday->wasRecentlyCreated) {
      return redirect('holiday')->with([
        'message' => '增加节日成功'
      ]);

    } else {
      return redirect('holiday')->with([
        'message' => '节日已经存在',
        'message_important' => true
      ]);
    }

  }

  /* viewHoliday  Function Start Here */
  public function viewHoliday($id) {

    $self = 'holiday';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $holiday = Holiday::find($id);
    if ($holiday) {
      return view('admin.view-holiday', compact('holiday'));

    } else {
      return redirect('holiday')->with([
        'message' => 'Holiday Occasion Not Found',
        'message_important' => true
      ]);
    }
  }

  /* deleteHoliday  Function Start Here */
  public function deleteHoliday($id) {
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('holiday')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'holiday';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $holiday = Holiday::find($id);
    if ($holiday) {
      $holiday->delete();

      return redirect('holiday')->with([
        'message' => '节日删除成功'
      ]);

    } else {
      return redirect('holiday')->with([
        'message' => '没有节日信息',
        'message_important' => true
      ]);
    }
  }

  /* postEditHoliday  Function Start Here */
  public function postEditHoliday(Request $request) {

    $cmd = Input::get('cmd');
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('holiday/view-holiday/' . $cmd)->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'holiday';
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
      'date' => 'required', 'occasion' => 'required'
    ]);
    $niceNames = array(
      'date' => '日期',
      'occasion' => '节日'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('holiday/view-holiday/' . $cmd)->withErrors($v->errors());
    }

    $holiday = Holiday::find($cmd);
    if ($holiday) {

      $holiday->holiday = $request->date;
      $holiday->occasion = $request->occasion;
      $holiday->save();

      return redirect('holiday')->with([
        'message' => '节日更新成功'
      ]);

    } else {
      return redirect('holiday')->with([
        'message' => '节日已经存在',
        'message_important' => true
      ]);
    }
  }

}
