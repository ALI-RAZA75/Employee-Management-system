document.addEventListener("DOMContentLoaded", () => {
    jQuery("#side-navigation-expand").hide();
    jQuery("#side-navigation-expand").on("click", function () {
        jQuery("#side-navigation").fadeIn();
        jQuery("#side-navigation-expand").hide();
        jQuery(".main-container").removeClass("main-container-full-width");
    });
    jQuery("#side-navigation-close").on("click", function () {
        jQuery("#side-navigation").hide();
        jQuery("#side-navigation-expand").show();
        jQuery(".main-container").addClass("main-container-full-width");
    });
    jQuery('table').DataTable();
});

