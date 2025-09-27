<?php

namespace Modules\Recruitment\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Employee\Models\Employeeinfo;
use Modules\Recruitment\Models\RecruitmentAttachment;

class BaseModel extends Model
{

       public function employee()
    {
        return $this->belongsTo(Employeeinfo::class, 'employee_id');
    }
        public function attachment()
    {
        return $this->belongsTo(RecruitmentAttachment::class, 'recruitment_attachments_id','reference_number');
    }
}
