window.onload = () => {
    // DOM variables
    const cookieBanBanner = document.getElementById("cookie-ban-banner");
    const cookieBanAccept = document.getElementById("cookie-ban-accept");

    // Click event
    cookieBanAccept.addEventListener("click", () => {
        Cookiebot.consent.marketing = true
        Cookiebot.consent.statistics = true
        cookieBanBanner.style.display = "none";
        Cookiebot.show();
    })
}