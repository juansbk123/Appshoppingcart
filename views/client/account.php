<?php 
session_start();

if(empty($_SESSION['login']) || !$_SESSION['userData']['rol'] == "Cliente"){
    header('Location:../client/login.php');
}

if(!empty($_SESSION['userData']['fecha_nac'])){
    $arrDate = explode("-",$_SESSION['userData']['fecha_nac']);
    $year =  $arrDate[0];
    $month = $arrDate[1];
    $day = $arrDate[2];
}

include('../../models/user.php');
$user = new User();
$res = "";

if(isset($_POST['btn-datos'])) {
    if(empty($_POST['txtemail']) || empty($_POST['txtlastname']) || empty($_POST['txtname'])) {
        $res = "datos invalidos";
    }
    else {
        $name = $_POST['txtname'];
        $email = $_POST['txtemail'];
        $lastname = $_POST['txtlastname'];
        $birthdate = $_POST['d-year']."-".$_POST['d-month']."-".$_POST['d-day'];
        $id = $_SESSION['iduser'];
        $requser = $user->updateUser($id,$name,$lastname,$birthdate,$email);
        if($requser > 0) {
            $res = "Datos guardados correctamente";
            $arrData = $user->sessionLogin($_SESSION['iduser']);
            $_SESSION['userData'] = $arrData;
        }
        else {
            $res = "Error al actualizar";
        }
    } 
}
else if(isset($_POST['btn-pass'])) {
    if(empty($_POST['txtpass']) || $_POST['txtoldpass'] != $_SESSION['userData']['contraseña']) {
        $res = "datos invalidos";
    }
    else {
        $pass = $_POST['txtpass'];
        $id = $_SESSION['iduser'];
        $requser = $user->updatePass($id,$pass);
        if($requser > 0) {
            $res = "Datos guardados correctamente";
            $arrData = $user->sessionLogin($_SESSION['iduser']);
            $_SESSION['userData'] = $arrData;
        }
        else {
            $res = "Error al actualizar";
        }
    } 
}
session_write_close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi cuenta</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include("header.php"); ?>  
    <main>
        <div class="container">
            <div class="row">
                <div class="side-2">
                    <div class="menu-panel-usuario__seccion-cuenta"><div class="menu-panel-usuario__encabezado"><strong>MI CUENTA</strong></div><ul class="menu-panel-usuario__listado"><li><a href="account.php" class="menu-panel-usuario__datos"><span class="pull-xs-left">Mis datos</span><span class="clearfix"></span></a></li><li><a href="orders.php" class="menu-panel-usuario__cestas"><span class="pull-xs-left">Mis pedidos</span><span class="pull-xs-right"></span><span class="clearfix"></span></a></li></ul></div>
                </div>
                <div class="main-2">
                    <div class="encabezado-2">
                        <h2>Mis Datos</h2>
                    </div>
                    <div class="main-section">
                        <div class="section-1">
                            <form action="" name="" method="post" id="form-dp">
                                <h3>Datos Personales</h3>
                                <div class="data-row">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['userData']['nombre'] ?>" name="txtname">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['userData']['apellidos'] ?>" name="txtlastname">
                                    </div>
                                </div>
                                <div class="data-row">
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <div class="date">
                                            <select name="d-day" id="dob-day" class="form-control">
                                                <option value="">Dia</option>
                                                <?php for($i=1;$i<=31;$i++) {
                                                    if($i < 10){
                                                        $i2 = "0".$i;
                                                        echo ($i2 == $day) ? "<option value='{$i2}' selected>{$i2}</option>": "<option value='{$i2}'>{$i2}</option>";
                                                    }
                                                    else {
                                                        echo ($i == $day) ? "<option value='{$i}' selected>{$i}</option>": "<option value='{$i}'>{$i}</option>";  
                                                    } 
                                                } ?>
                                            </select>
                                            <select name="d-month" id="dob-month" class="form-control">
                                                <option value="">Mes</option>
                                                <?php for($i=1;$i<=12;$i++) {
                                                    if($i < 10){
                                                        $i2 = "0".$i;
                                                        echo ($i2 == $month) ? "<option value='{$i2}' selected>{$i2}</option>": "<option value='{$i2}'>{$i2}</option>";
                                                    }
                                                    else {
                                                        echo ($i == $month) ? "<option value='{$i}' selected>{$i}</option>": "<option value='{$i}'>{$i}</option>";  
                                                    } 
                                                } ?>
                                            </select>
                                            <select name="d-year" id="dob-year" class="form-control">
                                                <option value="">Año</option>
                                                <?php for($i=2021;$i>=1915;$i--) {
                                                    echo ($i == $year) ? "<option value='{$i}' selected>{$i}</option>": "<option value='{$i}'>{$i}</option>";
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="head" style="display: flex;justify-content:space-between;"><label for="">E-mail</label><span style="cursor:pointer;font-size:14px; color:#ff6000;text-align:right;" id="add">+ Añadir email adicional</span></div>
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['userData']['email'] ?>" name="txtemail">
                                    </div>
                                </div>
                                <div class="btn-box" id="btn-id">
                                    <input type="submit" value="Guardar cambios" class="btn btn-submit" name="btn-datos">
                                </div>
                            </form>
                        </div>
                        <div class="section-2">
                            <form action="" method="post" id="pass-form">
                                <h3>Contraseña</h3>
                                <div class="data-row">
                                    <div class="form-group">
                                        <label for="txtoldpass">Antigua Contraseña</label>
                                        <input type="password" class="form-control" id="old-pass" name="txtoldpass">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nueva Contraseña</label>
                                        <input type="password" class="form-control" id="new-pass-1" name="ddd">
                                    </div>
                                    <div class="form-group">
                                        <label for="txtpass">Repetir Contraseña</label>
                                        <input type="password" class="form-control" name="txtpass" id="new-pass-2">
                                    </div>
                                </div>
                                <div class="btn-box">
                                    <input type="submit" value="Guardar cambios" class="btn btn-submit" name="btn-pass">
                                </div>
                            </form>
                        </div>
                        <div class="section-3">
                            <h3>Direccion de envio</h3>
                            <div class="data-row" id="di-box">
                                <input type="button" value="Añadir direccion de envio" class="btn btn-submit" id="di">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
    const oldPass = document.getElementById('new-pass-1'),
          newPass = document.getElementById('new-pass-2'),
          passForm = document.getElementById('pass-form'),
          diButton = document.getElementById('di'),
          diBox = document.getElementById('di-box'),
          addEmail = document.getElementById('add');

    passForm.addEventListener('submit', (e)=>{
        if(oldPass.value != newPass.value){
            e.preventDefault();
            alert('Las contraseñas no son iguales');
        }
    })

    diButton.addEventListener('click',()=>{
        let div = document.createElement('div');
        div.className = "form-group";
        let label = document.createElement('label');
        label.textContent= "Direccion de Envio"
        let input_text = document.createElement('input');
        input_text.type = "text";
        input_text.className = "form-control";
        div.appendChild(label);
        div.appendChild(input_text);
        diBox.replaceChild(div,diButton);
        diBox.insertAdjacentHTML("afterend",`<div class="btn-box"><input type="submit" value="Guardar cambios" class="btn btn-submit" name="btn-pass"></div>`);
    })
    

    addEmail.addEventListener('click', (e)=>{
        let div_2 = document.createElement('div');
        div_2.classList = "data-row"
        let div = document.createElement('div');
        div.className = "form-group";
        let label = document.createElement('label');
        label.textContent= "Email 2"
        let input_text = document.createElement('input');
        input_text.type = "text";
        input_text.className = "form-control";
        div.appendChild(label);
        div.appendChild(input_text);
        div_2.appendChild(div);
        document.getElementById('btn-id').insertAdjacentElement("beforebegin",div_2)
        e.target.removeEventListener(e.type, arguments.callee);
    })


    </script>
</body>
</html>