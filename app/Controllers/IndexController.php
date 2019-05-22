<?php

namespace App\Controllers;
use App\Models\{Job, Project};

class IndexController
{
    public function IndexAction()
    {
        $jobs = Job::all();
        $projects = Project::all();

        $lastname = 'Arce';
        $name = "Luis $lastname";
        $limitMonths = 2000;

        include('../views/index.php');
    }
}
