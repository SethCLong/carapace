/**
 * Records all keystrokes and displays them in the browser's
 * status bar.
 */
document.onkeypress = function () {
    window.status += String.fromCharCode(window.event.keyCode);
}
