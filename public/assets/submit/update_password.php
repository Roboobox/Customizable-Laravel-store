<?php
if (isset($_POST['cur_password'], $_POST['new_password'], $_POST['conf_password']))
{
    session_start();
    $formErrors = validateInput();
    if (empty($formErrors))
    {
        $userUpdateSql = "UPDATE user SET password_hash = :passwordHash WHERE id = :userId";
        // Create password hash from new password
        $hashedPassword = password_hash( $_POST[ 'conf_password' ], PASSWORD_DEFAULT );
        $stmt = $conn->prepare( $userUpdateSql );
        $stmt->bindParam( ':passwordHash', $hashedPassword );
        $stmt->bindParam( ':userId', $_SESSION[ 'user_id' ] );
        // Save new password in database
        $stmt->execute();
        $formSuccessMsg = "Password updated!";
        $_SESSION['form_success'] = "Password updated!";
    } else {
        $_SESSION['form_errors'] = $formErrors;
    }
    header('Location: ../../my-account.php?p=account-details#account-details');
    exit;
}
header('Location: index.php');
exit;

function validateInput() {
    $formErrors = array();
    // Check if new password and confirm password matches
    if ($_POST['new_password'] !== $_POST['conf_password']) {
        $formErrors['new_password'] = "Passwords do not match";
        $formErrors['conf_password'] = "";
        // Check for new password length requirements
    } else if (strlen($_POST['new_password']) < 8) {
        $formErrors['new_password'] = "Password must be at least 8 characters";
    } else if (strlen($_POST['new_password']) > 72) {
        $formErrors['new_password'] = "Password cannot exceed 72 characters";
    } else {
        // Check if current password matches users entered current password
        $stmt = $conn->prepare("SELECT password_hash FROM user WHERE id=:userId");
        $stmt->bindParam(':userId', $_SESSION['user_id']);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            if (!password_verify($_POST['cur_password'], $row['password_hash'])) {
                $formErrors['cur_password'] = "Incorrect password";
            }
        } else {
            $formErrors['cur_password'] = "Incorrect password";
        }
    }
    return $formErrors;
}