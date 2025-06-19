<?php
// auth.php

// Fungsi cek akses hanya untuk 1 role (admin / owner / dll)
function checkAccess($expected_role) {
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== $expected_role) {
        header('Location: login.php?error=wronged');
        exit();
    }
}

function checkAccessRoles(array $allowed_roles) {
    if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowed_roles)) {
        header('Location: login.php?error=unauthorized');
        exit();
    }
}

