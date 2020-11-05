<?php
require 'assets/inc/header.php';

if (isset($_SESSION['email']) && '1' == $_SESSION['role']) {
    if (isset($_POST['submit-signup'])) {
        $lastname = htmlspecialchars($_POST['lastname']);
        $mail = htmlspecialchars($_POST['mail']);
        $password1 = htmlspecialchars($_POST['password1']);
        $password2 = htmlspecialchars($_POST['password2']);
        $roles = '2';

        if ($sql = $db->query("SELECT * FROM user WHERE email = '{$mail}'")) {
            $compteur = $sql->rowCount();
            if (0 != $compteur) {
                $message = "<div class ='alert1'> Il y a déja un compte possédant cet e-mail </div>";
            } elseif (!empty($mail) && !empty($mail)) {
                if ($password1 == $password2) {
                    $password1 = password_hash($password1, PASSWORD_DEFAULT);
                    $sth = $db->prepare('INSERT INTO user (pseudo, email, mdp, role) VALUES (:pseudo, :email, :mdp, :role)');

                    $sth->bindValue(':pseudo', $lastname);
                    $sth->bindValue(':email', $mail);
                    $sth->bindValue(':mdp', $password1);
                    $sth->bindValue(':role', $roles);

                    $sth->execute();
                }
            }
        }
    } ?>
<div>
    <form action="ajoutuser.php" method="POST" class="formajoutuser">
        <div>
            <input type="text" id="lastname" name="lastname" placeholder="Nom" class="username">
        </div>
        <div>
            <input type="mail" id="mail" name="mail" placeholder="Mail" class="formuser">
        </div>
        <div>
            <input type="password" name="password1" class="form-control" id="password1" placeholder="votre mot de passe" class="formuser1">
        </div>
        <div>
            <input type="password" name="password2" class="form-control" id="password2" placeholder="votre mot de passe">
        </div>
        <button type="submit" name="submit-signup" class="btninscription">Inscription</button>
        <button type="submit" name="retour" class="btnretour">Retour</button>
    </form>

</div>

<?php
} else {
        ?>
    <div class="diverreur">
        <p class="perreur">veuillez vous connecter pour avoir accés a cette page</p>
        <a href="index.php" type="submit" class="inputbtn retour">Retour</a>
    </div>
  <?php
    }

    require 'assets/inc/footer.php';
    ?> 