window.addEventListener("CookiebotOnDecline", e => {
    const cookieBanBanner = document.getElementById("cookie-ban-banner");

    if (Cookiebot.consent.marketing && Cookiebot.consent.statistics) {
        cookieBanBanner.style.display = "none";
    } else {
        cookieBanBanner.style.display = "block";
    }
    
}, false);