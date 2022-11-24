mkdir $1
cd $1
echo "Hola"|cat>index.php
mkdir css
mkdir img
mkdir js
mkdir tpl
mkdir php
cd css
mkdir user
cd user
echo "/*Esto es estilo.css*/"|cat>estilo.css
cd ..
mkdir admin
cd admin
echo "/*Esto es estilo.css*/"|cat>estilo.css
cd ../../img
mkdir avatars
mkdir buttons
mkdir products
mkdir pets
cd ../js
mkdir validations
mkdir effects
cd validations
echo "//Esto es login.js"|cat>login.js
echo "//Esto es register.js"|cat>register.js
cd ../effects
echo "//Esto es panels.js"|cat>panels.js
cd ../../tpl
echo "{*Esto es main.tpl*}"|cat>main.tpl
echo "{*Esto es login.tpl*}"|cat>login.tpl
echo "{*Esto es register.tpl*}"|cat>register.tpl
echo "{*Esto es panel.tpl*}"|cat>panel.tpl
echo "{*Esto es profile.tpl*}"|cat>profile.tpl
echo "{*Esto es crud.tpl*}"|cat>crud.tpl
cd ../php
echo "<?php //Esto es create.php ?>"|cat>create.php
echo "<?php //Esto es read.php ?>"|cat>read.php
echo "<?php //Esto es update.php ?>"|cat>update.php
echo "<?php //Esto es delete.php ?>"|cat>delete.php
echo "<?php //Esto es dbconnect.php ?>"|cat>dbconnect.php