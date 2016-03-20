<?php
if(isset($_POST['send']))
{
    $tomail=$_POST['mail'];
    $sujet=$_POST['sujet'];
    $message=$_POST['message'];

    $file_tmpname=$_FILES['doc']['tmp_name'];
    $piece=$_FILES['doc']['name'];
    $file_size=$_FILES['doc']['size'];
    $file_type=$_FILES['doc']['type'];
    $extension = $fileInfos['extension'];

    $sendmail = mail($tomail,$sujet,$message,$piece);

    if($sendmail == true)
    {
        $msg="<div class='alert alert-success alert-dismissible text-center' role='alert'>Message envoy&eacute; !</div>";
    }
    else
    {
        $msg="<div class='alert alert-danger alert-dismissable text-center' role='alert'>Message non envoy&eacute; !</div>";
    }
}
?>
<html>
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<br>

<div class="container">
    <div>
        <button class="btn btn-info" onclick="goBack()">Retour</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </div><br>

    <div align="center">

        <?php if(!empty($msg)):?>
            <div><p><strong class="text-center"><?php echo $msg;?></strong></p></div>
        <?php endif;?>

        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-lg-2 control-label">Destinataire:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="email" name="mail">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Sujet:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="text" name="sujet">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Message:</label>
                <div class="col-lg-8">
                    <textarea class="form-control" rows="15" cols="70" name="message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Piece-jointe</label>
                <div class="col-lg-3">
                    <input type="file" name="doc">
                </div>
            </div>
            <div class="form-group">
                <div>
                    <button class="btn btn-primary" type="submit" name="send">Envoyer</button>
                </div>
            </div>

        </form>

    </div>
</div>
</body>
</html>