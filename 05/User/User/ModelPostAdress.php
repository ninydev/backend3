<?php

namespace User;

class ModelPostAdress extends ModelBase {

    public function __construct()
    {
        $this->table = "user_postadress";
        $this->addFilds = array("name");

        $this->hasOne('location_city', 'id', 'city_id');
        $this->belongsTo('users', 'id', 'user_id');


    }




}