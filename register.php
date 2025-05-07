<?php
include 'pb.php';

if($_SERVER['REQUEST_METHOD']==='POST')
{
    $ime=$_POST['ime'];
    $email=$_POST['email'];
    $geslo=$_POST['geslo'];
    $potrdi_geslo=$_POST['potrdi_geslo'];
    
    if(!empty($ime)&& !empty($email) && !empty($geslo) && !empty($potrdi_geslo)
    && $geslo === $potrdi_geslo)
    {
        $hashedPassword=password_hash($geslo,PASSWORD_DEFAULT);

        $stmt=$povezava->prepare("INSERT INTO uporabniki(ime, email,geslo) 
        values (?,?,?)");
        $stmt->execute([$ime,$email,$hashedPassword]);

        header("Location:index.html");
        exit;
    }

}
?>

<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Registracija novih uporabnikov</h2>
        <form action="" method="post" class="shadow p-4 rounded bg-light">
            <div class="mb-3">
                <label for="ime" class="form-label">Ime:</label>
                <input type="text" name="ime" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="geslo" class="form-label">Geslo:</label>
                <input type="password" name="geslo" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="potrdi_geslo" class="form-label">Potrdi geslo:</label>
                <input type="password" name="potrdi_geslo" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Registriraj se!</button>
            <button type="submit" class="btn btn-danger w-100"><a href="index.html">Nazaj na glavno stran!</a></button>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
