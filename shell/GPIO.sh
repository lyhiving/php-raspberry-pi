#!/usr/bin/env bash

sudo -A echo > /dev/null 2>&1

if [ $? -ne 0 ]; then
    expect -c "
        spawn -noecho su $1 ;
        expect ":" { send \"$2\r\" } ;
        expect "*" { send \"../executable/GPIO $3 $4 $5 $6\r\" } ;
        expect "*" { send \"exit\r\" } ;
        expect eof
        "
else

    sudo ../executable/GPIO  $3 $4 $5 $6;

fi