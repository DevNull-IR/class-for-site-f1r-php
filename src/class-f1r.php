<?php
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
                file_put_contents("F1r_php.log","$he $message $time ".PHP_EOL);
            }
            die("oops!! please reload this page Error : $he");
        } else {
            self::error_log("true","please check document Class","PreClass_ERROR_LOG [500]");
        }
    }
    public static function creat_link($link,$name = "rand",$token){
        $shourt =  json_decode(file_get_contents("https://f1r.ir/api/v2/?url=$link&name=$name&token=$token"));
        if (isset($shourt->description)){
            if ($shourt->description == "successful"){
                $array = [
                'name'=>$shourt->result->name,
                'link'=>$shourt->result->link,
                'status'=>$shourt->result->status
                ];
                return $array;
            } else if ($shourt->description == "error in server"){
                self::error_log("false","not found link","CLASS_CREAT_LINK [666]");
                return "error";
            } else if ($shourt->description == "error : token is worng"){
                self::error_log("false","token not found","CLASS_CREAT_LINK [666]");
                return "token not found";
            } else {
                self::error_log("false","not found description","CLASS_CREAT_LINK [666]");
                return "opes!!";
            }
        } else {
            self::error_log("false","not found server","CLASS_CREAT_LINK [666]");
            return 'server error';
        }
            
        }
        public static function getview($name = null){
            $check = json_decode(file_get_contents("https://f1r.ir/api/v2/status/?name=$name"));
            if (isset($check->description)){
                return 'notfound link';
            } else {
                $array = [
                        "views"=> $check->result->views,
                        "date_created"=> $check->result->date_created,
                        "Last_visit"=> $check->result->Last_visit,
                        "Redirect"=> $check->result->Redirect,
                        "Visits_today"=> $check->result->Visits_today,
                        "Real_hits"=> $check->result->Real_hits
                    ];
                return $array;
            }
        }
    }
