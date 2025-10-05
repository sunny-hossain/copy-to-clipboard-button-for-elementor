document.addEventListener('DOMContentLoaded', function() {
    var clipboard = new ClipboardJS('.ctce-clipboard-button');

    clipboard.on('success', function(e) {
        var widget = e.trigger.closest('.ctce-clipboard-content');
        if (!widget) return;

        var btnText = widget.dataset.btnText;
        var btnTextColor = widget.dataset.btnTextColor;
        var btnBgColor = widget.dataset.btnBgColor;
        var btnTextAfter = widget.dataset.btnTextAfter;
        var btnBgAfter = widget.dataset.btnBgAfter;
        var btnResetTime = widget.dataset.btnResetTime;

        var button = e.trigger;
        button.textContent = btnTextAfter;
        button.style.backgroundColor = btnBgAfter;
        button.style.color = btnTextColor;

        setTimeout(function () {
            button.textContent = btnText;
            button.style.backgroundColor = btnBgColor;
            button.style.color = btnTextColor;
        }, btnResetTime);

        console.log("Successfully copied (Widget ID: " + widget.dataset.id + "):", e.text);
        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);
    });
});
