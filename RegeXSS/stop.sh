#!/bin/bash

checkngrok=$(ps aux | grep -o "ngrok" | head -n1)
checkphp=$(ps aux | grep -o "php" | head -n1)

if [[ $checkngrok == *'ngrok'* ]]; 
then
	printf "[*] Killing Ngrok Server\t=>\t"
	pkill -f -2 ngrok > /dev/null 2>&1
	killall -2 ngrok > /dev/null 2>&1
	sleep 1
	printf "Successful!!!"
fi

if [[ $checkphp == *'php'* ]];
then
	printf "\n[*] Killing PHP Server\t\t=>\t"
	pkill -f -2 php > /dev/null 2>&1
	killall -2 php > /dev/null 2>&1
	sleep 1
	printf "Successful!!!\n"
fi