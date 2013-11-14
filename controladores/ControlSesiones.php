<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControlSesiones
 *
 * @author webmaster
 */
class ControlSesiones {
    function verCredenciales($user,$pass){
        $pass = MD5($pass);
        
        $dbo = new Dbexec();
        $sql = "
            SELECT usuario.nombre,
               usuario.usuario_id,
               rol.nombre AS rol,
               rol.rol_id,       
               funcion.funcion_id,
               funcion.nombre as funcion
          FROM    (   (   usuario usuario
                       INNER JOIN
                          rol rol
                       ON (usuario.rol_id = rol.rol_id))
                   INNER JOIN
                      permiso permiso
                   ON (permiso.rol_id = rol.rol_id))
               INNER JOIN
                  funcion funcion
               ON (permiso.funcion_id = funcion.funcion_id)
          WHERE 
            usuario.login = '{$user}' AND usuario.clave = '$pass';";
            
   
            
       $dbo->queryExecute($sql);
       if($dbo->numeroFilas()>0){
           $_SESSION['user_session']="ok";
           
           $permisos = Array();
           while ($r = $dbo->getArray()){
               $permisos[] = $r['funcion'];
               $_SESSION['user_nombre']=$r['nombre'];
           }
           $_SESSION['user_permisions'] = $permisos;
           $_SESSION['user_session_ttl'] = mktime( date('H')+1,date('i'),date('s'),date('n'),date('j'),date('Y') );
           return true;
           
       }else{
           return false;
       }
                   
    }
    
    
       function acl($permiso){
           $p = $_SESSION['user_permisions'];
           //print_r($_SESSION);
           if(in_array($permiso, $p)){
               return true;
           }else{
               return false;
           }
       }
       
       function sessionTtl(){
           $now = mktime( date('H'),date('i'),date('s'),date('n'),date('j'),date('Y') );
           if($_SESSION['user_session_ttl'] > $now  ){
               $_SESSION['user_session_ttl'] = mktime( date('H')+1,date('i'),date('s'),date('n'),date('j'),date('Y') );
               return true;
           }else{
                $_SESSION['user_session']=false;
                $_SESSION['user_permisions']=false;
                $_SESSION['user_session_ttl']=false; 
                return false;
           }
       }
       
       function logOut(){
            $_SESSION['user_session']=false;
            $_SESSION['user_permisions']=false;
            $_SESSION['user_session_ttl']=false; 
            return true;
       }
       
       function sessionActive(){
           if($_SESSION['user_session']!='ok'){
               return false;
           }
           
           if(!self::sessionTtl()){
               return false;
           }
           return true;
       }
       
       function confirmAcl ($_permiso = false){
           
           
           if($_permiso && !self::acl($_permiso) ){
               return false;
           }
           
           
           
       }
}

?>
