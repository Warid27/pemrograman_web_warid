<?php
// Check if form data is posted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    // Check if user and pass are not empty
    if (!empty($user) && !empty($pass)) {
        try {
            // Try fetching user data from tb_user
            $sqlUser = "SELECT * FROM tb_user WHERE user = :user";
            $stmt = $pdo->prepare($sqlUser);
            $stmt->bindParam(':user', $user, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            // If user is not found in tb_user, check tb_siswa
            if (!$data) {
                $sqlSiswa = "SELECT * FROM tb_siswa WHERE user = :user";
                $stmt = $pdo->prepare($sqlSiswa);
                $stmt->bindParam(':user', $user, PDO::PARAM_STR);
                $stmt->execute();
                $data = $stmt->fetch(PDO::FETCH_ASSOC);

                // Assign default role for siswa
                if ($data) {
                    $data['lvl'] = 'siswa';
                }
            }

            // If user not found in both tables, show alert
            if (!$data) {
                $_SESSION['alert'] = 'empty_fields';
                redirectToLogin();
            }

            // Compare the entered password (plaintext) with the hashed password
            if (password_verify($pass, $data['pass'])) {
                // Set session data
                $_SESSION['user'] = $data['user'];
                $_SESSION['nama'] = $data['nama'] ?? $data['user']; // Only for tb_siswa
                $_SESSION['id'] = $data['id_user'] ?? $data['nis'];
                $_SESSION['role'] = $data['lvl'];
                $_SESSION['alert'] = 'success_login';

                // Set redirection page based on role
                $pageName = (in_array($data['lvl'], ['admin', 'petugas', 'wakasek', 'walikelas', 'siswa'])) ? 'dashboard' : 'login';
                $_SESSION['alert'] = ($pageName === 'login') ? 'failed_login' : $_SESSION['alert'];

                // Redirect to the appropriate page
                redirectToPage($pageName);
            } else {
                // Incorrect password
                $_SESSION['alert'] = 'failed_login';
                redirectToLogin();
            }
        } catch (PDOException $e) {
            // Log the error and redirect
            error_log("Login Error: " . $e->getMessage());
            $_SESSION['alert'] = 'error_occurred';
            redirectToLogin();
        }
    } else {
        // Handle empty user or pass
        $_SESSION['alert'] = 'empty_fields';
        redirectToLogin();
    }
} else {
    redirectToLogin();
}

// Helper function to redirect to login
function redirectToLogin() {
    echo "<script>window.location.href = '?page=login&alert=" . $_SESSION['alert'] . "';</script>";
    exit();
}

// Helper function to redirect to the specified page
function redirectToPage($page) {
    echo "<script>window.location.href = '?page=$page&alert=" . $_SESSION['alert'] . "';</script>";
    exit();
}
?>
