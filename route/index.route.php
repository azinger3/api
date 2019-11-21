<?php

$app->get('/', function ($request, $response, $args) {
	$result = "Hello World!";

	header("Content-Type: application/json");
	return json_encode($result);
});


$app->get('/status', function ($request, $response, $args) {
	$databaseAlias = database_alias(DATABASE_HOST);

	$StatusModel = new StatusModel();
	$StatusModel->DatabaseHost = $databaseAlias;
	$StatusModel->ConfigPath = CONFIG_PATH;
	$StatusModel->SiteRoot = SITE_ROOT;
	$StatusModel->ModelPath = MODEL_PATH;
	$StatusModel->FunctionPath = FUNCTION_PATH;
	$StatusModel->DataPath = DATA_PATH;
	$StatusModel->RemoteAddress = $_SERVER['REMOTE_ADDR'];
	$StatusModel->RemoteHost = $_SERVER['REMOTE_HOST'];
	$StatusModel->RemotePort = $_SERVER['REMOTE_PORT'];
	$StatusModel->RemoteUser = $_SERVER['REMOTE_USER'];
	$StatusModel->RemoteUserRedirect = $_SERVER['REDIRECT_REMOTE_USER'];
	$StatusModel->RequestMethod = $_SERVER['REQUEST_METHOD'];
	$StatusModel->RequestTime = $_SERVER['REQUEST_TIME'];
	$StatusModel->HTTPAcceptCharacterSet = $_SERVER['HTTP_ACCEPT_CHARSET'];
	$StatusModel->HTTPAcceptEncoding = $_SERVER['HTTP_ACCEPT_ENCODING'];
	$StatusModel->HTTPAcceptHeader = $_SERVER['HTTP_ACCEPT'];
	$StatusModel->HTTPAcceptLanguage = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
	$StatusModel->HTTPConnection = $_SERVER['HTTP_CONNECTION'];
	$StatusModel->HTTPHost = $_SERVER['HTTP_HOST'];
	$StatusModel->HTTPReferer = $_SERVER['HTTP_REFERER'];
	$StatusModel->HTTPSecure = $_SERVER['HTTPS'];
	$StatusModel->HTTPUserAgent = $_SERVER['HTTP_USER_AGENT'];
	$StatusModel->AuthenticationPassword = $_SERVER['PHP_AUTH_PW'];
	$StatusModel->AuthenticationType = $_SERVER['AUTH_TYPE'];
	$StatusModel->AuthenticationUser = $_SERVER['PHP_AUTH_USER'];
	$StatusModel->ServerAddress = $_SERVER['SERVER_ADDR'];
	$StatusModel->ServerAdministrator = $_SERVER['SERVER_ADMIN'];
	$StatusModel->ServerName = $_SERVER['SERVER_NAME'];
	$StatusModel->ServerPort = $_SERVER['SERVER_PORT'];
	$StatusModel->ServerProtocol = $_SERVER['SERVER_PROTOCOL'];
	$StatusModel->ServerSignature = $_SERVER['SERVER_SIGNATURE'];
	$StatusModel->ServerSoftware = $_SERVER['SERVER_SOFTWARE'];
	$StatusModel->ScriptFileName = $_SERVER['SCRIPT_FILENAME'];
	$StatusModel->ScriptName = $_SERVER['SCRIPT_NAME'];
	$StatusModel->ScriptPathTranslated = $_SERVER['PATH_TRANSLATED'];
	$StatusModel->ScriptURI = $_SERVER['REQUEST_URI'];
	$StatusModel->PathInformation = $_SERVER['PATH_INFO'];
	$StatusModel->PathInformationOriginal = $_SERVER['ORIG_PATH_INFO'];
	$StatusModel->DocumentRoot = $_SERVER['DOCUMENT_ROOT'];
	$StatusModel->GatewayInterface = $_SERVER['GATEWAY_INTERFACE'];
	$StatusModel->PHPSelf = $_SERVER['PHP_SELF'];

	header("Content-Type: application/json");
	return json_encode($StatusModel, JSON_PRETTY_PRINT);
});


$app->get('/hello[/{name}]', function ($request, $response, $args) {
	$response->write("Hello, " . $args["name"]);

	return $response;
})->setArgument('name', 'everyone! aws works! ready to develop!');
