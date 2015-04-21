 <?php
	
        //ENTER THE RELEVANT INFO BELOW
        $mysqlDatabaseName ='cs4750ayz7bs';
        $mysqlUserName ='cs4750ayz7bs';
        $mysqlPassword ='cs4750';
        $mysqlHostName ='stardock.cs.virginia.edu';
        $mysqlExportPath ='test.sql';

        //DO NOT EDIT BELOW THIS LINE
        //Export the database and output the status to the page
        $command='mysqldump --opt -h' .$mysqlHostName .' -u' .$mysqlUserName .' -p' .$mysqlPassword .' ' .$mysqlDatabaseName .' > ~/' .$mysqlExportPath;
        exec($command);
 ?>