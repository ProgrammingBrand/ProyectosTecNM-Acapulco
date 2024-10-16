function isMobileDevice() {
    const userAgent = navigator.userAgent || navigator.vendor;

    return /android|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(userAgent);
}

window.onload = function () {
    if (/ipad|android(?!.*mobile)/i.test(navigator.userAgent)) {
        return;
    }

    if (isMobileDevice()) {
        if (window.location.pathname !== "/Error/mobile.html") {
            window.location.href = "/Error/mobile.html";
        } else {
            document.getElementById('content').style.display = 'none';
            document.getElementById('error-message').style.display = 'block';
        }
    }
};