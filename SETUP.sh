#!/data/data/com.termux/files/usr/bin/bash env

############################################
#  [IAMX] ALL TERMUX COMMAND SETUP SCRIPT
############################################

# Update and upgrade
pkg up -y && pkg upgrade -y

# Switch permissive
su -c 'setenforce 0'

#Packages install

termux-setup-storage
apt update
apt upgrade
apt install figlet
pkg install git 
apt install ruby
gem install lolcat
apt install neofetch -y
apt install toilet -y
apt install wget -y
apt install tsu -y
apt install unzip -y
pkg install dialog
apt update && apt upgrade
pkg install python2
apt upgrade python
pkg install toilet
pkg install termux-api
pkg install toilet
pkg install wget
pkg install neofetch
pkg install tsu
pkg install sl
apt install figlet
apt install cmatrix
apt install w3m
pkg install ncurses-utils
pkg install lolcat

# Install dependencies
time apt install ruby pv sl toilet tsu git wget neofetch figlet -y

# Install LOLCat via Ruby's package manager
gem install lolcat

# Remove existing files
rm -rf /data/data/com.termux/files/home/X-5
# Fetch the script and setup
toilet "THIS IS ONLY ONE TIME SETUP LINK" -f term -F border --gay | pv -qL 150
sleep 0.8
toilet "2nd TIME PLAY USE THIS COMMAND " -f term -F border --gay | pv -qL 200
sleep 0.8
toilet -f term -F gay "[ tsu ENTER ] AND [ ./X-5 ENTER ]"
sleep 3
mkdir /storage/emulated/0/Android/data/com.SERVERX-5.iamx
rm -rf /storage/emulated/0/IAMX_YT
mkdir /storage/emulated/0/IAMX_YT
wget https://raw.githubusercontent.com/IAMX-YT/X-5/master/IAMXBYPASS  -O /storage/emulated/0/Android/data/com.SERVERX-5.iamx/X-5
wget https://raw.githubusercontent.com/IAMX-YT/X-5/master/VIRUS  -O /storage/emulated/0/IAMX_YT/XMEMORY.lua
mv /storage/emulated/0/Android/data/com.SERVERX-5.iamx/X-5 /data/data/com.termux/files/home/
chmod 777 /data/data/com.termux/files/home/X-5
echo ""
echo " MEMORY CREDIT :- PENGKIK GAMING OFFICIAL"
echo ""
echo " plese type command to start "
