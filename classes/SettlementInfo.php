<?php
/**
 * Created by PhpStorm.
 * User: Ivan Boyko
 * Date: 7/15/2019
 * Time: 1:01 AM
 */

class SettlementInfo
{
   protected $name, $country, $population, $type, $url;

    public function GetName($name){
       $this->name = $name;
    }
    public function SetName(){
        return $this->name;
    }

    public function GetCountry($country){
        $this->country = $country;
    }
    public function SetCountry(){
        return $this->country;
    }

    public function GetPopulation($population){
        $this->population = $population;
    }
    public function SetPopulation(){
        return $this->population;
    }

    public function GetType($type){
        $this->type = $type;
    }
    public function SetType(){
        return $this->type;
    }

    public function GetURL($url){
        $this->url = $url;
    }
    public function SetURL(){
        return $this->url;
    }
}