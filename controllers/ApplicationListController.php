<?php


class ApplicationListController
{
    private $model;
    private $list;

    public function __construct($user_id = null)
    {
        $this->model = new ApplicationList($user_id);
    }

    public function getApplication($id)
    {
        $application = $this->getAll()[$id];

        include "./views/single_application.php";
    }

    public function getAll()
    {
        return $all_applications = $this->model->getAllApplications();

    }

    public function newApplication()
    {
        include "./views/new_application.php";
    }

    public function showAll()
    {
        $all_applications = $this->getAll();

        include "./views/all_applications.php";
    }
}