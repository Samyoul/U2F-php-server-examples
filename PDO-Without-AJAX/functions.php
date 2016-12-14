<?php
/**
 * Created by IntelliJ IDEA.
 * User: samuel
 * Date: 13/12/2016
 * Time: 16:48
 */
use Samyoul\U2F\U2FServer\Registration;

/**
 * @param string $location
 */
function redirect($location)
{
    header("Location: $location");die();
}

/**
 * @return string
 */
function appID()
{
    $scheme = isset($_SERVER['HTTPS']) ? "https://" : "http://";
    return $scheme . $_SERVER['HTTP_HOST'];
}

/**
 * @return PDO $pdo
 */
function getDBConnection()
{
    $SQLiteFile = __DIR__ . '/database/database.sqlite';
    $pdo = new PDO("sqlite:$SQLiteFile");

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
}

function getUser($name)
{
    $pdo = getDBConnection();
    $statement = $pdo->prepare("SELECT * FROM users WHERE NAME = ?");
    $statement->execute([$name]);

    return $statement->fetch();
}

function getU2FRegistrations(stdClass $user)
{
    $pdo = getDBConnection();
    $statement = $pdo->prepare("SELECT * FROM registrations WHERE user_id = ?");
    $statement->execute([$user->id]);

    return $statement->fetchAll();
}

function storeU2FRegistration(stdClass $user, Registration $registration)
{
    $pdo = getDBConnection();
    $statement = $pdo->prepare("
        INSERT INTO registrations
        (user_id, keyHandle, publicKey, certificate, counter)
        VALUES (?, ?, ?, ?, ?)
    ");
    $statement->execute([
        $user->id,
        $registration->getKeyHandle(),
        $registration->getPublicKey(),
        $registration->getCertificate(),
        $registration->getCounter()
    ]);

}

function updateU2FRegistration(stdClass $registration)
{
    $pdo = getDBConnection();
    $statement = $pdo->prepare("UPDATE registrations SET counter = ? WHERE id = ?");
    $statement->execute([$registration->counter, $registration->id]);
}