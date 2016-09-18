<?php
  // Set Variables
  $LOCAL_ROOT         = "/home/azinger3/public_html";
  $LOCAL_REPO_NAME    = "api";
  $LOCAL_REPO         = "{$LOCAL_ROOT}/{$LOCAL_REPO_NAME}";

  if( file_exists($LOCAL_REPO) ) {

    // If there is already a repo, just run a git pull to grab the latest changes
    shell_exec("cd {$LOCAL_REPO} && git pull");

    die("done " . mktime());
  }
?>
