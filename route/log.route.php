<?php

$app->post('/application/log', function ($request, $response, $args) {

    $data = $request->getParsedBody();

    $applicationID = $data["ApplicationID"];
    $remoteAddress = $data["RemoteAddress"];
    $remoteHost = $data["RemoteHost"];
    $remotePort = $data["RemotePort"];
    $remoteUser = $data["RemoteUser"];
    $remoteUserRedirect = $data["RemoteUserRedirect"];
    $requestMethod = $data["RequestMethod"];
    $requestTime = $data["RequestTime"];
    $httpAcceptCharacterSet = $data["HTTPAcceptCharacterSet"];
    $httpAcceptEncoding = $data["HTTPAcceptEncoding"];
    $httpAcceptHeader = $data["HTTPAcceptHeader"];
    $httpAcceptLanguage = $data["HTTPAcceptLanguage"];
    $httpConnection = $data["HTTPConnection"];
    $httpHost = $data["HTTPHost"];
    $httpReferer = $data["HTTPReferer"];
    $httpSecure = $data["HTTPSecure"];
    $httpUserAgent = $data["HTTPUserAgent"];
    $authenticationPassword = $data["AuthenticationPassword"];
    $authenticationType = $data["AuthenticationType"];
    $authenticationUser = $data["AuthenticationUser"];
    $serverAddress = $data["ServerAddress"];
    $serverAdministrator = $data["ServerAdministrator"];
    $serverName = $data["ServerName"];
    $serverPort = $data["ServerPort"];
    $serverProtocol = $data["ServerProtocol"];
    $serverSignature = $data["ServerSignature"];
    $serverSoftware = $data["ServerSoftware"];
    $scriptFileName = $data["ScriptFileName"];
    $scriptName = $data["ScriptName"];
    $scriptPathTranslated = $data["ScriptPathTranslated"];
    $scriptURI = $data["ScriptURI"];
    $pathInformation = $data["PathInformation"];
    $pathInformationOriginal = $data["PathInformationOriginal"];
    $documentRoot = $data["DocumentRoot"];
    $gatewayInterface = $data["GatewayInterface"];
    $phpSelf = $data["PHPSelf"];
    $queryString = $data["QueryString"];

    if ($data["ScriptURI"] != "/application/log")
    {
        $LogData = new LogData();
        $LogData->ApplicationID = $applicationID;
        $LogData->RemoteAddress = $remoteAddress;
        $LogData->RemoteHost = $remoteHost;
        $LogData->RemotePort = $remotePort;
        $LogData->RemoteUser = $remoteUser;
        $LogData->RemoteUserRedirect = $remoteUserRedirect;
        $LogData->RequestMethod = $requestMethod;
        $LogData->RequestTime = $requestTime;
        $LogData->HTTPAcceptCharacterSet = $httpAcceptCharacterSet;
        $LogData->HTTPAcceptEncoding = $httpAcceptEncoding;
        $LogData->HTTPAcceptHeader = $httpAcceptHeader;
        $LogData->HTTPAcceptLanguage = $httpAcceptLanguage;
        $LogData->HTTPConnection = $httpConnection;
        $LogData->HTTPHost = $httpHost;
        $LogData->HTTPReferer = $httpReferer;
        $LogData->HTTPSecure = $httpSecure;
        $LogData->HTTPUserAgent = $httpUserAgent;
        $LogData->AuthenticationPassword = $authenticationPassword;
        $LogData->AuthenticationType = $authenticationType;
        $LogData->AuthenticationUser = $authenticationUser;
        $LogData->ServerAddress = $serverAddress;
        $LogData->ServerAdministrator = $serverAdministrator;
        $LogData->ServerName = $serverName;
        $LogData->ServerPort = $serverPort;
        $LogData->ServerProtocol = $serverProtocol;
        $LogData->ServerSignature = $serverSignature;
        $LogData->ServerSoftware = $serverSoftware;
        $LogData->ScriptFileName = $scriptFileName;
        $LogData->ScriptName = $scriptName;
        $LogData->ScriptPathTranslated = $scriptPathTranslated;
        $LogData->ScriptURI = $scriptURI;
        $LogData->PathInformation = $pathInformation;
        $LogData->PathInformationOriginal = $pathInformationOriginal;
        $LogData->DocumentRoot = $documentRoot;
        $LogData->GatewayInterface = $gatewayInterface;
        $LogData->PHPSelf = $phpSelf;
        $LogData->QueryString = $queryString;
        $result = $LogData->ApplicationLogInsert();

        header("Content-Type: application/json");
        return json_encode($result, JSON_PRETTY_PRINT);
    }
});