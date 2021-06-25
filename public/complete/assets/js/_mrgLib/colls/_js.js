  'use strict'

  let win = window,
    doc = window.document,
    relem = doc.documentElement;

  const timestamp = Date.now();
  const userAgent = navigator.userAgent;
  const isOnline = navigator.onLine;
  const currentUrl = doc.location.href;

  const v4Seg = '(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])';
  const v4Str = `(${v4Seg}[.]){3}${v4Seg}`;
  const IPv4Reg = new RegExp(`^${v4Str}$`);

  // IPv6 Segment
  const v6Seg = '(?:[0-9a-fA-F]{1,4})';
  const IPv6Reg = new RegExp('^(' +
    `(?:${v6Seg}:){7}(?:${v6Seg}|:)|` +
    `(?:${v6Seg}:){6}(?:${v4Str}|:${v6Seg}|:)|` +
    `(?:${v6Seg}:){5}(?::${v4Str}|(:${v6Seg}){1,2}|:)|` +
    `(?:${v6Seg}:){4}(?:(:${v6Seg}){0,1}:${v4Str}|(:${v6Seg}){1,3}|:)|` +
    `(?:${v6Seg}:){3}(?:(:${v6Seg}){0,2}:${v4Str}|(:${v6Seg}){1,4}|:)|` +
    `(?:${v6Seg}:){2}(?:(:${v6Seg}){0,3}:${v4Str}|(:${v6Seg}){1,5}|:)|` +
    `(?:${v6Seg}:){1}(?:(:${v6Seg}){0,4}:${v4Str}|(:${v6Seg}){1,6}|:)|` +
    `(?::((?::${v6Seg}){0,5}:${v4Str}|(?::${v6Seg}){1,7}|:))` +
    ')(%[0-9a-zA-Z]{1,})?$');

  function isIPv4(s) {
    return IPv4Reg.test(s);
  }

  function isIPv6(s) {
    return IPv6Reg.test(s);
  }

  function isIP(s) {
    if (isIPv4(s)) return 4;
    if (isIPv6(s)) return 6;
    return 0;
  }

  // Check that the port number is not NaN when coerced to a number,
  // is an integer and that it falls within the legal range of port numbers.
  function isLegalPort(port) {
    if ((typeof port !== 'number' && typeof port !== 'string') ||
      (typeof port === 'string' && port.trim().length === 0))
      return false;
    return +port === (+port >>> 0) && port <= 0xFFFF;
  }


  /**
   * Get the user IP throught the webkitRTCPeerConnection
   * @param onNewIP {Function} listener function to expose the IP locally
   * @return undefined
   */
  function getUserIP(onNewIP) { //  onNewIp - your listener function for new IPs
    //compatibility for firefox and chrome
    var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
    var pc = new myPeerConnection({
        iceServers: []
      }),
      noop = function () {},
      localIPs = {},
      ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
      key;

    function iterateIP(ip) {
      if (!localIPs[ip]) onNewIP(ip);
      localIPs[ip] = true;
    }

    //create a bogus data channel
    pc.createDataChannel("");

    // create offer and set local description
    pc.createOffer().then(function (sdp) {
      sdp.sdp.split('\n').forEach(function (line) {
        if (line.indexOf('candidate') < 0) return;
        line.match(ipRegex).forEach(iterateIP);
      });

      pc.setLocalDescription(sdp, noop, noop);
    }).catch(function (reason) {
      // An error occurred, so handle the failure to connect
    });

    //listen for candidate events
    pc.onicecandidate = function (ice) {
      if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
      ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
    };
  }

  // Usage
  getUserIP(function (ip) {
    alert("Got IP! :" + ip);
  });