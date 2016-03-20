<?php
if(isset($_POST['radio_val']))
{
    $val=$_POST['radio_val'];
    $sql="INSERT INTO rapportdemande(avis) VALUES (.$val.)";
}