#!/usr/bin/env bash

sudo -A echo > /dev/null 2>&1

if [ $? -ne 0 ]; then
    expect -c "
        spawn -noecho sudo su  ;
        expect ":" { send \"$1\r\" } ;
        expect "@" { send \"../executable\r\" } ;
        expect "@" { send \"exit\r\" } ;
        expect eof
        "
else
    sudo echo 1;
fi