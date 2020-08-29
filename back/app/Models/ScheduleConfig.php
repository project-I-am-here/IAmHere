<?php
namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class ScheduleConfig extends Model
{
    use Authenticatable, Authorizable;
    protected $table = "schedule_config";

    protected $fillable = [
        'id',
        'professional_id',
        'date_start',
        'date_end',
        'interval',
        'hour_start',
        'hour_end'
    ];

    public $timestamps = false;
}

