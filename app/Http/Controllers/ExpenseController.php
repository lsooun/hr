<?php

namespace App\Http\Controllers;

use App\Classes\permission;
use App\Employee;
use App\Expense;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

date_default_timezone_set(app_config('Timezone'));

class ExpenseController extends Controller {
  public function __construct() {
    $this->middleware('auth');
    $this->middleware('admin');
  }

  /* expense  Function Start Here */
  public function expense() {

    $self = 'expense';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $expense = Expense::all();
    $employee = Employee::where('user_name', '!=', 'admin')->get();
    return view('admin.expense', compact('expense', 'employee'));
  }

  /* postExpense  Function Start Here */
  public function postExpense(Request $request) {

    $self = 'add-new-expense';
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
      'item_name' => 'required', 'purchase_from' => 'required', 'emp_name' => 'required', 'amount' => 'required', 'purchase_date' => 'required', 'status' => 'required'
    ]);
    $niceNames = array(
      'item_name' => '名称',
      'purchase_from' => '购买地',
      'emp_name' => '购买人',
      'amount' => '金额',
      'purchase_date' => '日期',
      'status' => '状态'
    );
    $v->setAttributeNames($niceNames);
    if ($v->fails()) {
      return redirect('expense')->withErrors($v->errors());
    }

    $item_name = Input::get('item_name');
    $purchase_from = Input::get('purchase_from');
    $emp_name = Input::get('emp_name');
    $purchase_date = Input::get('purchase_date');
    $amount = Input::get('amount');
    $status = Input::get('status');
    $bill_copy = Input::file('bill_copy');

    if ($bill_copy != '') {
      $destinationPath = public_path() . '/assets/bill_copy/';
      $bill_copy_name = $bill_copy->getClientOriginalName();
      Input::file('bill_copy')->move($destinationPath, $bill_copy_name);
    } else {
      $bill_copy_name = '';
    }

    $expense = new Expense();
    $expense->item_name = $item_name;
    $expense->purchase_from = $purchase_from;
    $expense->purchase_date = $purchase_date;
    $expense->purchase_by = $emp_name;
    $expense->amount = $amount;
    $expense->status = $status;
    $expense->bill_copy = $bill_copy_name;
    $expense->save();

    return redirect('expense')->with([
      'message' => '报销增加成功'
    ]);

  }

  /* downloadBillCopy  Function Start Here */
  public function downloadBillCopy($id) {
    $self = 'expense';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $file = Expense::find($id)->bill_copy;
    return response()->download(public_path('assets/bill_copy/' . $file));
  }

  /* deleteExpense  Function Start Here */
  public function deleteExpense($id) {

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('expense')->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $self = 'expense';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $expense = Expense::find($id);

    if ($expense) {
      $file = $expense->bill_copy;
      \File::delete(public_path('assets/bill_copy/' . $file));
      $expense->delete();

      return redirect('expense')->with([
        'message' => '报销删除成功'
      ]);
    } else {
      return redirect('expense')->with([
        'message' => '没有找到报销',
        'message_important' => true
      ]);
    }

  }

  /* editExpense  Function Start Here */
  public function editExpense($id) {
    $self = 'expense';
    if (\Auth::user()->user_name !== 'admin') {
      $get_perm = permission::permitted($self);

      if ($get_perm == 'access denied') {
        return redirect('permission-error')->with([
          'message' => '您没有权限访问这个页面',
          'message_important' => true
        ]);
      }
    }

    $expense = Expense::find($id);
    if ($expense) {
      $employee = Employee::where('user_name', '!=', 'admin')->get();
      return view('admin.edit-expense', compact('expense', 'employee'));

    } else {
      return redirect('expense')->with([
        'message' => '没有找到报销',
        'message_important' => true
      ]);
    }

  }

  /* postEditExpense  Function Start Here */
  public function postEditExpense(Request $request) {
    $self = 'expense';
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

    $appStage = app_config('AppStage');
    if ($appStage == 'Demo') {
      return redirect('expense/edit/' . $cmd)->with([
        'message' => '当前是试用模式，这个功能不可用。',
        'message_important' => true
      ]);
    }

    $expense = Expense::find($cmd);

    if ($expense) {
      $v = \Validator::make($request->all(), [
        'item_name' => 'required', 'purchase_from' => 'required', 'emp_name' => 'required', 'amount' => 'required', 'purchase_date' => 'required', 'status' => 'required'
      ]);
      $niceNames = array(
        'item_name' => '名称',
        'purchase_from' => '购买地',
        'emp_name' => '购买人',
        'amount' => '金额',
        'purchase_date' => '日期',
        'status' => '状态'
      );
      $v->setAttributeNames($niceNames);
      if ($v->fails()) {
        return redirect('expense/edit/' . $cmd)->withErrors($v->errors());
      }

      $item_name = Input::get('item_name');
      $purchase_from = Input::get('purchase_from');
      $emp_name = Input::get('emp_name');
      $purchase_date = Input::get('purchase_date');
      $amount = Input::get('amount');
      $status = Input::get('status');
      $bill_copy = Input::file('bill_copy');

      if ($bill_copy != '') {
        $destinationPath = public_path() . '/assets/bill_copy/';

        \File::delete($destinationPath . $expense->bill_copy);

        $bill_copy_name = $bill_copy->getClientOriginalName();
        Input::file('bill_copy')->move($destinationPath, $bill_copy_name);
      } else {
        $bill_copy_name = $expense->bill_copy;
      }
      $expense->item_name = $item_name;
      $expense->purchase_from = $purchase_from;
      $expense->purchase_date = $purchase_date;
      $expense->purchase_by = $emp_name;
      $expense->amount = $amount;
      $expense->status = $status;
      $expense->bill_copy = $bill_copy_name;
      $expense->save();

      return redirect('expense')->with([
        'message' => '报销更新成功'
      ]);
    } else {
      return redirect('expense')->with([
        'message' => '没有找到报销',
        'message_important' => true
      ]);
    }
  }

}
