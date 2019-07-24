# ecpvolht

Eon CheckPoint VPN on Linux How-To

1. extract `pkcs12` package into CA cert, client cert and private key https://stackoverflow.com/a/9516936/2915423 (optionally drop private key passphrase)
1. install shrew vpn client (package called `ike` on Ubuntu/Debian, google the package name for your specific distro OR [build from source](https://www.centos.org/forums/viewtopic.php?t=49096))
1. configure as suggested on attached [screenshots](https://github.com/helvete/ecpvolht/tree/master/screenshots), OR import [site config](https://github.com/helvete/ecpvolht/blob/master/shrewsoft_vpn_config/config.vpn) and replace cert files & private key @ [Authentication:Credentials](https://github.com/helvete/ecpvolht/tree/master/screenshots#credentials) tab
1. run key service daemon (via provided [ikedsvc](https://github.com/helvete/ecpvolht/blob/master/src/ikedsvc) init script or manually)
1. launch the GUI (`qikea`) and connect OR use the CLI variant `ikec -r <sitename> -a` where the sitename is a name of file located at `~/.iked/sites/`
1. enjoy

In case CLI solution is preferred init service can be used. In order for it to work symlink shell scripts from within ./src as follows:

![symlinking-the scripts](https://raw.githubusercontent.com/helvete/ecpvolht/master/screenshots/ln-s.png)

Then, both the key daemon and the connection client can be run via CLI like this:

```
sudo /etc/init.d/ike start && /etc/init.d/ikes start
```

### TODOs

* improve currently primitive solution for docker via routing
