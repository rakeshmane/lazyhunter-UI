
#Version 20.02

This repo contains web UI components and config files of lazyhunter.

Note : This repo might not be upto date, it's recommended to use LazyHunter via docker container : https://hub.docker.com/r/rakeshmane/lazyhunter

# Installation

Make directory where all logs and uploaded files will be saved locally :

`mkdir -p ~/TOWF/logs/`

`mkdir -p ~/TOWF/uploads/`

Pull the current version 1.0 :

`docker pull rakeshmane/lazyhunter:v1.0`

Start server :
`docker pull rakeshmane/lazyhunter:v1.0`

`docker run --rm -v ~/TOWF/:/TOWF/ -p 8888:80 -p 8008:8008 -p 8001:8001 -d rakeshmane/lazyhunter:v1.0`

Visit : http://127.0.0.1:8888

# Without docker
I haven't tested it this outside of container but it you could just clone this repo and change the default commands from config/default_commands.txt file, then just start the php server and you are ready to go. 
I recommend you use docker container lazyhunter at the moment. I'll probably release non-docker version of lazyhunter, but not anytime soon.

# Contribution
Feel free to contact me on @RakeshMane10 or just send the Pull Request here.



