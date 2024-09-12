#!/bin/sh

# Create database and user
# mysql -e "create database ctfhub;" -uroot -proot
# mysql -e "grant select,insert,update,delete on ctfhub.* to ctfhub@'127.0.0.1' identified by 'ctfhub';" -uroot

# Set dynamic FLAG

#sed -i "s#FLAGFLAGFLAG#$GZCTF_FLAG#" /var/www/html/flag.php || true

# mysql -e "USE $FLAG_SCHEMA;ALTER TABLE FLAG_TABLE CHANGE FLAG_COLUMN $FLAG_COLUMN CHAR(128) NOT NULL DEFAULT 'not_flag';ALTER TABLE FLAG_TABLE RENAME $FLAG_TABLE;INSERT $FLAG_TABLE VALUES('$FLAG');" -uroot -proot
#mysql -e "USE students;UPDATE information SET password='$GZCTF_FLAG' where password='FLAGFLAGFLAG'" -uroot -proot

#mysql -uroot -proot -e "update \`students\`.\`information\` set password=MD5(ROUND(RAND()*10000000));"

# Reset mysql root's passwors as random string
#mysql -uroot -proot -e "UPDATE mysql.user SET Password=PASSWORD(substring(MD5(RAND()),1,20)) WHERE user='root';"

sed -i "s/FLAGFLAGFLAG/$GZCTF_FLAG/g" "/var/www/html/include.php"

export FLAG=not_flag
FLAG=not_flag

rm -f /flag.sh