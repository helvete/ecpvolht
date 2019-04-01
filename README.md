# ecpvolht

Eon CheckPoint VPN on Linux How-To

1. extract `pkcs12` package into CA cert, client cert and private key https://stackoverflow.com/a/9516936/2915423 (optionally drop private key passphrase)
1. install shrew vpn client (package called `ike` on Ubuntu/Debian, google for the package name for specific your distro)
1. configure as suggested on attached [screenshots](https://raw.githubusercontent.com/helvete/ecpvolht/master/screenshots/README.md), OR import [site config](https://raw.githubusercontent.com/helvete/ecpvolht/master/shrewsoft_vpn_config/config.vpn) and replace certs & prv key files @ credentials tab
1. run key service daemon (via provided [ikedsvc](https://raw.githubusercontent.com/helvete/ecpvolht/master/src/ikedsvc) init script or manually)
1. run `iked -d 6 -F` for debugging (OPTIONAL)
