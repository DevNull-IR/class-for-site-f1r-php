<?php
##########################################
##                                      ##
##        craeted by @dev_null          ##
##                                      ##
##        channel : @Pre_code           ##
##                                      ##
##     https://github.com/DevNull-IR    ##
##                                      ##
##########################################
class F1r_php{
    public static function error_log( $status = "false" , $message , $he = null ){
        $time = "[ ".date("c")." ]";
        if (!isset($message) or empty($message) or $message == null){
            self::error_log("true","not description is error log","PreClass_ERROR_LOG [500]");
        }
        if (!isset($he) or empty($he) or $he == null){
            self::error_log("true","not short description is error log","PreClass_ERROR_LOG [500]");
        }
        if ($status === "false"){
            if (file_exists("F1r_php.log")){
                $file = fopen("F1r_php.log","a");
                fwrite($file,"$he $message $time".PHP_EOL);
                fclose($file);
            } else {
                file_put_contents("F1r_php.log","$he $message $time".PHP_EOL);
            }
        } else if ($status === "true"){
            if (file_exists("F1r_php.log")){
                $file = fopen("F1r_php.log","a");
                fwrite($file,"$he $message $time ".PHP_EOL);
                fclose($file);
            } else {
                file_put_contents( "F1r_php.log","$he $message $time ".PHP_EOL );
            }
            die("oops!! please reload this page Error : $he");
        } else {
            self::error_log("true","please check document Class","PreClass_ERROR_LOG [500]");
        }
    }
    public static function creat_link($link,$name = "rand",$token){
        $shourt =  json_decode( file_get_contents( "https://f1r.ir/api/new/{$token}?url=$link&name=$name" ) );
        if ( isset($shourt->message) ){
            if ( $shourt->message == "successful" ){
                $array = [
                'link'=>$shourt->Short_URL,
                'status'=>$shourt->Information_URL
                ];
                return $array;
            }else {
                self::error_log("false", $shourt->message,"CLASS_CREAT_LINK [666]");
                return "opes!!";
            }
        } else {
            self::error_log("false","not found server","CLASS_CREAT_LINK [666]");
            return 'server error';
        }
        }
        public static function getview($name = null){
            $check = json_decode(file_get_contents("https://f1r.ir/api/info?name=$name"));
            if (isset($check->description)){
                return 'notfound link';
            } else {
                $array = [
                        "views"=> $check->result->views,
                        "date_created"=> $check->date->shamsi,
                        "Last_visit"=> $check->result->Last_visit,
                        "Redirect"=> $check->Redirect,
                        "Visits_today"=> $check->result->Visits_today,
                        "Real_hits"=> $check->result->Real_hits
                    ];
                return $array;
            }
        }
    }
