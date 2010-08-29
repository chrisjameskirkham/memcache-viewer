#!/bin/bash

echo -n 'Enter Password: '
read -s pwd1
echo -en "\n"
echo -n 'And Again: '
read -s pwd
echo -en "\n"

if [ "$pwd1" != "$pwd" ]
then
	echo "ERROR: Passwords weren't the same. Try again."
	exit 1
fi

echo '----------------------------------------------------------------'
echo -n $pwd | sha256sum | awk '{print $1}'
echo '----------------------------------------------------------------'

echo 'Copy the above hash, excluding the lines, into the PASSWORD' 
echo 'section of the configuration file.'
