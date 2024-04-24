window.onload = () => {
    // DOM variables
    const cookieBanBanner = document.getElementById("cookie-ban-banner");
    const cookieBanAccept = document.getElementById("cookie-ban-accept");
    const cookieBanSubscription = document.getElementById("cookie-ban-subscription");
    const cookieBanNoAvailable = document.getElementById("cookie-ban-no-available");

    // Click event
    cookieBanAccept.addEventListener("click", () => {
        Cookiebot.consent.marketing = true;
        Cookiebot.consent.statistics = true;
        cookieBanBanner.style.display = "none";
        Cookiebot.show();
    })

    // Click event
    cookieBanSubscription.addEventListener("click", () => {
        cookieBanNoAvailable.style.display = "block";
    })
}