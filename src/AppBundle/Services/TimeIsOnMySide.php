<?php

namespace AppBundle\Services;

class TimeIsOnMySide
{
    public function getAge(\DateTime $datetime)
    {
        $interval = $datetime->diff(new \DateTime('now'));
        return $interval->y;
    }
}
