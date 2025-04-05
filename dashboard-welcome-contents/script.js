
jQuery(document).ready( function($) 
{
    var htmlContent = wp_cs_vars.html_content;
    $('.welcome-panel-content h3, .welcome-panel-content .about-description').hide();
    // Right side paragraph (idem)
    $('.welcome-panel-column-container').html(htmlContent);
    $('#welcome-panel').delay(300).fadeTo('slow',1);
});     
