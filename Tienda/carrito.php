<?php
session_start();

$mensaje ="";

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'agregar':
            if(is_numeric( openssl_decrypt($_POST['id'],COD,KEY))) 
            {
                $ID=openssl_decrypt($_POST['id'],COD,KEY);
                $mensaje .= 'Ok ID correcto'.$ID."</br>";
            }else{
                $mensaje .= 'Valor incorrecto de ID'.$ID."</br>";
            }

            if(is_string( openssl_decrypt($_POST['nombre'],COD,KEY))) 
            {
                $NOMBRE=openssl_decrypt($_POST['nombre'],COD,KEY);
                $mensaje .= 'Ok nombre correcto'.$NOMBRE."</br>";
            }else{
                $mensaje .= 'Valor incorrecto de nombre'.$NOMBRE."</br>";
            }
            if(is_numeric( openssl_decrypt($_POST['precio'],COD,KEY))) 
            {
                $PRECIO=openssl_decrypt($_POST['precio'],COD,KEY);
                $mensaje .= 'Ok precio correcto'.$PRECIO."</br>";
            }else{
                $mensaje .= 'Valor incorrecto de precio'.$PRECIO."</br>";
            }
            if(is_numeric( openssl_decrypt($_POST['cantidad'],COD,KEY))) 
            {
                $CANTIDAD=openssl_decrypt($_POST['cantidad'],COD,KEY);
                $mensaje .= 'Ok cantidad correcta'.$CANTIDAD."</br>";
            }else{
                $mensaje .= 'Valor incorrecto de cantidad'.$CANTIDAD."</br>";
            }

        if(!isset($_SESSION['CARRITO'])){
            $producto=array(
                'ID'=>$ID,
                'NOMBRE'=>$NOMBRE,
                'PRECIO'=>$PRECIO,
                'CANTIDAD'=>$CANTIDAD,
            );
            $_SESSION['CARRITO'][0]=$producto;
        }else{
            $numeroProducto=count($_SESSION['CARRITO']);
            $producto=array(
                'ID'=>$ID,
                'NOMBRE'=>$NOMBRE,
                'PRECIO'=>$PRECIO,
                'CANTIDAD'=>$CANTIDAD,
            );
            $_SESSION['CARRITO'][$numeroProducto]=$producto;
        }
        $mensaje = print_r($_SESSION,true);

        break;
    }

}

?>