<?php

class LogData extends LogModel
{
	public function ApplicationLogInsert()
	{
		try
		{
			// Open database connection
			$database = new Database();

			// Set the error reporting attribute
			$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Build database statement
			$sql = "CALL ApplicationLogInsert(:ApplicationID, :RemoteAddress, :RemoteHost, :RemotePort, :RemoteUser ,:RemoteUserRedirect ,:RequestMethod ,:RequestTime ,:HTTPAcceptCharacterSet ,:HTTPAcceptEncoding ,:HTTPAcceptHeader ,:HTTPAcceptLanguage ,:HTTPConnection ,:HTTPHost ,:HTTPReferer ,:HTTPSecure ,:HTTPUserAgent ,:AuthenticationPassword ,:AuthenticationType ,:AuthenticationUser ,:ServerAddress ,:ServerAdministrator ,:ServerName ,:ServerPort ,:ServerProtocol ,:ServerSignature ,:ServerSoftware ,:ScriptFileName ,:ScriptName ,:ScriptPathTranslated ,:ScriptURI ,:PathInformation ,:PathInformationOriginal ,:DocumentRoot ,:GatewayInterface ,:PHPSelf ,:QueryString)";

			$statement = $database->prepare($sql);
            $statement->bindParam(':ApplicationID', $this->ApplicationID, PDO::PARAM_INT);
            $statement->bindParam(':RemoteAddress', $this->RemoteAddress, PDO::PARAM_STR);
            $statement->bindParam(':RemoteHost', $this->RemoteHost, PDO::PARAM_STR);
            $statement->bindParam(':RemotePort', $this->RemotePort, PDO::PARAM_STR);
            $statement->bindParam(':RemoteUser', $this->RemoteUser, PDO::PARAM_STR);
            $statement->bindParam(':RemoteUserRedirect', $this->RemoteUserRedirect, PDO::PARAM_STR);
            $statement->bindParam(':RequestMethod', $this->RequestMethod, PDO::PARAM_STR);
            $statement->bindParam(':RequestTime', $this->RequestTime, PDO::PARAM_STR);
            $statement->bindParam(':HTTPAcceptCharacterSet', $this->HTTPAcceptCharacterSet, PDO::PARAM_STR);
            $statement->bindParam(':HTTPAcceptEncoding', $this->HTTPAcceptEncoding, PDO::PARAM_STR);
            $statement->bindParam(':HTTPAcceptHeader', $this->HTTPAcceptHeader, PDO::PARAM_STR);
            $statement->bindParam(':HTTPAcceptLanguage', $this->HTTPAcceptLanguage, PDO::PARAM_STR);
            $statement->bindParam(':HTTPConnection', $this->HTTPConnection, PDO::PARAM_STR);
            $statement->bindParam(':HTTPHost', $this->HTTPHost, PDO::PARAM_STR);
            $statement->bindParam(':HTTPReferer', $this->HTTPReferer, PDO::PARAM_STR);
            $statement->bindParam(':HTTPSecure', $this->HTTPSecure, PDO::PARAM_STR);
            $statement->bindParam(':HTTPUserAgent', $this->HTTPUserAgent, PDO::PARAM_STR);
            $statement->bindParam(':AuthenticationPassword', $this->AuthenticationPassword, PDO::PARAM_STR);
            $statement->bindParam(':AuthenticationType', $this->AuthenticationType, PDO::PARAM_STR);
            $statement->bindParam(':AuthenticationUser', $this->AuthenticationUser, PDO::PARAM_STR);
            $statement->bindParam(':ServerAddress', $this->ServerAddress, PDO::PARAM_STR);
            $statement->bindParam(':ServerAdministrator', $this->ServerAdministrator, PDO::PARAM_STR);
            $statement->bindParam(':ServerName', $this->ServerName, PDO::PARAM_STR);
            $statement->bindParam(':ServerPort', $this->ServerPort, PDO::PARAM_STR);
            $statement->bindParam(':ServerProtocol', $this->ServerProtocol, PDO::PARAM_STR);
            $statement->bindParam(':ServerSignature', $this->ServerSignature, PDO::PARAM_STR);
            $statement->bindParam(':ServerSoftware', $this->ServerSoftware, PDO::PARAM_STR);
            $statement->bindParam(':ScriptFileName', $this->ScriptFileName, PDO::PARAM_STR);
            $statement->bindParam(':ScriptName', $this->ScriptName, PDO::PARAM_STR);
            $statement->bindParam(':ScriptPathTranslated', $this->ScriptPathTranslated, PDO::PARAM_STR);
            $statement->bindParam(':ScriptURI', $this->ScriptURI, PDO::PARAM_STR);
            $statement->bindParam(':PathInformation', $this->PathInformation, PDO::PARAM_STR);
            $statement->bindParam(':PathInformationOriginal', $this->PathInformationOriginal, PDO::PARAM_STR);
            $statement->bindParam(':DocumentRoot', $this->DocumentRoot, PDO::PARAM_STR);
            $statement->bindParam(':GatewayInterface', $this->GatewayInterface, PDO::PARAM_STR);
            $statement->bindParam(':PHPSelf', $this->PHPSelf, PDO::PARAM_STR);
            $statement->bindParam(':QueryString', $this->QueryString, PDO::PARAM_STR);

			// Execute database statement
			$statement->execute();

			// Get affected rows
			$count = $statement->rowCount();

			// Close database resources
			$database = null;

			// Return affected rows
			return $count;
		}
		catch (PDOException $exception)
		{
			die($exception->getMessage());
		}
	}
}
