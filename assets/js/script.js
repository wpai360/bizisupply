var visitCheck = () => {
    if (!localStorage.getItem('viewed')) {
        introJs().start();
        localStorage.setItem('viewed', 'yes');
    }
}

$(document).ready(function() {
    visitCheck();


    $('.cancel').click(function() {
        var checkstr = confirm('are you sure you want to cancel this order?');
        if (checkstr == true) {} else {
            return false;
        }
    });
});