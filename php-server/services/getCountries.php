<?php

require_once '../classes/CountryRepository.php' ;


header('Access-Control-Allow-Origin: http://localhost:4200') ;


$countries = CountryRepository::getCountries() ;

echo json_encode($countries) ;