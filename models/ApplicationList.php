<?php


class ApplicationList
{
    private $user_id;

    public function __construct($user_id = null)
    {
        if ($user_id != null)
        {
            $this->user_id = $user_id;
        }
    }

    /**
     * @return array|null
     */
    public function getAllApplications()
    {
        global $dbs;

        $query = "SELECT * FROM applications WHERE user_id = '$this->user_id'";

        $stmt = $dbs->query($query);

        if ($stmt->rowCount() == 0)
        {
            return null;
        }
        $list = [];
        foreach ($stmt->fetchAll() as $application)
        {
            $list[$application['id']] = [new Application(

                $application['company'],
                $application['contact'],
                $application['date'],
                $application['way'],
                $application['dateConfirmation'],
                $application['firstMeeting'],
                $application['secondMeeting'],
                $application['rejectionReason'],
                $application['accepted'],
                $application['id'])
            ];

        }
        return $list;
    }

}