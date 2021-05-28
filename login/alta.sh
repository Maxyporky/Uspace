#!/bin/bash
useradd -m -d /media/nube/$1 -s /usr/sbin/nologin $1
chmod 770 /media/nube/$1
chown $1:www-data /media/nube/$1
# touch /media/nube/$2

if [ $2 -eq 1 ]
    then
    setquota $1 3G 3G 0 0 /media/nube/
fi        

if [ $2 -eq 2 ]
then
setquota $1 5G 5G 0 0 /media/nube/
fi

if [ $2 -eq 3 ]
then
setquota $1 10G 10G 0 0 /media/nube/
fi


