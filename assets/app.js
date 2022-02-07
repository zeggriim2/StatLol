// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
//import './bootstrap';

const $ = require('jquery');

// $(".alert").show("slow").delay(1500).hide("slow");

$(".alert-danger").fadeTo(2000, 500).slideUp(500, function() {
    $(".alert-danger").slideUp(500);
});