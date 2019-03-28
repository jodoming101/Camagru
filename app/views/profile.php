<!DOCTYPE html>

<html>
    <?php include_once 'header.php'; ?>

    <body class="Profile">

    <div class="content">
        <h2>Profile</h2>
        <div>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><?=$_SESSION['name']?></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><?=$password?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?=$email?></td>
                </tr>
            </table>
        </div>
    </div>
    </body>
    <?php include_once 'footer.php'; ?>
</html>