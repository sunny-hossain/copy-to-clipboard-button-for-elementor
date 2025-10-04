document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function(e) {
        if (e.target.matches('.ctce-clipboard-button-wrap button')) {
            const widget = e.target.closest('.ctce-clipboard-content');
            if (!widget) return;

            const clipboardText = widget.dataset.clipboardText;
            const temp = document.createElement('input');
            document.body.appendChild(temp);
            temp.value = clipboardText;
            temp.select();
            document.execCommand('copy');
            document.body.removeChild(temp);

            const btnText = widget.dataset.btnText;
            const btnTextColor = widget.dataset.btnTextColor;
            const btnBgColor = widget.dataset.btnBgColor;
            const btnTextAfter = widget.dataset.btnTextAfter;
            const btnBgAfter = widget.dataset.btnBgAfter;
            const btnResetTime = widget.dataset.btnResetTime;

            const button = e.target;
            button.textContent = btnTextAfter;
            button.style.backgroundColor = btnBgAfter;
            button.style.color = btnTextColor;

            setTimeout(function () {
                button.textContent = btnText;
                button.style.backgroundColor = btnBgColor;
                button.style.color = btnTextColor;
            }, btnResetTime);

            console.log("Successfully copied (Widget ID: " + widget.dataset.id + "):", clipboardText);
        }
    });
});