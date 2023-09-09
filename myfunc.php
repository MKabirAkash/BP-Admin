<?php
function out( $data ) {
    $data = trim( $data );
    $data = stripslashes( $data );
    $data = htmlspecialchars( $data, ENT_QUOTES );
    return $data;
}
function onlyD( $data ) {
    $data = preg_replace( '/[^0-9]/', '', $data );
    return $data;
}
function onlyABC( $data, $excpt = '', $d = true) {
    if($d){
        $data = preg_replace( '/[^a-zA-Z0-9'.$excpt.']/', '', $data );
    }else{
        $data = preg_replace( '/[^a-zA-Z'.$excpt.']/', '', $data );
    }
    return $data;
}
function onlyUNICODE( $data, $excpt = '' ) {
    $data = preg_replace("/[^[:alnum:][:space:]".$excpt."]/u", '', $data);
    return $data;
}

function isprekey( $data ) {
    if(isset($_POST["prekey"]) && $_POST["prekey"] === $data){
        return TRUE;
    }
    return FALSE;
}
function isget( $data ) {
    if ( isset( $_GET[$data] ) && !empty( trim( $_GET[$data] ) ) ) {
        return TRUE;
    }
    return FALSE;
}
function ispost( $data ) {
    if ( isset( $_POST[$data] ) && !empty( trim( $_POST[$data] ) ) ) {
        return TRUE;
    }
    return FALSE;
}
function isdget( $data ) {
    if ( isset( $_GET[$data] ) && !empty( onlyD( $_GET[$data] ) ) ) {
        return TRUE;
    }
    return FALSE;
}
function isdpost( $data ) {
    if ( isset( $_POST[$data] ) && !empty( onlyD( $_POST[$data] ) ) ) {
        return TRUE;
    }
    return FALSE;
}
/****************************/
function postval( $data ) {
    return trim($_POST[$data]);
}
function postdval( $data ) {
    return ($_POST[$data]);
}
function getval( $data ) {
    return trim($_GET[$data]);
}
function getdval( $data ) {
    return ($_GET[$data]);
}
/****************************/
function isemail($email){ 
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}
function isphone($num){ 
    $num = ltrim( $num, "8" );
    if ( preg_match( "/^01[1-9]{1}[0-9]{8}$/", $num ) ){
        return TRUE;
    }
    return FALSE;
}
function getphone($num){ 
    $num = ltrim( $num, "8" );
    if ( preg_match( "/^01[1-9]{1}[0-9]{8}$/", $num ) ){
        return $num;
    }
    return FALSE;
}
/****************************/
function err_plus( $t, $bs = 'danger' ) {
    global $err;
    $err = ',{"stat":"'.$bs.'","msg":'.json_encode($t).'}';
    $err = ltrim($err,",");
}
function err_val() {
    global $err;
    global $errx;
    $errtmp = '';
    if(!empty($errx)){
        $errtmp = '{"stat":"danger","msg":"Please check all errors!"},{"stat":"errnote", "notes"🙁'.$errx.']}';
    }
    if(!empty($err)){
        $errtmp .= ','.$err;
        $errtmp = ltrim($errtmp,",");
    }
    if(!empty($errtmp)){
        return $errtmp;
    }
    return FALSE;
}
function err_die() {
    if(err_val()){
        die('['.err_val().']');
    }
}
function err_echo( $t, $bs = 'danger' ) {
    err_plus( $t, $bs = 'danger' );
    echo '['.err_val().']';
}
function errx_plus( $name, $t, $errmsg = false, $elem = '' ){
    global $errx;
    if($errmsg){
        $t = $errmsg;
    }
    if(empty($elem)){
        $elem = '[name=\"'.$name.'\"]';
    }
    $errx .= ',{"elem":"'.$elem.'","err":'.json_encode($t).'}';
    $errx = ltrim($errx,",");
}
/****************************/
function remote_str( $name, int $minl = 1, int $maxl = 9999, $vldt = '', $rquir = true, $errmsg = false ) {
    if(ispost($name)){
        $val = postval($name);
        if($minl > 0 && $minl < $maxl){
            if(strlen($val) >= $minl){
                if(strlen($val) <= $maxl){
                    if(empty($vldt)){
                        return $val;
                    }elseif($vldt === 'email'){
                        if(isemail($val)){
                            return $val;
                        }else{
                            errx_plus( $name, "Invalid email format!", $errmsg );
                        }
                    }elseif($vldt === 'phone'){
                        if(isphone($val)){
                            return $val;
                        }else{
                            errx_plus( $name, "Invalid phone number!", $errmsg );
                        }
                    }elseif(is_array($vldt)){
                        if(in_array( $val, $vldt)){
                            return $val;
                        }else{
                            errx_plus( $name, "Invalid value provided!", $errmsg );
                        }
                    }
                }else{
                    errx_plus( $name, "Maximum limit $maxl characters!", $errmsg );
                }
            }else{
                errx_plus( $name, "Minimum $minl characters required!", $errmsg );
            }
        }
    }else{
        if($rquir){
            errx_plus( $name, "This field is required!", $errmsg );
        }else{
            return '';
        }
    }
    return FALSE;
}
