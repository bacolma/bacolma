<?php

Class Query{

/** alls */
public function getUsers(){
    $qr="select idusers, username, pasword, datecreation from leonardoexpress_app.users";
    return $qr;
}

public function getPedidos(){
    $qr="select idpedidos, idclientes, serie, guia, codigo, origen, destino, fechacreacion, descripcion from leonardoexpress_app.pedidos where view=1";
    return $qr;
}


public function getPedidosFind($id){
  $qr="select idpedidos, idclientes, serie, guia, codigo, origen, destino, fechacreacion, descripcion from leonardoexpress_app.pedidos where view=1 and idpedidos='$id'";
  return $qr;
}

public function getFindEnvios($serie, $guia, $codigo){
  $qr="select idpedidos, idclientes, serie, guia, codigo, origen, destino, fechacreacion, descripcion from leonardoexpress_app.pedidos where serie='$serie' and guia='$guia' and codigo='$codigo'";
  return $qr;
}

public function getSucursales(){
    $qr="select idsucursal, nombre, provincia, distrito, direccion, telefono, status from leonardoexpress_app.sucursal";
    return $qr;
}

public function getClientes(){
    $qr="select idclientes, tipodoc, docid, nombres, apellidos, telefono, email from leonardoexpress_app.clientes";
    return $qr;
}

public function getEmpleados(){
    $qr="select idempleados, tipodoc, docid, direccion, sucursal, telefono from leonardoexpress_app.empleados";
    return $qr;
}

/**  validate  */

public function getValidusers($p1, $p2){
    $qr="SELECT u.idusers, username, pasword, datecreation FROM leonardoexpress_app.users u where u.username='$p1' and u.pasword='$p2'";
    return $qr;
  }


  public function setCliente($p1, $p2, $p3, $p4, $p5, $p6){
    $qr="insert into leonardoexpress_app.clientes (tipodoc, docid, nombres, apellidos, telefono, email) values('$p1', '$p2', '$p3', '$p4', '$p5', '$p6')";
    return $qr;
  }

  public function setPedido($p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8){
    $qr="insert into leonardoexpress_app.pedidos (idclientes, serie, guia, codigo, origen, destino, fechacreacion, descripcion, view) values('$p1', '$p2', '$p3', '$p4', '$p5', '$p6',now(),'$p7','$p8')";
    return $qr;
  }

  public function getValicli($p1){
    $qr="select count(*) d from leonardoexpress_app.clientes where docid='$p1'";
    return $qr;
  }
 
  public function getValipedido($p1, $p2){
    $qr="select count(*) d from leonardoexpress_app.pedidos where serie='$p1' and guia='$p2' and view=1";
    return $qr;
  }



}

?>