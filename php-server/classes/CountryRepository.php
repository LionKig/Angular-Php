<?php

require_once 'DBHelper.php' ;
require_once 'Country.php';
require_once 'State.php' ;

class CountryRepository{

//    private static $countries = array() ;

    public static function init() {
        //$countries = array() ;
        DBHelper::resetDB() ;
        DBHelper::addCountry(new Country('Austria' , 'at' , array(new State('Styria'), new State('Burgundy')))) ;
        DBHelper::addCountry(new Country('United States' , 'us' , array(new State('California') , new State('Maryland'))));
        DBHelper::addCountry(new Country('China' , 'ch'));  
    }

    public static function getCountries(){        
        return DBHelper::getCountries() ;
    } 

    public static function getCountry($countryCode){
        $countries = DBHelper::getCountries() ;
        $country = array_filter($countries , function($val) use ($countryCode){
            return $val->code ===$countryCode ;
        }) ;
        if( count($country) === 1 ) {
            $country = array_shift($country) ;
            $country->states = DBHelper::getStates($country) ;
            return $country ;
        }
    }

    public static function addState($name , $countryCode) {
        return DBHelper::addState(new State($name) ,new Country('', $countryCode ) ) ;
    }
}