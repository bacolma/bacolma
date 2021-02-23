<?php

Class query{

public function getfindlinks($id){
    $qr="select idlinks, url, view, name from ramcolba.links where idusers=$id";
    return $qr;
}

}
?>