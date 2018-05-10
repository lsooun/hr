<?php

namespace App\Http\Controllers;

use App\Award;
use App\AwardList;
use App\Employee;
use App\JobApplicants;
use App\Leave;
use App\Loan;
use App\Payroll;
use App\ProvidentFund;
use App\SMSGateway;
use Dompdf\Adapter\CPDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;
use Twilio\Rest\Client;

class ReportsController extends Controller {
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  /* payrollSummery  Function Start Here */
  public function payrollSummery() {
    $self = 'employee-payroll-summery';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $employees = Employee::where('user_name', '!=', 'admin')->where('status', 'active')->get();
    return view('admin.payroll-summery', compact('employees'));
  }

  /* getSalaryStatement  Function Start Here */
  public function getSalaryStatement(Request $request) {
    $self = 'employee-payroll-summery';
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
      'date_from' => 'required', 'date_to' => 'required'
    ]);
    $niceNames = array(
      'date_from' => '开始日期',
      'date_to' => '结束日期'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('reports/payroll')->withErrors($v->errors());
    }

    $cmd = Input::get('cmd');
    $date_from = Input::get('date_from');
    $date_to = Input::get('date_to');

    $date_from = date('Y-m-01', strtotime($date_from));
    $date_to = date('Y-m-t', strtotime($date_to));

    $payslip = Payroll::where('emp_id', $cmd)->first();
    $payroll = Payroll::where('emp_id', $cmd)->whereBetween('payment_date', [$date_from, $date_to])->get();

    $net_salary = Payroll::where('emp_id', $cmd)->whereBetween('payment_date', [$date_from, $date_to])->sum('net_salary');
    $over_time = Payroll::where('emp_id', $cmd)->whereBetween('payment_date', [$date_from, $date_to])->sum('overtime_salary');
    $tax = Payroll::where('emp_id', $cmd)->whereBetween('payment_date', [$date_from, $date_to])->sum('tax');
    $provident_fund = Payroll::where('emp_id', $cmd)->whereBetween('payment_date', [$date_from, $date_to])->sum('provident_fund');
    $loan = Payroll::where('emp_id', $cmd)->whereBetween('payment_date', [$date_from, $date_to])->sum('loan');
    $total_salary = Payroll::where('emp_id', $cmd)->whereBetween('payment_date', [$date_from, $date_to])->sum('total_salary');

    return view('admin.employee-salary-statement', compact('payroll', 'payslip', 'cmd',
      'date_from', 'date_to', 'net_salary', 'over_time', 'tax', 'provident_fund', 'loan', 'total_salary'));

  }

  /* printSalaryStatement  Function Start Here */
  public function printSalaryStatement($id, $date_from, $date_to) {
    $self = 'employee-payroll-summery';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $payslip = Payroll::where('emp_id', $id)->first();
    $payroll = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->get();

    $net_salary = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('net_salary');
    $over_time = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('overtime_salary');
    $tax = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('tax');
    $provident_fund = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('provident_fund');
    $loan = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('loan');
    $total_salary = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('total_salary');

    return view('admin.print-salary-statement', compact('payroll', 'payslip', 'id',
      'date_from', 'date_to', 'net_salary', 'over_time', 'tax', 'provident_fund', 'loan', 'total_salary'));
  }

  /* employeeSummery  Function Start Here */
  public function employeeSummery($id) {
    $self = 'employee-payroll-summery';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $employee = Employee::find($id);
    $loan = Loan::where('emp_id', $id)->get();
    $provident_fund = ProvidentFund::where('emp_id', $id)->get();
    $award = AwardList::where('emp_id', $id)->get();
    $leave = Leave::where('emp_id', $id)->get();

    return view('admin.employee-summery', compact('employee', 'provident_fund', 'loan', 'award', 'leave'));
  }

  /* jobApplicants  Function Start Here */
  public function jobApplicants() {
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

    $job_applicants = JobApplicants::where('status', '!=', 'Unread')->where('status', '!=', 'Rejected')->get();

    return view('admin.job-applicants-summery', compact('job_applicants'));
  }

  /* sendEmailApplicant  Function Start Here */
  public function sendEmailApplicant(Request $request) {
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

    $v = \Validator::make($request->all(), [
      'email' => 'required', 'subject' => 'required', 'message' => 'required'
    ]);
    $niceNames = array(
      'email' => '邮箱',
      'subject' => '标题',
      'message' => '描述'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('reports/job-applicants')->withErrors($v->errors());
    }

    $applicant = JobApplicants::find($request->cmd)->name;
    $email = Input::get('email');
    $subject = Input::get('subject');
    $message = Input::get('message');

    $sysEmail = app_config('Email');
    $sysCompany = app_config('AppName');
    $default_gt = app_config('Gateway');

    if ($default_gt == 'default') {

      $mail = new \PHPMailer();
      $mail->Charset = "utf-8";
      $mail->Encoding = "base64";

      $mail->setFrom($sysEmail, $sysCompany);
      $mail->addAddress($email, $applicant);     // Add a recipient
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = $subject;
      $mail->Body = $message;

      if (!$mail->send()) {
        return redirect('reports/job-applicants')->with([
          'message' => '请检查您的邮件设置',
          'message_important' => true
        ]);
      } else {
        return redirect('reports/job-applicants')->with([
          'message' => '邮件发送成功'
        ]);
      }

    } else {
      $host = app_config('SMTPHostName');
      $smtp_username = app_config('SMTPUserName');
      $stmp_password = app_config('SMTPPassword');
      $port = app_config('SMTPPort');
      $secure = app_config('SMTPSecure');

      $mail = new \PHPMailer();
      $mail->Charset = "utf-8";
      $mail->Encoding = "base64";

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = $host;  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = $smtp_username;                 // SMTP username
      $mail->Password = $stmp_password;                           // SMTP password
      $mail->SMTPSecure = $secure;                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = $port;

      $mail->setFrom($sysEmail, $sysCompany);
      $mail->addAddress($email, $applicant);     // Add a recipient
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = $subject;
      $mail->Body = $message;

      if (!$mail->send()) {
        return redirect('reports/job-applicants')->with([
          'message' => '请检查您的邮件设置',
          'message_important' => true
        ]);
      } else {
        return redirect('reports/job-applicants')->with([
          'message' => '邮件发送成功'
        ]);
      }
    }

  }

  /* sendSMSApplicant  Function Start Here */
  public function sendSMSApplicant(Request $request) {
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

    $v = \Validator::make($request->all(), [
      'phone' => 'required', 'message' => 'required'
    ]);
    $niceNames = array(
      'phone' => '电话',
      'message' => '信息'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('reports/job-applicants')->withErrors($v->errors());
    }

    $phone = Input::get('phone');
    $message = Input::get('message');

    $sms_gateway = SMSGateway::where('status', 'Active')->first();
    $gateway_name = $sms_gateway->name;

    if ($gateway_name == 'Twilio') {
      $sid = $sms_gateway->user_name;
      $token = $sms_gateway->password;

      try {

        $client = new Client($sid, $token);
        $response = $client->account->messages->create(
          "$phone",
          array(
            'from' => '+15005550006',
            'body' => $message
          )
        );

        if ($response->sid != '') {
          return redirect('reports/job-applicants')->with([
            'message' => '短信发送成功'
          ]);
        } else {
          return redirect('reports/job-applicants')->with([
            'message' => '请检查您的Twilio认证',
            'message_important' => true
          ]);
        }
      } catch (Exception $e) {
        return redirect('reports/job-applicants')->with([
          'message' => '请检查您的Twilio认证',
          'message_important' => true
        ]);
      }

    } elseif ($gateway_name == 'Route SMS') {

      $sms_url = $sms_gateway->api_link;
      $user = $sms_gateway->user_name;
      $password = $sms_gateway->password;
      $sender_id = app_config('AppName');

      $sms_sent_to_user = "$sms_url" . "?type=0" . "&username=$user" . "&password=$password" . "&destination=$phone" . "&source=$sender_id" . "&message=$message" . "&dlr=1";
      $get_sms_status = file_get_contents($sms_sent_to_user);
      $get_sms_status = str_replace("1701", "Success", $get_sms_status);
      $get_sms_status = str_replace("1709", "User Validation Failed", $get_sms_status);
      $get_sms_status = str_replace("1025", "Insufficient Credit", $get_sms_status);
      $get_sms_status = str_replace("1710", "Internal Error", $get_sms_status);
      $get_sms_status = str_replace("1706", "Invalid receiver", $get_sms_status);
      $get_sms_status = str_replace("1705", "Invalid SMS", $get_sms_status);
      $get_sms_status = str_replace("1707", "Invalid sender", $get_sms_status);
      $get_sms_status = str_replace(",", " ", $get_sms_status);
      $pos = strpos($get_sms_status, 'Success');

      if ($pos === false) {
        return redirect('reports/job-applicants')->with([
          'message' => '短信发送成功'
        ]);
      } else {
        return redirect('reports/job-applicants')->with([
          'message' => $get_sms_status,
          'message_important' => true
        ]);
      }

    } elseif ($gateway_name == 'Bulk SMS') {

      $sms_url = $sms_gateway->api_link;
      $user = $sms_gateway->user_name;
      $password = $sms_gateway->password;

      $url = "$sms_url" . "/eapi/submission/send_sms/2/2.0?username=$user" . "&password=$password" . "&msisdn=$phone" . "&message=" . urlencode($message);
      $ret = file_get_contents($url);

      $send = explode("|", $ret);

      if ($send[0] == '0') {
        $get_sms_status = 'In progress';
      } elseif ($send[0] == '1') {
        $get_sms_status = 'Scheduled ';
      } elseif ($send[0] == '22') {
        $get_sms_status = 'Internal fatal error ';
      } elseif ($send[0] == '23') {
        $get_sms_status = 'Authentication failure';
      } elseif ($send[0] == '24') {
        $get_sms_status = 'Data validation failed';
      } elseif ($send[0] == '25') {
        $get_sms_status = 'You do not have sufficient credits';
      } elseif ($send[0] == '26') {
        $get_sms_status = 'Upstream credits not available';
      } elseif ($send[0] == '27') {
        $get_sms_status = 'You have exceeded your daily quota';
      } elseif ($send[0] == '28') {
        $get_sms_status = 'Upstream quota exceeded';
      } elseif ($send[0] == '40') {
        $get_sms_status = 'Temporarily unavailable';
      } elseif ($send[0] == '201') {
        $get_sms_status = 'Maximum batch size exceeded';
      } elseif ($send[0] == '200') {
        $get_sms_status = 'Success';
      } else {
        $get_sms_status = 'Failed';
      }

      if ($get_sms_status == 'Success') {
        return redirect('reports/job-applicants')->with([
          'message' => '短信发送成功'
        ]);
      } else {
        return redirect('reports/job-applicants')->with([
          'message' => $get_sms_status,
          'message_important' => true
        ]);
      }

    } else {
      return redirect('reports/job-applicants')->with([
        'message' => '没有网关信息',
        'message_important' => true
      ]);
    }

  }

  /* sendSMSSalaryStatement  Function Start Here */
  public function sendSMSSalaryStatement(Request $request) {
    $self = 'employee-payroll-summery';
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
      'phone' => 'required', 'message' => 'required'
    ]);
    $niceNames = array(
      'phone' => '电话',
      'message' => '信息'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('reports/payroll')->withErrors($v->errors());
    }

    $phone = Input::get('phone');
    $message = Input::get('message');

    $sms_gateway = SMSGateway::where('status', 'Active')->first();
    $gateway_name = $sms_gateway->name;

    if ($gateway_name == 'Twilio') {
      $sid = $sms_gateway->user_name;
      $token = $sms_gateway->password;

      try {

        $client = new Client($sid, $token);
        $response = $client->account->messages->create(
          "$phone",
          array(
            'from' => '+15005550006',
            'body' => $message
          )
        );

        if ($response->sid != '') {
          return redirect('reports/payroll')->with([
            'message' => '短信发送成功'
          ]);
        } else {
          return redirect('reports/payroll')->with([
            'message' => '请检查您的Twilio认证',
            'message_important' => true
          ]);
        }
      } catch (Exception $e) {
        return redirect('reports/payroll')->with([
          'message' => '请检查您的Twilio认证',
          'message_important' => true
        ]);
      }

    } elseif ($gateway_name == 'Route SMS') {

      $sms_url = $sms_gateway->api_link;
      $user = $sms_gateway->user_name;
      $password = $sms_gateway->password;
      $sender_id = app_config('AppName');

      $sms_sent_to_user = "$sms_url" . "?type=0" . "&username=$user" . "&password=$password" . "&destination=$phone" . "&source=$sender_id" . "&message=$message" . "&dlr=1";
      $get_sms_status = file_get_contents($sms_sent_to_user);
      $get_sms_status = str_replace("1701", "Success", $get_sms_status);
      $get_sms_status = str_replace("1709", "User Validation Failed", $get_sms_status);
      $get_sms_status = str_replace("1025", "Insufficient Credit", $get_sms_status);
      $get_sms_status = str_replace("1710", "Internal Error", $get_sms_status);
      $get_sms_status = str_replace("1706", "Invalid receiver", $get_sms_status);
      $get_sms_status = str_replace("1705", "Invalid SMS", $get_sms_status);
      $get_sms_status = str_replace("1707", "Invalid sender", $get_sms_status);
      $get_sms_status = str_replace(",", " ", $get_sms_status);
      $pos = strpos($get_sms_status, 'Success');

      if ($pos === false) {
        return redirect('reports/payroll')->with([
          'message' => '短信发送成功'
        ]);
      } else {
        return redirect('reports/payroll')->with([
          'message' => $get_sms_status,
          'message_important' => true
        ]);
      }

    } elseif ($gateway_name == 'Bulk SMS') {

      $sms_url = $sms_gateway->api_link;
      $user = $sms_gateway->user_name;
      $password = $sms_gateway->password;

      $url = "$sms_url" . "/eapi/submission/send_sms/2/2.0?username=$user" . "&password=$password" . "&msisdn=$phone" . "&message=" . urlencode($message);
      $ret = file_get_contents($url);

      $send = explode("|", $ret);

      if ($send[0] == '0') {
        $get_sms_status = 'In progress';
      } elseif ($send[0] == '1') {
        $get_sms_status = 'Scheduled ';
      } elseif ($send[0] == '22') {
        $get_sms_status = 'Internal fatal error ';
      } elseif ($send[0] == '23') {
        $get_sms_status = 'Authentication failure';
      } elseif ($send[0] == '24') {
        $get_sms_status = 'Data validation failed';
      } elseif ($send[0] == '25') {
        $get_sms_status = 'You do not have sufficient credits';
      } elseif ($send[0] == '26') {
        $get_sms_status = 'Upstream credits not available';
      } elseif ($send[0] == '27') {
        $get_sms_status = 'You have exceeded your daily quota';
      } elseif ($send[0] == '28') {
        $get_sms_status = 'Upstream quota exceeded';
      } elseif ($send[0] == '40') {
        $get_sms_status = 'Temporarily unavailable';
      } elseif ($send[0] == '201') {
        $get_sms_status = 'Maximum batch size exceeded';
      } elseif ($send[0] == '200') {
        $get_sms_status = 'Success';
      } else {
        $get_sms_status = 'Failed';
      }

      if ($get_sms_status == 'Success') {
        return redirect('reports/payroll')->with([
          'message' => '短信发送成功'
        ]);
      } else {
        return redirect('reports/payroll')->with([
          'message' => $get_sms_status,
          'message_important' => true
        ]);
      }

    } else {
      return redirect('reports/payroll')->with([
        'message' => '没有网关信息',
        'message_important' => true
      ]);
    }

  }

  /* sendEmailSalaryStatement  Function Start Here */
  public function sendEmailSalaryStatement(Request $request) {
    $self = 'employee-payroll-summery';
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
      'email' => 'required', 'subject' => 'required', 'message' => 'required'
    ]);
    $niceNames = array(
      'email' => '邮箱',
      'subject' => '标题',
      'message' => '信息'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('reports/payroll')->withErrors($v->errors());
    }

    $employee = Employee::find($request->cmd)->fname . ' ' . Employee::find($request->cmd)->lname;
    $email = Input::get('email');
    $subject = Input::get('subject');
    $message = Input::get('message');

    $sysEmail = app_config('Email');
    $sysCompany = app_config('AppName');
    $default_gt = app_config('Gateway');

    if ($default_gt == 'default') {

      $mail = new \PHPMailer();

      $mail->setFrom($sysEmail, $sysCompany);
      $mail->addAddress($email, $employee);     // Add a recipient
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = $subject;
      $mail->Body = $message;

      if (!$mail->send()) {
        return redirect('reports/payroll')->with([
          'message' => '请检查您的邮件信息',
          'message_important' => true
        ]);
      } else {
        return redirect('reports/payroll')->with([
          'message' => '邮件发送成功'
        ]);
      }

    } else {
      $host = app_config('SMTPHostName');
      $smtp_username = app_config('SMTPUserName');
      $stmp_password = app_config('SMTPPassword');
      $port = app_config('SMTPPort');
      $secure = app_config('SMTPSecure');

      $mail = new \PHPMailer();

      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = $host;  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = $smtp_username;                 // SMTP username
      $mail->Password = $stmp_password;                           // SMTP password
      $mail->SMTPSecure = $secure;                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = $port;

      $mail->setFrom($sysEmail, $sysCompany);
      $mail->addAddress($email, $employee);     // Add a recipient
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = $subject;
      $mail->Body = $message;

      if (!$mail->send()) {
        return redirect('reports/payroll')->with([
          'message' => '请检查您的邮件设置',
          'message_important' => true
        ]);
      } else {
        return redirect('reports/payroll')->with([
          'message' => '邮件发送成功'
        ]);
      }
    }

  }

  /*Version 1.5*/

  /* pdfSalaryStatement  Function Start Here */
  public function pdfSalaryStatement($id, $date_from, $date_to) {
    $self = 'employee-payroll-summery';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $payslip = Payroll::where('emp_id', $id)->first();
    $payroll = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->get();

    $net_salary = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('net_salary');
    $over_time = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('overtime_salary');
    $tax = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('tax');
    $provident_fund = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('provident_fund');
    $loan = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('loan');
    $total_salary = Payroll::where('emp_id', $id)->whereBetween('payment_date', [$date_from, $date_to])->sum('total_salary');

    $pdf = \WkPdf::loadView('admin.pdf-salary-statement', compact('payroll', 'payslip', 'id', 'date_from', 'date_to', 'net_salary', 'over_time', 'tax', 'provident_fund', 'loan', 'total_salary'));
    return $pdf->download('salary_statement.pdf');

  }

}
