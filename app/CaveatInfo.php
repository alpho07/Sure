<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaveatInfo extends Model
{
    protected $fillable = [
        'Receipt_date', 'Upload_path', 'Lands_office', 'Affidavit_date',
        'Present_lawyer','PcertNo','Address','Email','Mobile','Cid'
    ];
}
