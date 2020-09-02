<?php


class Application
{
    public $company;
    public $contact;
    public $date;
    public $way;
    public $dateConfirmation;
    public $firstMeeting;
    public $secondMeeting;
    public $rejectionReason;
    public $accepted;
    private $id;

    public function __construct($id, $company, $contact, $date, $way, $dateConfirmation, $firstMeeting = null,
                                $secondMeeting = null, $rejectionReason = null, $accepted = null)
    {
        $this->id = $id;
        $this->company = $company;
        $this->contact = $contact;
        $this->date = $date;
        $this->way = $way;
        $this->dateConfirmation = $dateConfirmation;
        if ($firstMeeting != null)
        {
            $this->firstMeeting = $firstMeeting;
        }
        if ($secondMeeting != null)
        {
            $this->secondMeeting = $secondMeeting;
        }
        if ($rejectionReason != null)
        {
            $this->rejectionReason = $rejectionReason;
        }
        if ($accepted != null)
        {
            $this->accepted = $accepted;
        }
    }

    public function save($company, $contact, $date, $way, $dateConfirmation, $firstMeeting,
                         $secondMeeting, $rejectionReason, $accepted)
    {
        global $dbs;

        $saveCompany = filter_var($company, FILTER_SANITIZE_STRING);
        $saveContact = filter_var($contact, FILTER_SANITIZE_STRING);
        $saveDate = date('Y-m-d', strtotime($date));
        $saveDateConfirmation = date('Y-m-d', strtotime($dateConfirmation));
        $saveFirstMeeting = date('Y-m-d', strtotime($firstMeeting));
        $saveSecondMeeting = date('Y-m-d', strtotime($secondMeeting));
        $saveRejectionReason = filter_var($rejectionReason, FILTER_SANITIZE_STRING);
        $accepted = ($accepted == 'true') ? 1 : 0;

        $this->company = $saveCompany;
        $this->contact = $saveContact;
        $this->date = $saveDate;
        $this->way = $way;
        $this->dateConfirmation = $saveDateConfirmation;
        $this->firstMeeting = $saveFirstMeeting;
        $this->secondMeeting = $saveSecondMeeting;
        $this->rejectionReason = $saveRejectionReason;
        $this->accepted = $accepted;

        $data = [
            'company' => $this->company,
            'contact' => $this->contact,
            'way' => $this->way,
            'date' => $this->date,
            'cnfDate' => $this->dateConfirmation,
            'fMeeting' => $this->firstMeeting,
            'sMeeting' => $this->secondMeeting,
            'rReason' => $this->rejectionReason,
            'acc' => $this->accepted,
            'id' => $this->getId(),
        ];

        $query = "UPDATE applications SET company = :company, contact = :contact, way = :way, date = :date, dateConfirmation = :cnfDate, firstMeeting = :fMeeting, secondMeeting = :sMeeting, rejectionReason = :rReason, accepted = :acc WHERE id = :id";

        $stmt = $dbs->prepare($query);

        $stmt->execute($data);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}