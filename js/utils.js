export {yearsAgo, setCurrentPageToActive};

function yearsAgo(pastDate)
{
    // Create a variable to hold a new Date object (defaults to now)
    var today = new Date();

    // Get the year this year
    var year = today.getFullYear();

    // Get difference between then & now in milliseconds
    var difference = today.getTime() - pastDate.getTime();

    // Divide by number of milliseconds to get years
    difference = (difference / 31556900000);

    return Math.floor(difference);
}

function setCurrentPageToActive() {
    var navLinks = document.getElementsByClassName('nav-link');
    var curLink = window.location.href;

    for (let i = 0; i < navLinks.length; i++) {
        if (navLinks.item(i).href == curLink)
            navLinks.item(i).setAttribute('class', 'nav-link active');
    }

}