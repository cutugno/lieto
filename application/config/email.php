<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'mail.nauticalieto.com';
$config['smtp_user'] = 'nauticalieto';
$config['smtp_pass'] = 'PwGabriEle2017';
$config['smtp_port'] = '465';
$config['smtp_crypto'] = 'ssl';
$config['mailtype'] = 'html'; 

$config['to_contatti']='contatti@nauticalieto.com';
$config['to_contatti_name']='Contatti Nautica Lieto';
$config['subject_contatti']='Richiesta contatti da www.nauticalieto.com';
$config['to_preventivo']='preventivi@nauticalieto.com';
$config['to_preventivo_name']='Preventivi Nautica Lieto';
$config['subject_preventivo']='Richiesta preventivo da www.nauticalieto.com';
?>
