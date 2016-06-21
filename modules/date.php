<?php

class date
{
    private $from;
    private $to;
    private $userid;
    private $maker;
    private $model;
    private $notes;
    private $status;

    function date($from, $to, $userid, $maker, $model, $notes) {
        $this->from = $from;
        $this->to = $to;
        $this->userid = $userid;
        $this->maker = $maker;
        $this->model = $model;
        $this->notes = $notes;
        $this->status = 1;
    }

    public function sendEmail_Added() {
        $f = new DateTime($this->from);
        $t = new DateTime($this->to);
        $u = mysql::getUser($this->userid);
        $r = "mpnw47@gmail.com";
        $s = "Lack&Blech - Neuer Termin";
        $h = "From: Lack&Blech <info@lackundblech.de>";
        $m = "Ein neuer Termin wurde eingetragen. \n\n";
        $m .= "Termin\n";
        $m .= "Start:\t\t" . " " . $f->format("d.m.Y, H:i"). "\n";
        $m .= "Ende:\t\t" . $t->format("d.m.Y, H:i") . "\n\n";
        $m .= "Kunde\n";
        $m .= "Firma: \t\t" . " " . $u->getName() . "\n";
        $m .= "Kontakt:\t" . $u->getContact() . "\n";
        $m .= "Email:\t\t" . $u->getEmail() . "\n\n";
        $m .= "Fahrzeug\n";
        $m .= "Hersteller:\t" . $this->maker . "\n";
        $m .= "Modell:\t\t" . $this->model . "\n\n";
        $m .= "Bemerkungen:\n" . $this->notes . "\n\n";
        mail($r, $s, $m, $h);
    }

    public function sendEmail_Cancelled() {
        $f = new DateTime($this->from);
        $t = new DateTime($this->to);
        $u = mysql::getUser($this->userid);
        $r = "mpnw47@gmail.com";
        $s = "Lack&Blech - Termin gecancelt";
        $h = "From: Lack&Blech <info@lackundblech.de>";
        $m = "Ein Termin wurde gecancelt. \n\n";
        $m .= "Termin\n";
        $m .= "Start:\t\t" . " " . $f->format("d.m.Y, H:i"). "\n";
        $m .= "Ende:\t\t" . $t->format("d.m.Y, H:i") . "\n\n";
        $m .= "Kunde\n";
        $m .= "Firma: \t\t" . " " . $u->getName() . "\n";
        $m .= "Kontakt:\t" . $u->getContact() . "\n";
        $m .= "Email:\t\t" . $u->getEmail() . "\n\n";
        $m .= "Fahrzeug\n";
        $m .= "Hersteller:\t" . $this->maker . "\n";
        $m .= "Modell:\t\t" . $this->model . "\n\n";
        $m .= "Bemerkungen:\n" . $this->notes . "\n\n";
        mail($r, $s, $m, $h);
    }

    public function sendEmail_Status() {
        $f = new DateTime($this->from);
        $t = new DateTime($this->to);
        $u = mysql::getUser($this->userid);
        $r = "mpnw47@gmail.com";
        $s = "Lack&Blech - Termin aktualisiert";
        $h = "From: Lack&Blech <info@lackundblech.de>";
        $m = "Ein Termin-Status wurde aktualisiert. \n\n";
        $m .= "Termin\n";
        $m .= "Start:\t\t" . " " . $f->format("d.m.Y, H:i"). "\n";
        $m .= "Ende:\t\t" . $t->format("d.m.Y, H:i") . "\n\n";
        $m .= "Kunde\n";
        $m .= "Firma: \t\t" . " " . $u->getName() . "\n";
        $m .= "Kontakt:\t" . $u->getContact() . "\n";
        $m .= "Email:\t\t" . $u->getEmail() . "\n\n";
        $m .= "Fahrzeug\n";
        $m .= "Hersteller:\t" . $this->maker . "\n";
        $m .= "Modell:\t\t" . $this->model . "\n\n";
        $m .= "Bemerkungen:\n" . $this->notes . "\n\n";
        $m .= "Neuer Status:\n" . mysql::getStatus($this->status) . "\n\n";
        mail($r, $s, $m, $h);
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param mixed $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getMaker()
    {
        return $this->maker;
    }

    /**
     * @param mixed $maker
     */
    public function setMaker($maker)
    {
        $this->maker = $maker;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

}