<?php

namespace App\Helpers;

class UrlHelper{
    public static function createUrl($request){
        try {
            $baseUrl = 'https://seminovos.com.br/';
            $arrParam = [];
            //String values
            $arrParam["vehicleType"] = $request->vehicleType;
            $arrParam["vehicleBrand"] = $request->vehicleBrand;
            $arrParam["vehicleModel"] = $request->vehicleModel;
            
            //Int Values
            $arrParam["initialYear"] = $request->initialYear;
            $arrParam["finalYear"] = $request->finalYear;
            $arrParam["initialPrice"] = $request->initialPrice;
            $arrParam["finalPrice"] = $request->finalPrice;
                    
            $url = $baseUrl.$arrParam["vehicleType"]."/".$arrParam["vehicleBrand"]."/".$arrParam["vehicleModel"]."/"
                ."ano-".$arrParam["initialYear"]."-".$arrParam["finalYear"]."/preco-".$arrParam["initialPrice"]
                ."-".$arrParam["finalPrice"];
            
            return $url;
        }catch (Exception $e) {
            return false;
        }
        
                
    }
}