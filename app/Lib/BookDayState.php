<?php

class BookDayState {
    public function __construct(array $book)
    {
        $this->book = $book['Book'];
        date_default_timezone_set('GMT');
        $this->startTime   = strtotime($this->book['bet_start'])+($this->book['time_zone'])*60*60;
        $this->finishTime  = strtotime($this->book['bet_finish'])+($this->book['time_zone'])*60*60;
        $this->resultTime  = strtotime($this->book['result_time'])+($this->book['time_zone'])*60*60;
        $this->currentTime = time();
    }

    public function isBetNow()
    {
        if ($this->startTime < $this->currentTime &&
            $this->finishTime > $this->currentTime &&
            $this->currentTime < $this->resultTime) {
            return true;
        } else {
            return false;
        }
    }

    public function isBetFinish()
    {
        if ($this->finishTime < $this->currentTime &&
            $this->resultTime > $this->currentTime
            ) {
           return true;
        } else {
            return false;
        }
    }

    public function isNotSetResult()
    {

        if ($this->finishTime < $this->currentTime &&
            $this->resultTime > $this->currentTime
            ) {
           return true;
        } else {
            return false;
        }
    }

    public function isTimeOut()
    {
        if ($this->currentTime - $this->resultTime > 60*60*24 &&
            strtolower($this->book['state']) != 'result'
            ) {
           return true;
        } else {
            return false;
        }
    }

    public function isBookUpcoming()
    {
        if ($this->startTime > $this->currentTime) {
            return true;
        } else {
            return false;
        }
    }

    public function isWinResult()
    {
        if ($this->resultTime < $this->currentTime) {
            return true;
        } else {
            return false;
        }
    }

    public function getStartTime()
    {
        return $this->startTime;
    }

    public function getFinishTime()
    {
        return $this->finishTime;
    }

    public function getResultTime()
    {
        return $this->resultTime;
    }
}