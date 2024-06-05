<?php

$pdo = null;

    try {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=greenta',
            'root',
            '',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );

          echo ("connected successfully");

    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
?>