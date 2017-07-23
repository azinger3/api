<?php

if($_SERVER['REQUEST_METHOD'] != 'OPTIONS') {		
    $LogData = new LogData();

    $LogData->ApplicationID = "1";
    $LogData->RemoteAddress = $_SERVER['REMOTE_ADDR'];
    $LogData->RemoteHost = $_SERVER['REMOTE_HOST'];
    $LogData->RemotePort = $_SERVER['REMOTE_PORT'];
    $LogData->RemoteUser = $_SERVER['REMOTE_USER'];
    $LogData->RemoteUserRedirect = $_SERVER['REDIRECT_REMOTE_USER'];
    $LogData->RequestMethod = $_SERVER['REQUEST_METHOD'];
    $LogData->RequestTime = $_SERVER['REQUEST_TIME'];
    $LogData->HTTPAcceptCharacterSet = $_SERVER['HTTP_ACCEPT_CHARSET'];
    $LogData->HTTPAcceptEncoding = $_SERVER['HTTP_ACCEPT_ENCODING'];
    $LogData->HTTPAcceptHeader = $_SERVER['HTTP_ACCEPT'];
    $LogData->HTTPAcceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
    $LogData->HTTPConnection = $_SERVER['HTTP_CONNECTION'];
    $LogData->HTTPHost = $_SERVER['HTTP_HOST'];
    $LogData->HTTPReferer = $_SERVER['HTTP_REFERER'];
    $LogData->HTTPSecure = $_SERVER['HTTPS'];
    $LogData->HTTPUserAgent = $_SERVER['HTTP_USER_AGENT'];
    $LogData->AuthenticationPassword = $_SERVER['PHP_AUTH_PW'];
    $LogData->AuthenticationType = $_SERVER['AUTH_TYPE'];
    $LogData->AuthenticationUser = $_SERVER['PHP_AUTH_USER'];
    $LogData->ServerAddress = $_SERVER['SERVER_ADDR'];
    $LogData->ServerAdministrator = $_SERVER['SERVER_ADMIN'];
    $LogData->ServerName = $_SERVER['SERVER_NAME'];
    $LogData->ServerPort = $_SERVER['SERVER_PORT'];
    $LogData->ServerProtocol = $_SERVER['SERVER_PROTOCOL'];
    $LogData->ServerSignature = $_SERVER['SERVER_SIGNATURE'];
    $LogData->ServerSoftware = $_SERVER['SERVER_SOFTWARE'];
    $LogData->ScriptFileName = $_SERVER['SCRIPT_FILENAME'];
    $LogData->ScriptName = $_SERVER['SCRIPT_NAME'];
    $LogData->ScriptPathTranslated = $_SERVER['PATH_TRANSLATED'];
    $LogData->ScriptURI = $_SERVER['REQUEST_URI'];
    $LogData->PathInformation = $_SERVER['PATH_INFO'];
    $LogData->PathInformationOriginal = $_SERVER['ORIG_PATH_INFO'];
    $LogData->DocumentRoot = $_SERVER['DOCUMENT_ROOT'];
    $LogData->GatewayInterface = $_SERVER['GATEWAY_INTERFACE'];
    $LogData->PHPSelf = $_SERVER['PHP_SELF'];
    $LogData->QueryString = $_SERVER['QUERY_STRING'];

    $result = $LogData->ApplicationLogInsert();
}
