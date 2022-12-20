<?php

use App\LmsApi;

require 'vendor/autoload.php';
require 'config.php';

if (!TEST_USER_NAME || !TEST_USER_PASSWORD) {
    die('Please set TEST_USER_NAME and TEST_USER_PASSWORD in config.php');
}

define('APP_ROOT', dirname(__DIR__));

$api = new LmsApi;

/* Legenda campi custom:
    35: Contratto CRM
    3: Gruppo iscrizione
    37: Attestato Mail
    5: Scrivi il tuo Codice Fiscale
    38: Invio Attestato Utente
    6: Utente: Telefono
    39: Soggetto Organizzatore
    7: Scrivi il tuo Cellulare per darti assistenza
    9: Referente: Cognome
    10: Referente: Nome
    12: Referente: Cell.
    14: Referente: E-Mail
    15: Fatturazione: Rag. Sociale
    16: Fatturazione: C.F.
    17: P.I. o ripetere il C.F.
 */

$response = $api->createUser([
    'userid' => TEST_USER_NAME,
    'firstname' => 'Nome',
    'lastname' => 'Cognome',
    'password' => TEST_USER_PASSWORD,
    'email' => "email@example.com",
    'valid' => 1,
    'force_change' => 1,
    'role' => 'user',
    'orgchart' => 'Crea SSO',
    '_customfields[35]' => 'OFF2200114CG',
    '_customfields[3]' => 'SSO',
    '_customfields[37]' => '',
    '_customfields[5]' => '',
    '_customfields[38]' => 'Si',
    '_customfields[6]' => '',
    '_customfields[39]' => '',
    '_customfields[7]' => '',
    '_customfields[9]' => '',
    '_customfields[10]' => '',
    '_customfields[12]' => '',
    '_customfields[14]' => '',
    '_customfields[15]' => '',
    '_customfields[16]' => '',
    '_customfields[17]' => '',
]);

print_r($response);
