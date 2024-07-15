<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BranchDetails;
class Branch extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function division(){
        return $this->belongsTo(Division::class,'division_id','id');
    }

    public function brance_d(){
        return $this->belongsTo(BranchDetails::class,'branch_id','id');
    }

    public function district(){
        return $this->belongsTo(District::class,'district_id','id');
    }

    public function branch_details(){
        return $this->belongsTo(BranchDetails::class,'branch_id','id');
    }
}
