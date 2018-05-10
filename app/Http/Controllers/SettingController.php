<?php

namespace App\Http\Controllers;

use App\AppConfig;
use App\Award;
use App\Classes\permission;
use App\EmailTemplate;
use App\ExpenseTitle;
use App\Language;
use App\LanguageData;
use App\LeaveType;
use App\SMSGateway;
use App\TaxRuleDetails;
use App\TaxRules;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

date_default_timezone_set(app_config('Timezone'));

class SettingController extends Controller {
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  /* general  Function Start Here */
  public function general() {
    $self = 'system-settings';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $expense_title = ExpenseTitle::all();
    $leave_type = LeaveType::all();
    $award = Award::all();
    return view('admin.system-setting', compact('expense_title', 'leave_type', 'award'));
  }

  /* postGeneralSetting  Function Start Here */
  public function postGeneralSetting(Request $request) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/general')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'system-settings';
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
      'app_name' => 'required', 'app_title' => 'required', 'email' => 'required', 'footer' => 'required'
    ]);
    $niceNames = array(
      'app_name' => '应用名称',
      'app_title' => '应用标题',
      'email' => '系统邮箱地址',
      'footer' => '页脚'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/general')->withErrors($v->errors());
    }

    $destinationPath = public_path() . '/assets/img/';
    $save_path = 'assets/img/';

    $app_name = Input::get('app_name');
    $app_title = Input::get('app_title');
    $email = Input::get('email');
    $footer = Input::get('footer');
    $eg = Input::get('email_gateway');
    $app_logo = Input::file('app_logo');
    $app_fav = Input::file('app_fav');
    $address = Input::get('address');

    if ($eg != '') {
      AppConfig::where('setting', '=', 'Gateway')->update(['value' => $eg]);

      if ($eg == 'smtp') {

        $v = \Validator::make($request->all(), [
          'host_name' => 'required', 'user_name' => 'required', 'password' => 'required', 'port' => 'required', 'secure' => 'required'
        ]);
        $niceNames = array(
          'host_name' => '主机名',
          'user_name' => '用户名',
          'password' => '密码',
          'port' => '端口',
          'secure' => '加密类型'
        );
        $v->setAttributeNames($niceNames);
        if ($v->fails()) {
          return redirect('settings/general')->withErrors($v->errors());
        }

        $host_name = Input::get('host_name');
        $user_name = Input::get('user_name');
        $password = Input::get('password');
        $port = Input::get('port');
        $secure = Input::get('secure');

        AppConfig::where('setting', '=', 'SMTPHostName')->update(['value' => $host_name]);
        AppConfig::where('setting', '=', 'SMTPUserName')->update(['value' => $user_name]);
        AppConfig::where('setting', '=', 'SMTPPassword')->update(['value' => $password]);
        AppConfig::where('setting', '=', 'SMTPPort')->update(['value' => $port]);
        AppConfig::where('setting', '=', 'SMTPSecure')->update(['value' => $secure]);
      }
    }

    if ($app_name != '') {
      AppConfig::where('setting', '=', 'AppName')->update(['value' => $app_name]);
    }

    if ($app_title != '') {
      AppConfig::where('setting', '=', 'AppTitle')->update(['value' => $app_title]);
    }

    if ($email != '') {
      AppConfig::where('setting', '=', 'Email')->update(['value' => $email]);
    }

    if ($footer != '') {
      AppConfig::where('setting', '=', 'FooterTxt')->update(['value' => $footer]);
    }

    if ($address != '') {
      AppConfig::where('setting', '=', 'Address')->update(['value' => $address]);
    }

    if ($app_logo != '') {
      $app_logo_name = $app_logo->getClientOriginalName();
      Input::file('app_logo')->move($destinationPath, $app_logo_name);
      $or_path = $save_path . $app_logo_name;
      AppConfig::where('setting', '=', 'AppLogo')->update(['value' => $or_path]);
    }

    if ($app_fav != '') {
      $app_fav_name = $app_fav->getClientOriginalName();
      Input::file('app_fav')->move($destinationPath, $app_fav_name);
      $or_path = $save_path . $app_fav_name;
      AppConfig::where('setting', '=', 'AppFav')->update(['value' => $or_path]);
    }

    return redirect('settings/general')->with([
      'message' => '系统设置更新成功'
    ]);

  }

  /* postOfficeTime  Function Start Here */
  public function postOfficeTime(Request $request) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/general')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'system-settings';
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
      'office_in_time' => 'required', 'office_out_time' => 'required'
    ]);
    $niceNames = array(
      'office_in_time' => '上班时间',
      'office_out_time' => '下班时间'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/general')->withErrors($v->errors());
    }

    $office_in_time = Input::get('office_in_time');
    $office_out_time = Input::get('office_out_time');

    if ($office_in_time != '') {
      AppConfig::where('setting', '=', 'OfficeInTime')->update(['value' => $office_in_time]);
    }

    if ($office_out_time != '') {
      AppConfig::where('setting', '=', 'OfficeOutTime')->update(['value' => $office_out_time]);
    }

    return redirect('settings/general')->with([
      'message' => '系统设置更新成功'
    ]);

  }

  /* postExpenseTitle  Function Start Here */
  public function postExpenseTitle(Request $request) {
    $self = 'system-settings';
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
      'expense' => 'required'
    ]);
    $niceNames = array(
      'expense' => '报销标题'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/general')->withErrors($v->errors());
    }

    $expense_title = ExpenseTitle::firstOrCreate(['expense' => $request->expense]);

    if ($expense_title->wasRecentlyCreated) {
      return redirect('settings/general')->with([
        'message' => '报销标题增加成功'
      ]);

    } else {
      return redirect('settings/general')->with([
        'message' => '报销标题已经存在',
        'message_important' => true
      ]);
    }

  }

  /* postLeaveType  Function Start Here */
  public function postLeaveType(Request $request) {
    $self = 'system-settings';
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
      'leave' => 'required', 'leave_quota' => 'required'
    ]);
    $niceNames = array(
      'leave' => '请假类型',
      'leave_quota' => '请假限额'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/general')->withErrors($v->errors());
    }

    $leave_type = LeaveType::firstOrCreate(['leave' => $request->leave, 'leave_quota' => $request->leave_quota]);

    if ($leave_type->wasRecentlyCreated) {
      return redirect('settings/general')->with([
        'message' => '成功增加请假类型'
      ]);

    } else {
      return redirect('settings/general')->with([
        'message' => '请假类型已经存在',
        'message_important' => true
      ]);
    }

  }

  /* postAwardName  Function Start Here */
  public function postAwardName(Request $request) {
    $self = 'system-settings';
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
      'award' => 'required'
    ]);
    $niceNames = array(
      'award' => '奖励名称'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/general')->withErrors($v->errors());
    }

    $award_type = Award::firstOrCreate(['award' => $request->award]);

    if ($award_type->wasRecentlyCreated) {
      return redirect('settings/general')->with([
        'message' => '奖励增加成功'
      ]);

    } else {
      return redirect('settings/general')->with([
        'message' => '奖励已经存在',
        'message_important' => true
      ]);
    }

  }

  /* postJobFileExtension  Function Start Here */
  public function postJobFileExtension(Request $request) {
    $self = 'system-settings';
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
      'file_extension' => 'required'
    ]);
    $niceNames = array(
      'file_extension' => '文件扩展名'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/general')->withErrors($v->errors());
    }

    $file_extension = Input::get('file_extension');

    if ($file_extension != '') {
      AppConfig::where('setting', '=', 'JobFileExtension')->update(['value' => $file_extension]);
    }

    return redirect('settings/general')->with([
      'message' => '文件扩展名更新成功'
    ]);
  }

  /* localization  Function Start Here */
  public function localization() {
    $self = 'localization';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $language = Language::where('status', 'Active')->get();

    return view('admin.localization', compact('language'));
  }

  /* localizationPost  Function Start Here */
  public function localizationPost(Request $request) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/localization')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'localization';
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
      'country' => 'required', 'date_format' => 'required', 'language' => 'required',
      'currency_code' => 'required', 'currency_symbol' => 'required', 'timezone' => 'required'
    ]);
    $niceNames = array(
      'country' => '国家',
      'date_format' => '日期格式',
      'language' => '语言',
      'currency_code' => '货币代码',
      'currency_symbol' => '货币符号',
      'timezone' => '时区'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/localization')->withErrors($v->errors());
    }

    $country = Input::get('country');
    $date_format = Input::get('date_format');
    $language = Input::get('language');
    $currency_code = Input::get('currency_code');
    $currency_symbol = Input::get('currency_symbol');
    $get_timezone = Input::get('timezone');

    if ($country != '' AND $date_format != '' AND $language != '' AND $currency_code != '' AND $currency_symbol != '') {
      AppConfig::where('setting', '=', 'Country')->update(['value' => $country]);
      AppConfig::where('setting', '=', 'DateFormat')->update(['value' => $date_format]);
      AppConfig::where('setting', '=', 'Language')->update(['value' => $language]);
      AppConfig::where('setting', '=', 'Currency')->update(['value' => $currency_code]);
      AppConfig::where('setting', '=', 'CurrencyCode')->update(['value' => $currency_symbol]);
      AppConfig::where('setting', '=', 'Timezone')->update(['value' => $get_timezone]);

      return redirect('settings/localization')->with([
        'message' => '系统设置更新成功'
      ]);
    } else {
      return redirect('settings/localization')->with([
        'message' => '请重试',
        'message_important' => true
      ]);
    }

  }

  /* emailTemplates  Function Start Here */
  public function emailTemplates() {
    $self = 'email-templates';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $d = EmailTemplate::all();
    return view('admin.email-templates', compact('d'));
  }

  /* manageTemplate  Function Start Here */
  public function manageTemplate($id) {
    $self = 'email-templates';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $d = EmailTemplate::find($id);

    if ($d) {
      return view('admin.email-templates-manage', compact('d'));
    } else {
      return redirect('settings/email-templates')->with([
        'message' => 'Email Template Not Found',
        'message_important' => true
      ]);
    }

  }

  /* updateTemplate  Function Start Here */
  public function updateTemplate(Request $request) {
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/email-templates')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'email-templates';
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
      'subject' => 'required', 'status' => 'required', 'message' => 'required'
    ]);
    $niceNames = array(
      'subject' => '标题',
      'status' => '状态',
      'message' => '信息'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/email-template-manage/' . $cmd)->withErrors($v->errors());
    }

    $subject = Input::get('subject');
    $status = Input::get('status');
    $message = Input::get('message');

    EmailTemplate::where('id', '=', $cmd)->update([
      'subject' => $subject,
      'message' => $message,
      'status' => $status
    ]);

    return redirect('settings/email-template-manage/' . $cmd)->with([
      'message' => '邮件模板更新成功'
    ]);

  }

  /* languageSettings  Function Start Here */
  public function languageSettings() {
    $self = 'language';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $language = Language::all();
    return view('admin.language', compact('language'));
  }

  /* addLanguage  Function Start Here */
  public function addLanguage(Request $request) {
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/language-settings')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'add-language';
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
      'language_name' => 'required', 'status' => 'required', 'flag' => 'required'
    ]);
    $niceNames = array(
      'language_name' => '语言名称',
      'status' => '状态',
      'flag' => '旗帜'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/language-settings')->withErrors($v->errors());
    }

    $language_name = Input::get('language_name');
    $status = Input::get('status');
    $flag = Input::file('flag');

    $exist = Language::where('language', $language_name)->first();
    if ($exist) {
      return redirect('settings/language-settings')->with([
        'message' => 'Language Already Exist',
        'message_important' => true
      ]);
    }

    if ($flag != '') {
      $destinationPath = public_path() . '/assets/country_flag/';
      $flag_name = $flag->getClientOriginalName();
      Input::file('flag')->move($destinationPath, $flag_name);
    } else {
      $flag_name = '';
    }

    $language = Language::firstOrCreate(['language' => $language_name, 'status' => $status, 'icon' => $flag_name]);

    $lan_id = $language->id;

    if ($language->wasRecentlyCreated) {

      $data = [
        [
          'lan_id' => $lan_id,
          'lan_data' => 'Login',
          'lan_value' => 'Login'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Forget Password',
          'lan_value' => 'Forget Password'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Sign to your account',
          'lan_value' => 'Sign to your account'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'User Name',
          'lan_value' => 'User Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Password',
          'lan_value' => 'Password'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Remember Me',
          'lan_value' => 'Remember Me'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Reset your password',
          'lan_value' => 'Reset your password'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Email',
          'lan_value' => 'Email'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Reset My Password',
          'lan_value' => 'Reset My Password'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Back To Sign in',
          'lan_value' => 'Back To Sign in'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Dashboard',
          'lan_value' => 'Dashboard'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Departments',
          'lan_value' => 'Departments'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Designations',
          'lan_value' => 'Designations'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employees',
          'lan_value' => 'Employees'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'All Employees',
          'lan_value' => 'All Employees'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add Employee',
          'lan_value' => 'Add Employee'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Job Application',
          'lan_value' => 'Job Application'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Attendance',
          'lan_value' => 'Attendance'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Attendance Report',
          'lan_value' => 'Attendance Report'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Update Attendance',
          'lan_value' => 'Update Attendance'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave',
          'lan_value' => 'Leave'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Holiday',
          'lan_value' => 'Holiday'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Holiday Calender',
          'lan_value' => 'Holiday Calender'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New Holiday',
          'lan_value' => 'Add New Holiday'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Award',
          'lan_value' => 'Award'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Notice Board',
          'lan_value' => 'Notice Board'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Expense',
          'lan_value' => 'Expense'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payroll',
          'lan_value' => 'Payroll'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee Salary List',
          'lan_value' => 'Employee Salary List'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Make Payment',
          'lan_value' => 'Make Payment'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Generate Payslip',
          'lan_value' => 'Generate Payslip'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Task',
          'lan_value' => 'Task'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Support Tickets',
          'lan_value' => 'Support Tickets'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'All Support Tickets',
          'lan_value' => 'All Support Tickets'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Create New Ticket',
          'lan_value' => 'Create New Ticket'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Support Department',
          'lan_value' => 'Support Department'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Settings',
          'lan_value' => 'Settings'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'System Settings',
          'lan_value' => 'System Settings'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Localization',
          'lan_value' => 'Localization'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Email Templates',
          'lan_value' => 'Email Templates'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Language Settings',
          'lan_value' => 'Language Settings'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Recent 5 Leave Applications',
          'lan_value' => 'Recent 5 Leave Applications'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'See All Applications',
          'lan_value' => 'See All Applications'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Recent 5 Pending Tasks',
          'lan_value' => 'Recent 5 Pending Tasks'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'See All Tasks',
          'lan_value' => 'See All Tasks'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Recent 5 Pending Tickets',
          'lan_value' => 'Recent 5 Pending Tickets'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'See All Tickets',
          'lan_value' => 'See All Tickets'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Update Profile',
          'lan_value' => 'Update Profile'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Change Password',
          'lan_value' => 'Change Password'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Logout',
          'lan_value' => 'Logout'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Department',
          'lan_value' => 'Department'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add Department',
          'lan_value' => 'Add Department'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Account Department',
          'lan_value' => 'Account Department'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add',
          'lan_value' => 'Add'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'All Departments',
          'lan_value' => 'All Departments'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'SL',
          'lan_value' => 'SL'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Department Name',
          'lan_value' => 'Department Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Actions',
          'lan_value' => 'Actions'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Edit',
          'lan_value' => 'Edit'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Delete',
          'lan_value' => 'Delete'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Designations',
          'lan_value' => 'Designations'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add Designation',
          'lan_value' => 'Add Designation'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Designation Name',
          'lan_value' => 'Designation Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Software Engineer',
          'lan_value' => 'Software Engineer'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'All Designations',
          'lan_value' => 'All Designations'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Designation',
          'lan_value' => 'Designation'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Code',
          'lan_value' => 'Code'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Name',
          'lan_value' => 'Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Username',
          'lan_value' => 'Username'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Status',
          'lan_value' => 'Status'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Active',
          'lan_value' => 'Active'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Inactive',
          'lan_value' => 'Inactive'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'First Name',
          'lan_value' => 'First Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Last Name',
          'lan_value' => 'Last Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee Code',
          'lan_value' => 'Employee Code'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Unique For every User',
          'lan_value' => 'Unique For every User'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Confirm Password',
          'lan_value' => 'Confirm Password'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Select Department',
          'lan_value' => 'Select Department'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'User Role',
          'lan_value' => 'User Role'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Admin',
          'lan_value' => 'Admin'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee',
          'lan_value' => 'Employee'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'View Profile',
          'lan_value' => 'View Profile'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Phone',
          'lan_value' => 'Phone'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Address',
          'lan_value' => 'Address'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Personal Details',
          'lan_value' => 'Personal Details'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Bank Info',
          'lan_value' => 'Bank Info'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Document',
          'lan_value' => 'Document'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Change Picture',
          'lan_value' => 'Change Picture'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave blank if you no need to change password',
          'lan_value' => 'Leave blank if you no need to change password'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Date Of Join',
          'lan_value' => 'Date Of Join'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Date Of Leave',
          'lan_value' => 'Date Of Leave'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Phone Number',
          'lan_value' => 'Phone Number'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Alternative Phone',
          'lan_value' => 'Alternative Phone'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Father Name',
          'lan_value' => 'Father Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Mother Name',
          'lan_value' => 'Mother Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Date Of Birth',
          'lan_value' => 'Date Of Birth'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Present Address',
          'lan_value' => 'Present Address'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Permanent Address',
          'lan_value' => 'Permanent Address'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Update',
          'lan_value' => 'Update'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add Bank Account',
          'lan_value' => 'Add Bank Account'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Bank Name',
          'lan_value' => 'Bank Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Branch Name',
          'lan_value' => 'Branch Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Account Name',
          'lan_value' => 'Account Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Account Number',
          'lan_value' => 'Account Number'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'IFSC Code',
          'lan_value' => 'IFSC Code'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'PAN Number',
          'lan_value' => 'PAN Number'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'All Bank Accounts',
          'lan_value' => 'All Bank Accounts'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Branch',
          'lan_value' => 'Branch'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Account No',
          'lan_value' => 'Account No'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'PAN No',
          'lan_value' => 'PAN No'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add Document',
          'lan_value' => 'Add Document'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Document Name',
          'lan_value' => 'Document Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Select Document',
          'lan_value' => 'Select Document'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Browse',
          'lan_value' => 'Browse'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'All Documents',
          'lan_value' => 'All Documents'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Download',
          'lan_value' => 'Download'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Job Applications',
          'lan_value' => 'Job Applications'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New Job',
          'lan_value' => 'Add New Job'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Position',
          'lan_value' => 'Position'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Posted Date',
          'lan_value' => 'Posted Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Apply Last Date',
          'lan_value' => 'Apply Last Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Close Date',
          'lan_value' => 'Close Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Open',
          'lan_value' => 'Open'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Drafted',
          'lan_value' => 'Drafted'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Closed',
          'lan_value' => 'Closed'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Applicants',
          'lan_value' => 'Applicants'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Number Of Post',
          'lan_value' => 'Number Of Post'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Post Date',
          'lan_value' => 'Post Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Last Date To Apply',
          'lan_value' => 'Last Date To Apply'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Description',
          'lan_value' => 'Description'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Close',
          'lan_value' => 'Close'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Search Condition',
          'lan_value' => 'Search Condition'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Date',
          'lan_value' => 'Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Select Employee',
          'lan_value' => 'Select Employee'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Select Designation',
          'lan_value' => 'Select Designation'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Search',
          'lan_value' => 'Search'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee Name',
          'lan_value' => 'Employee Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Clock In',
          'lan_value' => 'Clock In'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Clock Out',
          'lan_value' => 'Clock Out'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Late',
          'lan_value' => 'Late'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Early Leaving',
          'lan_value' => 'Early Leaving'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Overtime',
          'lan_value' => 'Overtime'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Total Work',
          'lan_value' => 'Total Work'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Absent',
          'lan_value' => 'Absent'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Present',
          'lan_value' => 'Present'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Set Overtime',
          'lan_value' => 'Set Overtime'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave Application',
          'lan_value' => 'Leave Application'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave Type',
          'lan_value' => 'Leave Type'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave From',
          'lan_value' => 'Leave From'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave To',
          'lan_value' => 'Leave To'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Approved',
          'lan_value' => 'Approved'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Pending',
          'lan_value' => 'Pending'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Rejected',
          'lan_value' => 'Rejected'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'View',
          'lan_value' => 'View'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'View Application',
          'lan_value' => 'View Application'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Applied On',
          'lan_value' => 'Applied On'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave Reason',
          'lan_value' => 'Leave Reason'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Current Status',
          'lan_value' => 'Current Status'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Change Status',
          'lan_value' => 'Change Status'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Remark',
          'lan_value' => 'Remark'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Update',
          'lan_value' => 'Update'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Prev',
          'lan_value' => 'Prev'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'This Month',
          'lan_value' => 'This Month'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Next',
          'lan_value' => 'Next'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Occasion Name',
          'lan_value' => 'Occasion Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Occasion',
          'lan_value' => 'Occasion'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Award List',
          'lan_value' => 'Award List'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New Award',
          'lan_value' => 'Add New Award'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Award Name',
          'lan_value' => 'Award Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Gift',
          'lan_value' => 'Gift'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Month',
          'lan_value' => 'Month'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Gift Item',
          'lan_value' => 'Gift Item'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Cash Price',
          'lan_value' => 'Cash Price'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'January',
          'lan_value' => 'January'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'February',
          'lan_value' => 'February'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'March',
          'lan_value' => 'March'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'April',
          'lan_value' => 'April'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'May',
          'lan_value' => 'May'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'June',
          'lan_value' => 'June'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'July',
          'lan_value' => 'July'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'August',
          'lan_value' => 'August'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'September',
          'lan_value' => 'September'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'October',
          'lan_value' => 'October'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'November',
          'lan_value' => 'November'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'December',
          'lan_value' => 'December'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Year',
          'lan_value' => 'Year'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Edit Award',
          'lan_value' => 'Edit Award'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New Notice',
          'lan_value' => 'Add New Notice'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Title',
          'lan_value' => 'Title'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Published',
          'lan_value' => 'Published'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Unpublished',
          'lan_value' => 'Unpublished'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Notice Title',
          'lan_value' => 'Notice Title'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Notice Status',
          'lan_value' => 'Notice Status'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Edit Notice',
          'lan_value' => 'Edit Notice'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Expense List',
          'lan_value' => 'Expense List'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New Expense',
          'lan_value' => 'Add New Expense'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Item Name',
          'lan_value' => 'Item Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Purchase From',
          'lan_value' => 'Purchase From'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Purchase Date',
          'lan_value' => 'Purchase Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Amount',
          'lan_value' => 'Amount'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Cancel',
          'lan_value' => 'Cancel'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Bill Copy',
          'lan_value' => 'Bill Copy'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Purchase By',
          'lan_value' => 'Purchase By'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Edit Expense',
          'lan_value' => 'Edit Expense'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Working Hourly Rate',
          'lan_value' => 'Working Hourly Rate'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Overtime Hourly Rate',
          'lan_value' => 'Overtime Hourly Rate'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Edit Employee Salary',
          'lan_value' => 'Edit Employee Salary'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Hourly Working Rate',
          'lan_value' => 'Hourly Working Rate'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Hourly Overtime Rate',
          'lan_value' => 'Hourly Overtime Rate'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payment Amount',
          'lan_value' => 'Payment Amount'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Details',
          'lan_value' => 'Details'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Pay Payment',
          'lan_value' => 'Pay Payment'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payment For',
          'lan_value' => 'Payment For'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Net Salary',
          'lan_value' => 'Net Salary'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Overtime Salary',
          'lan_value' => 'Overtime Salary'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payment Type',
          'lan_value' => 'Payment Type'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Cash Payment',
          'lan_value' => 'Cash Payment'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Bank Payment',
          'lan_value' => 'Bank Payment'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Cheque Payment',
          'lan_value' => 'Cheque Payment'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Pay',
          'lan_value' => 'Pay'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'All Payments',
          'lan_value' => 'All Payments'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payment Month',
          'lan_value' => 'Payment Month'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payment Date',
          'lan_value' => 'Payment Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Paid Amount',
          'lan_value' => 'Paid Amount'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payslip',
          'lan_value' => 'Payslip'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Task List',
          'lan_value' => 'Task List'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New Task',
          'lan_value' => 'Add New Task'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Created Date',
          'lan_value' => 'Created Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Due Date',
          'lan_value' => 'Due Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Completed',
          'lan_value' => 'Completed'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Started',
          'lan_value' => 'Started'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Task Title',
          'lan_value' => 'Task Title'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Assign To',
          'lan_value' => 'Assign To'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Start Date',
          'lan_value' => 'Start Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Estimated Hour',
          'lan_value' => 'Estimated Hour'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Progress',
          'lan_value' => 'Progress'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Edit Task',
          'lan_value' => 'Edit Task'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Manage Task',
          'lan_value' => 'Manage Task'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Task Basic Info',
          'lan_value' => 'Task Basic Info'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Task Management',
          'lan_value' => 'Task Management'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Task Details',
          'lan_value' => 'Task Details'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Task Discussion',
          'lan_value' => 'Task Discussion'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Task Files',
          'lan_value' => 'Task Files'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Task Description',
          'lan_value' => 'Task Description'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Task Members',
          'lan_value' => 'Task Members'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave Comment',
          'lan_value' => 'Leave Comment'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Reply',
          'lan_value' => 'Reply'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Member',
          'lan_value' => 'Member'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Comment',
          'lan_value' => 'Comment'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Last Update',
          'lan_value' => 'Last Update'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'File Title',
          'lan_value' => 'File Title'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Files',
          'lan_value' => 'Files'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Upload',
          'lan_value' => 'Upload'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Size',
          'lan_value' => 'Size'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Upload By',
          'lan_value' => 'Upload By'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Select File',
          'lan_value' => 'Select File'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Subject',
          'lan_value' => 'Subject'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Answered',
          'lan_value' => 'Answered'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Customer Reply',
          'lan_value' => 'Customer Reply'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Department Email',
          'lan_value' => 'Department Email'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Show in Client',
          'lan_value' => 'Show in Client'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Yes',
          'lan_value' => 'Yes'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'No',
          'lan_value' => 'No'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New',
          'lan_value' => 'Add New'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Manage',
          'lan_value' => 'Manage'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'View Department',
          'lan_value' => 'View Department'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Ticket For Client',
          'lan_value' => 'Ticket For Client'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Message',
          'lan_value' => 'Message'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Create Ticket',
          'lan_value' => 'Create Ticket'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Manage Support Ticket',
          'lan_value' => 'Manage Support Ticket'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Change Basic Info',
          'lan_value' => 'Change Basic Info'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Change Department',
          'lan_value' => 'Change Department'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Ticket Management',
          'lan_value' => 'Ticket Management'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Ticket Details',
          'lan_value' => 'Ticket Details'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Ticket Discussion',
          'lan_value' => 'Ticket Discussion'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Ticket Files',
          'lan_value' => 'Ticket Files'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Ticket For',
          'lan_value' => 'Ticket For'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Created By',
          'lan_value' => 'Created By'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Closed By',
          'lan_value' => 'Closed By'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Reply Ticket',
          'lan_value' => 'Reply Ticket'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'General',
          'lan_value' => 'General'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Office Time',
          'lan_value' => 'Office Time'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Job',
          'lan_value' => 'Job'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Application Name',
          'lan_value' => 'Application Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Application Title',
          'lan_value' => 'Application Title'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'System Email',
          'lan_value' => 'System Email'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Remember: All Email Going to the Receiver from this Email',
          'lan_value' => 'Remember: All Email Going to the Receiver from this Email'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Footer Text',
          'lan_value' => 'Footer Text'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Application Logo',
          'lan_value' => 'Application Logo'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Application Favicon',
          'lan_value' => 'Application Favicon'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Email Gateway',
          'lan_value' => 'Email Gateway'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'SMTP Host Name',
          'lan_value' => 'SMTP Host Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'SMTP User Name',
          'lan_value' => 'SMTP User Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'SMTP Password',
          'lan_value' => 'SMTP Password'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'SMTP Port',
          'lan_value' => 'SMTP Port'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'SMTP Secure',
          'lan_value' => 'SMTP Secure'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Office In Time',
          'lan_value' => 'Office In Time'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Office Out Time',
          'lan_value' => 'Office Out Time'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New Expense Title',
          'lan_value' => 'Add New Expense Title'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Expense Title',
          'lan_value' => 'Expense Title'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee Salary',
          'lan_value' => 'Employee Salary'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Expense Title List',
          'lan_value' => 'Expense Title List'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave Title',
          'lan_value' => 'Leave Title'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Sick Leave',
          'lan_value' => 'Sick Leave'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave Quota',
          'lan_value' => 'Leave Quota'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Leave Title List',
          'lan_value' => 'Leave Title List'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Best Employee',
          'lan_value' => 'Best Employee'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Job File Extension',
          'lan_value' => 'Job File Extension'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Supported File Extension',
          'lan_value' => 'Supported File Extension'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Remember: File Extension Separated By Comma',
          'lan_value' => 'Remember: File Extension Separated By Comma'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Award Name List',
          'lan_value' => 'Award Name List'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Save',
          'lan_value' => 'Save'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Default Country',
          'lan_value' => 'Default Country'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Date Format',
          'lan_value' => 'Date Format'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Default Language',
          'lan_value' => 'Default Language'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Current Code',
          'lan_value' => 'Current Code'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Current Symbol',
          'lan_value' => 'Current Symbol'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Email Templates',
          'lan_value' => 'Email Templates'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Template Name',
          'lan_value' => 'Template Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Manage Email Template',
          'lan_value' => 'Manage Email Template'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Language',
          'lan_value' => 'Language'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add Language',
          'lan_value' => 'Add Language'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Language Name',
          'lan_value' => 'Language Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Flag',
          'lan_value' => 'Flag'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'All Languages',
          'lan_value' => 'All Languages'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Translate',
          'lan_value' => 'Translate'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'To',
          'lan_value' => 'To'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Current Password',
          'lan_value' => 'Current Password'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'New Password',
          'lan_value' => 'New Password'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'All Leave Details',
          'lan_value' => 'All Leave Details'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Total Leave',
          'lan_value' => 'Total Leave'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'New Leave',
          'lan_value' => 'New Leave'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Request For New Leave',
          'lan_value' => 'Request For New Leave'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Send',
          'lan_value' => 'Send'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Published Date',
          'lan_value' => 'Published Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payment History',
          'lan_value' => 'Payment History'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payment Salary Details',
          'lan_value' => 'Payment Salary Details'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Print Payslip',
          'lan_value' => 'Print Payslip'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Salary Month',
          'lan_value' => 'Salary Month'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee ID',
          'lan_value' => 'Employee ID'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payslip NO',
          'lan_value' => 'Payslip NO'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Joining Date',
          'lan_value' => 'Joining Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payment By',
          'lan_value' => 'Payment By'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Payment Details',
          'lan_value' => 'Payment Details'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Earning',
          'lan_value' => 'Earning'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Grand Total',
          'lan_value' => 'Grand Total'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Overtime Amount',
          'lan_value' => 'Overtime Amount'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Job Type',
          'lan_value' => 'Job Type'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Contractual',
          'lan_value' => 'Contractual'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Part Time',
          'lan_value' => 'Part Time'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Full Time',
          'lan_value' => 'Full Time'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Experience',
          'lan_value' => 'Experience'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Age',
          'lan_value' => 'Age'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Job Location',
          'lan_value' => 'Job Location'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Salary Range',
          'lan_value' => 'Salary Range'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Short Description',
          'lan_value' => 'Short Description'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Edit Job',
          'lan_value' => 'Edit Job'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'All Jobs',
          'lan_value' => 'All Jobs'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Home',
          'lan_value' => 'Home'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Jobs',
          'lan_value' => 'Jobs'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Deadline',
          'lan_value' => 'Deadline'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Job Summary',
          'lan_value' => 'Job Summary'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Published on',
          'lan_value' => 'Published on'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Application Deadline',
          'lan_value' => 'Application Deadline'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Apply Now',
          'lan_value' => 'Apply Now'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Apply For',
          'lan_value' => 'Apply For'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Upload Resume',
          'lan_value' => 'Upload Resume'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Apply',
          'lan_value' => 'Apply'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Language Manage',
          'lan_value' => 'Language Manage'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'View All',
          'lan_value' => 'View All'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Expense Request',
          'lan_value' => 'Expense Request'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Recent',
          'lan_value' => 'Recent'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Tasks',
          'lan_value' => 'Tasks'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Timezone',
          'lan_value' => 'Timezone'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Today is',
          'lan_value' => 'Today is'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Time',
          'lan_value' => 'Time'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Notice',
          'lan_value' => 'Notice'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Total',
          'lan_value' => 'Total'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Subtotal',
          'lan_value' => 'Subtotal'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'TAX',
          'lan_value' => 'TAX'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Edit Department',
          'lan_value' => 'Edit Department'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Job Applicants',
          'lan_value' => 'Job Applicants'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Unread',
          'lan_value' => 'Unread'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Primary Selected',
          'lan_value' => 'Primary Selected'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Call For Interview',
          'lan_value' => 'Call For Interview'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Confirm',
          'lan_value' => 'Confirm'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Rejected',
          'lan_value' => 'Rejected'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Resume',
          'lan_value' => 'Resume'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Status',
          'lan_value' => 'Status'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'View Holiday',
          'lan_value' => 'View Holiday'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Tax Rules',
          'lan_value' => 'Tax Rules'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add Tax Rule',
          'lan_value' => 'Add Tax Rule'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Tax Rule Name',
          'lan_value' => 'Tax Rule Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Set Rules',
          'lan_value' => 'Set Rules'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Save Values',
          'lan_value' => 'Save Values'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Salary From',
          'lan_value' => 'Salary From'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Salary To',
          'lan_value' => 'Salary To'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Tax Percentage',
          'lan_value' => 'Tax Percentage'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Additional Tax Amount',
          'lan_value' => 'Additional Tax Amount'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Gender',
          'lan_value' => 'Gender'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Both',
          'lan_value' => 'Both'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Male',
          'lan_value' => 'Male'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Female',
          'lan_value' => 'Female'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Remove',
          'lan_value' => 'Remove'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add More',
          'lan_value' => 'Add More'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Provident Fund',
          'lan_value' => 'Provident Fund'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Provident Fund Type',
          'lan_value' => 'Provident Fund Type'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee Share',
          'lan_value' => 'Employee Share'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Organization Share',
          'lan_value' => 'Organization Share'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Paid',
          'lan_value' => 'Paid'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Unpaid',
          'lan_value' => 'Unpaid'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Loan',
          'lan_value' => 'Loan'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Repayment Start Date',
          'lan_value' => 'Repayment Start Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Remaining Amount',
          'lan_value' => 'Remaining Amount'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Ongoing',
          'lan_value' => 'Ongoing'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Include Loan Amount in Payslip',
          'lan_value' => 'Include Loan Amount in Payslip'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Monthly Repayment Amount',
          'lan_value' => 'Monthly Repayment Amount'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee Salary Increment',
          'lan_value' => 'Employee Salary Increment'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'SMS Gateways',
          'lan_value' => 'SMS Gateways'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Gateway Name',
          'lan_value' => 'Gateway Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'API Link',
          'lan_value' => 'API Link'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Tax Template',
          'lan_value' => 'Tax Template'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Salary Type',
          'lan_value' => 'Salary Type'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Monthly',
          'lan_value' => 'Monthly'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Hourly',
          'lan_value' => 'Hourly'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Basic Salary',
          'lan_value' => 'Basic Salary'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Overtime Salary',
          'lan_value' => 'Overtime Salary'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Reports',
          'lan_value' => 'Reports'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee Payroll Summery',
          'lan_value' => 'Employee Payroll Summery'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'No working hour',
          'lan_value' => 'No working hour'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add with basic salary',
          'lan_value' => 'Add with basic salary'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Salary Statement',
          'lan_value' => 'Salary Statement'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Date From',
          'lan_value' => 'Date From'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Date To',
          'lan_value' => 'Date To'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Find',
          'lan_value' => 'Find'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Send Email',
          'lan_value' => 'Send Email'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Send SMS',
          'lan_value' => 'Send SMS'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'For',
          'lan_value' => 'For'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee Summery',
          'lan_value' => 'Employee Summery'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Set Working Rate',
          'lan_value' => 'Set Working Rate'
        ],

        /*Version 1.5*/

        [
          'lan_id' => $lan_id,
          'lan_data' => 'Generate PDF',
          'lan_value' => 'Generate PDF'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Training',
          'lan_value' => 'Training'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Training Needs Assessment',
          'lan_value' => 'Training Needs Assessment'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Training Events',
          'lan_value' => 'Training Events'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Trainers',
          'lan_value' => 'Trainers'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Trainer',
          'lan_value' => 'Trainer'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Training Evaluations',
          'lan_value' => 'Training Evaluations'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New Trainer',
          'lan_value' => 'Add New Trainer'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Organization',
          'lan_value' => 'Organization'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'City',
          'lan_value' => 'City'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'State',
          'lan_value' => 'State'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Country',
          'lan_value' => 'Country'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Zip Code',
          'lan_value' => 'Zip Code'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Trainer Expertise',
          'lan_value' => 'Trainer Expertise'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'View Trainer Info',
          'lan_value' => 'View Trainer Info'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee Training',
          'lan_value' => 'Employee Training'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New Training',
          'lan_value' => 'Add New Training'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Training Type',
          'lan_value' => 'Training Type'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Training From',
          'lan_value' => 'Training From'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Training To',
          'lan_value' => 'Training To'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Online Training',
          'lan_value' => 'Online Training'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Seminar',
          'lan_value' => 'Seminar'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Lecture',
          'lan_value' => 'Lecture'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Workshop',
          'lan_value' => 'Workshop'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Hands On Training',
          'lan_value' => 'Hands On Training'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Webinar',
          'lan_value' => 'Webinar'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'HR Training',
          'lan_value' => 'HR Training'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employees Development',
          'lan_value' => 'Employees Development'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'IT Training',
          'lan_value' => 'IT Training'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Finance Training',
          'lan_value' => 'Finance Training'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Nature Of Training',
          'lan_value' => 'Nature Of Training'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Internal',
          'lan_value' => 'Internal'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'External',
          'lan_value' => 'External'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Training Location',
          'lan_value' => 'Training Location'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Sponsored By',
          'lan_value' => 'Sponsored By'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Organized By',
          'lan_value' => 'Organized By'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'View Employee Training',
          'lan_value' => 'View Employee Training'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Preferred',
          'lan_value' => 'Preferred'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'End Date',
          'lan_value' => 'End Date'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Reason',
          'lan_value' => 'Reason'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Training Cost',
          'lan_value' => 'Training Cost'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Travel Cost',
          'lan_value' => 'Travel Cost'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Add New Event',
          'lan_value' => 'Add New Event'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Upcoming',
          'lan_value' => 'Upcoming'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Externals',
          'lan_value' => 'Externals'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Employee Roles',
          'lan_value' => 'Employee Roles'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Role Name',
          'lan_value' => 'Role Name'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'Set Roles',
          'lan_value' => 'Set Roles'
        ], [
          'lan_id' => $lan_id,
          'lan_data' => 'My Portal',
          'lan_value' => 'My Portal'
        ]
      ];

      foreach ($data as $d) {
        LanguageData::create($d);
      }

      return redirect('settings/language-settings')->with([
        'message' => '语言增加成功'
      ]);

    } else {
      return redirect('settings/language-settings')->with([
        'message' => 'Language Already Exist',
        'message_important' => true
      ]);
    }

  }

  /* translateLanguage  Function Start Here */
  public function translateLanguage($lid) {
    $self = 'language';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $lan_name = Language::find($lid)->language;
    $lan_data = LanguageData::where('lan_id', $lid)->get();
    return view('admin.language-translation', compact('lan_name', 'lan_data', 'lid'));

  }

  /* translateLanguagePost  Function Start Here */
  public function translateLanguagePost(Request $request) {
    $lan_id = Input::get('lan_id');

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/language-settings-translate/' . $lan_id)->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'language';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $english_data = Input::get('english_data');
    $translate_data = Input::get('translate_data');

    $lan_data = array_combine($english_data, $translate_data);
    LanguageData::where('lan_id', $lan_id)->delete();

    foreach ($lan_data as $english => $translate) {
      LanguageData::create([
        'lan_id' => $lan_id,
        'lan_data' => $english,
        'lan_value' => $translate
      ]);
    }

    return redirect('settings/language-settings-translate/' . $lan_id)->with([
      'message' => '语言翻译成功'
    ]);
  }

  /* languageSettingsManage  Function Start Here */
  public function languageSettingsManage($id) {
    $self = 'language';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $lan = Language::find($id);

    if ($lan) {
      return view('admin.language-setting-manage', compact('lan'));
    } else {
      return redirect('settings/language-settings')->with([
        'message' => '没有语言',
        'message_important' => true
      ]);
    }
  }

  /* languageSettingManagePost  Function Start Here */
  public function languageSettingManagePost(Request $request) {
    $cmd = Input::get('cmd');

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/language-settings-manage/' . $cmd)->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'language';
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
      'language_name' => 'required', 'status' => 'required'
    ]);
    $niceNames = array(
      'language_name' => '语言名称',
      'status' => '状态'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/language-settings-manage/' . $cmd)->withErrors($v->errors());
    }

    $language_name = Input::get('language_name');
    $status = Input::get('status');
    $flag = Input::file('flag');

    $exist = Language::where('language', $language_name)->first();
    if ($exist->language != $language_name) {
      if ($exist) {
        return redirect('settings/language-settings-manage/' . $cmd)->with([
          'message' => '语言已经存在',
          'message_important' => true
        ]);
      }
    }

    if ($flag != '') {
      $destinationPath = public_path() . '/assets/country_flag/';
      $flag_name = $flag->getClientOriginalName();
      Input::file('flag')->move($destinationPath, $flag_name);
    } else {
      $flag_name = $exist->icon;
    }

    $lan = Language::find($cmd);

    if ($lan) {
      $lan->language = $language_name;
      $lan->status = $status;
      $lan->icon = $flag_name;
      $lan->save();

      return redirect('settings/language-settings')->with([
        'message' => '语言更新成功'
      ]);
    } else {
      return redirect('settings/language-settings')->with([
        'message' => '没有语言',
        'message_important' => true
      ]);
    }

  }

  /* languageChange  Function Start Here */
  public function languageChange($id) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('dashboard')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $lang = Language::find($id);
    if ($lang) {
      AppConfig::where('setting', '=', 'Language')->update(['value' => $id]);
      return redirect('dashboard')->with([
        'message' => '语言更新成功'
      ]);
    } else {
      return redirect('dashboard')->with([
        'message' => '没有语言',
        'message_important' => true
      ]);
    }
  }

  /* deleteExpense  Function Start Here */
  public function deleteExpense($id) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/general')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'system-settings';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $expense = ExpenseTitle::find($id);

    if ($expense) {
      $expense->delete();

      return redirect('settings/general')->with([
        'message' => '报销标题删除成功'
      ]);
    } else {
      return redirect('settings/general')->with([
        'message' => '没有报销标题',
        'message_important' => true
      ]);
    }
  }

  /* deleteLeave  Function Start Here */
  public function deleteLeave($id) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/general')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'system-settings';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $leave = LeaveType::find($id);

    if ($leave) {
      $leave->delete();

      return redirect('settings/general')->with([
        'message' => '请假类型删除成功'
      ]);
    } else {
      return redirect('settings/general')->with([
        'message' => '没有请假类型',
        'message_important' => true
      ]);
    }

  }

  /* deleteAward  Function Start Here */
  public function deleteAward($id) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/general')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'system-settings';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $award = Award::find($id);
    if ($award) {
      $award->delete();

      return redirect('settings/general')->with([
        'message' => '奖励名称删除成功'
      ]);
    } else {
      return redirect('settings/general')->with([
        'message' => '没有奖励名称',
        'message_important' => true
      ]);
    }

  }

  /* updateExpenseTitle  Function Start Here */
  public function updateExpenseTitle(Request $request) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/general')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }
    $self = 'system-settings';
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
      'expense' => 'required'
    ]);
    $niceNames = array(
      'expense' => '报销标题'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/general')->withErrors($v->errors());
    }

    $expense_title = ExpenseTitle::find($cmd);

    if ($expense_title) {

      if ($request->expense != $expense_title->expense) {
        $exist = ExpenseTitle::where('expense', $request->expense)->first();
        if ($exist) {

          return redirect('settings/general')->with([
            'message' => '报销标题已经存在',
            'message_important' => true
          ]);
        }
      }

      $expense_title->expense = $request->expense;
      $expense_title->save();

      return redirect('settings/general')->with([
        'message' => '报销标题更新成功'
      ]);

    } else {
      return redirect('settings/general')->with([
        'message' => '没有报销标题',
        'message_important' => true
      ]);
    }

  }

  /* updateLeaveType  Function Start Here */
  public function updateLeaveType(Request $request) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/general')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'system-settings';
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
      'leave' => 'required', 'leave_quota' => 'required'
    ]);
    $niceNames = array(
      'leave' => '请假类型',
      'leave_quota' => '请假限额'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/general')->withErrors($v->errors());
    }

    $leave_type = LeaveType::find($cmd);

    if ($leave_type) {
      if ($leave_type->leave != $request->leave) {
        $exist = LeaveType::where('leave', $request->leave)->first();
        if ($exist) {
          return redirect('settings/general')->with([
            'message' => '请假类型已经存在',
            'message_important' => true
          ]);
        }
      }

      $leave_type->leave = $request->leave;
      $leave_type->leave_quota = $request->leave_quota;
      $leave_type->save();

      return redirect('settings/general')->with([
        'message' => '请假类型更新成功'
      ]);

    } else {
      return redirect('settings/general')->with([
        'message' => '没有请假类型',
        'message_important' => true
      ]);
    }

  }

  /* updateAwardName  Function Start Here */
  public function updateAwardName(Request $request) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/general')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'system-settings';
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
      'award' => 'required'
    ]);
    $niceNames = array(
      'award' => '奖励名称'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/general')->withErrors($v->errors());
    }

    $award_type = Award::find($cmd);

    if ($award_type) {

      if ($award_type->award != $request->award) {
        $exist = Award::where('award', $request->award)->first();
        if ($exist) {
          return redirect('settings/general')->with([
            'message' => '奖励已经存在',
            'message_important' => true
          ]);
        }
      }

      $award_type->award = $request->award;
      $award_type->save();

      return redirect('settings/general')->with([
        'message' => '奖励更新成功'
      ]);

    } else {
      return redirect('settings/general')->with([
        'message' => '没有奖励',
        'message_important' => true
      ]);
    }

  }

  /* taxRules  Function Start Here */
  public function taxRules() {
    $self = 'tax-rules';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $tax_rules = TaxRules::all();
    return view('admin.tax-rules', compact('tax_rules'));
  }

  /* postNewTax  Function Start Here */
  public function postNewTax(Request $request) {
    $self = 'add-tax-rule';
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
      'tax_rule_name' => 'required', 'status' => 'required'
    ]);
    $niceNames = array(
      'tax_rule_name' => '规则名称',
      'status' => '状态'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/tax-rules')->withErrors($v->errors());
    }

    $tax_rules = TaxRules::firstOrCreate(['tax_name' => $request->tax_rule_name, 'status' => $request->status]);

    if ($tax_rules->wasRecentlyCreated) {
      return redirect('settings/tax-rules')->with([
        'message' => '成功增加税收规则'
      ]);

    } else {
      return redirect('settings/tax-rules')->with([
        'message' => '税收规则已经存在',
        'message_important' => true
      ]);
    }

  }

  /* setRules  Function Start Here */
  public function setRules($tid) {
    $self = 'tax-rules';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $tax_rule = TaxRuleDetails::where('tax_id', $tid)->get();

    return view('admin.tax-rules-details', compact('tax_rule', 'tid'));
  }

  /* postSetRules  Function Start Here */
  public function postSetRules(Request $request) {
    $cmd = Input::get('cmd');

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('tax-rules/set-rules/' . $cmd)->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'tax-rules';
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
      'salary_from' => 'required', 'salary_to' => 'required', 'tax_percentage' => 'required', 'gender' => 'required'
    ]);
    $niceNames = array(
      'salary_from' => '起始值',
      'salary_to' => '结束值',
      'tax_percentage' => '税率（%）',
      'gender' => '性别'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('tax-rules/set-rules/' . $cmd)->withErrors($v->errors());
    }

    $salary_from = Input::get('salary_from');
    $salary_to = Input::get('salary_to');
    $tax_percentage = Input::get('tax_percentage');
    $additional_tax_amount = Input::get('additional_tax_amount');
    $gender = Input::get('gender');

    TaxRuleDetails::where('tax_id', $cmd)->delete();

    $i = '0';

    foreach ($gender as $g) {
      if ($salary_from[$i] !== '') {
        $trd = new TaxRuleDetails();
        $trd->tax_id = $cmd;
        $trd->salary_from = $salary_from[$i];
        $trd->salary_to = $salary_to[$i];
        $trd->tax_percentage = $tax_percentage[$i];
        $trd->additional_tax_amount = $additional_tax_amount[$i];
        $trd->gender = $g;
        $trd->save();
        $i++;
      }
    }

    return redirect('tax-rules/set-rules/' . $cmd)->with([
      'message' => '成功更新税收规则'
    ]);

  }

  /* deleteTaxRule  Function Start Here */
  public function deleteTaxRule($id) {
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/tax-rules')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }
    $self = 'tax-rules';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $tax_rules = TaxRules::find($id);

    if ($tax_rules) {
      TaxRuleDetails::where('tax_id', $id)->delete();
      $tax_rules->delete();

      return redirect('settings/tax-rules')->with([
        'message' => '税收规则删除成功'
      ]);
    } else {

      return redirect('settings/tax-rules')->with([
        'message' => '没有税收规则',
        'message_important' => true
      ]);
    }

  }

  /* postUpdateTaxRules  Function Start Here */
  public function postUpdateTaxRules(Request $request) {
    $cmd = Input::get('cmd');

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/tax-rules')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'tax-rules';
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
      'tax_rule_name' => 'required', 'status' => 'required'
    ]);
    $niceNames = array(
      'tax_rule_name' => '规则名称',
      'status' => '状态'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/tax-rules')->withErrors($v->errors());
    }

    $tax_rules = TaxRules::find($cmd);

    if ($tax_rules) {
      if ($tax_rules->tax_name != $request->tax_rule_name) {
        $exist = TaxRules::where('tax_name', $request->tax_rule_name)->first();
        if ($exist) {
          return redirect('settings/tax-rules')->with([
            'message' => '税收规则已经存在',
            'message_important' => true
          ]);
        }
      }

      $tax_rules->tax_name = $request->tax_rule_name;
      $tax_rules->status = $request->status;
      $tax_rules->save();

      return redirect('settings/tax-rules')->with([
        'message' => '成功更新税收规则'
      ]);

    } else {

      return redirect('settings/tax-rules')->with([
        'message' => '没有税收规则信息',
        'message_important' => true
      ]);
    }

  }

  /* smsGateways  Function Start Here */
  public function smsGateways() {
    $self = 'sms-gateways';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $sms_gateway = SMSGateway::all();

    return view('admin.sms-gateway', compact('sms_gateway'));
  }

  /* smsGatewayManage  Function Start Here */
  public function smsGatewayManage($id) {
    $self = 'sms-gateways';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $sg = SMSGateway::find($id);

    if ($sg) {
      return view('admin.sms-gateway-manage', compact('sg'));
    } else {
      return redirect('settings/sms-gateways')->with([
        'message' => 'Gateway information not found',
        'message_important' => true
      ]);
    }
  }

  /* smsGatewayUpdate  Function Start Here */
  public function smsGatewayUpdate(Request $request) {
    $cmd = Input::get('cmd');
    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('settings/sms-gateways-manage/' . $cmd)->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'sms-gateways';
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
      'user_name' => 'required', 'password' => 'required', 'status' => 'required'
    ]);
    $niceNames = array(
      'user_name' => '用户名',
      'password' => '密码',
      'status' => '状态'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('settings/sms-gateways-manage/' . $cmd)->withErrors($v->errors());
    }

    $exist = SMSGateway::where('id', '!=', $cmd)->where('status', 'Active')->first();

    if ($exist) {
      return redirect('settings/sms-gateways-manage/' . $cmd)->with([
        'message' => 'Another Gateway already active',
        'message_important' => true
      ]);
    }

    $sg = SMSGateway::find($cmd);
    if ($sg) {
      $sg->api_link = $request->api_link;
      $sg->user_name = $request->user_name;
      $sg->password = $request->password;
      $sg->status = $request->status;
      $sg->save();

      return redirect('settings/sms-gateways')->with([
        'message' => '网关更新成功'
      ]);
    } else {
      return redirect('settings/sms-gateways')->with([
        'message' => '没有网关信息',
        'message_important' => true
      ]);
    }

  }

}
