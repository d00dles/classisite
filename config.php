<?php
function db_exists($db){
  if(!pg_query($db,'SELECT 1 from adverts;')){
      return FALSE;
  }
  return TRUE;
}
function create_db($db){
  pg_query($db,'DROP TABLE IF EXISTS adverts');
  pg_query($db,'CREATE TABLE adverts (
    ad_id serial NOT NULL PRIMARY KEY,
    ad_title char(355) NOT NULL,
    location char(355) NOT NULL,
    contact char(355) NOT NULL,
    ad_price decimal NOT NULL,
    description char(2048) NOT NULL,
    user_s char(2048) NOT NULL
  )');
  pg_query($db,'INSERT INTO adverts VALUES (6,\'Flag:\',\'7ece2603c45f907a32b271c215595002\',\'07726372\',189,\'\"Congrats, report this ASAP + find the rest! <br>
    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"\',\'dove\'),(7,\'PS4\',\'London\',\'029389483\',120,\'\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"\',\'primary\'),(8,\'Cabinet\',\'Camden\',\'077283728372\',20,\'\"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.\"\',\'dove\'),(9,\'Screen\',\'London\',\'02273847382\',200,\'Its is a screen and this is a bog old dialog box!\',\'dove\'),(10,\'Computer\',\'Cambridge\',\'07722415234\',1232,\'It is what it says. Contact for more details\r\n\',\'dove\'),(11,\'Computer\',\'Cambridge\',\'07722415234\',1232,\'It is what it says. Contact for more details\r\n\',\'dove\'),(12,\'N64\',\'Hendon\',\'07725416009\',20,\'N64 fresh in box\r\n\',\'primary\'),(13,\'football\',\'Arsenal\',\'02839288382\',11,\'Its round. It bounces. What else\r\n\',\'secondary\'),(14,\'football\',\'Arsenal\',\'02839288382\',11,\'Its round. It bounces. What else\r\n\',\'secondary\'),(15,\'Test monitor\',\'Southend\',\'02938948493\',120,\'Testing for iniit\',\'dove\'),(16,\'hxdh\',\'xdfhfg\',\'xfgjh\',112,\'jhvk\',\'dove\'),(17,\'fgnxf\',\'dfhfxd\',\'dfhdxfh\',325234,\'hsdhdx\',\'primary\'),(18,\'Title\',\'Sale \',\'Contant\',2312,\'Here we go\r\n\',\'dove\'),(19,\'asdf\',\'asdf\',\'asdf\',1,\'asdf\',\'dove\'),(20,\'poolish\',\'efsaf\',\'srgva\',266,\'segverageagh\',\'dove\'),(21,\'szdgoub\',\'opsdrignoiawn\',\'ghperingoin\',666,\'poolish\',\'\'),(22,\'erdhb\',\'dzhdzg\',\'zdhdzfh\',35345,\'rsgzrsyhdx\',\'dove\');');
  pg_query($db,'DROP TABLE IF EXISTS users;');

  pg_query($db,'DROP TABLE IF EXISTS users');
  pg_query($db,'CREATE TABLE users (
    user_id serial NOT NULL PRIMARY KEY,
    username char(255) NOT NULL,
    password char(255) NOT NULL
  );
');
  pg_query($db,'INSERT INTO users VALUES (1,\'test\',\'Password\'),(4,\'if_you_crack_this_speak_to_redteam_please\',\'1a571a1160afe234ea890d4b235db8d6f000fc913a5c16d8cf7b6a9b095e5395\'),(7,\'Crack This:\',\'5f5656750f703de09d03c82f6e27f8c202c002f4\'),(8,\'flag:\',\'7d5ef77c5e47cf0ce9088befc98f7a5d\'),(9,\'dove\',\'dove\');');

  pg_query($db,'DROP TABLE IF EXISTS flags');
  pg_query($db,'CREATE TABLE flags (
    user_id serial NOT NULL PRIMARY KEY,
    kay char(255) NOT NULL,
    value char(255) NOT NULL
  );
');
pg_query($db,'INSERT INTO flags VALUES (1,\'flag\',\'2e877daf71a1751f8813579124364b2f\');');

}





  define('DB_URL', ' postgres://');
  define('DBHOST','');
  define('DBPORT','');
  define('USER','');
  define('Password','');
  define('DBNAME','');
  $conn_str ="host=".DBHOST." port=".DBPORT." dbname=".DBNAME." user=".USER." password=".Password;
  error_log($conn_str);
  $db = pg_connect($conn_str)or die("Couldn't connect to the DB");

if (!db_exists($db)){
  error_log("DB doesn't exist, creating");
  create_db($db);
}



   // $db = pg_connect(DB_URL) or die("Couldn't connect to the DB");
?>
