# ReDone

## Fully distributed peer-to-peer social network using onion routing

Conventional social networks store all information on central servers, forcing their users to give up control of their own data, compromising their privacy, and exposing them to surveillance and censorship.

ReDone is different! All your data is stored on your own device. No central servers are needed. Devices communicate with each other over a decentralized peer-to-peer network. All communication is anonymized and encrypted via Onion Routing (Tor).

- Anonymous, peer-to-peer, fully decentralized
- Data remains on the users' own devices
- All communication sent through Tor anonymously (onion routing)
- Full end-to-end encryption
- Completely free
- Post text and images
- Share content
- Friend list
- Personal profile
- Private chat


https://github.com/MrCyjaneK/ReDone/releases


Original author: http://github.com/onionApps - jkrnk73uid7p5thz.onion - bitcoin:1kGXfWx8PHZEVriCNkbP5hzD15HS4AyKf
ReDone author: http://github.com/MrCyjaneK - sanjdhrezzcs24mu.onion



## Finding Friends
- Meet them in real life and scan their QR code
- Send them an invitation message (via Email, SMS, instant messenger, etc.)
- Post your Network.onion URL on the web or on other social networks
- Search for other Network.onion users who have posted their URLs or IDs
- Tell people your 16 character Network.onion ID
- Search the web for Network.onion FriendBots (profiles that automatically accept all friend requests), or run your own FriendBot (see below)



## Building
- Clone this repository
- (Optionally, replace the included Tor binaries at /bin/ with your own and run /bin/pack.sh)
        (When I've tried to update to tor 0.4.x I've ran over issues that I was unable to fix :( pull request are welcome)
- (Get Android Studio)
- Open project
- Hit the run button


Tor binaries: This repository already contains Tor binaries for a few different platforms and Android versions. If you want to build everything from source, you'd have to replace them. Building Tor for Android can be a bit tricky, but there are a few instructions on the web. If your ReDone build only needs to work on one platform, you can simply replace all four files with the same binary; overhead will be compressed away. You could probably also extract the Tor binary from some other Android app if you trust it more and drop it in here.


## Bots
ReDone supports the operation of automated bots. Some can be created by simply installing ReDone on a device or emulator and enabling the respective bot mode. Others need a bit of programming. For more information, see https://github.com/MrCyjaneK/ReDone/blob/master/bots/README.md.



## Links

https://github.com/MrCyjaneK/ReDone/releases

## Todo


 - [ ] Support for v3 .onion
 - [ ] Allow to send images via chat
 - [ ] 'Board' that will contain new posts with infinite scroll option.
 - [ ] Group chats
 - [ ] Create some cool bots
 - [ ] Create friend-bots
