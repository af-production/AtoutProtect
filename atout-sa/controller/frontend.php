<?php

// Chargement des classes
require_once('model/ListLicence.php');

function getLicences()
{
    $ListLicence = new \AtoutSA\Model\Licence();
    $list = $ListLicence->getLicences();

    require('view/frontend/ListLicence.php');
}

function getLicence()
{
    $ListLicenceById = new \AtoutSA\Model\Licence();
    $listById = $ListLicenceById->getLicence($_GET['idLicence']);
    require('view/frontend/buyLicence.php');
}