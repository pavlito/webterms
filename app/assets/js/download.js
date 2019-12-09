$(function() {
    
    // clipboard and notify
    $('#copy-link-button').on('click', function(e) {
        new Clipboard('#copy-link-button', {
            text: function(trigger) {
                return document.getElementById('copy-link').value;
            }
        });
        
        $.notify('Copied to clipboard. You can paste your generated policy now (Control+V or CMD+V or right-click > Paste).', 'branded');
    });
    
    // clipboard and notify
    $('#copy-text-button').on('click', function(e) {
        new Clipboard('#copy-text-button', {
            text: function(trigger) {
                return document.getElementById('copy-text').value;
            }
        });
        
        $.notify('Copied to clipboard. You can paste your generated policy now (Control+V or CMD+V or right-click > Paste).', 'branded');
    });
    
});