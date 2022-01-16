<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userpermission extends Model
{
    protected $table = 'admin_user_permissions';
    protected $fillable = [
        'user_id', 'user_group_id','created_date','user_access', 'heading','supervisor_id', 'subordinate_id', 'status', 'modified_date', 'modified_by',
    ];
	public $timestamps = false;
}
