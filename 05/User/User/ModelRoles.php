<?php

namespace User;

class ModelRoles extends ModelBase {

    public function __construct()
    {
        $this->table = "roles";
        $this->addFilds = array("name");


    }




}