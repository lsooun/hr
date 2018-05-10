<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {
  protected $table = 'sys_employee';

  /* designation  Function Start Here */
  public function designation_name() {
    return $this->hasOne('App\Designation', 'id', 'designation');
  }

  /* department  Function Start Here */
  public function department_name() {
    return $this->hasOne('App\Department', 'id', 'department');
  }

  public function employee_role() {
    return $this->hasOne('App\EmployeeRoles', 'id', 'role_id');
  }

}
