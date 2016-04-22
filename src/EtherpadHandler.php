<?php

class EtherpadHandler
{
    private $etherpad;

    private $allPads;

    private $salutations;
    private $centerParts;
    private $closingWords;

    private $salutationNR;
    private $centerPartNR;
    private $closingWordNR;

    public function __construct()
    {
        $pad_api_key = "";
        $pad_url = "";

        require_once 'settings.inc.php';

        $this->etherpad = new \EtherpadLite\Client($pad_api_key, $pad_url);
        $this->getPadList();
        $this->filterPads();
    }

    public function getSalutation()
    {
        $padID = $this->salutations[$this->salutationNR];
        $response = $this->etherpad->getText($padID);
        return $response->getData()['text'];
    }

    public function getCenterPart()
    {
        $padID =  $this->centerParts[$this->centerPartNR];
        $response = $this->etherpad->getText($padID);
        return $response->getData()['text'];
    }

    public function getClosingWord()
    {
        $padID =  $this->closingWords[$this->closingWordNR];
        $response = $this->etherpad->getText($padID);
        return $response->getData()['text'];
    }

    private function getPadList()
    {
        /** @var $response \EtherpadLite\Response */
        $response = $this->etherpad->listAllPads();

        $this->allPads = $response->getData()['padIDs'];
    }

    private function getRandomNumber($max)
    {
        if ($max > 1)
        {
            return mt_rand(0, $max - 1);
        }

        return $max - 1;
    }

    private function filterPads()
    {
        $this->salutations = array_values(preg_grep("/^anrede.*/", $this->allPads));
        $this->salutationNR = $this->getRandomNumber(count($this->salutations));

        $this->centerParts = array_values(preg_grep("/^mitte.*/", $this->allPads));
        $this->centerPartNR = $this->getRandomNumber(count($this->centerParts));

        $this->closingWords = array_values(preg_grep("/^schluss.*/", $this->allPads));
        $this->closingWordNR = $this->getRandomNumber(count($this->closingWords));
    }
}